<div>
    <div class="container col-md-4 mx-auto offset-md-3">
      {{-- <img class="justify-content-center"
      src="{{URL::to('/asset/logoo.png')}}"
      height="90"
      width="90%"
      alt="Logo"
      loading="lazy"
      wire:ignore
      /> --}}
      <h1 class="text-center"> Bandify</h1>
        <p class="text-center mt-2">I have an account? <a href="/login">Sign in</a></p>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
          @if(isset($errorMsg))
              <div class="alert alert-danger">
                  {{$errorMsg}}
              </div>
          @endif

          <div class="form-group mb-4">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" wire:model='name'>
            @error('name')
                 <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div class="form-group mb-4">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" wire:model='location'>
            @error('location')
                 <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div class="form-group mb-4">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" wire:model='username'>
            @error('username')
                 <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

        <div class="form-group mb-4">
           <label for="email">Email:</label>
           <input type="email" name="email" id="email" class="form-control" wire:model='email'>
           @error('email')
                <p class="text-danger">{{$message}}</p>
           @enderror
        </div>

        <div class="form-group mb-4">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" wire:model='password'>
            @error('password')
                 <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div class="form-group mb-4">
            <label for="password">Confirm Password:</label>
            <input type="password" name="password" id="password" class="form-control" wire:model='password_confirmation'>
            @error('password')
                 <p class="text-danger">{{$message}}</p>
            @enderror
         </div>

         <div class="form-group mb-3">
            <button class="btn px-5" style="width:100%; background-color:#596b30; color:white" wire:click='submit'>
                Register
            </button>
         </div>
         <hr>
         <div class=" button mt-4">
          <button class="btn btn-primary px-5 mb-3" style="width:100%"><i class="fa-brands fa-google fa-lg"></i> |  Continue with Google</button>
          <button class="btn btn-primary px-5 mb-3" style="width:100%"><i class="fa-brands fa-facebook fa-lg"></i> | Sign in with Facebook</button>
         </div>
    </div>
  </div>
  <footer class="text-center mt-5">
      <p>© 2023 Bandify. All Rights Reserved.</p>
  </footer>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap');

    h1{
        font-family: 'Delicious Handrawn', cursive;
        color:#78a474;
        font-size: 4rem;
    }
  </style>
