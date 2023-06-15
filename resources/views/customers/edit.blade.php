<x-layout.main>

    <x-slot:title>
        Mijozlar /  Tahrirlash / {{ $customer->name }}
    </x-slot:title>

    <x-layout.header>
        Mijozlar /  Tahrirlash / {{ $customer->name }}
    </x-layout.header>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tahrirlash / {{ $customer->name }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                
                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Ism</label>
                                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control is-valid @error('name') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Ism">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Familiya</label>
                                    <input type="text" name="surname" value="{{ $customer->surname }}" class="form-control is-valid @error('surname') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="Familiya">
                                    @error('surname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Telefon raqam</label>
                                    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control is-valid @error('phone') is-invalid @else is-valid @enderror" id="inputSuccess" placeholder="+998 ">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess">Manzilni tanlang</label>
                                    <select name="address_id" class="form-control">
                                        @foreach ($addresses as $address)
                                            <option value="{{ $address->id }}" {{ $address->id == $customer->address_id ? ' selected' : '' }}>{{ $address->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('address_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <table class="table table-hover">
                                    <tbody>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                Buyurtma
                                            </td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td>
                                                <div class="p-0">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="inputSuccess">Soni</label>
                                                                <input type="number" name="quantity" value="{{ $customer->quantity }}"
                                                                    class="form-control is-valid @error('quantity') is-invalid @else is-valid @enderror"
                                                                    id="inputSuccess" placeholder="0">
                                                                @error('quantity')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
            
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="inputSuccess">Qaytarildi</label>
                                                                <input type="number" name="returned" value="{{ $customer->returned }}"
                                                                    class="form-control is-valid @error('returned') is-invalid @else is-valid @enderror"
                                                                    id="inputSuccess" placeholder="0">
                                                                @error('returned')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
            
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="inputSuccess">Sana</label>
                                                                <input type="text" name="date"
                                                                    value="{{ $customer->date->format('d-m-Y') }}"
                                                                    class="form-control is-valid @error('date') is-invalid @else is-valid @enderror"
                                                                    id="inputSuccess">
                                                                @error('date')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="form-group">
                                    <button class="btn btn-default text-success">Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.main>
