 @extends('welcome')

 @section('content')

 <div class="container">
    <div class="card" style="background-color:#AAC8A7; height:15rem">
        <h2 class="mt-3 text-dark" style="margin-left:16rem">Profile Settings</h2>
        <p class="text-dark" style="margin-left:16rem">Edit your name, avatar, etc.</p>
        <div class="card mx-auto" style="width:60%">
            <div class="row align-items-start">
                <div class="col-md-12 mt-3 inline-block">
                    <a class="links active-link" href="/profile">Profile</a>
                    <a class="links" href="/settings">Account Settings</a>
                    <a class="links" href="#">Subscription</a>
                </div>
            </div>

            <div class="row">
                <livewire:profile.index>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

<style scoped>
    .links{
        margin-left: 120px;
        text-decoration: none;
        color:black;
    }

    .links:hover{
        color:#596b30;
    }

    .active-link{
        border-bottom: 1px solid rgb(0, 0, 0);
        color: #578553;
    }


</style>

