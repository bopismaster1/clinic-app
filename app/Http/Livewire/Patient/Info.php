<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Models\Patient;
use Carbon\Carbon;

class Info extends Component
{
    use AlertTrait;

    public $patientDetails;
    public function mount($id=null)
    {

        $patient=Patient::find($id);
        $this->patientDetails=$patient;
    }

    public function render()
    {
        return view('livewire.patient.info')->extends("layouts.app");
    }
    public function getAge($dob)
    {
        return Carbon::parse($dob)->age;
    }
}
