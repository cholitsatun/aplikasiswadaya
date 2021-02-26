@extends('admin.layout')
@section('content')
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
              <h4 class="card-title ">Edit Transaksi Penjualan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <form action="{{route('admin.penjualan.update', ['id' => $penjualan->id])}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" value="{{date("Y-m-d")}}" name="tanggal_beli" value="{{$penjualan->tanggal_beli}}">
            
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pembeli" value="{{$penjualan->nama_pembeli}}">
                      </div>
                      <div class="form-group">
                        <label for="product_id">Produk</label>
                        <select class="form-control selectpicker recalculate-produk" name="product_id" data-style="btn btn-link" id="product_id">
                            @foreach ($produk as $item)
                                <option data-price="{{$item->harga}}" value="{{$item->id}}"> {{$item->nama_produk}} </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{$penjualan->keterangan}}">
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Total Harga</label>
                        <input type="number" class="form-control total" name="total" readonly value="{{$penjualan->total_harga}}">
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
<script>
  function recalculatePrice(params) {
    var produk = document.querySelector('#product_id').value;
    var jumlah = parseInt(document.querySelector('.recalculate-jumlah').value);
    var hargaproduk = parseInt(document.querySelector('option[value="'+ produk + '"]').dataset.price);
    var input_total = document.querySelector('.total')

    if (!isNaN(jumlah)&& !isNaN(hargaproduk)) {
      let total = jumlah * hargaproduk
        input_total.value = total
    }
    else {
      input_total.value = ''
    }

  }

  document.querySelector('#product_id').addEventListener('change', function (params) {
    recalculatePrice()
  })
  document.querySelector('.recalculate-jumlah').addEventListener('input', function (params) {
    recalculatePrice()
  })
</script>
@endsection