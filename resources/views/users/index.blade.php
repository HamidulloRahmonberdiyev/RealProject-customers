<x-layout.main>

    <x-slot:title>
        Foydalanuvchilar
    </x-slot:title>

    <x-layout.header>
        Foydalanuvchilar
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('users.create') }}" class="btn btn-default text-success mb-3">Foydalanuvchi qo'shish <i class="fas fa-plus"></i></a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Foydalanuvchilar</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-primary">
                                        <th>ID</th>
                                        <th>Ism</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Amal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)                                        
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-info text-uppercase font-italic">{{ $user->role->name }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" type="submit" class="btn btn-default text-warning">Tahrirlash <i class="fas fa-pen"></i></a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onclick="return confirm('Haqiqatdan ham ushbu ma\'lumotni o\'chirmoqchimisiz?');" style="margin-left:140px; margin-top:-37px">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-default text-danger">O'chirish <i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.main>
