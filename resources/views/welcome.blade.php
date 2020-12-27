@extends('layouts.app')
@section('content')
    <body class="antialiased bg-image" style="height: 400px; background-image: url({{asset('img/clinc2.jpg')}});background-repeat: no-repeat;background-size:100%; ">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-lg-9 " >
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome To Clinc System</h1>
                    </div>
                    @if (Route::has('login'))
                        <div class="text-center">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-dark text-lg">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-dark ">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>
    @endsection
</html>
