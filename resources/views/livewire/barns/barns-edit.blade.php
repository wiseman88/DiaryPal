<div class="w-64 bg-white my-4 p-4 inline-block rounded shadow border">
  <input type="hidden" wire:model="id">
  <div>
      <input type="text" class="w-full input" placeholder="Nazov mastale, napr. M6" wire:model.lazy="barn_name">
  </div>
  @error('barn_name')
      <p class="text-red-600 mt-1">
          {{ $message }}
      </p>
  @enderror
  <div class="mt-4">
      <button class="w-full btn btn-success" wire:click="updateBarn">
          upravit mastal
      </button>
      <button class="mt-2 w-full btn btn-primary" wire:click="createBarn">
          pridat mastal
    </button>
  </div>
</div>