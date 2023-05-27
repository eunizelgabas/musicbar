<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Index extends Component
{

    // public $userId, $name, $location, $description;
    // public $prevName, $prevLocation, $prevDescription;

    // // public function loadUsers(){
    // //     $users = User::orderBy('name')->get();
    // //     return compact('users');
    // // }

    // public function mount(){
    //     $this->userId = auth()->user()->id;

    //     $user = User::find($this->userId);
    //     $this->name = $user->name;
    //     $this->location = $user->location;
    //     $this->description = $user->description;

    //     $this->prevName = $user->name;
    //     $this->prevLocation = $user->location;
    //     $this->prevDescription = $user->description;
    // }


    // public function hydrate(){
    //     $validateData = [

    //     ];

    //     //Just add validation if there are any changes in fields
    //     if($this->name !== $this->prevName){
    //        if(empty($this->name)){
    //         $validateData = array_merge($validateData, [
    //             'name' => 'required'
    //         ]);
    //        }
    //     }

    //     if($this->location !== $this->prevLocation){
    //         if(empty($this->location)){
    //          $validateData = array_merge($validateData, [
    //              'location' => 'required'
    //          ]);
    //         }
    //     }

    //     if($this->description !== $this->prevDescription){
    //         if(empty($this->description)){
    //          $validateData = array_merge($validateData, [
    //              'description' => 'required'
    //          ]);
    //         }
    //     }
    //     // $this->validate([
    //     //     'name' => ['required'],
    //     //     'location' => ['required']
    //     // ]);
    // }

    // public function submit(){
    //     $data =  [];

    //     // Will check if there are any changes in the name field
    //     if($this->name !== $this->prevName){
    //         $data = array_merge($data, ['name'=> $this->name]);
    //     }
    //     // Will check if there are any changes in the location field
    //     if($this->location !== $this->prevLocation){
    //         $data = array_merge($data, ['location'=> $this->location]);
    //     }

    //     // Will check if there are any changes in the description field
    //     if($this->description !== $this->prevDescription){
    //         $data = array_merge($data, ['description'=> $this->description]);
    //     }

    //     // To update the user data
    //     if(count($data)){
    //         User::find($this->userId)->update($data);
    //         return redirect()->to('/profile')->with('message', 'Updated successfully');
    //     }

    // }


    use WithFileUploads;
    public $name, $location, $description, $profile, $user_edit_id;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->location = $user->location;
        $this->description = $user->description;

    }

    // public function updatePic(){
    //     $user = auth()->user();
    //     $this->validate([
    //         'profile' => 'nullable|image'
    //     ]);

    //     if ($this->profile) {
    //         $imageName = Carbon::now()->timestamp . '.' . $this->profile->extension();
    //         $this->profile->storeAs('bandImgs', $imageName, 'public');
    //         $user->profile = $imageName;
    //     }

    //     $user->save();

    //     session()->flash('message', 'Profile updated successfully.');

    //     return redirect('/profile');
    // }

    public function submit()
    {
        $user = auth()->user();

        $this->validate([
            'name' => 'required',
            'location' => 'required',
            // 'description' => 'required',
            'profile' => 'nullable|image',
        ]);

        $user->name = $this->name;
        $user->location = $this->location;
        $user->description = $this->description;

        if ($this->profile) {
            $imageName = Carbon::now()->timestamp . '.' . $this->profile->extension();
            $this->profile->storeAs('bandImgs', $imageName, 'public');
            $user->profile = $imageName;
        }

        $user->save();

        session()->flash('message', 'Profile updated successfully.');

        return redirect('/profile');
    }


    public function render()
    {
        return view('livewire.profile.index');
    }
}
