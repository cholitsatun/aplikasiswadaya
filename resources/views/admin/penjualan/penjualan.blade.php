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

      @if($errors->any())
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span>            
          {{$errors->first()}}
        </span>
      </div>
      @endif

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
                              <td>
                                @foreach ($item->Produk as $produk)
                                    - {{$produk->nama_produk}} | Rp.{{$produk->pivot->harga}} | @.{{$produk->pivot->jumlah}} <br>
                                @endforeach
                              </td>
                              <td>{{$item->keterangan}}</td>
                              <td>{{$item->total_harga}}</td>
                              <td>
                                <form action="/penjualan/{{$item->id}}" method="POST" style="display:inline">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="button" id="hapus-{{$item->id}}" class="btn btn-danger btn-link btn-sm" onclick="hapus('hapus-{{$item->id}}')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                  </button>                                  
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

@section('customjs')
<script>
  function hapus(id) {
    Swal.fire({
      title: 'Apakah kamu yakin?',
      // text: "Data tidak bisa dikembalikan setelah terhapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(id).parentNode.submit();                  
      }
    })      
  }
</script>        
@endsection