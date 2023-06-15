<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Asosiy</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="width:180px">
    
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><i class="fas fa-users mr-2"></i> Mijozlar</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="{{ route('customers.index') }}" class="dropdown-item">Mijozlar</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="{{ route('customers.create') }}" class="dropdown-item">Mijoz yaratish</a>
                  </li>
                </ul>
              </li>
    
              <li class="dropdown-divider"></li>
    
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><i class="fas fa-map-marker-alt mr-2"></i> Manzillar</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="{{ route('addresses.index') }}" class="dropdown-item">Manzillar</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="{{ route('addresses.create') }}" class="dropdown-item">Manzil yaratish</a>
                  </li>
                </ul>
              </li>

            </ul>
          </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <h5><i class="fas fa-search"></i></h5>
            </a>
            <div class="navbar-search-block">
                <form action="{{ route('customers.search') }}" method="GET" class="form-inline">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="search" type="search"
                            placeholder="Mijoz ismini kiriting" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <h4><i class="far fa-user-circle"></i></h4>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item">
                    <div class="media mb-2">
                        <p><img src="{{ asset('assets') }}/dist/img/user.png" class="img-circle mr-3 elevation-2" alt="User Image" style="width:30px"> {{ auth()->user()->name }}</p>
                    </div>
                    <div class="media mb-2">
                        <p><i class="fa fa-envelope text-warning mr-2" style="font-size:23px"></i> {{ auth()->user()->email }}</p>
                    </div>
                    <div class="media mb-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-default text-danger">Chiqish <i class="fa fa-arrow-right"></i></button>
                        </form>
                    </div>
                </a>
            </div>
        </li>   
    </ul>
</nav>
