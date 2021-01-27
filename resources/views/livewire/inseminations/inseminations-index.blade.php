<div class="p-4 overflow-x-auto">
    @if (session()->has('destroyed'))
        <p class="p-4 bg-red-200 text-red-700 border-l-4 border-red-700 rounded">
            {{ session('destroyed') }}
        </p>
    @endif
    @if (session()->has('success'))
        <p class="p-4 mb-4 bg-green-200 text-green-700 border-l-4 border-green-700 rounded">
            {{ session('success') }}
        </p>
    @endif
    @if ($update_mode)
        @include('livewire.inseminations.inseminations-edit')
    @else
        @include('livewire.inseminations.inseminations-create')
    @endif
    <p class="font-black text-xl mt-4">Index inseminacii</p>
    <div class="py-4 flex items-center">
        <div>
            <input wire:model="search" type="text" placeholder="Hladat inseminaciu 2020-11-30 ..." class="w-96 input border-gray-300 mr-6">
        </div>
        <div>
            <span class="w-64 h-full py-3 px-6 rounded block text-center bg-green-200 uppercase text-xs mr-6">negativna kontrola</span>
        </div>
        <div>
            <span class="w-64 h-full py-3 px-6 rounded block text-center bg-red-200 uppercase text-xs">pozitivna kontrola</span>
        </div>
    </div>
    <div class="rounded bg-white mt-4">
        <table class="min-w-full rounded divide-y divide-gray-200">
            <thead>
              <tr>
                <th scope="col" wire:click='orderByValue("date_of_insemination")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                    datum inseminacie
                </th>
                <th scope="col" wire:click='orderByValue("animal_number")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                  cislo kravy
                </th>
                <th scope="col" wire:click='orderByValue("insemination_technician")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                  inseminacny technik
                </th>
                <th scope="col" wire:click='orderByValue("insemination_type")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                  typ ruje
                </th>
                <th scope="col" wire:click='orderByValue("insemination_control")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                    kontrola telnosti
                </th>
                <th scope="col" colspan="2" class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                  akcia
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($values as $insemination)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ dateFormat($insemination->date_of_insemination) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a class="hover:text-blue-500" href="{{route('animals.show', $insemination->animal_id)}}">
                            {{ $insemination->animal_number }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $insemination->insemination_technician }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $insemination->insemination_type }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($insemination->animal_number === null)
                            <span>null</span>
                        @else
                            <p class="w-full text-xs px-5 py-2 cursor-pointer disabled:opacity-50 {{ $insemination->insemination_control ? 'bg-red-200' : 'bg-green-200' }} rounded uppercase" wire:model="insemination_control" wire:click="toggleControl({{ $insemination->id }})">
                                @if ($insemination->insemination_control == true)
                                    pluska
                                @else
                                    minuska
                                @endif
                            </p>
                        @endif
                    </td>
                    <td class="pl-6 m-1 my-2 whitespace-nowrap">
                        <button class="w-full text-xs font-medium uppercase px-5 py-2 rounded bg-blue-300 hover:bg-blue-400"
                        wire:click="editInsemination({{ $insemination->id }})"
                        >
                            upravit
                        </button>
                    </td>
                    <td class="pr-6 m-1 my-2 whitespace-nowrap">
                        <button class="w-full text-xs font-medium uppercase px-5 py-2 rounded bg-red-300 hover:bg-red-400"
                        wire:click="destroyInsemination({{ $insemination->id }})"
                        >
                            vymazat
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
