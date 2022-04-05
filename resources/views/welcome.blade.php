<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>AVITA</title> --}}
    <title>ASHPlan | Media | CRM</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            padding-top: 15%;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: rebeccapurple;
            padding: 15px 40px;
            margin: 21px;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 25px;
            border: 2px solid rebeccapurple;
        }



        .links>a:hover {
            color: white;
            background-color: rebeccapurple;
            padding: 15px 40px;
            margin: 21px;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            border: 2px solid rebeccapurple;
        }


        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="content">
        <div class="title m-b-md">
            <img src="{{ asset('images/logo.png') }}" style="width:250px;">
        </div>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="center-center links">
                    @auth
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>

</html>
