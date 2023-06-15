<x-layout.main>

    <x-slot:title>
        Rollar
    </x-slot:title>

    <x-layout.header>
        Rollar
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('roles.create') }}" class="btn btn-default text-success mb-3">Rol qo'shish <i class="fas fa-plus"></i></a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rollar</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-primary">
                                        <th>ID</th>
                                        <th>Nomi</th>
                                        <th>Qo'shilgan sana:</th>
                                        <th>Amal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)                                        
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td class="text-uppercase font-italic">{{ $role->name }}</td>
                                        <td>{{ $role->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role->id) }}" type="submit" class="btn btn-default text-warning">Tahrirlash <i class="fas fa-pen"></i></a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onclick="return confirm('Haqiqatdan ham ushbu ma\'lumotni o\'chirmoqchimisiz?');" style="margin-left:140px; margin-top:-37px">
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
