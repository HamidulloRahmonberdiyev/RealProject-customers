<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets') }}/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Qidiruv" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
        <li class="nav-item">
          <a href="#" class="nav-link  {{ Request::is(['customers', 'customers/*']) ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Mijozlar
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('customers.create') }}" class="nav-link  {{ Request::is('customers/create') ? 'active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Mijoz qo'shish</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('customers.index') }}" class="nav-link  {{ Request::is('customers') ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>Barcha mijozlar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link  {{ Request::is(['addresses', 'addresses/*']) ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-marker-alt"></i>
            <p>
              Manzillar
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('addresses.create') }}" class="nav-link  {{ Request::is('addresses/create') ? 'active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Manzil qo'shish</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('addresses.index') }}" class="nav-link  {{ Request::is('addresses') ? 'active' : '' }}">
                <i class="fas fa-map-marker-alt nav-icon"></i>
                <p>Barcha manzillar</p>
              </a>
            </li>
          </ul>
        </li>

        @if (auth()->user()->role->name == 'admin' )
        <li class="nav-header">ADMIN</li>
        <li class="nav-item">
          <a href="{{ route('roles.index') }}" class="nav-link  {{ Request::is('roles') ? 'active' : '' }}">
            <i class="nav-icon fa fa-key text-danger"></i>
            <p class="text">Rollar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link  {{ Request::is('users') ? 'active' : '' }}">
            <i class="nav-icon far fa-user text-success"></i>
            <p>Foydalanuvchilar</p>
          </a>
        </li>
        @endif

      </ul>
    </nav>
  </div>