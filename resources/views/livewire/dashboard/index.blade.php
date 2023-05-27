<div>
    <div class="container">
        <h1 class="mt-3">Dashboard</h1>
        <h5>Quick stats</h5>
        <div class="row text-center">
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body p-5">
                    <h1 style="color:black; font-weight:600">{{ $total_bookings->count() }}</h1>
                    <h6>Total Bookings</h6>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body p-5">
                        <h1 style="color:green; font-weight:600">{{ $active_bookings->count() }}</h1>
                        <h6>Active Bookings</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                      <div class="card-body p-5">
                          <h1 style="color:red; font-weight:600">{{ $cancel_booking->count() }}</h1>
                          <h6>Canceled Booking</h6>
                      </div>
                </div>
              </div>
        </div>
        <hr>
        <div class="row mt-3">
            @foreach ($bookings as $booking )
                <div class="col-md-4 mb-3">
                    <div class="cookie-card"data-bs-toggle="modal" data-bs-target="#viewBook" wire:click='viewDetail({{$booking->id}})'>
                        <span class="title">{{ $booking->event_name }}</span><hr>
                        {{-- @if(!is_null($booking->musicband))
                            <p class="description">Performer:  {{ $booking->band->name }} </p>
                        @endif --}}
                        <div class="actions">
                            <div class="row">
                                <div class="col">
                                    Start: {{ $booking->time_start }}
                                </div>
                                <div class="col">
                                    Finish: {{ $booking->time_end }}
                                </div>
                            </div>
                             Location: {{ $booking->event_location }}
                        </div>
                        <div class="stats mt-2">
                            @if($booking->status == 'Pending')
                                <h6>Status: <span class="badge bg-primary">Pending</span> <br></h6>
                                <div class="stats float-end">
                                    <a class="" type="button" style="text-decoration:none; color:green" data-bs-toggle="modal" data-bs-target="#reviewModal">Finish</a>
                                    <a class="" type="button" style="text-decoration:none; color:red" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</a>
                                </div>
                            @elseif($booking->status == 'Completed')
                                <h6>Status: <span class="badge bg-success">Completed</span></h6>
                            @elseif($booking->status == 'Canceled')
                                <h6>Status: <span class="badge bg-danger">Canceled</span></h6>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

    {{-- View Book Detail --}}
    <div wire:ignore.self class="modal fade" id="viewBook" tabindex="-1" aria-labelledby="moreModalLabel" aria-hidden="true" data-backdrop="false" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F7E1AE; color:black">
                    Booking Details
                </div>
                <div class="modal-body">
                    @if(!is_null($book))
                    <div class="cards">
                        <h6>Event Performer</h6>
                        <div class="card mb-4 text-center" style="background-color:white">
                            @if(!is_null($book->band))
                                <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                                </p>
                                <h6 class="text-dark">{{ $book->band->genre }}</h6>

                            @endif
                        </div>
                        <h6>Event Details</h6>
                        <div class="card text-center text-dark" style="background-color:white">
                            <div class="row mb-2 mt-2">
                                <div class="col">
                                    <h6>{{ $book->event_name }}</h6>
                                    <p style="font-size:1rem">Event name</p>
                                </div>
                                <div class="col">
                                    <h6>{{ $book->event_location }}</h6>
                                    <p style="font-size:1rem">Location</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <p style="font-size:1rem">Date</p>
                                    <h6>{{ $book->event_date }}</h6>
                                </div>
                                <div class="col">
                                    <p style="font-size:1rem">Start</p>
                                    <h6>{{ $book->time_start }}</h6>
                                </div>
                                <div class="col">
                                    <p style="font-size:1rem">End</p>
                                    <h6>{{ $book->time_end }}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <h6>{{ $book->event_details }}</h6>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Cancel Booking Detail Modal --}}
    <div wire:ignore.self class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true" data-backdrop="false" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red;">
                   Cancel Booking
                </div>
                <div class="modal-body">
                    @if(!is_null($book))
                    <div class="cards">
                        <h6>Event Performer</h6>
                        <div class="card mb-4 text-center" style="background-color:white">
                            @if(!is_null($book->band))
                                <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                                </p>
                                <h6>{{ $book->band->genre }}</h6>

                            @endif
                        </div>
                        <h6>Event Details</h6>
                        <div class="card text-center text-dark" style="background-color:white">
                            <div class="row mb-2 mt-2">
                                <div class="col">
                                    <h6>{{ $book->event_name }}</h6>
                                    <p style="font-size:1rem">Event name</p>
                                </div>
                                <div class="col">
                                    <h6>{{ $book->event_location }}</h6>
                                    <p style="font-size:1rem">Location</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <p style="font-size:1rem">Date</p>
                                    <h6>{{ $book->event_date }}</h6>
                                </div>
                                <div class="col">
                                    <p style="font-size:1rem">Start</p>
                                    <h6>{{ $book->time_start }}</h6>
                                </div>
                                <div class="col">
                                    <p style="font-size:1rem">End</p>
                                    <h6>{{ $book->time_end }}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <h6>{{ $book->event_details }}</h6>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="save_btn" wire:click="cancel({{$booking->id }})" data-bs-dismiss="modal">Cancel Booking</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Review Booking Detail Modal --}}
    <div wire:ignore.self class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true" data-backdrop="false" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: yellow;">
                   Review Booking
                </div>
                <div class="modal-body">
                    @if(!is_null($book))
                    <div class="cards">
                        <h6>Event Performer</h6>
                        <div class="card mb-4 text-center" style="background-color:white">
                            @if(!is_null($book->band))
                                <p class="mt-2" style="color:red">{{ $book->band->band_name }}
                                </p>
                                <h6>{{ $book->band->genre }}</h6>

                            @endif

                        </div>
                       @endif
                        <h6>Rate and Review</h6>
                        <div class="card cardi text-center" style="background-color:white">
                            <div class="location">
                                <textarea name="" id="" cols="30" rows="10" placeholder="Write a review here" class="form-control border-0 text-dark p-2 mb-2" wire:model='review'></textarea>
                            </div>
                            <div class="rate bg-success py-3 text-white">
                                <div class="rating">
                                    <input type="radio" name="rating" value="5" id="5" wire:model="rating">
                                    <label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4" wire:model="rating">
                                    <label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3" wire:model="rating">
                                    <label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2" wire:model="rating">
                                    <label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1" wire:model="rating">
                                    <label for="1">☆</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="save_btn" wire:click="complete({{ $booking->id }})" data-bs-dismiss="modal">Complete Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style scoped>
    .modal-backdrop {
       display: none;
   }

    p{
        font-size: 4vh;

    }
    h1{
        font-weight: 90;
    }

    .card{
        background-color: #AAC8A7;
        color:black;
        /* opacity: 70%; */
    }
    .cookie-card {
    /* max-width: 320px; */
    height: 13rem;
    padding: 1rem;
    background-color: #E3F2C1;
    border-radius: 10px;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, .05);
    }

    .title {
    font-weight: 600;
    color: rgb(31 41 55);
    }

    .description {
    margin-top: 1rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: rgb(75 85 99);
    }

    a{
       margin-right: 30px;

       /* specifies a gap of 30px on the left side */
    }
/*
    .actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1rem;
    -moz-column-gap: 1rem;
    column-gap: 1rem;
    flex-shrink: 0;
    }

     */

    .card .cardi{

    width: 350px;
    border: none;
    box-shadow: 5px 6px 6px 2px #e9ecef;
    border-radius: 12px;
    }

    .name{
    margin-top: -21px;
    font-size: 18px;
    }


    .fw-500{
    font-weight: 500 !important;
    }


    .start{

    color: green;
    }

    .stop{
    color: red;
    }


    .rate{

    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;

    }



    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
    }

    .rating>input {
    display: none
    }

    .rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
    }

    .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
    opacity: 1 !important
    }

    .rating>input:checked~label:before {
    opacity: 1
    }

    .rating:hover>input:checked~label:before {
    opacity: 0.4
    }


    .buttons{
    top: 36px;
    position: relative;
    }


    .rating-submit{
    border-radius: 15px;
    color: #fff;
        height: 49px;
    }


    .rating-submit:hover{

    color: #fff;
    }
</style>
