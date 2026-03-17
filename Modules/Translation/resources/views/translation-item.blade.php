<tr class="translation-{{ $key }}">
    <td>{{ $key }}</td>
    <td>
        <span class="value-display" data-key="{{ $key }}">{{ $value }}</span>
        <input type="text" class="form-control value-edit d-none" data-key="{{ $key }}" value="{{ $value }}">
    </td>
    <td>
        @can('translation-edit')
        <button class="edit-btn btn btn-sm btn-icon rounded-pill btn-primary" data-key="{{ $key }}">
            <x-icons.edit />
        </button>
        <button class="save-btn btn btn-sm btn-icon rounded-pill btn-success d-none" data-key="{{ $key }}">
            <x-icons.save />
        </button>
        @endcan
    </td>
</tr>
