<table class="table table-hover admin_list_table">
    <thead>
        <tr>
            @foreach ($columns as $column)
            <th scope="col">{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            @foreach ($columns as $key => $value)
            <td>
                @if ($key == 'options' && is_callable($row[$key]))
                {!! $row[$key]() !!}
                @else
                {{ $row[$key] ?? '' }}
                @endif
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>