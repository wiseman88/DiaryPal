@if (session()->has('success'))
<p class="p-4 bg-green-200 text-green-700 border-l-4 border-green-700 rounded">
    {{ session('success') }}
</p>
@endif