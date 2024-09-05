@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 85vh;">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body p-5">

                <!-- Login with Google Button -->
                <div class="text-center mb-3">
                    <a href="/auth/google/redirect" class="btn btn-outline-secondary btn-lg btn-block">
                        <i class="bi bi-google"></i> Iniciar sesión con Google
                    </a>
                </div>

                <!-- Login with GitHub Button -->
                <div class="text-center mb-3">
                    <a href="/auth/github/redirect" class="btn btn-outline-secondary btn-lg btn-block">
                        <i class="bi bi-github"></i> Iniciar sesión con GitHub
                    </a>
                </div>

                <!-- Divider -->
                <div class="d-flex align-items-center my-4">
                    <hr class="flex-grow-1">
                    <span class="mx-2 text-muted">O</span>
                    <hr class="flex-grow-1">
                </div>

                <!-- Email and Password Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Introduce tu correo">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Introduce tu contraseña">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Recuérdame
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection