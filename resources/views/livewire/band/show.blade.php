<div>
    {{-- <button type="button" class="btn btn-warning float-end" wire:click='logout' style="margin-left:20px" >
        Log out
    </button> --}}
    <button type="button" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#createModal" >
        <i class="fa-solid fa-pen"></i>
    </button>
    {{-- Create Band Modal --}}
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header " style="background-color:cornflowerblue; color:black">
                    <h1 class="modal-title fs-5 " id="staticBackdropLabel">Create New Band</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" wire:submit.prevent='addBand()'>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="band_name">Name:</label><br>
                                <input type="text" name="" id="band_name" class="form-control  @error('band_name') is-invalid @enderror" wire:model='band_name'>
                                @error('band_name')
                                <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="founder">Founder:</label><br>
                                <input type="text" name="" id="loc" class="form-control  @error('founder') is-invalid @enderror" wire:model='founder'>
                                @error('founder')
                                <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="rate">Rate:</label><br>
                                <input type="number" name="" id="rate" class="form-control  @error('rate') is-invalid @enderror" wire:model='rate'>
                                @error('rate')
                                <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="talent_fee">Talent Fee:</label><br>
                            <input type="number" name="" id="loc" class="form-control  @error('talent_fee') is-invalid @enderror" wire:model='talent_fee'>
                            @error('talent_fee')
                            <p class="text-danger text-sm">{{$message}}</p>
                            @enderror

                            </div>

                        </div>
                        <div class="elements mb-4">
                            <label for="genre">Genre:</label><br>
                                <select name="" id="" wire:model.defer="genre" class="form-select  @error('genre') is-invalid @enderror">
                                    <option value="">Select Genre</option>
                                    <option value="Rock">Rock</option>
                                    <option value="Pop">Pop</option>
                                    <option value="Reggae">Reggae</option>
                                    <option value="Acoustic">Acoustic</option>
                                    <option value="Classical">Classical</option>
                                </select>

                                @error('genre')
                                <p class="text-danger text-sm">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="elements mb-4">
                            <label for="loc">Location:</label><br>
                            <input type="text" name="" id="loc" class="form-control  @error('location') is-invalid @enderror" wire:model='location'>
                            @error('location')
                            <p class="text-danger text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="elements mb-4">
                            <label for="description">Description:</label><br>
                            <textarea  name="description" id="description" class="form-control  @error('description') is-invalid @enderror" wire:model='description'></textarea>
                            @error('description')
                            <p class="text-danger text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="elements mb-4">
                            <label for="image">Image:</label>
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" class="img d-block mt-2" style="width:100px" alt="">
                            @endif
                            <div class="mt-2">
                                <input type="file" name="image" class="form-control" wire:model="image">
                            </div>
                            @error('image')
                            <p class="text-danger text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary " id="save_btn" >Create</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
     .modal-backdrop {
        display: none;
    }

</style>
