@props(['id' =>"deleteModal" ])
<div tabindex="-1" role="dialog" id="{{$id}}" {{ $attributes->merge(['class' => 'modal fade']) }}>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ __('admin.delete') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>
                    {{ __('admin.are_your_sure_delete') }}
                </p>
            </div>
            <div class="modal-footer br">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="button" variant="danger" style="label" data-bs-dismiss="modal" :text="__('admin.close')"/>
                    <x-button type="submit" :text="__('admin.yes_delete_it')"/>
                </form>
            </div>
        </div>
    </div>
</div>