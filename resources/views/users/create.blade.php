<x-layout.main>

    <x-slot:title>
        Foydalanuvchilar /  Foydalanuvchi qo'shish
    </x-slot:title>

    <x-layout.header>
        Foydalanuvchilar /  Foydalanuvchi qo'shish
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Foydalanuvchi qo'shish</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Ism</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control is-valid @error('name') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Ism">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control is-valid @error('email') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Parol</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control is-valid @error('password') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Parol">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Parolni tasdiqlang</label>
                                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control is-valid @error('confirm_password') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Parolni tasdiqlang">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Rol</label>
                                    <select name="role_id" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>    
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success">Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.main>
