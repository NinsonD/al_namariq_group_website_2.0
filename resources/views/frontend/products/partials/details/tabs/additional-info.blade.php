@if (is_array($information) && count($information) > 0)
<table>
    <tbody>
        @foreach ($information as $item)
            <tr>
                <td>{{ $item['key'] }}</td>
                <td>{{ $item['value'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
