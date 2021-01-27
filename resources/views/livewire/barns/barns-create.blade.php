<div class="w-64 bg-white my-4 p-4 inline-block rounded shadow border">
  <div>
      <input type="text" class="w-full input" placeholder="Nazov mastale, napr. M6" wire:model.lazy="barn_name" wire:keydown.enter="addBarn">
  </div>
  @error('barn_name')
      <p class="text-red-600 mt-1">
          {{ $message }}
      </p>
  @enderror
  <div class="mt-4">
      <button class="w-full btn btn-primary" wire:click="addBarn">
          pridat mastal
      </button>
  </div>
</div>