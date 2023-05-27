<?php

namespace App\Http\Livewire\Band;

use App\Models\Band;
use Livewire\Component;
use App\Models\Booking as Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking extends Component
{

    public $selectedBandId;
    public $band;
    public $selectedBand;

    public $event_name, $event_location, $event_details, $time_start, $time_end, $event_date;

    public function submit(){
       $this->validate([
        'event_name' => 'required',
        'event_location' => 'required',
        'event_details' => 'required',
        'event_date' => 'required',
        'time_start' => 'required',
        'time_end' => 'required',
       ]);

        $book = new Book();
        $book->user_id = Auth::id();
        $book->event_name = $this->event_name;
        $book->event_location = $this->event_location;
        $book->event_date = $this->event_date;
        $book->event_details = $this->event_details;
        $book->time_start = $this->time_start;
        $book->time_end = $this->time_end;
        $this->band = Band::findOrFail($this->selectedBand['id']);

        $book->band_id = $this->band->id;

        $book->save();

        session()->flash('message', 'Your booking request has been sent!');

        return redirect('/success');
    }

    public function show($id, $band)
    {
        $band = Band::findOrFail($id);
        return view('band.booking', ['band' => $band]);
    }


    public function mount($id)
    {

        $this->selectedBand = Band::find($id);

        $this->emit('musicBandSelected', $this->selectedBand);
    }


    public function cancel(){
        return redirect('/band');
    }

    public function render()
    {
        $selectedBand = Band::find($this->selectedBandId);
        $bookings = $selectedBand ? $selectedBand->bookings : [];

        return view('livewire.band.booking', [
        'bookings' => $bookings,
        'selectedBand' => $selectedBand,
        ])->extends('layouts.app');
    }

    public function booking($id, $band)
    {
        return view('components.booking', [
            'band' => $band,
            'booking_id' => $id,
        ]);
    }
}
