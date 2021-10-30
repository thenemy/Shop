@props(["errors"=>collect([])])
<div>

    @foreach($errors->all() as $error)
        <div class="text-red-600">
            <span>{{$error}}</span>
        </div>
    @endforeach
</div>
