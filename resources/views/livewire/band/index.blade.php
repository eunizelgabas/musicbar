{{-- <div class="alert">
    @if(session()->has('message'))
    <div id="popup-message" class="popup-message " >
        {{ session()->get('message') }}
    </div>
    @endif
</div> --}}
<div class="container">
    @if(session()->has('message'))
    <div id="popup-message" class="popup-message " >
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card-left card rounded-lg" style="background-color:#AAC8A7">
                <div class="card-body">
                    <input type="text" name="" id="" placeholder="Search a band" class="form-control m-2 mb-4" wire:model='search_band'>
                    <div class="checkbox d-block m-2 text-dark">
                        <label for="genre">Genre:</label> <br>
                            <input type="checkbox" name="" id="" wire:model='Rock' value="Rock"> &nbsp; Rock <br>
                            <input type="checkbox" name="" id="" wire:model='Pop' value="Pop"> &nbsp; Pop <br>
                            <input type="checkbox" name="" id="" wire:model='Reggae' value="Reggae"> &nbsp; Reggae <br>
                            <input type="checkbox" name="" id="" wire:model='Acoustic' value="Acoustic"> &nbsp; Acoustic <br>
                            <input type="checkbox" name="" id="" wire:model='Classical' value="Classical" class="mb-4"> &nbsp; Classical <br>
                    </div>
                    <label class="text-dark" for="location">Location</label> <br>
                    <select name="" id="" class="form-select mb-4" style="transform: translateX(7px);" wire:model='bandLocation'>
                        <option value="all">Select Location</option>
                        @foreach ($loc as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                    <div class="rate d-inline-block mt-2" style="transform: translateX(6px);">
                        <label class="text-dark" for="">Rate:</label><br>
                        <input style="width: 350px;" type="range" id="sortRangeInput" name="sortRangeInput" min="0" max="5000"
                        oninput="showSortValue(this.value)" wire:model='sortRate'> <br>
                         <output class="mb-4 text-dark" id="sortRangeInput" for="sortRangeInput">₱ {{ number_format(floatval($sortRate), 2) }}</output>
                   </div>
                   <br>
                   <label class="text-dark" for="sort">Sort:</label>
                        <select name="" id="" class="form-select" style="transform: translateX(6px);" wire:model='sortBy'>
                            <option value="asc">Lowest to Highest Fee</option>
                            <option value="desc">Highest to Lowest Fee</option>
                        </select>
                        <button class="btn btn-primary float-end mt-5" wire:click='resetFilter'>Reset Filter</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <h3 class="text-center">Find the band you love</h3>
            <hr>

            {{-- <h4 class="text-center">Top Talents</h4> --}}
            <div class="row">

                @if ($bands->count()>0)
                    @foreach ($bands as $band )
                        <div class="col-md-5 mb-3" style="margin-left:3%">
                            <div class="card-list">
                                <article class="card" data-bs-toggle="modal" data-bs-target="#moreModal" wire:click="view({{$band->id}})" type="button">
                                    <figure class="card-image">
                                        <img src="{{Storage::url($band->image)}}" alt="Image" style="width:20rem; height:12rem"/>
                                    </figure>
                                    <div class="card-header">
                                        <h3 class="text-center mx-auto">{{$band->band_name}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <h6>Location:{{$band->location}} </h6>
                                        <p>Genre: {{$band->genre}}</p>

                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p>Rate: {{$band->rate}}</p>
                                            </div>
                                            {{-- <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#moreModal" wire:click="view({{$band->id}})" type="button">View More </button> --}}
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if($bands->isEmpty())
                    <div class="text-dark text-center" style="font-size: 30px; font-weight:700">
                        Nothing to show
                    </div>
                @endif
                {{$bands->links()}}

            </div>


        </div>
        <div wire:ignore.self class="modal fade" id="moreModal" tabindex="-1" aria-labelledby="moreModalLabel" aria-hidden="true" data-backdrop="false" >
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-body">
                        @foreach ($bands as $bandImg)
                            <div class="cards" style="border:none">
                                @if ($bandImg->id == $band_show_id)
                                    <img src="{{Storage::url($bandImg->image)}}" class="card-img-top mx-auto mt-2" alt="image" style="border-radius:50%;width:100px; height:100px;">
                                    <div class="card-body">
                                        <h6 class="card-title text-center">@founder | {{$bandImg->founder}}  </h6>
                                        <hr>
                                        <p class="card-text">{{$bandImg->description}}</p>
                                        <div class="row mt-2 text-center">
                                            <div class="col-md-6 ">
                                                <p class="card-text ">{{$bandImg->talent_fee}}</p>
                                                <p class="card-text"><small class="text-muted">Talent fee</small></p>
                                            </div>
                                            <div class="col-md-6">
                                                @if($bandImg->id === $band_show_id)
                                                <p class="card-text">{{$bandImg->bookings->count()}}</p>
                                                @endif
                                                <p class="card-text"><small class="text-muted">Total Transactions</small></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        @if ($bands->count() > 0)
                            @foreach ($bands as $band )
                                @if($band->id === $band_show_id)
                                    <div class="img mx-auto">
                                        <a class="btn btn-primary mb-3" type="button" style="border-radius: 80px; margin-left:40%" href="{{ route('band.booking', ['id' => $band->id, 'band' => $band->name]) }}" >
                                            Book now
                                        </a>
                                    </div>
                                    <hr>
                                    <h4>Gig History</h4>
                                    @if ($band->bookings->count() > 0)
                                        @foreach($band->bookings as $booking)
                                            @if($booking->status !== 'Canceled' && $booking->status !== 'Pending' )
                                                <div class="card mb-2">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="">{{ $booking->event_name }}</h6>
                                                            <h6 class="">{{ $booking->event_date }}</h6>
                                                        </div>
                                                        <div class="mt-2">
                                                            @forelse($booking->user->reviews->where('booking_id', $booking->id) as $review)
                                                                <h6 class="form-control border-3 text-dark p-2 mb-2" style="background-color:#EEEEEE">
                                                                   <b>Review:</b> {{ $review->review }}
                                                                </h6>
                                                            @empty
                                                                <p>No review found.</p>
                                                            @endforelse

                                                            @forelse($booking->user->reviews->where('booking_id', $booking->id) as $rating)
                                                                @php
                                                                    $stars = '';
                                                                    for ($i = 1; $i <= $rating->rating; $i++) {
                                                                        $stars .= '<i class="fa-solid fa-star text-warning"></i>';
                                                                    }
                                                                    for ($i = $rating->rating + 1; $i <= 5; $i++) {
                                                                        $stars .= '<i class="far fa-star"></i>';
                                                                    }
                                                                @endphp
                                                                <h6 class="form-control border-0 text-dark p-2 mb-2">
                                                                    <b>Rate: {!! $stars !!}</b>
                                                                </h6>
                                                            @empty
                                                                <p>No ratings found.</p>
                                                            @endforelse
                                                            <h6 class="form-control border-3 text-dark p-2 mb-2" style="background-color:#EEEEEE">
                                                                <b>Rated By:</b> {{ $booking->user->username }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif ($band->bookings->count() <= 0)
                                    <p class="mt-2 text-center">No gig history found</p>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style >
     @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext');
    .modal-backdrop {
       display: none;
   }

   @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap");


img {
  max-width: 100%;
  display: block;
}

.card-list {
  width: 90%;
  max-width: 400px;
}

.card {
  background-color: #FFF;
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 20px 50px 0 rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  overflow: hidden;
  padding: 1.25rem;
  position: relative;
  transition: 0.15s ease-in;
}
.card:hover, .card:focus-within {
  box-shadow: 0 0 0 2px #16C79A, 0 10px 60px 0 rgba(0, 0, 0, 0.1);
  /* transform: translatey(-5px); */
}

.card-image {
  border-radius: 10px;
  overflow: hidden;
}

.card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.card-header h3 {
  font-weight: 600;
  font-size: 1.375rem;
  line-height: 1.25;
  padding-right: 1rem;
  text-decoration: none;
  color: inherit;
  will-change: transform;
  font-family: 'Poppins', sans-serif;
}
.card-header h3:after {
  content: "";
  /* position: absolute; */
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
}

/* .alert{
    position: relative;
    left: 0;
  top: 0;
  right: 0;
  bottom: 0;
} */
 .popup-message {
    position: relative;
    top: 15%;
    left: 80%;
    padding: 20px;
    background-color: #B3C890;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var popupContainer = document.getElementById('popup-message');

        // Show the pop-up container
        popupContainer.style.display = 'block';

        // Hide the pop-up container after a delay (e.g., 3 seconds)
        setTimeout(function() {
            popupContainer.style.display = 'none';
        }, 3000);
    });
</script>
