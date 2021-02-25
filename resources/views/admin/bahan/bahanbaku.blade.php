@extends('admin.layout')

@section('customcss')
<style>
  .kanan {
    float: right;
  }
</style>
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <h2 class="navbar-brand">Stok Bahan Baku</h2>
      </div>
      
    </div>
  </nav>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Stok Bahan Baku {{$keterangan ?? 'Keseluruhan'}}</h4>
              <a href="{{route('admin.bahanbaku.index_bahan_dasar')}}" class="btn btn-primary btn-link btn-sm" style="background-color:white;" role="button">Bahan Baku Dasar</a>
              <a href="{{route('admin.bahanbaku.index_bahan_lain')}}" class="btn btn-primary btn-link btn-sm" style="background-color:white;" role="button">Bahan Baku Lain</a>
              <a href="/bahanbaku/tambah" class="btn btn-primary btn-link btn-sm kanan" style="background-color:white;" role="button">Tambah Bahan Baku</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan Baku</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Setting</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($bahan as $nomor=>$item)
                          <tr>
                              <td>{{$nomor+1}}</td>
                              <td>{{$item->nama_bahan}}</td>
                              <td>{{$item->stok_bahan}}</td>
                              <td>{{$item->kategori == 0 ? 'bahan dasar' : 'bahan lain'}}</td>
                              <td>
                                <a href="{{route('admin.bahanbaku.edit', ['id' => $item->id]) }}">
                                  <button type="submit" class="btn btn-primary btn-link btn-sm"><i class="material-icons">edit</i></button>
                                </a>
                                <form action="{{route('admin.bahanbaku.destroy', ['id' => $item->id]) }}" method="POST" style="display:inline">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <a href="javascript:;" onclick="parentNode.submit();">
                                    <button type="submit" class="btn btn-primary btn-link btn-sm"><i class="material-icons">delete</i></button>
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

        $('#example').DataTable();


        $('#bahan_dasar').click(function(){ 
          $.ajax({
              type: 'GET',
              url: '/bahanbaku/bahan_dasar',            
              success: function(data){
                  console.log(data.data);
              },
              error: function(xhr){
                  console.log(xhr.responseText);
              }
          });
        });

    });
  </script>
@endsection