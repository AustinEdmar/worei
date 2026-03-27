@extends('layouts.auth')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light" style="
                           background: 
                    linear-gradient(rgba(218, 0, 123, 0.8), rgba(218, 0, 123, 0.8)),
                    url('./assets/img/close-up-women-hands-with-feminism-symbol.jpg'); 
                    background-size: cover; 
                    background-position: center; 
                    background-repeat: no-repeat; 
                    min-height: 100vh;">
        <div class="p-4  shadow rounded border border-2 shadow-sm bg-white" style="width: 100%; max-width: 380px;">
            <div class="text-center ">
                <a href="{{ route('login') }}">
                    <img src="./image/lev.png" alt="Loginho" class="login-logo" style="width: 110px;">
                </a>
            </div>

            <h4 class="text-center">Login</h4>
            <p class="text-muted text-center mb-2" style="font-size: 13px;">Faça seu login para continuar</p>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label" style="font-size: 13px;">Name</label>

                    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        style="height: 35px; font-size: 13px;">

                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">

                    <label for="email" class="form-label" style="font-size: 13px;">Email</label>

                    <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        style="height: 35px; font-size: 13px;">

                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <div class="mb-3">

                    <label for="cargo" class="form-label" style="font-size: 13px;">Cargo</label>

                    <input id="cargo" type="text" class="form-control form-control-sm" name="cargo"
                        value="{{ old('cargo') }}" placeholder="Ex: Advogada" style="height: 35px; font-size: 13px;">

                </div>


                <div class="mb-3">

                    <label for="role" class="form-label" style="font-size: 13px;">
                        Nível de Acesso
                    </label>

                    <select id="role" name="role" class="form-select form-select-sm @error('role') is-invalid @enderror"
                        style="font-size: 13px;">

                        <option value="" disabled selected>
                            Selecione o nível
                        </option>

                        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>
                            Staff
                        </option>

                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                    </select>

                    @error('role')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <div class="mb-3">

                    <label for="photo" class="form-label" style="font-size: 13px;">Foto</label>

                    <input id="photo" type="file" class="form-control form-control-sm" name="photo"
                        style="height: 35px; font-size: 13px;">

                </div>


                <div class="mb-3">

                    <label for="password" class="form-label" style="font-size: 13px;">Senha</label>

                    <input id="password" type="password"
                        class="form-control form-control-sm @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password" style="height: 35px; font-size: 13px;">

                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <div class="mb-3">

                    <label for="password_confirmation" class="form-label" style="font-size: 13px;">Confirmar Senha</label>

                    <input id="password_confirmation" type="password" class="form-control form-control-sm"
                        name="password_confirmation" required autocomplete="new-password"
                        style="height: 35px; font-size: 13px;">

                </div>


                <div class="mb-3 d-flex justify-content-between align-items-center" style="font-size: 12px;">

                    <div>

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="transform: scale(0.9);">

                        <label class="form-check-label" for="remember">
                            Lembrar-me
                        </label>

                    </div>


                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color:rgb(154, 53, 255);">

                        Esqueceu a senha?

                    </a>

                </div>


                <button type="submit" class="btn w-100 mb-2"
                    style="font-size: 14px; font-weight: bold; height: 36px; background-color: rgb(154, 53, 255); color: white;">

                    Registar

                </button>


                <div class="text-center mt-2" style="font-size: 12.5px;">

                    Ja tem uma conta?

                    <a href="{{ route('login') }}" style="color:rgb(154, 53, 255);">

                        Login

                    </a>

                </div>

            </form>
        </div>
    </div>
@endsection