<nav class="navbar navbar-expand-lg navbar-dark bg-white ">
    <!-- Container wrapper -->
    <div class="container-fluid">
    <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand " href="/">

                <h3>Bandify</h3>
            </a>

            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/band">Bands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Calendar</a>
                    </li>
                </ul>
            @endauth
        </div>

        <div class="d-flex align-items-center">

            @guest
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-right ">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>
            @endguest

            @auth

                <div class="dropdown">
                    <a
                        class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuAvatar"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >

                        <img
                        src="{{ asset((auth()->user()->profile ? 'storage/bandImgs/' . auth()->user()->profile : 'defaultProfile/pfp.jpg')) }}"
                        class="rounded-circle"
                        height="40"
                        width="40"
                        alt=""
                        loading="lazy"
                        style="border-radius: 90%"
                        />
                        {{-- <h5 style="text-align: center; margin-top: -8px; margin-bottom: -17px; background-image: url('{{  asset((auth()->user()->profile ? 'uploads/image_uploads/' . auth()->user()->profile : 'default_images/blank-profile.jpg')) }}')" class="p-3 text-dark">{{auth()->user()->username}}</h5> --}}
                    </a>

                    <ul

                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li>
                        <a class="dropdown-item" href="/profile">My profile</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li><hr class="dropdown-divider"/></li>
                        <li>
                        <a class="dropdown-item" href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            @endauth

        </div>
    </div>
</nav>
<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext');
    @import url('https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap');
    body{
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 24px;
        font-weight: 400;
        color: #212112;
        background-image: url('/asset/uns.jpg');
        background-position: cover;
        background-color:#354152
        background-size: 100%;
        /* background-color: #fff; */
        /* overflow-x: hidden; */
        /* transition: all 200ms linear; */
    }

    .navbar{
        padding:1%;
        /* background-color: #2b2f6a; */

    }

    .nav-link{
        color: #000;
        font-weight: 500;
        transition: all 200ms linear;
    }
    .nav-item:hover .nav-link{
        color: #596b30;
    }
    .nav-item.active .nav-link{
        color: #777;
    }
    .nav-link {
        position: relative;
        padding: 5px;
        display: inline-block;
    }
    /* .nav-item:after{
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 2px;
        content: '';
        background-color: #740d21;
        opacity: 0;
        transition: all 200ms linear;
    } */
    .nav-item:hover:after{
        bottom: 0;
        opacity: 1;
    }
    .nav-item.active:hover:after{
        opacity: 0;
    }
    .nav-item{
        position: relative;
        transition: all 200ms linear;
    }

     a span{
        font-family: 'Poppins', cursive;
        font-weight:700;
        font-size: 25px;
        color:#78a474;

    }

    h3{
        font-family: 'Delicious Handrawn', cursive;
        color:#78a474;
    }

    </style>
