@extends('admin.layout')
@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <p class="navbar-brand">Laporan Hari Ini</p>
        </div>        
      </div>
    </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-pencil"></i>
                  </div>
                  <p class="card-category">Jumlah Bahan Baku Masuk</p>
                  <h3 class="card-title">{{$bahan_masuk}}
                    <small>Bahan Baku</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-pencil"></i>
                  </div>
                  <p class="card-category">Jumlah Bahan Baku Terpakai</p>
                  <h3 class="card-title">
                    {{$bahan_terpakai}}
                    <small>Bahan Baku</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <p class="card-category">Jumlah Produksi Produk</p>
                  <h3 class="card-title">
                    {{$produksi_produk}}
                    <small>Produk</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <p class="card-category">Jumlah Produk Terjual</p>
                  <h3 class="card-title">
                    {{$penjualan}}
                    <small>Produk</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection