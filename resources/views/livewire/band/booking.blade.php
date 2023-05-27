<div class="container">
    <h2 class="mt-3 mb-3">Booking Request</h2>
    <div class="card px-5 " style="height:37rem">
        <div class="card-body mt-3">

                <!-- 2 column grid layout with text inputs for the band name and talent_fee -->
                @if($selectedBand)
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="band_name">Band Name</label>
                                <input type="text" id="band_name" class="form-control" value="{{ $selectedBand->band_name}}"  readonly disabled />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="talent_fee">Talent Fee</label>
                                <input type="text" id="talent_fee" class="form-control" value="{{ $selectedBand->talent_fee}}" readonly disabled/>
                            </div>
                        </div>
                    </div>
                @endif

                <h4>Booking Details</h4>
                <hr>
            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="event_name">Event name</label>
                            <input type="text" id="event_name" class="form-control" wire:model='event_name' />
                            @error('event_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="event_location">Event Location</label>
                            <input type="text" id="event_location" class="form-control" wire:model='event_location'/>
                            @error('event_location')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="event_date">Event Date</label>
                            <input type="date" id="event_date" class="form-control" wire:model='event_date' />
                            @error('event_date')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="time_start">Time start</label>
                            <input type="time" id="time_start" class="form-control" wire:model='time_start' />
                            @error('time_start')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="time_end">Time end</label>
                            <input type="time" id="time_end" class="form-control" wire:model='time_end' />
                            @error('time_end')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="event_details">Event Details</label>
                    <textarea class="form-control" id="event_details" rows="4" wire:model='event_details'></textarea>
                    @error('event_details')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="col">
                    <div class="form-outline mb-4">

                        <input type="hidden" wire:model="selectedBand.id" name="band_id">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    </div>
                </div>

                <div class="col float-end">
                <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Send Request</button>
                    <button type="submit"  wire:click="cancel" class="btn btn-secondary btn-block mb-4">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
