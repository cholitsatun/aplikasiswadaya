@extends('admin.layout')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
  option[value=""][disabled] {
        display: none;
      }
</style>
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
                        <input type="date" class="form-control" value="{{date("Y-m-d")}}" name="tanggal_beli">
            
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pembeli">
                      </div>
                      <div class="form-group"> 
                        <label for="product_id">Produk</label>
                        <table class="table-responsive" id="dynamicTable">
                          <tr>
                            <td>
                              <select name="addmore[0][product_id]" data-style="btn btn-link" id="product_id">
                                <option value="" selected="true" disabled="true" hidden="true">--Pilih Produk--</option>
                                @foreach ($produk as $item)
                                    <option value="{{$item->id}}"> {{$item->nama_produk}} </option>
                                @endforeach
                            </select>
                            </td>
                            <td><input type="number" class="calculate-harga" name="addmore[0][harga]" placeholder="Harga"></td>
                            <td><input type="number" class="calculate-jumlah" name="addmore[0][jumlah]" placeholder="Jumlah"></td>
                            <td>&nbsp;<button type="button" id="add"><i class="fa fa-plus"></i></button></td>
                          </tr>
                        </table>

                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                      </div>
                      <div class="form-group">
                        <label class="bmd-label-floating">Total Harga</label>
                        <input type="number" id="total" class="form-control total" name="total" readonly>
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
  var myOptions = '@foreach ($produk as $item) <option value="{{$item->id}}"> {{$item->nama_produk}} </option> @endforeach';
  var i = 0;
  $("#add").click(function(){
      ++i;
      $("#dynamicTable").append('<tr><td><select name="addmore['+i+'][product_id]" data-style="btn btn-link" id="product_id"><option value="" selected="true" disabled="true" hidden="true">--Pilih Produk--</option>' + myOptions + '</select></td><td><input type="number" class="calculate-harga" name="addmore['+1+'][harga]" placeholder="Harga"></td><td><input type="number" class="calculate-jumlah" name="addmore['+i+'][jumlah]" placeholder="Jumlah"></td> <td>&nbsp;<button type="button" class="remove-tr"><i class="fa fa-trash"></button></td></tr>');
      
      document.querySelectorAll('.calculate-jumlah').forEach((element) => {
        element.addEventListener('input', getHarga)
      })
      document.querySelectorAll('.calculate-harga').forEach((element) => {
        element.addEventListener('input', getHarga)
      })
  });
  $(document).on('click', '.remove-tr', function(){  
      $(this).parents('tr').remove();
  });  

  function getHarga() {
    const listTagTR = document.querySelectorAll('tr')
    const listInputJumlah = document.querySelectorAll('.calculate-jumlah')
    const listInputHarga = document.querySelectorAll('.calculate-harga')

    let dataTotal = 0
    for (let index = 0; index < listTagTR.length; index++) {
      const harga = listInputHarga[index].value
      const jumlah = listInputJumlah[index].value

      if (!isNaN(harga) && !isNaN(jumlah)) {
        dataTotal += harga * jumlah
      }
      
    }

    document.querySelector('#total').value = dataTotal
  }

document.querySelectorAll('.calculate-jumlah').forEach((element) => {
  element.addEventListener('input', getHarga)
})

document.querySelectorAll('.calculate-harga').forEach((element) => {
  element.addEventListener('input', getHarga)
})


  // function total()
  // {
  //   var sum = 0;
  //   $('#dynamicTable').each(function() {
  //     var jumlah = parseInt(document.querySelector('.calculate-jumlah').value);
  //     var hargaproduk = parseInt(document.querySelector('.calculate-harga').value);
  //     var subtotal = (jumlah*hargaproduk)
  //     sum+=subtotal;
  //     // $(this).find('.amount').text(''+amount);
  //   });
  //   $('#total').text(sum);
  // }
  // document.querySelector('.calculate-harga').addEventListener('change', function (params) {
  //   total()
  // })
  // document.querySelector('.calculate-jumlah').addEventListener('input', function (params) {
  //   total()
  // })

  // function subtotal(params) {
  //   var jumlah = parseInt(document.querySelector('.calculate-jumlah').value);
  //   var hargaproduk = parseInt(document.querySelector('.calculate-harga').value);
  //   // var input_total = document.querySelector('.total')

  //   if (!isNaN(jumlah)&& !isNaN(hargaproduk)) {
  //     let total = jumlah * hargaproduk
  //       // input_total.value = total
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