<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use App\Models\Barn;
use Livewire\Component;
use Livewire\WithPagination;

class AnimalsIndex extends Component
{

    use WithPagination;

    public $selected_id;
    public $animal_number;
    public $barnId;
    public $sex;
    public $date_of_birth;
    public $mother_number;
    public $father_number;
    public $breed;
    public $color;
    public $calving_technician;
    public $calving_weight;
    public $orderValue = 'animal_number';
    public $toggle = false;
    public $update_mode = false;
    public $search = '';

    // Validation rules
    protected $rules = [
        'animal_number'         => 'required|unique:animals|min:14|max:14',
        'sex'                   => 'required',
        'date_of_birth'         => 'required',
        'mother_number'         => 'required',
        'father_number'         => 'required',
        'breed'                 => 'required',
        'color'                 => 'required',
        'calving_technician'    => 'required',
        'calving_weight'        => 'required',
    ];

    public function mount(){
        $this->setDefaultInputs();
    }

    public function render()
    {
        return view('livewire.animals.animals-index', [
            'animals'   => Animal::search($this->search)->orderBy($this->orderValue , $this->toggle ? 'desc' : 'asc')->paginate(10),
            'barns'     => Barn::all(),
        ]);
    }

    // Animals table ordering ascending and descending
    public function orderByValue($value)
    {
        $this->orderValue = $value;
        $this->toggle = !$this->toggle;
    }

    private function setDefaultInputs()
    {
        $this->sex = 'samica';
        $this->breed = 'SS';
        $this->father_number = 'PLI526';
        $this->color = 'cervene';
        $this->calving_technician = 'Zootechnik';
    }

    // Add animal to database
    public function addAnimal()
    {

        // Validate data
        $this->validate();

        // Store data
        $animal = Animal::create([
            'animal_number'         => strtoupper($this->animal_number),
            'sex'                   => $this->sex,
            'date_of_birth'         => $this->date_of_birth,
            'mother_number'         => strtoupper($this->mother_number),
            'father_number'         => $this->father_number,
            'breed'                 => $this->breed,
            'color'                 => $this->color,
            'calving_technician'    => $this->calving_technician,
            'calving_weight'        => $this->calving_weight,
        ]);
        
        // How can you close modal with alpine from livewire
        // $this->dispatchBrowserEvent('close-modal');
        
        $animal->barn()->attach($this->barnId);

        // Send flash message
        session()->flash('success', 'Zviera bolo uspesne pridane do databazy');

        // Reset data values
        $this->reset();
        
        // Set default inputs
        $this->setDefaultInputs();
    }

    // Display create animal view
    public function createAnimal()
    {
        $this->update_mode = false;
        $this->reset();
        $this->setDefaultInputs();
    }

    // Display update form
    public function editAnimal($id)
    {

        $this->update_mode = true;

        $animal = Animal::findOrFail($id);

        $this->selected_id          = $id;
        $this->animal_number        = $animal->animal_number;
        $this->sex                  = $animal->sex;
        $this->date_of_birth        = $animal->date_of_birth;
        $this->mother_number        = $animal->mother_number;
        $this->father_number        = $animal->father_number;
        $this->breed                = $animal->breed;
        $this->color                = $animal->color;
        $this->calving_technician   = $animal->calving_technician;
        $this->calving_weight       = $animal->calving_weight;
        $this->barnId               = $animal->barn->first()->id; 
    }

    // Update animal
    public function updateAnimal()
    {

        // Validate data
        $data = $this->validate([
            'selected_id'           => 'required|numeric',
            'animal_number'         => 'required|min:14|max:14',
            'sex'                   => 'required',
            'date_of_birth'         => 'required',
            'mother_number'         => 'required',
            'father_number'         => 'required',
            'breed'                 => 'required',
            'color'                 => 'required',
            'calving_technician'    => 'required',
            'calving_weight'        => 'required',
        ]);

        if ($this->selected_id) {

            // Find animal
            $animal = Animal::findOrFail($this->selected_id);

            // Update data
            $animal->update([
                'animal_number'         => $this->animal_number,
                'sex'                   => $this->sex,
                'date_of_birth'         => $this->date_of_birth,
                'mother_number'         => $this->mother_number,
                'father_number'         => $this->father_number,
                'breed'                 => $this->breed,
                'color'                 => $this->color,
                'calving_technician'    => $this->calving_technician,
                'calving_weight'        => $this->calving_weight,
            ]);

            $animal->barn()->sync($this->barnId);

            // Send flash message
            session()->flash('success', 'Data boli uspesne upravene!');

            // Reset data values
            $this->reset();

            $this->setDefaultInputs();

        }

        $this->update_mode = false;
    }

    // Delete animal from db
    public function destroyAnimal($id)
    {

        if ($id) {
            $animal = Animal::where('id', $id);
            $animal->delete();
        }

        session()->flash('destroyed', 'Zviera bolo vymazane!');
    }
}
