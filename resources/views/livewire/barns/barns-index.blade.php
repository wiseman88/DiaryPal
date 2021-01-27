<div class="p-4">
    <h1 class="py-4 font-black text-xl">
        Pridat mastal
    </h1>
    @include('layouts.destroy')
    @include('layouts.success')
    @if ($update_mode)
        @include('livewire.barns.barns-edit')
    @else
        @include('livewire.barns.barns-create')
    @endif
    <h1 class="py-4 font-black text-xl">
        Zoznam mastali
    </h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-5 gap-6">
        @foreach ($barns as $barn)
        <div class="p-2 rounded shadow border">
            <a href="{{route('barns.show', $barn->id)}}" class="flex justify-center items-center h-32 rounded bg-blue-200">
                <div>    
                    <p class="font-bold text-xl uppercase text-center">{{ $barn->barn_name }}</p>
                    <p>
                        <strong>Pocet zvierat: </strong>{{ $barn->animals->count() }}
                    </p>
                </div>
            </a>
            <div class="pt-4">
                <button class="btn btn-danger w-full" wire:click="destroyBarn({{ $barn->id }})">
                    odstranit mastal
                </button>
                <button class="mt-2 btn btn-success w-full"  wire:click="editBarn({{ $barn->id }})">
                    upravit nazov mastale
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
