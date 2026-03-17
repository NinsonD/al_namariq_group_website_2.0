
<div class="table-responsive table-invoice">
    <table class="table table-striped">
        <thead class=" table-dark">
            <tr>
                <th>{{ __('admin.sn') }}</th>
                <th>{{ __('admin.email_template') }}</th>
                <th>{{ __('admin.subject') }}</th>
                <th>{{ __('admin.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($templates as $index => $item)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $item->name)) }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>
                        <a class="btn btn-sm btn-icon btn-label-success rounded-pill" href="{{ route('admin.get.mail_template', ['id' => $item->id]) }}">
                            <x-icons.edit />
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>