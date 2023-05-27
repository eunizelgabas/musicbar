<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bandify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    @livewireStyles
</head>
<body >
    @include('layouts.navbar')
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h5>WELCOME TO BANDify</h5>
                <p>Come for the music, stay for the atmosphere</p>
                <a class="mx-auto" href="/login"> <button class="button">
                    Log in
                </button></a>
              </div>
              <div class="col-md-6">
                <img class="img-fluid"
                src="{{URL::to('/asset/giphy.gif')}}"
                width="1000rem"/>
              </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        @livewireScripts
</body>
</html>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap');

    .row{
        margin-top: 12%;
    }

    p{
        color:#353232;
    }

    h5{
        color:#78a474;
        font-size:70px;
        font-weight: 800;
        font-family: 'Delicious Handrawn', cursive;
    }

    .button {
    padding: 0.5em 1em;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    letter-spacing: 5px;
    text-transform: uppercase;
    color: #596b30;
    transition: all 1000ms;
    font-size: 15px;
    position: relative;
    overflow: hidden;
    outline: 2px solid #6fa46a;
    }

    button:hover {
    color: #ffffff;
    transform: scale(1.1);
    outline: 2px solid #73c76c;
    box-shadow: 4px 5px 17px -4px #9deb96;
    }

    button::before {
    content: "";
    position: absolute;
    left: -50px;
    top: 0;
    width: 0;
    height: 100%;
    background-color: #78a474;
    transform: skewX(45deg);
    z-index: -1;
    transition: width 1000ms;
    }

    button:hover::before {
    width: 250%;
    }

</style>
