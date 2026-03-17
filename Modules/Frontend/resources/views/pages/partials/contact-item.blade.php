
<form action="{{ route('admin.contact-page.update', ['key' => $contact->key]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @php
        $title = Str::replace('_', ' ', $contact->key);
        $key = $contact->key;
        $data = (object) $contact->value;
        $fileId = 'contact_' . $contact->key;
        $defaultId = 'default_' . $contact->key;
    @endphp
    <x-card :heading="$title">

        <div class="row gy-5 mb-5">
            <div class="col-md-12">
                <x-image-uploader :name="$fileId" :label="__('attribute.image')" :value="$data->image" />
                <x-input-error :field="$fileId" />
            </div>

            <div class="col-md-6">
                <x-input-label for="name_{{ $key }}" :value="__('attribute.name')" />
                <x-text-input id="name_{{ $key }}" name="name_{{ $key }}" :value="old('name_{{ $key }}', $data->name)"/>
                <x-input-error field="name_{{ $key }}" />
            </div>
            <div class="col-md-6">
                <x-input-label for="email_{{ $key }}" :value="__('attribute.email')" />
                <x-text-input type="email" id="email_{{ $key }}" name="email_{{ $key }}" :value="old('email_{{ $key }}', $data->email)"/>
                <x-input-error field="email_{{ $key }}" />
            </div>
            <div class="col-md-6">
                <x-input-label for="phone_{{ $key }}" :value="__('attribute.phone')" />
                <x-text-input id="phone_{{ $key }}" name="phone_{{ $key }}" :value="old('phone_{{ $key }}', $data->phone)"/>
                <x-input-error field="phone_{{ $key }}" />
            </div>
            <div class="col-md-6">
                <x-input-label for="address_{{ $key }}" :value="__('attribute.address')" />
                <x-text-input id="address_{{ $key }}" name="address_{{ $key }}" :value="old('address_{{ $key }}', $data->address)"/>
                <x-input-error field="address_{{ $key }}" />
            </div>
            <div class="col-md-12">
                <x-input-label for="address_link_{{ $key }}" :value="__('attribute.address_link')" />
                <x-text-input id="address_link_{{ $key }}" name="address_link_{{ $key }}" :value="old('address_link_{{ $key }}', $data->address_link)"/>
                <x-input-error field="address_link_{{ $key }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="mb-4">
                    <x-input-switch :name="$defaultId" :label="__('attribute.make_default')" :checked="$contact->default"/>
                    <x-input-error :field="$defaultId" />
                </div>
            </div>
        </div>


        <x-slot name="footer">
            <x-admin.button-update />
        </x-slot>

    </x-card>
</form>
