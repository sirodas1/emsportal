<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GhCare | Login</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-md-5">
                <br>
                <div class="card w-100 py-5">
                    <div class="row justify-content-center my-1">
                        <div class="col-4">
                            <img src="/img/ghcare.png" class="img img-fluid">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <span class="form-header">EMERGENCY UNIT LOGIN</span>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>