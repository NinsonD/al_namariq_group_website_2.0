@extends('core::layout.app')

@section('content')
<x-card :heading="__('version_1_1.system_update')">
    <div class="px-4">

        <p class="mb-4 text-black">{{ __('version_1_1.current_version') }}:
            <span class="fw-semibold text-success">{{ $currentVersion }}</span>
        </p>

        <div class="alert alert-danger">
            <strong>{{ __('admin.warning') }}:</strong> {{ __('version_1_1.backup_before_update') }}
        </div>

        <div class="my-5">
            <input type="checkbox" id="confirmBackup" class="form-check-input me-2">
            <label for="confirmBackup" class="form-check-label text-black">{{ __('version_1_1.i_have_backup') }}</label>
        </div>

        <div id="uploadSection" class="product-gallery-uploader-container d-flex flex-column align-items-center justify-content-center gap-2">
            <span>
                <!-- upload svg -->
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.5 15.1628V19.6073C21.5 20.1967 21.2659 20.7619 20.8491 21.1786C20.4324 21.5954 19.8671 21.8295 19.2778 21.8295H3.72222C3.13285 21.8295 2.56762 21.5954 2.15087 21.1786C1.73413 20.7619 1.5 20.1967 1.5 19.6073V15.1628" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17.0486 7.38502L11.4931 1.82947L5.9375 7.38502" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M11.5 1.82947V15.1628" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
            <p class="fw-medium text-black my-2">{{ __('version_1_1.drag_and_drop') }}</p>
            <p class="product-gallery-uploader-label">{{ __('version_1_1.browse_files') }}</p>
        </div>

        <div id="progressWrapper" class="hidden mt-4">
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                <div id="progressBar" class="progress-bar" style="width: 0%"></div>
            </div>
            <p id="statusText" class="alert alert-info mt-4 mb-0">
                {{ __('version_1_1.ready_to_upload') }}
            </p>
        </div>
    </div>
</x-card>

@endsection

@push('css')
<style>
.product-gallery-uploader-container{
    height: 260px;
    border: 2px dashed #E5E5EA;
}
.product-gallery-uploader-label{
    transition: all 0.3s ease-in-out;
}
.product-gallery-uploader-label:hover{
    background-color: var(--bs-primary);
    color: #fff;
    border-color: var(--bs-primary);
}
</style>

@endpush

@push('js')
<script src="{{ asset('admin/js/resumable.min.js') }}"></script>
<script>
'use strict';

$(function () {
    const $uploadSection = $('#uploadSection');
    const $progressWrapper = $('#progressWrapper');
    const $progressBar = $('#progressBar');
    const $statusText = $('#statusText');

    const mergingText = "{{ __('version_1_1.merging_extracting') }}";
    const errorText = "{{ __('version_1_1.error') }}";
    const uploadingText = "{{ __('version_1_1.uploading') }}";
    const uploadFailedText = "{{ __('version_1_1.upload_failed') }}";

    // check if confirm or not
    $uploadSection.on('click', function(e) {
        if (!$('#confirmBackup').is(':checked')) {
            e.stopImmediatePropagation();

            Swal.fire({
                icon: 'warning',
                title: "{{ __('admin.warning') }}",
                text: "{{ __('version_1_1.backup_before_update') }}",
                confirmButtonText: 'OK'
            });

            return false;
        }
    });

    function resetProgress() {
        $progressBar.css('width', '0%').removeClass('bg-success bg-danger');
        $statusText.text("{{ __('version_1_1.ready_to_upload') }}").removeClass('alert-success alert-danger').addClass('alert-info');
        $progressWrapper.addClass('hidden');
    }

    const resumable = new Resumable({
        target: "{{ route('admin.system-update-chunk') }}",
        query: {},
        fileParameterName: 'file',
        chunkSize: 2 * 1024 * 1024, // 2MB
        simultaneousUploads: 1,
        testChunks: false,
        throttleProgressCallbacks: 1,
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        fileType: ['zip'],
        maxFiles: 1,
    });

    resumable.assignDrop($uploadSection[0]);
    resumable.assignBrowse($uploadSection[0]);

    resumable.on('fileAdded', function (file) {
        resetProgress();
        $progressWrapper.removeClass('hidden');
        resumable.upload();
    });

    resumable.on('fileProgress', function (file) {
        const progress = Math.floor(file.progress() * 100);
        $progressBar.css('width', progress + '%');
        $statusText.text(`${uploadingText} ${progress}%`);
    });

    resumable.on('fileSuccess', function (file) {
        $statusText.text(mergingText);

        $.ajax({
            url: "{{ route('admin.system-update-complete') }}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                identifier: file.uniqueIdentifier,
                filename: file.fileName
            }),
            success: function (data) {
                if (data.success) {
                    $statusText.text(data.message);
                    $statusText.addClass('alert-success').removeClass('alert-info');
                    $progressBar.addClass('bg-success').removeClass('bg-danger');
                } else {
                    $statusText.text('Error: ' + data.error);
                    $statusText.addClass('alert-danger').removeClass('alert-info');
                    $progressBar.addClass('bg-danger').removeClass('bg-success');
                }
            },
            error: function (xhr) {
                $statusText.text('Error: ' + xhr.statusText);
                $statusText.addClass('alert-danger').removeClass('alert-info');
                $progressBar.addClass('bg-danger').removeClass('bg-success');
            }
        });
    });

    resumable.on('fileError', function (file, message) {
        $statusText.text(`${uploadFailedText}: ${message}`);
        $statusText.addClass('alert-danger').removeClass('alert-info');
        $progressBar.addClass('bg-danger').removeClass('bg-success');
    });
});

</script>
@endpush
