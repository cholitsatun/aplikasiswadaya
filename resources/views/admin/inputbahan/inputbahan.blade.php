@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <h2 class="navbar-brand">Input Bahan Baku</h2>
      </div>
      
    </div>
  </nav>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Input Bahan Baku</h4>
              <a href="/inputbahan/tambah" class="btn btn-primary btn-link btn-sm" style="background-color:white;" role="button">Tambah Stok Bahan Baku</a>
            </div>
            <div class="card-body">
                <table id="input" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Bahan Baku</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Setting</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($inputbahan as $nomor=>$item)
                          <tr>
                              <td>{{$nomor+1}}</td>
                              <td>{{$item->tanggal_inb}}</td>
                              <td>{{$item->bahanbaku->nama_bahan}}</td>
                              <td>{{$item->supplier}}</td>
                              <td>{{$item->jumlah_inb}}</td>
                              <td>
                                <a href="/inputbahan/{{$item->id}}/edit">
                                  <button type="submit" class="btn btn-primary btn-link btn-sm"><i class="material-icons">edit</i></button>
                                </a>
                                <form action="/inputbahan/{{$item->id}}" method="POST" style="display:inline">
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