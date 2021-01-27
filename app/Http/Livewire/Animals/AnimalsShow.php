<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use App\Models\Insemination;
use Carbon\Carbon;
use Livewire\Component;

class AnimalsShow extends Component
{

    public $animal;
    public $inseminations;

    public function mount($animal)
    {
        $this->animal        = Animal::findOrFail($animal);
        $this->inseminations = Insemination::where('animal_id', $this->animal->id)->orderBy('date_of_insemination')->get();
    }

    public function render()
    {
        return view('livewire.animals.animals-show', [
            'inseminations' => $this->inseminations,
            'test' => Insemination::where('animal_id', $this->animal->id)->selectRaw('year(date_of_insemination) year,count(*) inseminations')
                    ->groupBy('year')
                    // ->orderByRaw('min(date_of_insemination) asc')
                    ->orderByRaw('min(date_of_insemination) desc')
                    ->get(),
            'test2' => Insemination::all()->groupBy(function($date) {
                return Carbon::parse($date->date_of_insemination)->format('Y');
            }),

        ]);
    }
}
