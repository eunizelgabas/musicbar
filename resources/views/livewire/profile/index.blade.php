<div>

    <hr>
    <div class="container col-md-12 mx-auto offset-md-3">
        @if(auth()->check())
        <div class="image-upload position-relative mt-5">
            <input type="file" class="form-control position-absolute top-0 start-0 opacity-0" wire:model="profile" id="image" name="image">
            <label for="image" class="upload-label d-flex align-items-center justify-content-center">
                <img width="100" height="100"
                    src="{{ $profile ? $profile->temporaryUrl() : (auth()->user()->profile ? asset('storage/bandImgs/' . auth()->user()->profile) : asset('defaultProfile/pfp.jpg')) }}"
                    alt="Profile Image" class="preview-image rounded-circle bg-dark mb-2">
            </label>
        </div>

        <h6 class="text-center">{{Auth::user()->name}}
        </h6>
        @endif


        <div class="form-group mb-4 px-5">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}"  wire:model='name'>
            @error('name')
                 <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-4 px-5">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{auth()->user()->location}}" wire:model='location'>
            @error('location')
                 <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-4 px-5">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" style="height:5rem" value="{{auth()->user()->description}}" wire:model='description'>
            @error('description')
                 <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

        <div class="form-group mb-3">
            <button class="btn float-end" style="width:20%; background-color:#0da043; color:white" wire:click='submit'>
                Update
            </button>
        </div>

    </div>

</div>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap');

    h1{
        font-family: 'Delicious Handrawn', cursive;
        color:#740d21;
        font-size: 4rem;
    }
  </style>
