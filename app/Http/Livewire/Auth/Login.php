<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
 use App\Http\Traits\AlertTrait;
class Login extends Component
{
    use AlertTrait;
    public $email,$password;

    protected $rules=[
        'email'=>"required|email",
        "password"=>"required|min:4"
    ];

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.signin');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function signin(){

        if(Auth::attempt(array('email'=>$this->email,'password'=> $this->password))){
            $this->alert_success("Success","Please wait...");
            return redirect()->route("dashboard");
        }else{
            $this->alert_error("Login Failed", "Invalid Email or Password");

        }
    }
}
