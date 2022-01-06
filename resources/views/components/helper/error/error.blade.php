@props(["errors"=>collect([])])
<div>
    @foreach($errors->all() as $error)
        <div class="text-red-600">
            <span>{!!  $error !!}</span>
        </div>
    @endforeach
    @if(session('success'))
        <h1 class="text-green-600">{{session('success')}}</h1>
    @endif
</div>
