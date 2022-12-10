<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Index extends Component
{
    use AlertTrait;
    use WithPagination;
    public $searchName, $name, $address, $contact_number, $dob;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        "searchName" => "required",
        "name" => ['required', 'unique:patients'],
        "address" => "required",
        "contact_number" => "required|numeric",
        "dob" => "required|date"

    ];

    public function render()
    {
        $param="%". $this->searchName."%";
        $patients=Patient::where("name","like", $param)->paginate(5);
        return view('livewire.patient.index',
        ["patients"=> $patients])->extends("layouts.app");
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function newPatient()
    {
        $data = $this->validate();
        $patient = new Patient();
        $patient->name = $this->name;
        $patient->address = $this->address;
        $patient->contact_number = $this->contact_number;
        $patient->DOB = $this->dob;

        try {
            $patient->save();
            $this->dispatchBrowserEvent('closeModal');
            $this->alert_success("Patient Added", "New Patient has been Added");
        } catch (\Throwable $th) {
            $this->alert_error("Error", "" . $th->getMessage());
        }
    }



}
