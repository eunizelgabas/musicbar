<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name, $location, $username, $description, $email, $password, $password_confirmation;

    public function submit(){
        $this->validate([
            'name'      =>'required|string',
            'location'  =>'required|string',
            'username'  =>'required|string',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|confirmed|string|min:6'
        ]);

        User::create([
            'name'          =>$this->name,
            'location'      =>$this->location,
            'username'      =>$this->username,
            'description'   =>$this->description,
            'email'         =>$this->email,
            'password'      =>bcrypt($this->password)
        ]);

        session()->flash("message", 'Your account has been created successfully');
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
