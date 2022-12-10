<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctors;
use Livewire\Component;
use App\Http\Traits\AlertTrait;
use Livewire\WithPagination;

class Index extends Component
{
    use AlertTrait;
    use WithPagination;

    public $searchName, $name, $id_number;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        "name" => "required",
        "id_number" => "required|numeric|unique:doctors"
    ];

    public function render()
    {
        $doctors = Doctors::where("name", "LIKE", "%" . $this->searchName . "%")
            ->paginate(5);
        return view('livewire.doctor.index', ["doctors" => $doctors])->extends("layouts.app");
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function newDoctor()
    {
        $data = $this->validate();
        try {
            $doctor = new Doctors();
            $doctor->name = $this->name;
            $doctor->id_number = $this->id_number;
            $doctor->save();
            $this->dispatchBrowserEvent("closeModal");
            $this->alert_success("Success", "New Doctor has been added");
        } catch (\Throwable $th) {
            $this->alert_error("Something went wrong", "" . $th->getMessage());
        }
    }
}
