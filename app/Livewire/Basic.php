<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;

class Basic extends Component
{

    public $provinces;
    public $districts;
    public $municipalities;

    public $selectedProvince;
    public $selectedDistrict;
    public $selectedMunicipality;

    public function render()
    {
        return view('livewire.basic');
    }

    public function mount(){
        $this->provinces = Province::all();
        $this->districts = District::all();
        $this->municipalities = Municipality::all();
    }

    public function updatedSelectedProvince($value){
        $this->districts = Province::find($value)->district()->get()->toArray();
        // dd($this->districts);
    }




}
