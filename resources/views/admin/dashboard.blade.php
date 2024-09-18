<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <link rel="icon" href="{{ asset('assets-admin/img/icon/icon smart kas.png') }}">
  <title>Admin | Smart Kas</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets-admin/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets-admin/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/css/components.css') }}">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        {{-- <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('assets-admin/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('login.logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul> --}}
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Smart Kas</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SK</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                  class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Input Data</li>
            <li>
              <a class="nav-link" href="{{ route('admin.pemasukan.create') }}"><i
                  class="fas fa-plus"></i><span>Pemasukan</span></a>
            </li>
            <li>
              <a class="nav-link" href="{{ route('admin.pengeluaran.create') }}"><i
                  class="fas fa-minus"></i><span>Pengeluaran</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li>
              <a href="{{ route('admin.pemasukan.index') }}" class="nav-link"><i
                  class="fas fa-arrow-right"></i><span>Pemasukan</span></a>
            </li>
            <li>
              <a href="{{ route('admin.pengeluaran.index') }}" class="nav-link"><i
                  class="fas fa-arrow-left"></i><span>Pengeluaran</span></a>
            </li>
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="{{ route('login.logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i>
                Logout</button>
            </form>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Saldo</h4>
                  </div>
                  <div class="card-body">
                    Rp. {{ number_format($totalSaldo) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pemasukan</h4>
                  </div>
                  <div class="card-body">
                    Rp. {{ number_format($totalPemasukan) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengeluaran</h4>
                  </div>
                  <div class="card-body">
                    Rp. {{ number_format($totalPengeluaran) }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> Terjadi Kesalahan!</strong>
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  <form action="{{ route('admin.search') }}" method="GET">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="start_date"
                          value="request()->get('start_date') }}">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="end_date"
                          value="request()->get('end_date') }}">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.downloadPDFByDate', ['start_date' => request()->get('start_date'), 'end_date' => request()->get('end_date')]) }}"
                      class="btn btn-success">Download</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Semua Data</h4>
                  <div class="card-header-action">
                    <a href="{{ route('admin.downloadPDFAll') }}" class="btn btn-success">Download</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-bordered mb-0 text-center">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tangggal</th>
                          <th>Perincian</th>
                          <th>Pemasukan (Rp)</th>
                          <th>Pengeluaran (Rp)</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($mergeData as $data)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $data->tanggal }}</td>
                          <td>{{ $data->perincian }}</td>
                          <td>{{ number_format($data->pemasukan) }}</td>
                          <td>{{ number_format($data->pengeluaran) }}</td>
                          @empty
                          <div class="text-center">
                            <td colspan="12">
                              <b>No Data Available</b>
                            </td>
                          </div>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets-admin/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/popper.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('assets-admin/modules/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/chart.min.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets-admin/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets-admin/js/page/index.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets-admin/js/scripts.js') }}"></script>
  <script src="{{ asset('assets-admin/js/custom.js') }}"></script>
</body>

</html>