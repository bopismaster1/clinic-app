<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;

class Checkup extends Component
{
    public $patientDetails;

    public function mount($id)
    {
        $this->patientDetails = Patient::find($id);
    }
    public function render()
    {
        return view('livewire.patient.checkup')->extends("layouts.app");
    }
}
