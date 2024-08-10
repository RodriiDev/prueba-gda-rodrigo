@extends('app')

@section('titulo')
    Registrar Usuario
@endsection

@section('contenido')
    <div class="container d-flex justify-content-center mt-4 vh-90">
        <div class="card p-4 shadow-sm" style="width: 22rem;">
            <form action="{{route('registrar')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                    @if ($errors->has('usuario'))
                        <div class="text-danger">{{ $errors->first('usuario') }}</div>
                    @endif     
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo">
                    @if ($errors->has('correo'))
                        <div class="text-danger">{{ $errors->first('correo') }}</div>
                    @endif  
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                    @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif  
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirma tu contraseña">
                    @if ($errors->has('password_confirmation'))
                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                    @endif  
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection