<?php

namespace App\Http\Livewire\Barns;

use App\Models\Barn;
use Livewire\Component;

class BarnsIndex extends Component
{

    public $barn_name;
    public $selected_id;
    public $update_mode = false;

    public function render() 
    {
        return view('livewire.barns.barns-index', [
            'barns' => Barn::with('animals')
                ->orderBy('barn_name', 'asc')
                ->get()
        ]);
    }

    protected $rules = [
        'barn_name' => 'required|unique:barns',
    ];
        
    public function createBarn()
    {
        $this->update_mode = false;
        $this->reset();
    }
    
    public function addBarn()
    {
        // Validate data
        $this->validate();

        // Store data
        $data = Barn::create([
            'barn_name' => strtoupper($this->barn_name),
        ]);
        
        // Send flash message
        session()->flash('success', 'Mastal bola pridana');

        // Reset data values
        $this->reset();
        
    }

    public function editBarn($id)
    {

        $this->update_mode = true;

        $barn = Barn::findOrFail($id);

        $this->selected_id          = $id;
        $this->barn_name            = $barn->barn_name;
    }

    public function updateBarn()
    {

        // Validate data
        $data = $this->validate([
            'selected_id'           => 'required|numeric',
            'barn_name'             => 'required|unique:barns',
        ]);

        if ($this->selected_id) {

            // Find animal
            $animal = Barn::findOrFail($this->selected_id);

            // Update data
            $animal->update([
                'barn_name'         => $this->barn_name
            ]);

            session()->flash('success', 'Data boli uspesne upravene!');

            $this->reset();

        }

        $this->update_mode = false;
    }

    public function destroyBarn($id)
    {

        if ($id) {
            $barn = Barn::where('id', $id);
            $barn->delete();
        }

        session()->flash('destroyed', 'Mastal bola vymazana!');
    }
}
