@extends("layout.layout")
@section("body")
    <div class="flex flex-row w-full">
        <div x-data="{close: false}"
             :class="close && 'basis-bar' || 'basis-1/5'">
            <div>
                <div @click="close = !close" class="bg-black p-5">
                    <span class="leading-3 text-white fa fa-bars"></span>
                </div>
            </div>
            <div class="bg-sidebar h-screen">
            </div>
        </div>
        <div class="bg-blue-500 flex-1">02</div>
        <div class="bg-red-600 basis-1/4">03</div>
    </div>
@endsection
