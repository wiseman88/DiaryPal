<div class="p-4">
    <p class="font-black text-2xl">
        Mastal {{ $barn->barn_name }}
    </p>
    <p class="text-lg font-bold my-4">
        Zoznam krav v mastali
    </p>
    <div>
       <div class="p-2 bg-white shadow rounded grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-4">
        @foreach ($barn->animals as $item)
            @if ( $anim->pluck('animal_number')->contains($item->animal_number))
                <a href="{{route('animals.show', $item->id)}}" class="p-4 rounded hover:shadow-lg text-center text-gray-900 {{ $anim->where('animal_number', $item->animal_number)->pluck('insemination_control')->last() ? 'bg-red-200' : 'bg-green-200' }}">
                    {{$item->animal_number}}
                </a>
            @else
                <a href="{{route('animals.show', $item->id)}}" class="p-4 rounded border hover:shadow-lg border-gray-300 text-center text-gray-900 bg-white">
                    {{$item->animal_number}}
                </a>
            @endif
        @endforeach
       </div>
    </div>
    <a href="{{ route('barns.index') }}" class="mt-4 inline-block btn btn-primary text-xs">naspat</a>
</div>
