
<table>
    @foreach($table->columns as $column)
        <tr>
            <th>{{$column->column_name}}</th>
        </tr>
    @endforeach
    @foreach($table->list as $items)
        @foreach($table->columns as $row)
            <tr>
                <td>{{$items[$row->key_to_row]}}</td>
                {{--               items will be maped to correctly show  necessary attribute
                                   through getter
                --}}
            </tr>
            {{--        some style will be here above to react on action--}}
        @endforeach
    @endforeach
    {{$table->paginate->links()}}
</table>
