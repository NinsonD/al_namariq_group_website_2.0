<form action="{{ route('admin.payments.update', ['payment' => $payment->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="key" value="{{ $payment->key }}" class="d-none">
    <div class="row gy-6">

        <div class="col-lg-6">
            <x-image-uploader name="image" :label="__('attribute.image')" :value="$data->image"/>
            <x-input-error field="image" />
        </div>

        <div class="col-12">
            <x-input-switch name="status" :label="__('attribute.status')" :checked="$data->status" />
            <x-input-error field="status" />
        </div>

        <div class="col-md-12">
            <x-admin.button-save />
        </div>

    </div>
</form>
