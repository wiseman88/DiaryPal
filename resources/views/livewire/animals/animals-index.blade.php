<div>
    <p class="p-10">
        pocet krav na farme: {{ $animals->total() }}
    </p>
    @if (session()->has('destroyed'))
        <div class="p-4">
            <p class="p-4 bg-red-200 text-red-700 border-l-4 border-red-700 rounded">
                {{ session('destroyed') }}
            </p>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="p-4">
            <p class="p-4 bg-green-200 text-green-700 border-l-4 border-green-700 rounded">
                {{ session('success') }}
            </p>
        </div>
    @endif
    @if ($update_mode)
        @include('livewire.animals.animals-edit')
    @else
        @include('livewire.animals.animals-create')
    @endif
    <div class="p-4">
        <input wire:model="search" type="text" placeholder="Hladat kravu 2020-11-30 ..." class="w-96 input border-gray-300 mr-6">
    </div>
    @include('livewire.animals.animals-table')
</div>
