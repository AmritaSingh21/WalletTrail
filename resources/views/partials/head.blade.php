<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ 'WalletTrail' }}</title>


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<!-- Compressed CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">

<!-- Compressed JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.14/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.14/dist/js/uikit-icons.min.js"></script>

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 60px;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .main {
        margin-left: 0px;
        /* Same as the width of the sidenav */
        /* margin-right: 0px; */
        /* width: 1500px; */
        font-size: 15px;
        /* Increased text to enable scrolling */
        padding: 0px 0px;
    }

    .card2 {
        margin-left: 0px;
        /* Same as the width of the sidenav */
        /* margin-right: 0px; */
        width: 1000px;
    }

    .button{
        border-radius: 12px;
    }

    tr{
        height: 30px;
    }
    img{
        width: 40px;
        height: 40px;
    }
    .graph{
        width: 250px;
        height: 250px;
    }
    .fixedbar{
        position: fixed;
        width: 100%;
    }
    .container{
        margin-top: 50px;
    }
    .error{
        color: red;
    }



    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>