@extends('admin.layout')
@section('content')
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
              <h4 class="card-title ">Edit Bahan Baku</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <form action="{{route('admin.bahanbaku.update', ['id' => $bahan->id])}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                      <div class="form-group">
                        <label class="bmd-label-floating">Nama Bahan</label>
                        <input type="text" class="form-control" name="bahan" value="{{$bahan->nama_bahan}}">
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Kategori</label>
                        <select class="form-control selectpicker" name="kategori" data-style="btn btn-link" id="kategori">                          
                          <option value=0 {{ $bahan->kategori == 0 ? 'selected' : '' }}>Bahan Dasar</option>                                                    
                          <option value=1 {{ $bahan->kategori == 1 ? 'selected' : '' }}>Bahan Lain</option>                                         
                        </select>                                                           
                      </div>
                      <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </form>
                </div>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>   
@endsection