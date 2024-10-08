<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Student Result Management System - UECS3294 Advanced Web Application Development" />
    <meta name="author" content="P2_02" />
    <title>Student Result Management System</title>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">

    <style>
        .scrollable-notice {
            max-height: 170px;
            /* Set the maximum height to make it scrollable */
            overflow-y: auto;
            /* Enable vertical scrollbar */
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Student Result Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="searchresult" class="nav-link active">Check Result</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link active">Management</a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link active">Log in</a></li>

                    <!-- @if (Route::has('register'))
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link active">Register</a></li>
                    @endif -->
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header - set the background image for the header in the line below-->
    <header class="py-5 bg-image-full" style="background-image: url('images/background-image.jpg')">

    </header>
    <!-- Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Notice Board</h2>
                    <hr color="#000" />
                    <div class="scrollable-notice">
                        <ul>
                            @foreach($notices as $notice)
                            <li><a href="{{ route('show.one.notice', ['id' => $notice->id]) }}">{{ $notice->notice_title }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer-->
    @include('layouts.footer1')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>