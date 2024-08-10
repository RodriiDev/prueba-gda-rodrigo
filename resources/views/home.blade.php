@extends('app')

@section('titulo')
    @guest
        Inicio de Sesión 
    @endguest

    @auth
        Customers
    @endauth
@endsection

@section('contenido')
    <div class="container d-flex justify-content-center mt-4 vh-90">
        @guest
            <div class="card p-4 shadow-sm" style="width: 22rem;">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    @if(!empty($mensaje))
                        <p class="bg-danger text-white p-2">
                            {{ $mensaje }}
                        </p>
                    @endif
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                        @if ($errors->has('usuario'))
                            <div class="text-danger">{{ $errors->first('usuario') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                        @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>                
            </div>
        @endguest

        @auth
            <div class="d-grid gap-3" style="width: 300px">
                <a type="button" class="btn btn-primary btn-block" href="{{ route('customer.create') }}">Registrar Customer</a>
                <a type="button" class="btn btn-secondary btn-block" href="{{ route('customer.index') }}">Consultar Customers</a>
            </div>
        @endauth

    
    </div> 

@endsection
