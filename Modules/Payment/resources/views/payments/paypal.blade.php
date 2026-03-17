<form action="{{ route('admin.payments.update', ['payment' => $payment->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="key" value="{{ $payment->key }}" class="d-none">
    <div class="row gy-6">

        <div class="col-lg-6">
            <x-input-label for="paypal_client_id" :value="__('attribute.paypal_client_id')" />
            <x-text-input id="paypal_client_id" name="paypal_client_id" :value="$data->paypal_client_id" />
            <x-input-error field="paypal_client_id" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="paypal_secret_key" :value="__('attribute.paypal_secret_key')" />
            <x-text-input id="paypal_secret_key" name="paypal_secret_key" :value="$data->paypal_secret_key" />
            <x-input-error field="paypal_secret_key" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="gateway_charge" :value="__('attribute.gateway_charge')" />
            <x-text-input type="number" id="gateway_charge" name="gateway_charge" :value="$data->gateway_charge" />
            <x-input-error field="gateway_charge" />
            <x-input-msg :text="__('admin.gateway_charge_msg')" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="paypal_account_mode" :value="__('attribute.paypal_account_mode')" />
            <select id="paypal_account_mode" name="paypal_account_mode" class="form-select">
                <option value="sandbox" {{ $data->paypal_account_mode == 'sandbox' ? 'selected' : '' }}>{{ __('admin.sandbox') }}</option>
                <option value="live" {{ $data->paypal_account_mode == 'live' ? 'selected' : '' }}>{{ __('admin.live') }}</option>
            </select>
            <x-input-error field="paypal_account_mode" />
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
