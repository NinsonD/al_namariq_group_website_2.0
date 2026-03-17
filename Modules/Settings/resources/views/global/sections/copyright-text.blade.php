<form action="{{ route('admin.update.copyright_text') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-label for="copyright_text" :value="__('attribute.copyright_text')" />
            <x-textarea id="copyright_text" rows="6" name="copyright_text" :value="old('copyright_text', $settings->copyright_text ?? '')"/> 
            <x-input-msg :text="__('admin.use_bracket_to_wrap_website_link')" />
            <x-input-error field="copyright_text" />  
        </div>

        @can('settings-copyright_update')
        <div class="col-md-12">
            <x-button type="submit" :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>