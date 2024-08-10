<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba GDA</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <header class="row bg-body-secondary">

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 fw-bold fs-3 mt-3 mb-3 ms-3">
            <a href="{{route('home')}}" style="text-decoration: none; color:black">Prueba GDA</a>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 text-end mt-4 mb-3">
            @guest
                <a class="btn btn-primary btn-sm fw-bold me-2" style="width:35%" href="{{route('home')}}">Iniciar Sesión</a>
                <a class="btn btn-success btn-sm fw-bold" style="width:35%" href="{{route('registrar')}}">Registrar Usuario</a>
            @endguest
            @auth

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm fw-bold" style="width:35%">Cerrar Sesión</button>
                </form>
            @endauth

        </div>
        
           
    </header>

    <main class="mt-4 ms-2">
        <label class="fw-bold fs-3 d-block text-center">
            @yield('titulo')
        </label>
        @yield('contenido')
    </main>

    <footer class="mt-4 ms-2 text-center">
        Rodrigo Soto Rojas {{now()->year}}
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>