<x-layout.main>

    <x-slot:title>
        Manzillar
    </x-slot:title>

    <x-layout.header>
        Manzillar
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('addresses.create') }}" class="btn btn-default text-success mb-3">Manzil qo'shish <i class="fas fa-plus"></i></a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manzillar</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-primary">
                                        <th>ID</th>
                                        <th>Nomi</th>
                                        <th>Mijozlar soni</th>
                                        <th>Qo'shilgan sana:</th>
                                        <th>Amal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addresses as $address)                                        
                                    <tr>
                                        <td>{{ $address->id }}</td>
                                        <td>{{ $address->name }}</td>
                                        <td>{{ $address->customers->count() }}</td>
                                        <td>{{ $address->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('addresses.edit', $address->id) }}" type="submit" class="btn btn-default text-warning">Tahrirlash <i class="fas fa-pen"></i></a>
                                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" onclick="return confirm('Haqiqatdan ham ushbu ma\'lumotni o\'chirmoqchimisiz?');" style="margin-left:140px; margin-top:-37px">
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
                    {{ $addresses->links() }}
                </div>
            </div>
        </div>
    </section>

</x-layout.main>
