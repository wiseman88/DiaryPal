<div class="p-4 overflow-x-auto">
  <p class="font-black text-xl pb-4">Index krav</p>
  <div class="rounded bg-white">
      <table class="min-w-full rounded divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" wire:click='orderByValue("animal_number")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                cislo kravy
              </th>
              <th scope="col" wire:click='orderByValue("date_of_birth")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                datum narodenia
              </th>
              <th scope="col" class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                vek v mesiacoch
              </th>
              <th scope="col" wire:click='orderByValue("sex")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                pohlavie
              </th>
              <th scope="col" wire:click='orderByValue("breed")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                plemeno
              </th>
              <th scope="col" class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                matka
              </th>
              <th scope="col" wire:click='orderByValue("father_number")' class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                otec
              </th>
              <th scope="col" colspan="2" class="px-6 py-3 bg-blue-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                akcia
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($animals as $animal)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{route('animals.show', $animal->id)}}" class="hover:text-blue-500">
                      {{ $animal->animal_number }}
                    </a>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ dateFormat($animal->date_of_birth) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ ageInMonths($animal->date_of_birth) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ $animal->sex }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ $animal->breed }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ $animal->mother_number }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    {{ $animal->father_number }}
                  </td>
                  <td class="pl-6 m-1 my-2 whitespace-nowrap">
                      <button class="w-full text-xs font-medium uppercase px-5 py-2 rounded bg-blue-300 hover:bg-blue-400"
                      wire:click="editAnimal({{ $animal->id }})"
                      >
                          upravit
                      </button>
                  </td>
                  <td class="pr-6 m-1 my-2 whitespace-nowrap">
                      <button class="w-full text-xs font-medium uppercase px-5 py-2 rounded bg-red-300 hover:bg-red-400"
                      wire:click="destroyAnimal({{ $animal->id }})"
                      >
                          vymazat
                      </button>
                  </td>
                </tr>
              @endforeach
          </tbody>
      </table>

        @if ($animals->hasPages())
        <div class="p-2 bg-gray-200">
          {{ $animals->links() }}
        </div>
        @else
        @endif
  </div>
</div>