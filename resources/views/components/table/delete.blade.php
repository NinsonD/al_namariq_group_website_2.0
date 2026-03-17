<form action="{{ $route }}" method="POST" class="d-inline {{ $mainClass }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-icon btn-icon-danger rounded-pill common-delete-btn" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ $title }}">
        <x-icons.delete />
    </button>
</form>
