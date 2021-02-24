@extends('admin.layout')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
              <h4 class="card-title ">Tambah Transaksi Penjualan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                <form action="{{route('admin.penjualan.store')}}" method="POST">
                {{ csrf_field() }}
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" value="{{date("Y-m-d")}}" name="tanggal_beli">
            
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pembeli">
                      </div>
                      <div class="form-group"> 
                        <label for="product_id">Produk</label>
                        <table class="table-common" id="dynamicTable">
                          <tr>
                            <td width="40%">
                              <select class="form-control selectpicker recalculate-produk" name="addmore[0][product_id]" data-style="btn btn-link" id="product_id">
                                @foreach ($produk as $item)
                                    <option value="{{$item->id}}"> {{$item->nama_produk}} </option>
                                @endforeach
                            </select>
                            </td>
                            <td><input type="number" class="form-control" name="addmore[0][harga]" placeholder="Harga"></td>
                            <td><input type="number" class="form-control" name="addmore[0][jumlah]" placeholder="Jumlah"></td>
                            <td>&nbsp;<button type="button" id="add"><i class="fa fa-plus"></i></button></td>
                          </tr>
                        </table>
                        {{-- <select class="form-control selectpicker recalculate-produk" name="product_id" data-style="btn btn-link" id="product_id">
                            @foreach ($produk as $item)
                                <option data-price="{{$item->harga}}" value="{{$item->id}}"> {{$item->nama_produk}} </option>
                            @endforeach
                        </select>
                        <input type="number" class="form-control" name="harga" value="harga" >
                        <input type="number"  class="form-control recalculate-jumlah" name="jumlah" value="jumlah"> --}}
                      </div>
                      {{-- <div class="form-group">
                        <label class="bmd-label-floating">Jumlah</label>
                        <input type="number"  class="form-control recalculate-jumlah" name="jumlah" >
                      </div> --}}
                      <div class="form-group">
                        <label class="bmd-label-floating">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Total Harga</label>
                        <input type="number" class="form-control total" name="total" readonly>
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
  let option = ""
  @foreach ($produk as $item)     
    option += '<option value='+ '"' + {{$item->id}} + '"' + '>' + '{{$item->nama_produk}}' +'</option>'        
  @endforeach
  console.log(option);
  // var myOptions = '@foreach ($produk as $item) <option value="{{$item->id}}"> {{$item->nama_produk}} </option> @endforeach';
  var i = 0;
  $("#add").click(function(){
      ++i;
      $("#dynamicTable").append('<tr><td width="40%"><select class="form-control selectpicker recalculate-produk" name="addmore['+i+'][product_id]" data-style="btn btn-link" id="product_id">' + option + '</select></td><td><input type="number" class="form-control" name="addmore['+1+'][harga]" placeholder="Harga"></td><td><input type="number" class="form-control" name="addmore['+i+'][jumlah]" placeholder="Jumlah"></td> <td>&nbsp;<button type="button" class="remove-tr"><i class="fa fa-trash"></button></td></tr>');
      
      //   //instantiate the new select as select2
      // $('select.select-new-' + x).select2();
  });
  $(document).on('click', '.remove-tr', function(){  
      $(this).parents('tr').remove();
  });  

  // function recalculatePrice(params) {
  //   var produk = document.querySelector('#product_id').value;
  //   var jumlah = parseInt(document.querySelector('.recalculate-jumlah').value);
  //   var hargaproduk = parseInt(document.querySelector('option[value="'+ produk + '"]').dataset.price);
  //   var input_total = document.querySelector('.total')

  //   if (!isNaN(jumlah)&& !isNaN(hargaproduk)) {
  //     let total = jumlah * hargaproduk
  //       input_total.value = total
  //   }
  //   else {
  //     input_total.value = ''
  //   }

  // }

  // document.querySelector('#product_id').addEventListener('change', function (params) {
  //   recalculatePrice()
  // })
  // document.querySelector('.recalculate-jumlah').addEventListener('input', function (params) {
  //   recalculatePrice()
  // })
</script>
@endsection