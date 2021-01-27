@extends('admin.layout')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Input Produk</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <form action="{{route('admin.input_produk.store')}}" method="POST">
                  {{ csrf_field() }}                      
                  <div class="form-group">
                    <label for="product_id">Produk</label>
                    <select class="form-control selectpicker" name="product_id" data-style="btn btn-link" id="product_id">
                      @foreach ($produks as $produk)                              
                        <option value={{$produk->id}}> {{$produk->nama_produk}}</option>                          
                      @endforeach
                    </select>
                  </div>     
                  @if ($errors->has('product_id'))
                    <p class="text-danger">{{$errors->first('product_id')}}</p>
                  @endif                  
                  <div class="form-group">
                    <label class="bmd-label-floating">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_inp">
                  </div>                  
                  @if ($errors->has('jumlah_inp'))
                    <p class="text-danger">{{$errors->first('jumlah_inp')}}</p>
                  @endif                      
                  <div class="form-group">
                    <label class="bmd-label-floating">Tanggal Jadi</label>
                    <input type="date" value="{{date("Y-m-d")}}" class="form-control" name="tanggal_inp">
                  </div>                      
                  @if ($errors->has('tanggal_inp'))
                    <p class="text-danger">{{$errors->first('tanggal_inp')}}</p>
                  @endif                      
                  <input type="submit" class="btn btn-primary pull-right" value="Simpan">
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