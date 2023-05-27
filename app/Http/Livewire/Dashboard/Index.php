<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Booking;
use App\Models\User;
use App\Models\Band;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $bookings, $bands, $book, $rating, $review, $users;

    public function viewDetail($id)
    {
        $this->book = Booking::find($id);

    }

   public function complete($id)
    {
        $user = Auth::user();
        $booking = Booking::findOrFail($id);
        $booking->status = 'Completed';
        $booking->save();
        // if ($booking->status !== 'Completed') {
        //     $booking->status = 'Completed';
        //     $booking->save();
        // }

        $validatedData = $this->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:255',
        ]);

        $review = new Review();
        $review->rating = $validatedData['rating'];
        $review->review = $validatedData['review'];
        $review->booking_id = $id;

        $user->reviews()->save($review);

        // Update the $bookings variable
        $this->bookings = Booking::whereIn('status', ['Pending', 'Completed'])->get();
        session()->flash("message", 'Review has been sent!');
        return redirect('/dashboard');
    }


    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Canceled';
        $booking->save();


        // Update the $bookings variable
        $this->bookings = Booking::whereIn('status', ['Pending', 'Completed'])->get();
        return redirect('/dashboard');
    }

    public function getTransactionCount()
    {
        return Booking::where('status', 'Completed')->count();
    }

    public function mount()
    {

        $this->users = User::with('bookings')->get();
        $this->bookings = Booking::whereIn('status', ['Pending', 'Completed', 'Canceled'])->get();
    }

    public function render()
    {

        $active_bookings = Booking::whereIn('status', ['Pending'])->get();
        $total_bookings = Booking::whereIn('status', ['Completed'])->get();
        $cancel_booking = Booking::whereIn('status', ['Canceled'])->get();

        $bands = Band::withCount(['bookings' => function ($query) {
            $query->whereIn('status', ['Pending', 'Completed', 'Canceled']);
        }])->get();
        $transaction_count = $this->getTransactionCount();

        $users = User::with('bookings')->get();
        $bookings = Booking::whereIn('status', ['Pending', 'Completed'])->get();

        return view('livewire.dashboard.index',[
            'bookings' => $bookings
        ] ,compact('active_bookings', 'total_bookings', 'cancel_booking', 'bands', 'transaction_count', 'users'));
    }

}
