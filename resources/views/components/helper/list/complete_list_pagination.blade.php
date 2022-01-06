@extends("components.helper.table.complete_list")
@section("pagination")
    {{$list->paginate->links()}}
@endsection
