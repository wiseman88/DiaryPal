<?php

namespace App\Http\Livewire\Barns;

use App\Models\Animal;
use App\Models\Barn;
use App\Models\Insemination;
use Livewire\Component;

class BarnsShow extends Component
{

    public $barn;
    public $animals;

    public function mount($barn)
    {
        $this->barn = Barn::findOrFail($barn);
        $this->animals = $this->barn->animals;
    }
        
    public function render()
    {
        return view('livewire.barns.barns-show', [
            'barn' => $this->barn,
            'anim' => Insemination::whereIn('animal_number', $this->animals->pluck('animal_number'))->get(),
        ]);
    }
}
