<x-layout.main>

    <x-slot:title>
        Bosh sahifa
    </x-slot:title>

    <x-layout.header>
        Bosh sahifa
    </x-layout.header>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{ $addresses->count() }}</h3>
                      <p>Manzillar</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <a href="{{ route('addresses.index') }}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
        
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{ $customers_active->count() }}<sup style="font-size: 20px"></sup></h3>
                      <p>Faol Iste'molchilar</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('customers.active') }}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
        
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{ $customers_passive->count() }}</h3>
                      <p>Passiv Iste'molchilar</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('customers.passive') }}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
        
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{ $customers_noactive->count() }}</h3>
                      <p>Nofaol Iste'molchilar</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('customers.noactive') }}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Statistika
                  </h3>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div id="donut-chart" style="height:300px;"></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>@if($customers->count() != 0) {{ Str::limit((100 / $customers->count()) * $customers_active->count(), 4, '') }}% @endif</span>
                        <h5 class="description-header">{{ $customers_active->count() }} ta</h5>
                        <span class="description-text">Faol</span>
                      </div>
                    </div>
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>@if($customers->count() != 0) {{ Str::limit((100 / $customers->count()) * $customers_passive->count(), 4, '') }}% @endif</span>
                        <h5 class="description-header">{{ $customers_passive->count() }} ta</h5>
                        <span class="description-text">Passiv</span>
                      </div>
                    </div>
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>@if($customers->count() != 0) {{ Str::limit((100 / $customers->count()) * $customers_noactive->count(), 4, '') }}% @endif</span>
                        <h5 class="description-header">{{ $customers_noactive->count() }} ta</h5>
                        <span class="description-text">Nofaol</span>
                      </div>
                    </div>
                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-default"><i class="fas fa-caret"></i> 100%</span>
                        <h5 class="description-header">{{ $customers->count() }} ta</h5>
                        <span class="description-text">Jami</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
        
          </div>
    </section>

</x-layout.main>
