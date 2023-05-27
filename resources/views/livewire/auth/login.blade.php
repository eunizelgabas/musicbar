<div>
  <div class="container col-md-4 mx-auto offset-md-3">
    @if(session()->has('message'))

        <div id="popup-message" class="popup-message " >
            {{ session()->get('message') }}
        </div>
    @endif

    <h1 class="text-center"> Bandify</h1>
      <p class="text-center mt-2">Dont have an account? <a href="/register">Sign up</a></p>
        @if(isset($errorMsg))
            <div class="alert alert-danger">
                {{$errorMsg}}
            </div>
        @endif
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

       <div class="form-group mb-3">
          <button class="btn px-5" style="width:100%; background-color:#596b30; color:white" wire:click='submit'>
              Login
          </button>
       </div>
       <hr>
       <div class=" button mt-4">
        <button class="btn btn-primary px-5 mb-3" style="width:100%"><i class="fa-brands fa-google fa-lg"></i> |  Sign in with Google</button>
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

    .popup-message {
    position: fixed;
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
