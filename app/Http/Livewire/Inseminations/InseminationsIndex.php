<?php

namespace App\Http\Livewire\Inseminations;

use App\Models\Animal;
use App\Models\Insemination;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class InseminationsIndex extends Component
{

    use WithPagination;

    public $inseminations;
    public $date_of_insemination;
    public $animal_number;
    public $insemination_technician;
    public $insemination_dose;
    public $insemination_type;
    public $insemination_encounter_by;
    public $insemination_control;
    public $animal_id;
    public $selected_id;
    public $orderValue = 'date_of_insemination';
    public $toggle = false;
    public $update_mode = false;

    public $search = '';

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.inseminations.inseminations-index', [
            'values'     => Insemination::search($this->search)->orderBy($this->orderValue, $this->toggle ? 'desc' : 'asc')->get(),
        ]);
    }

    public function orderByValue($value)
    {
        $this->orderValue = $value;
        $this->toggle = !$this->toggle;
    }

    public function toggleControl($id)
    {
        $insemination = Insemination::findOrFail($id);

        $insemination->insemination_control = !$insemination->insemination_control;

        $insemination->save();
    }

    public function addInsemination()
    {
        
        $data = $this->validate([
            'date_of_insemination'      => 'required',
            'animal_number'             => 'required|exists:animals',
            'insemination_technician'   => 'required',
            'insemination_dose'         => 'required',
            'insemination_type'         => 'required',
            'insemination_encounter_by' => 'required',
            // 'insemination_control'      => 'required',
            // 'animal_id'                 => 'required',
        ]);

        $insemination = Insemination::create([
            'date_of_insemination'      => $this->date_of_insemination,
            'animal_number'             => strtoupper($this->animal_number),
            'insemination_technician'   => $this->insemination_technician,
            'insemination_dose'         => $this->insemination_dose,
            'insemination_type'         => $this->insemination_type,
            'insemination_encounter_by' => $this->insemination_encounter_by,
            // 'insemination_control'      => 'required',
            'animal_id'                 => Animal::where('animal_number', $this->animal_number)->first()->id,
        ]);

        $this->reset();

        session()->flash('success', 'Inseminacia bola pridana!');
    }

    public function createInsemination()
    {
        $this->update_mode = false;
        $this->reset();
    }

    public function editInsemination($id)
    {
        $this->update_mode = true;

        $insemination = Insemination::findOrFail($id);

        $this->selected_id                  = $id;
        $this->animal_number                = $insemination->animal_number;
        $this->date_of_insemination         = $insemination->date_of_insemination;
        $this->insemination_technician      = $insemination->insemination_technician;
        $this->insemination_dose            = $insemination->insemination_dose;
        $this->insemination_type            = $insemination->insemination_type;
        $this->insemination_encounter_by    = $insemination->insemination_encounter_by;
        
    }

    public function updateInsemination()
    {

        $data = $this->validate([
            'date_of_insemination'      => 'required|date',
            'animal_number'             => 'required|exists:animals',
            'insemination_technician'   => 'required',
            'insemination_dose'         => 'required',
            'insemination_type'         => 'required',
            'insemination_encounter_by' => 'required',
            // 'insemination_control'      => 'required',
            // 'animal_id'                 => 'required',
        ]);

        if ($this->selected_id) {

            // Find insemination
            $insemination = Insemination::findOrFail($this->selected_id);

            // Update data
            $insemination->update([
                'date_of_insemination'      => $this->date_of_insemination,
                'animal_number'             => strtoupper($this->animal_number),
                'insemination_technician'   => $this->insemination_technician,
                'insemination_dose'         => $this->insemination_dose,
                'insemination_type'         => $this->insemination_type,
                'insemination_encounter_by' => $this->insemination_encounter_by,
                // 'insemination_control'      => 'required',
                'animal_id'                 => Animal::where('animal_number', $this->animal_number)->first()->id,
            ]);

            // Send flash message
            session()->flash('success', 'Data boli uspesne upravene!');

            // Reset data values
            $this->reset();

        }

        $this->update_mode = false;
    }

    public function destroyInsemination($id)
    {

        if ($id) {
            $insemination = Insemination::where('id', $id);
            $insemination->delete();
        }

        session()->flash('destroyed', 'Inseminacia bola vymazana!');
    }
}
