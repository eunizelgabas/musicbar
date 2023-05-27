<?php

namespace App\Http\Livewire\Band;

use Livewire\Component;
use App\Models\Band;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Show extends Component
{
    public $band_name, $location,$rate,$genre = [''],
            $talent_fee,$founder,$description,
            $image;
            use WithFileUploads;
            use WithPagination;
            protected $paginationTheme = 'bootstrap';

    public function addBand(){
        $this->validate([
            'band_name'             =>['required', 'string'],
            'location'              =>['required', 'string'],
            'rate'                  =>['required', 'numeric'],
            'genre'                 =>['required', 'string'],
            'talent_fee'            =>['required', 'numeric'],
            'founder'               =>['required', 'string'],
            'description'           =>['required', 'string'],
            'image'                 =>['required', 'image'],

        ]);

        $fileUrl = $this->image->store('public/bandImgs');

        Band::create([
            'band_name'             =>$this->band_name,
            'location'              =>$this->location,
            'rate'                  =>$this->rate,
            'genre'                 =>$this->genre,
            'talent_fee'            =>$this->talent_fee,
            'founder'               =>$this->founder,
            'description'           =>$this->description,
            'image'                 =>$fileUrl,

        ]);

        session()->flash('message', 'Band successfully created.');
        return redirect('/band');
    }

    public function loadBands(){
        $query = Band::orderBy('band_name');
        $bands = $query->paginate(4);
        return compact('bands');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    // public $band_delete_id;
    // public function deleteConfirmation($id)
    // {
    //     $this->band_delete_id = $id;
    // }

    // public $band_show_id;
    // public function view($id){

    //     $this->band_show_id = $id;

    //     $band = Band::where('id', $this->band_show_id);
    // }

    // public function deleteBandData(){
    //     $band = Band::where('id', $this->band_delete_id)->first();
    //     $band->delete();

    //     return redirect('/')
    //     ->with('message', 'Deleted Successfully');

    //     $this->band_delete_id = '';
    // }

    public function render()
    {
        return view('livewire.band.show',  $this->loadBands());
    }
}
