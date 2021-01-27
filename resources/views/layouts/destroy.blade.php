@if (session()->has('destroyed'))
<p class="p-4 bg-red-200 text-red-700 border-l-4 border-red-700 rounded">
    {{ session('destroyed') }}
</p>
@endif