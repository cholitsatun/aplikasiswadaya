@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <h2 class="navbar-brand">Stok Produk</h2>
      </div>
      
    </div>
  </nav>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Input Produk</h4>
              <a href="{{route('admin.input_produk.tambah')}}" class="btn btn-primary btn-link btn-sm" style="background-color:white;" role="button">Tambah Input Produk</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>                        
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Setting</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($input_produks as $nomor=>$item)
                          <tr>
                              <td>{{$nomor+1}}</td>
                              <td>{{$item->tanggal_inp}}</td>                              
                              <td>{{$item->Produk->nama_produk}}</td>                              
                              <td>{{$item->jumlah_inp}}</td>                              
                              <td>                                                                
                                <a href="{{route('admin.input_produk.edit', ['id' => $item->id]) }}">
                                  <button type="submit" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </a>
                                <form action="{{route('admin.input_produk.destroy', ['id' => $item->id]) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                            
                                    {{-- <a href="javascript:;" onclick="parentNode.submit();">         --}}
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
@endsection

@section('customjs')
  <script type="text/javascript" src=https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>
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