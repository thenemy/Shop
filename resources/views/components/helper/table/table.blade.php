<table>
    <tr>
        @foreach($table->columns as $column)
            <th>{{$column->column_name}}</th>
        @endforeach
    </tr>
    @foreach($table->list as $items)
        <tr>
            @foreach($table->columns as $row)
                <td> {!! $items[$row->key_to_row] !!}</td>
            @endforeach
        </tr>
    @endforeach
    {{--        some style will be here above to react on action--}}
    {{$table->paginate->links()}}
</table>
