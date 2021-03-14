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
              <h4 class="card-title ">Tambah Bahan Baku</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <form action="/bahanbaku" method="POST">
                {{ csrf_field() }}
                      <div class="form-group">
                        <label class="bmd-label-floating">Nama Bahan</label>
                        <input type="text" class="form-control" name="bahan">
                      </div>
                      @if ($errors->has('nama_bahan'))
                      <p class="text-danger">{{$errors->first('bahan')}}</p>
                      @endif 
                      <div class="form-group">
                        <label class="bmd-label-floating">Kategori</label>
                        <select class="form-control selectpicker" name="kategori" data-style="btn btn-link" id="kategori">                          
                            <option value=0>Bahan Dasar</option>                                                    
                            <option value=1>Bahan Lain</option>                                                    
                        </select>
                      </div>
                      @if ($errors->has('kategori'))
                      <p class="text-danger">{{$errors->first('kategori')}}</p>
                      @endif
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