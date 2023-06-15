<x-layout.auth.auth>

  <x-slot:title>
     Kirish
  </x-slot:title>

<div class="card-body login-card-body">
    <p class="login-box-msg">Kirish</p>

    <form action="{{ route('login') }}" method="POST" class="mb-3">
      @csrf

      <div class="input-group mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @else is-valid @enderror" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>

      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control @error('password') is-invalid @else is-valid @enderror" placeholder="Parolni kiriting">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Eslab qol
            </label>
          </div>
        </div>

        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        
      </div>
    </form>

    <p class="mb-0">Ro'yhatdan o'tmaganmisiz?
      <a href="{{ route('register') }}" class="text-center">Ro'yhatdan o'tish</a>
    </p>
  </div>

</x-layout.auth.auth>