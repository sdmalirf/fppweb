@extends('sidebar')

@section('content')
<h1 class="text-4xl text-cyan-700 font-bold"><i class="fa-solid fa-house mr-3"></i> Task</h1>
    <p class="mt-2 text-cyan-700 text-lg font-light mb-20">
        {{ \Carbon\Carbon::now()->format('l, F j') }}
    </p>
<div class="w-full h-1/2 flex justify-center items-center">
<form class="w-full max-w-md p-6 bg-white rounded-lg shadow-md" action="/task" method="POST">
    @csrf
    <!-- Input Nama -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Task Name</label>
        <input
            type="text"
            id="name"
            name="name"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
            placeholder="Masukkan nama"
            required
        />
    </div>
    <!-- Input Tanggal -->
    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
        <input
            type="date"
            id="date"
            name="date"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
            required
        />
    </div>
    <!-- Submit Button -->
    <div>
        <button
            type="submit"
            class="w-full px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-semibold rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            Submit
        </button>
    </div>
</form>
</div>
@endsection
