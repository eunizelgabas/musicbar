<div>
    <hr>
    <div class="container col-md-12 mx-auto offset-md-3">
        <div class="form-group mb-4 px-5">
            <div class="row">
                <div class="col-md-8">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{auth()->user()->username}}"  style="width:28rem" wire:model='username'>
                    @error('username')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-4 float-right">
                    <button type="submit" class="btn btn-success mt-4" style="width: 7rem; height: 40px;" wire:click="editUsername">Save</button>
                </div>
            </div>

        </div>
        <hr>
        <p class="px-5">If you don't want to change you leave the following fields blank</p>
        <div class="form-group mb-4 px-5">
            <label for="old_pass">Old Password:</label>
            <input type="password" name="old_pass" id="old_pass" class="form-control" wire:model='old_pass'>
            @error('old_pass')
                 <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        {{-- <div class="form-group mb-4 px-5">

        </div> --}}

        <div class="form-group mb-4 px-5">
            <div class="row">
                <div class="col-md-6">
                    <label for="password">New Password:</label>
                    <input type="password" name="password" id="password" class="form-control" wire:model='password'>
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password">Confirm Password:</label>
                    <input type="password" name="password" id="password" class="form-control" wire:model='password_confirmation'>
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <a href="" class="btn"  style="width:15rem; background-color:#a40f2d; color:white"  data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="fa fa-trash"></i> Delete Account</a>
                </div>
                <button class="btn float-end" style="width:20%; background-color:#0da043; color:white" wire:click='submit'>
                    Update
                </button>
            </div>
            <!-- Delete Band Modal -->
            <div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Are you sure you want to delete your Account?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" wire:click ="deleteUser()" >Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <button class="btn float-end" style="width:20%; background-color:#740d21; color:white" wire:click='submit'>
                Update
            </button> --}}
        </div>
    </div>
</div>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap');

    h1{
        font-family: 'Poppinds', sans-serif;
        color:#fdfbfb;
        font-size: 4rem;
    }
  </style>
