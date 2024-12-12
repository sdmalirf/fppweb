@extends('sidebar')

@section('content')
    <h1 class="text-4xl text-cyan-700 font-bold"><i class="fa-regular fa-sun mr-3"></i> My Day</h1>
    <p class="mt-2 text-cyan-700 text-lg font-light mb-20">
        {{ \Carbon\Carbon::now()->format('l, F j') }}
    </p>
    <div>
        @foreach ($data as $value)
            <div class="mb-3 w-full bg-white py-6 px-5 rounded text-cyan-500 flex justify-between">
                <div>
                    <p><a href="/myday/done/{{$value->id}}"><i class="fa-regular fa-circle mr-3"></i></a> {{ $value->name }}</p>
                </div>
                <div>
                    <p class="font-light">{{ \Carbon\Carbon::parse($value->date)->format('l, F j') }}
                        <a href="/myday/fav/{{ $value->id }}">
                            @if ($value->is_fav)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    @if($done->count() > 0)
    <div class="my-3">
        <div class="w-1/4 bg-blue-100 py-5 px-5 text-sm rounded text-cyan-500">
            <div class="flex justify-between">
                <p><i class="fa-solid fa-chevron-down mr-2"></i> Complete</p>
                <div class="flex items-center justify-center w-6 h-6 bg-blue-200 text-white rounded-full">
                    {{$done->count()}}
                </div>
            </div>
        </div>
    </div>

    <div>
        @foreach ($done as $value)
            <div class="mb-3 w-full bg-white py-6 px-5 rounded text-cyan-500 flex justify-between">
                <div>
                    <p><a href="/myday/done/{{$value->id}}"><i class="fa-regular fa-circle-dot mr-3"></i></a> {{ $value->name }}</p>
                </div>
                <div>
                    <p class="font-light">{{ \Carbon\Carbon::parse($value->date)->format('l, F j') }}
                        <a href="/myday/fav/{{ $value->id }}">
                            @if ($value->is_fav)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    <div class="flex justify-center">
        <a href="/myday/create" class="w-9/12 fixed bottom-5">
            <button
                class="w-9/12 bg-cyan-600 hover:bg-cyan-500 rounded-full text-white fixed bottom-5 py-4 px-5 text-sm flex justify-between">
                <p><i class="fa-solid fa-plus mr-2"></i>Create New Task</p>
                <p><i class="fa-solid fa-calendar-days"></i></p>
            </button></a>
    </div>
@endsection
