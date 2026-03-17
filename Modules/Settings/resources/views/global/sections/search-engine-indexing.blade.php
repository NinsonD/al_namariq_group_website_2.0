<form action="{{ route('admin.update.search_eng_index') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row gy-6">
        <div class="col-md-12">
            <x-input-switch name="search_engine_indexing" :label="__('attribute.status')" class="mb-3 mt-3" :checked="$settings->search_engine_indexing ?? false"/>
            <x-input-error field="status" /> 
        </div>

        @can('credentials_settings-search_engine_update')
        <div class="col-md-12">
            <x-button :text="__('admin.save')" />
        </div>
        @endcan
    </div>
</form>