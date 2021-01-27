@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <h2 class="navbar-brand">Penjualan</h2>
      </div>
      
    </div>
  </nav>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Penjualan</h4>
              <a href="/penjualan/tambah" class="btn btn-primary btn-link btn-sm" style="background-color:white;" role="button">Tambah Transaksi Penjualan</a>
            </div>
            <div class="card-body">
                <table id="input" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Total Harga</th>
                        <th>Setting</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($penjualan as $nomor=>$item)
                          <tr>
                              <td>{{$nomor+1}}</td>
                              <td>{{$item->tanggal_beli}}</td>
                              <td>{{$item->nama_pembeli}}</td>
                              <td>{{$item->produk->nama_produk}}</td>
                              <td>{{$item->barang_terjual}}</td>
                              <td>{{$item->keterangan}}</td>
                              <td>{{$item->total_harga}}</td>
                              <td>
                                <a href="/penjualan/{{$item->id}}/edit"><button type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i></button>
                                </a>
                                <form action="/penjualan/{{$item->id}}" method="POST" style="display:inline">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <a href="javascript:;" onclick="parentNode.submit();">                                      
                                    <button type="submit" class="btn btn-danger btn-link btn-sm">
                                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                  </a>
                              </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src=https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#input').DataTable();
    } );
  </script>
@endsection