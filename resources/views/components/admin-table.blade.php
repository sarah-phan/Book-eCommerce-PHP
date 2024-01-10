<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @foreach ($columns as $column)
                <th scope="col" style="white-space: nowrap;">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                @foreach ($columns as $key => $value)
                <td style="white-space: nowrap;">
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
</div>