@extends('admin.layout')
@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <p class="navbar-brand">Laporan Minggu Ini Dari Tanggal {{\Carbon\Carbon::now()->startOfWeek()->format('d')}} - {{\Carbon\Carbon::now()->endOfWeek()->format('d')}}</p>
        </div>        
      </div>
    </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-pencil"></i>
                  </div>
                  <p class="card-category">Jumlah Bahan Baku Masuk</p>
                  <h3 class="card-title">{{$total_bahan_masuk}}
                    <small>Bahan Baku</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Bahan Masuk</th>                                                  
                          <th>Jumlah</th>                                                    
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($bahans_masuk as $nomor=>$bahan)
                          <tr>
                            <td>{{$nomor+1}}</td>
                            <td>{{$bahan["nama_bahan"]}}</td>
                            <td>{{$bahan["jumlah"]}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-pencil"></i>
                  </div>
                  <p class="card-category">Jumlah Bahan Baku Terpakai</p>
                  <h3 class="card-title">
                    {{$total_bahan_terpakai}}
                    <small>Bahan Baku</small>
                  </h3>
                </div>
                <div class="card-footer">                  
                  <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Bahan Terpakai</th>                                                  
                          <th>Jumlah</th>                                                    
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($bahans_terpakai as $bahan)
                          <tr>                                                      
                            <td>{{$bahan["no"]}}</td>
                            <td>{{$bahan["nama_bahan"]}}</td>
                            <td>{{$bahan["jumlah"]}}</td>                            
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <p class="card-category">Jumlah Produksi Produk</p>
                  <h3 class="card-title">
                    {{$total_produksi_produk}}
                    <small>Produk</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Produk</th>                                                  
                          <th>Jumlah</th>                                                    
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($produksi_produk as $nomor=>$produk)
                          <tr>
                            <td>{{$nomor+1}}</td>
                            <td>{{$produk["nama_produk"]}}</td>
                            <td>{{$produk["jumlah"]}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>                                    
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
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