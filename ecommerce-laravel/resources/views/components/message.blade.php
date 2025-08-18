@if (session('success'))
    <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-md mb-4 font-bold text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-md mb-4 font-bold text-center">
        {{ session('error') }}
    </div>
@endif
