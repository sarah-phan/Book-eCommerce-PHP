<table class="table table-hover">
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
                    <td>{{ $row[$key] ?? '' }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
