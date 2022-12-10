<?php

namespace App\Http\Livewire\Patient;

use App\Models\Doctors;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Traits\AlertTrait;
use App\Models\CheckupRecord;

class Checkup extends Component
{
    use AlertTrait;
    use WithFileUploads;
    public $patientDetails, $doctors;
    public $symptoms = "", $findings = "", $remarks = "", $doctor_id, $photos = [], $record, $images = [];

    public $action = "createRecord";

    protected $rules = [
        "symptoms" => ["required"],
        "doctor_id" => ["required"],
        "photos.*" => ["mimes:jpeg,png,bmp,tiff |max:20000"],
    ];
    public function mount($id, $checkup_id = null)
    {
        if (!$this->patientDetails = Patient::find($id)) {
            return redirect()->route("dashboard");
        }
        if ($checkup_id) {
            $this->action = "updateRecord";
            $this->record = CheckupRecord::find($checkup_id);
            $this->symptoms = $this->record->symptoms;
            $this->remarks = $this->record->remarks;
            $this->findings = $this->record->findings;
            $this->images = explode(",", $this->record->images);
        }

        $this->doctors = Doctors::where("status", "like", "active")->get();
    }
    public function render()
    {
        return view('livewire.patient.checkup')->extends("layouts.app");
    }

    public function updated($propertyname)
    {
        $this->validateOnly($propertyname);
    }

    public function createRecord()
    {
        $data = $this->validate();

        $images = "";
        if ($this->photos) {
            $imageList = [];
            foreach ($this->photos as $photo) {

                $filename = $photo->store('photos', "public");
                array_push($imageList, $filename);
            }

            $images = implode(",", $imageList); // break array into string, (use explode to revert)
        }

        try {
            $record = new CheckupRecord();
            $record->patient_id = $this->patientDetails->id;
            $record->doctor_id = $this->doctor_id;
            $record->symptoms = $this->symptoms;
            $record->findings = $this->findings;
            $record->remarks = $this->remarks;
            $record->images = $images;

            $record->save();
            $this->alert_success("Success!" . " Checkup #: " . $record->id, "Checkup record for " . $this->patientDetails->name . " has been created!");
        } catch (\Throwable $th) {
            $this->alert_error("Something went wrong", "" . $th->getMessage());
        }
    }
    public function updateRecord()
    {
        $data = $this->validate();
        $images = $this->record->images;
        if ($this->photos) {
            $images = "";
            $imageList = explode(",", $this->record->images);
            foreach ($this->photos as $photo) {

                $filename = $photo->store('photos', "public");
                array_push($imageList, $filename);
            }

            $images = implode(",", $imageList); // break array into string, (use explode to revert)
        }
        try {
            $this->record->patient_id = $this->patientDetails->id;
            $this->record->doctor_id = $this->doctor_id;
            $this->record->symptoms = $this->symptoms;
            $this->record->findings = $this->findings;
            $this->record->remarks = $this->remarks;
            $this->record->images = $images;

            $this->record->save();
            $this->alert_success("Success!" . " Checkup #: " . $this->record->id, "Checkup record for " . $this->patientDetails->name . " has been created!");
        } catch (\Throwable $th) {
            $this->alert_error("Something went wrong", "" . $th->getMessage());
        }
    }
}
