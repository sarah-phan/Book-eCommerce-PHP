<table 
    class="table table-hover" 
    style="width: auto; border-collapse: collapse; max-width: 100%; margin-top: 30px; margin-left: 20px;">
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