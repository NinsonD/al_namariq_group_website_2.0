
<div class="pb-5">
    <form action="{{ route('admin.mail_queue_status') }}" method="POST" class="pb-4 mb-4 border-bottom">
        @csrf
        @method('PUT')
        <x-input-switch name="is_mail_queable" :label="__('admin.send_mail_in_queue')" :checked="$settings->is_mail_queable"/>
    </form>

    @if ($settings->is_mail_queable)
        <div class="pt-1 text-info">
            <span class="text-success">{{ __('admin.please_copy_and_run_cmd') }}</span>
            <strong role="button" id="copyCronText">{{ __('admin.mail_queue_command') }}</strong>
        </div>
        <div class="pt-1 text-warning">
            <b>{{ __('admin.mail_queue_warning') }}</b>
        </div>

    @endif
</div>


<form action="{{ route('admin.update.mail_configuration') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-lg-6">
            <x-input-label for="mail_sender_name" :value="__('attribute.mail_sender_name')" />
            <x-text-input id="mail_sender_name" name="mail_sender_name" :value="$settings->mail_sender_name ?? ''" />
            <x-input-error field="mail_sender_name" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="mail_sender_email" :value="__('attribute.mail_sender_email')" />
            <x-text-input id="mail_sender_email" name="mail_sender_email" :value="$settings->mail_sender_email ?? ''" />
            <x-input-error field="mail_sender_email" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="mail_host" :value="__('attribute.mail_host')" />
            <x-text-input id="mail_host" name="mail_host" :value="$settings->mail_host ?? ''" />
            <x-input-error field="mail_host" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="mail_username" :value="__('attribute.mail_username')" />
            <x-text-input id="mail_username" name="mail_username" :value="$settings->mail_username ?? ''" />
            <x-input-error field="mail_username" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="mail_password" :value="__('attribute.mail_password')" />
            <div class="input-group">
                <x-text-input id="mail_password" name="mail_password" :value="$settings->mail_password ?? ''" />
                <span class="input-group-text password-toggle">
                    <span class="close-eye password-eye">
                        <x-icons.close-eye />
                    </span>
                    <span class="open-eye password-eye d-none">
                        <x-icons.open-eye />
                    </span>
                </span>
            </div>
            <x-input-error field="mail_password" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="mail_port" :value="__('attribute.mail_port')" />
            <x-text-input id="mail_port" name="mail_port" :value="$settings->mail_port ?? ''" />
            <x-input-error field="mail_port" />
        </div>
        <div class="col-lg-6">
            <x-input-label for="mail_encryption" :value="__('attribute.mail_encryption')" />
            <select name="mail_encryption" id="" class="form-control conca-select2">
                <option value="ssl" @selected($settings->mail_encryption == 'ssl')>{{ __('admin.ssl') }}</option>
                <option value="tls" @selected($settings->mail_encryption == 'tls')>{{ __('admin.tls') }}</option>
            </select>
            <x-input-error field="mail_encryption" />
        </div>
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
    </div>
</form>
