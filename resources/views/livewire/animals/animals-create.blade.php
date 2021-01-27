<div class="mb-4 p-4 bg-white">
  <p class="text-xl py-2 text-gray-900 font-black">
      Pridat zviera
  </p>
  <div class="p-4 rounded bg-white shadow border">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
          <div>
              <p class="mb-2 font-bold">Cislo zvierata</p>
              <input class="w-full rounded border p-2 focus:outline-none focus:shadow-outline focus:border-blue-300" type="text" wire:model.lazy="animal_number">
              @if ($errors->has('animal_number'))
                  <div class="text-red-600 mt-1">{{ $errors->first('animal_number') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Pohlavie</p>
              <select class="w-full focus:outline-none border p-2 rounded" wire:model.lazy="sex">
                  <option value=""></option>
                  <option value="samica">samica</option>
                  <option value="samec">samec</option>
              </select>
              @if ($errors->has('sex'))
                  <div class="text-red-600 mt-1">{{ $errors->first('sex') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Datum uliahnutia</p>
              <input class="w-full rounded border p-2 focus:outline-none focus:shadow-outline focus:border-blue-300" type="date" placeholder="Cislo zvierata" wire:model.lazy="date_of_birth">
              @if ($errors->has('date_of_birth'))
                  <div class="text-red-600 mt-1">{{ $errors->first('date_of_birth') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Cislo matky</p>
              <input class="w-full rounded border p-2 focus:outline-none focus:shadow-outline focus:border-blue-300" type="text" wire:model.lazy="mother_number">
              @if ($errors->has('mother_number'))
                  <div class="text-red-600 mt-1">{{ $errors->first('mother_number') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Otec - register</p>
              <select class="w-full focus:outline-none border p-2 rounded" wire:model.lazy="father_number">
                  <option value=""></option>
                  <option value="PLI526">PLI526</option>
                  <option value="ORK509">ORK509</option>
              </select>
              @if ($errors->has('father_number'))
                  <div class="text-red-600 mt-1">{{ $errors->first('father_number') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Plemeno</p>
              <select class="w-full focus:outline-none border p-2 rounded" wire:model.lazy="breed">
                  <option value=""></option>
                  <option value="R">R</option>
                  <option value="SS">SS</option>
              </select>
              @if ($errors->has('breed'))
                  <div class="text-red-600 mt-1">{{ $errors->first('breed') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Farba</p>
              <select class="w-full focus:outline-none border p-2 rounded" wire:model.lazy="color">
                  <option value=""></option>
                  <option value="cervene">cervene</option>
                  <option value="zlto-strakate">zlto-strakate</option>
                  <option value="hnede">hnede</option>
                  <option value="ine">ine</option>
              </select>
              @if ($errors->has('color'))
                  <div class="text-red-600 mt-1">{{ $errors->first('color') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Kto zviera otelil</p>
              <select class="w-full focus:outline-none border p-2 rounded" wire:model.lazy="calving_technician">
                  <option value=""></option>
                  <option value="Doe">Doe</option>
                  <option value="Sloan">Sloan</option>
                  <option value="Doane">Doane</option>
                  <option value="Zootechnik">Zootechnik</option>
              </select>
              @if ($errors->has('calving_technician'))
                  <div class="text-red-600 mt-1">{{ $errors->first('calving_technician') }}</div>
              @endif
          </div>
          <div>
              <p class="mb-2 font-bold">Vaha pri narodeni</p>
              <input class="w-full rounded border p-2 focus:outline-none focus:shadow-outline focus:border-blue-300" type="text" wire:model.lazy="calving_weight">
              @if ($errors->has('calving_weight'))
                  <div class="text-red-600 mt-1">{{ $errors->first('calving_weight') }}</div>
              @endif
          </div>
          <div>
            <p class="mb-2 font-bold">Vybrat mastal</p>
              <select class="w-full focus:outline-none border p-2 rounded" wire:model.lazy="barnId">
                  <option value=""></option>
                @foreach ($barns as $barn)
                    <option value="{{ $barn->id }}">
                        {{ $barn->barn_name }}
                    </option>
                @endforeach
              </select>
              <p>
                  {{ $barnId }}
              </p>
          </div>
      </div>
      <button class="mt-4 btn btn-primary w-auto" wire:click.prevent="addAnimal">
          pridat
      </button>
  </div>
</div>