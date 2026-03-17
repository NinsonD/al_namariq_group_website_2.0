@props([
    'name' => '',
    'id' => null,
    'options' => [],
    'selected' => null,
    'class' => 'form-select conca-select2',
    'required' => false,
    'labelName' => null,
])

<select
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    class="{{ $class }}"
    {{ $required ? 'required' : '' }}
>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label->{$labelName} }}</option>
    @endforeach
</select>
