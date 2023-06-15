<x-layout.main>

    <x-slot:title>
        Mijozlar
    </x-slot:title>
    
    <x-layout.header>
        Mijozlar
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">

            <div class="row mb-5">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('customers.search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Mijoz ismi">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <a href="{{ route('customers.create') }}" class="btn btn-default text-success mr-2 mb-3">Mijoz qo'shish <i class="fas fa-plus"></i></a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mijozlar</h3>

                            <div class="card-tools">
                                <form action="{{ route('filter') }}" method="GET">
                                    @csrf
                                    <div class="input-group input-group-sm" style="width:200px;">
                                        <select name="filter" class="form-control float-right">
                                            <option value="">Barchasi</option>
                                            @foreach ($addresses as $address)
                                                <option value="{{ $address->id }}">{{ $address->name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-filter"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-primary">
                                        <th>ID</th>
                                        <th>Ism</th>
                                        <th>Familiya</th>
                                        <th>Telefon</th>
                                        <th>Manzil</th>
                                        <th>Soni</th>
                                        <th>Qaytarildi</th>
                                        <th>Sana</th>
                                        <th>Faoliyat</th>
                                        <th>Amal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td><a href="{{ route('customers.edit', $customer->id) }}"
                                                    class="text-white">{{ $customer->name }}</a></td>
                                            <td><a href="{{ route('customers.edit', $customer->id) }}"
                                                class="text-white">{{ $customer->surname }}</a></td>
                                            <td class="text-primary">{{ $customer->phone }}</td>
                                            <td>{{ $customer->address->name }}</td>
                                            <td>{{ $customer->quantity == null ? 0 : $customer->quantity }}</td>
                                            <td>{{ $customer->returned == null ? 0 : $customer->returned }}</td>
                                            <td>{{ $customer->date->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-default" data-toggle="modal" data-target="#modal-default{{ $customer->id }}" role="button"><i class="fas fa-shopping-cart @if (now()->format('d') - $customer->date->format('d') <= 3)  text-success @elseif (now()->format('d') - $customer->date->format('d') <= 7) text-warning  @else text-danger  @endif"></i></a>
                                                <div class="modal fade" id="modal-default{{ $customer->id }}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h4 class="modal-title">Buyurtma</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                                            @method('PUT')
                                                          @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="inputSuccess">Soni</label>
                                                                <input type="number" name="quantity" value="{{ $customer->quantity }}" class="form-control is-valid @error('quantity') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="0">
                                                                @error('quantity')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                            
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="inputSuccess">Qaytarildi</label>
                                                                <input type="number" name="returned" value="{{ $customer->returned }}" class="form-control is-valid @error('returned') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="0">
                                                                @error('returned')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                            
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="inputSuccess">Sana</label>
                                                                <input type="text" name="date" value="{{ now()->format('d-m-Y') }}" class="form-control is-valid @error('date') is-invalid @else is-valid @enderror" id="inputSuccess">
                                                                @error('date')
                                                                  <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                          </div>
                                                          <input type="hidden" name="name" value="{{ $customer->name }}">
                                                          <input type="hidden" name="surname" value="{{ $customer->surname }}">
                                                          <input type="hidden" name="phone" value="{{ $customer->phone }}">
                                                          <input type="hidden" name="address_id" value="{{ $customer->address_id }}">
                                                        <div class="modal-footer justify-content-between">
                                                          <button type="button" class="btn btn-warning" data-dismiss="modal">Yopish</button>
                                                          <button type="submit" class="btn btn-primary">Saqlash</button>
                                                        </div>
                                                      </form>
                                                      </div>
                                                    </div>
                                                </div>                                
                                            </td>
                                            <td>
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                    <h4><i class="fa fa-ellipsis-v"></i></h4>
                                                </a>
                                                <div class="dropdown-menu p-3 text-white">
                                                    <div class="p-2"><a
                                                            href="{{ route('customers.edit', $customer->id) }}"
                                                            type="submit" class="btn btn-default text-warning">Tahrirlash <i
                                                                class="fas fa-pen"></i></a></div>
                                                    <div class="p-2">
                                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-default text-danger">Tashlash <i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $customers->links() }}

                </div>
            </div>
        </div>
    </section>
</x-layout.main>
