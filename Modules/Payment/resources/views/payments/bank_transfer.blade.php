<form action="{{ route('admin.payments.update', ['payment' => $payment->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="key" value="{{ $payment->key }}" class="d-none">
    <div class="row gy-6">

        <div class="col-lg-12">
            <x-input-label for="gateway_charge" :value="__('attribute.gateway_charge')" />
            <x-text-input type="number" id="gateway_charge" name="gateway_charge" :value="$data->gateway_charge" />
            <x-input-error field="gateway_charge" />
            <x-input-msg :text="__('admin.gateway_charge_msg')" />
        </div>
        <div class="col-lg-12">
            <x-input-label for="bank_information" :value="__('attribute.bank_information')" />
            <x-textarea id="bank_information" rows="7" name="bank_information" :value="$data->bank_information" />
            <x-input-error field="bank_information" />
        </div>
        <div class="col-lg-12">
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
