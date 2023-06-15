<x-layout.auth.auth>

    <x-slot:title>
       Ro'yhatdan o'tish
    </x-slot:title>

    <div class="card-body login-card-body">
        <p class="login-box-msg">Ro'yhatdan o'tish</p>

        <form action="{{ route('register') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @else is-valid @enderror" placeholder="Ism">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @else is-valid @enderror"
                    placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @else is-valid @enderror" placeholder="Parol">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @else is-valid @enderror" placeholder="Parolni tasdiqlang">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Saqlash</button>
                </div>
            </div>
        </form>

        <p class="mb-0">Ro'yhatdan o'tganmisiz?
            <a href="{{ route('login') }}" class="text-center">Kirish</a>
        </p>
    </div>

</x-layout.auth.auth>
