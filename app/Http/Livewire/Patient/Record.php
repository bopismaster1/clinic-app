<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;

class Record extends Component
{
    public function render()
    {
        return view('livewire.patient.record')->extends("layouts.app");
    }
}
