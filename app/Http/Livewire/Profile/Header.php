<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;

class Header extends Component
{

    use WithFileUploads;

    public $image;


    public function editAvatar(){
        $user = auth()->user();
        $this->validate([
            'profile' => 'nullable|image|max:1024',
        ]);

        if ($this->image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->profile->extension();
            $this->profile->storeAs('image_uploads', $imageName);
            $user->profile = $imageName;
        }

        $user->save();

        session()->flash('message', 'Profile updated successfully.');

        return redirect('/profile');
    }
    public function render()
    {
        return view('livewire.profile.header');
    }
}
