
<x-card :heading="__('admin.available_translations')" >
    <ul class="nav nav-pills mb-4">

        @php
            $languages = getSiteLanguages();
            $urlCode = request('code') ?? 'en';
        @endphp

        @foreach ($languages as $language)
            @php
                $urlParams = array_merge($params, ['code' => $language->code]);
            @endphp

            <li class="nav-item">
                <a class="nav-link {{ $urlCode == $language->code ? 'active' : '' }}" id="lang-{{ $urlCode }}" href="{{ route($route, $urlParams) }}">
                    {{ $language->name }}
                </a>
            </li>
        @endforeach

    </ul>

    <div class="alert alert-primary d-flex align-items-center gap-2 fw-normal" role="alert">
        <x-icons.info />
        <div class="">
            {{ __('admin.you_are_currently_editing_the_translation_for') }} <strong>{{ $languages->firstWhere('code', $urlCode)->name ?? __('admin.english') }}</strong>.
        </div>
    </div>

</x-card>
