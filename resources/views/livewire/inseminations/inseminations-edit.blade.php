<section class="p-4 mb-4 rounded bg-white shadow border">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-4">
    <input type="hidden" wire:model="id">
    <div class="">
      <p class="mb-2 font-bold">Cislo zvierata</p>
      <input class="w-full input" type="text" wire:model="animal_number">
      @error('animal_number')
        <p class="text-red-600 mt-1">
            {{ $message }}
        </p>
      @enderror
    </div>
    <div class="">
      <p class="mb-2 font-bold">Datum inseminacie</p>
      <input class="w-full input" type="date" placeholder="Cislo zvierata" wire:model.lazy="date_of_insemination">
      @error('date_of_insemination')
        <p class="text-red-600 mt-1">
            {{ $message }}
        </p>
      @enderror
    </div>
    <div class="">
      <p class="mb-2 font-bold">Inseminacna davka</p>
      <select class="w-full input" wire:model.lazy="insemination_dose">
          <option value=""></option>
          <option value="PLI526">PLI526</option>
          <option value="ORK509">ORK509</option>
      </select>
      @error('insemination_dose')
        <p class="text-red-600 mt-1">
            {{ $message }}
        </p>
      @enderror
    </div>
    <div class="">
      <p class="mb-2 font-bold">Inseminacny technik</p>
      <select class="w-full input" wire:model.lazy="insemination_technician">
          <option value=""></option>
          <option value="Ksenak">Ksenak</option>
          <option value="Timco">Timco</option>
      </select>
      @error('insemination_technician')
        <p class="text-red-600 mt-1">
            {{ $message }}
        </p>
      @enderror
    </div>
    <div class="">
      <p class="mb-2 font-bold">Ruja</p>
      <select class="w-full input" wire:model.lazy="insemination_type">
          <option value=""></option>
          <option value="prirodzena">prirodzena</option>
          <option value="ov synch">ov synch</option>
      </select>
      @error('insemination_type')
        <p class="text-red-600 mt-1">
            {{ $message }}
        </p>
      @enderror
    </div>
    <div class="">
      <p class="mb-2 font-bold">Zistena inseminacia strojom alebo clovekom</p>
      <select class="w-full input" wire:model.lazy="insemination_encounter_by">
          <option value=""></option>
          <option value="heatime">heatime</option>
          <option value="clovek">clovek</option>
      </select>
      @error('insemination_encounter_by')
        <p class="text-red-600 mt-1">
            {{ $message }}
        </p>
      @enderror
    </div>
  </div>
  <button class="btn btn-primary" wire:click="updateInsemination">upravit</button>
  <button class="mt-4 btn btn-success" wire:click.prevent="createInsemination">
      pridat novu inseminaciu
  </button>
</section>