<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Bosh sahifa' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('frontend') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

        <!-- Navbar -->
        <x-layout.navbar></x-layout.navbar>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">OltinBuloq</span>
            </a>

            <!-- Sidebar -->
            <x-layout.sidebar></x-layout.sidebar>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @if (session('success'))
                <div class="col-lg-12">
                    <div class="alert  alert-success" id="alert" style="color:darkgreen">
                        <strong><i class="fa fa-info-circle"></i> Muvaffaqiyatli:</strong>
                        <em>{{ session('success') }}</em>
                            {{-- <button type="button" id="alertClose"class="btn btn-sm cookie-btn okbtn" data-dismiss="alert" aria-label="Close"><i class="fas fa-times" style="color:darkgreen;"></i></button> --}}
                    </div>
                </div>
            @endif

            {{ $slot }}

        </div>
        <!-- /.content-wrapper -->

        <aside class="control-sidebar control-sidebar-dark"></aside>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong> &copy; 2023</a>.</strong>
            Platforma asoschisi <a href="https://t.me/hamidullo_rahmonberdiyev">Hamidullo Rahmonberdiyev</a>.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>

    <script src="{{ asset('assets') }}/plugins/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/plugins/flot/plugins/jquery.flot.pie.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('assets') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('assets') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets') }}/plugins/chart.js/Chart.min.js"></script>
    

    <script type="text/javascript">
      setTimeout(function () {
          // Closing the alert
          $('#alert').alert('close');
      }, 4000);
  </script>

<script>
    $(function () {
      /*
       * DONUT CHART
       * -----------
       */
  @if ($customers->count() != 0)
  
      var donutData = [
        {
          label: 'Faol',
          data : {{ (100 / $customers->count()) * $customers_active->count() }},
          color: '#28a745'
        },
        {
          label: 'Passiv',
          data : {{ (100 / $customers->count()) * $customers_passive->count() }},
          color: 'rgb(216, 158, 12)'
        },
        {
          label: 'Nofaol',
          data : {{ (100 / $customers->count()) * $customers_noactive->count() }},
          color: '#dc3545'
        }
      ]
      $.plot('#donut-chart', donutData, {
        series: {
          pie: {
            show       : true,
            radius     : 1,
            innerRadius: 0.5,
            label      : {
              show     : true,
              radius   : 2 / 3,
              formatter: labelFormatter,
              threshold: 0.1
            }
  
          }
        },
        legend: {
          show: false
        }
      })
  
      @endif
      
      /*
       * END DONUT CHART
       */
  
    })
  
    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }
  </script>

</body>

</html>
