<x-layout.main>

    <x-slot:title>
        Rollar / Tahrirlash / {{ $role->name }}
    </x-slot:title>

      
    <x-layout.header>
        Rollar / Tahrirlash / {{ $role->name }}
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tahrirlash / {{ $role->name }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess"> Rol nomi</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control is-valid @error('name') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Rol nomi">
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
