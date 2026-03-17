


@foreach ($tabs as $key => $tab )
    <button class="nav-link {{ $tab['active'] ? 'active' : '' }}" id="v-pills-{{ $tab['id'] }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $tab['id'] }}" type="button" role="tab" aria-controls="v-pills-{{ $tab['id'] }}" aria-selected="{{ $tab['aria-selected'] }}">{{ $tab['label'] }}</button> 
@endforeach