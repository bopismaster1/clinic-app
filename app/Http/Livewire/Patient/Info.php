<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use App\Http\Traits\AlertTrait;
use App\Models\CheckupRecord;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\WithPagination;

class Info extends Component
{
    use AlertTrait;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $patientDetails, $user_id, $searchParam;

    public function mount($id = null)
    {
        $this->user_id = $id;
    }

    public function render()
    {
        $patient = Patient::findOrFail($this->user_id);
        $this->patientDetails = $patient;
        $patientRecord = $this->patientDetails->CheckupRecord()->paginate(3);
        return view('livewire.patient.info', ["patientRecord" => $patientRecord])->extends("layouts.app");
    }

    public function getAge($dob)
    {
        return Carbon::parse($dob)->age;
    }

}
