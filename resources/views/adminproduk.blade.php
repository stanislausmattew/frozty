<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoidp.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index" class="logo d-flex align-items-center">
        <img src="assets/img/logoidp.png" alt="">
        <span class="d-none d-lg-block">Dasbor Frozty</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/logoidp.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Selamat datang, {{$userLoggedIn->Nama}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{$userLoggedIn->Nama}}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminakun">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('/logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/index">
          <i class="bi bi-grid"></i>
          <span>Manajemen Pengguna</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/adminakun">
          <i class="bi bi-person"></i>
          <span>Akun</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="admincreate">
          <i class="bi bi-card-list"></i>
          <span>Buat Akun</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link" href="adminproduk">
          <i class="bi bi-card-list"></i>
          <span>Tambah Product</span>
        </a>
      </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="adminorder">
            <i class="bi bi-card-list"></i>
            <span>Cek Pesanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="adminlaporan">
            <i class="bi bi-card-list"></i>
            <span>Laporan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="adminpromo">
            <i class="bi bi-card-list"></i>
            <span>Promo</span>
            </a>
        </li>
      <!-- End Register Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dasbor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/index">Beranda</a></li>
          <li class="breadcrumb-item active">Manajemen Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                  <!-- Reports -->
                  <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Daftar Product</h5>

                          <table class="table table-borderless datatable">
                              <thead>
                                  <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Tindakan</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @php
                                    @endphp
                                    @foreach ($listproduct as $lp)
                                        <tr>
                                            <th scope="row">{{$lp->id}}</th>
                                            <td>{{$lp->Nama}}</td>
                                            @if ($lp->Status == 1)
                                                <td>Aktif</td>
                                            @else
                                                <td>Nonaktif</td>
                                            @endif
                                            <td>
                                                @if ($lp->Status == 0)
                                                    <a href="{{url('/Aktif/'.$lp->id)}}"><span class="badge bg-success">Aktifkan</span></a>
                                                @else
                                                    <a href="{{url('/Hapus/'.$lp->id)}}"><span class="badge bg-danger">Nonaktifkan</span></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                              </tbody>
                          </table>

                        </div>


                      </div>
                      <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                  <h5 class="card-title text-center pb-0 fs-4">Tambah Produk</h5>
                                  <p class="text-center small">Masukkan detil data produk</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate action="adminproduk" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Nama Produk</label>
                                        <input type="text" name="nama" class="form-control" id="nama" required>
                                        <div class="invalid-feedback">Mohon isi dengan nama produk!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Unggah Gambar</label>
                                        <input class="form-control" type="file" id="gambar" name="gambar" required>
                                        <div class="invalid-feedback">Mohon unggah Logo produk!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Tambah Produk</button>
                                    </div>
                                </form>
                                  @if (Session::has('msg'))
                                  <div style="color: green">
                                      <span>{{ Session::get('msg'); }}</span>
                                  </div>
                                  @endif
                              </div>
                        </div>
                    </div>
                    </div><!-- End Reports -->
                </div>
              </div>

        </div>
      </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Frozty</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
