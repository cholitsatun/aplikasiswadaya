@extends('admin.layout')
@section('content')
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
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <form action="{{route('admin.inputbahan.store')}}" method="POST">
                {{ csrf_field() }}
                      <div class="form-group">
                        <label for="bahanbaku_id">Bahan Baku</label>
                        <select class="form-control selectpicker" name="bahanbaku_id" data-style="btn btn-link" id="bahanbaku_id">
                            @foreach ($bahanbaku as $item)
                                <option value={{$item->id}}> {{$item->nama_bahan}} {{$item->kategori == 1 ? '(Bahan Lain)' : ''}}</option>
                            @endforeach
                        </select>
                      </div>
                      @if ($errors->has('bahanbaku_id'))
                      <p class="text-danger">{{$errors->first('bahanbaku_id')}}</p>
                      @endif
                      <div class="form-group">
                        <label class="bmd-label-floating">Supplier</label>
                        <input type="text" class="form-control" name="supplier">
                      </div>
                      @if ($errors->has('supplier'))
                      <p class="text-danger">{{$errors->first('supplier')}}</p>
                      @endif
                      <div class="form-group">
                        <label class="bmd-label-floating">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah">
                      </div>
                      @if ($errors->has('jumlah_inb'))
                      <p class="text-danger">{{$errors->first('jumlah')}}</p>
                      @endif
                      <div class="form-group">
                        <label class="bmd-label-floating">Tanggal</label>
                        <input type="date" value="{{date("Y-m-d")}}" class="form-control" name="tanggal">
                      </div>
                      @if ($errors->has('tanggal_inb'))
                      <p class="text-danger">{{$errors->first('tanggal')}}</p>
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