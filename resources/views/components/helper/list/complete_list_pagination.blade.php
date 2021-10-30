@extends("components.helper.list.complete_list")
@section("pagination")
    {{$list->paginate->links()}}
@endsection
