<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Setting extends Component
{

    // public $userId, $username;
    // public $prevUsername;

    // // public function loadUsers(){
    // //     $users = User::orderBy('name')->get();
    // //     return compact('users');
    // // }

    // public function mount(){
    //     $this->userId = auth()->user()->id;

    //     $user = User::find($this->userId);
    //     $this->username = $user->username;

    //     $this->prevUsername = $user->username;
    // }


    // public function hydrate(){
    //     $validateData = [
    //         'username' => 'required|string|max:255',
    //     ];

    //     //Just add validation if there are any changes in fields
    //     if($this->username !== $this->prevUsername){
    //        if(empty($this->username)){
    //         $validateData = array_merge($validateData, [
    //             'username' => 'required'
    //         ]);
    //        }
    //     }
    //     $this->validate($validateData);
    // }

    // public function submit(){
    //     $data =  [];

    //     // Will check if there are any changes in the name field
    //     if($this->username !== $this->prevUsername){
    //         $data = array_merge($data, ['username'=> $this->username]);
    //     }


    //     // To update the user data
    //     if(count($data)){
    //         User::find($this->userId)->update($data);
    //         return redirect()->to('/settings')->with('message','Updated successfully');
    //     }
    // }

    public $username, $old_pass, $password, $password_confirmation;

    public function mount(){
        $user = auth()->user();
        $this->username = $user->username;
    }

    public function submit(){
        $user = auth()->user();

        $this->validate([
            'old_pass' => [
                'nullable',
                'required_with:password',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail(__('The current password is incorrect.'));
                    }
                },
            ],
            'password' => 'required|confirmed|string',

        ]);

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $user = auth()->user();

        $user->password = bcrypt($this->password);

        $user->save();


        session()->flash('message', 'Password updated successfully.');

        return redirect('/settings');

    }

    public function editUsername(){
        $user = auth()->user();

        $this->validate([
            'username' => 'required',
        ]);

        $user->username = $this->username;

        $user->save();

        session()->flash('message', 'Username updated successfully.');

        return redirect('/settings');
    }

    public function deleteUser(){
        $user = auth()->user();

        $user->delete();

        session()->flash('message', 'User deleted successfully.');

        return redirect('/login');
    }
    public function render()
    {
        return view('livewire.profile.setting');
    }
}
