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
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<style>
  input[type="number"]::-webkit-outer-spin-button,
  input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
  }

  input[type="number"] {
      -moz-appearance: textfield;
  }
</style>
<!-- /END GA --></head>

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
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets-admin/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
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
            <a href="index.html">Smart Kas</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SK</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Input Data</li>
            <li>
              <a class="nav-link" href="{{ route('admin.pemasukan.create') }}"><i class="fas fa-plus"></i><span>Pemasukan</span></a>
            </li>
            <li class="active">
              <a class="nav-link" href="{{ route('admin.pengeluaran.create') }}"><i class="fas fa-minus"></i><span>Pengeluaran</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li>
              <a href="{{ route('admin.pemasukan.index') }}" class="nav-link"><i class="fas fa-arrow-right"></i><span>Pemasukan</span></a>
            </li>
            <li>
              <a href="{{ route('admin.pengeluaran.index') }}" class="nav-link"><i class="fas fa-arrow-left"></i><span>Pengeluaran</span></a>
            </li>
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="{{ route('login.logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Logout</button>
            </form>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Pengeluaran</h4>
                </div>
                @if (Session::has('success'))
                  <div class="alert alert-primary">
                    {{ session::get('success') }}
                  </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('admin.pengeluaran.store') }}" method="post">
                      @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="pengeluaran">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Perincian</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="perincian"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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