@extends('admin.layout')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <h2 class="navbar-brand">Laporan</h2>
      </div>      
    </div>
</nav> 
<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="padding-left: 50px; padding-bottom: 30px;">
                <br/>
    {{-- <a href="/inputbahan/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Bahan Baku</th>
                <th>Supplier</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($inputbahan as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$item->tanggal_inb}}</td>
                <td>{{$item->bahanbaku->nama_bahan}}</td>
                <td>{{$item->supplier}}</td>
                <td>{{$item->jumlah_inb}}</td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}

    <h5>Laporan Bahan Baku Berdasar Tanggal</h5> <br/>
    <form action="{{ route('admin.laporan.pdf') }}" method="get">
            <input type="text" id="created_at" name="date" class="form-control col-md-3">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Filter</button>
            </div>
            <a target="_blank" class="btn btn-primary ml-2" id="exportpdf">Export PDF</a>
    </form>


</div>
    </div>
        </div>
            </div>
                </div>  
@endsection
@section('customjs')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    //KETIKA PERTAMA KALI DI-LOAD MAKA TANGGAL NYA DI-SET TANGGAL SAA PERTAMA DAN TERAKHIR DARI BULAN SAAT INI
    jQuery(document).ready(function() {
    let start = moment().startOf('month')
    let end = moment().endOf('month')

    //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
    $('#exportpdf').attr('href', '/inputbahan/cetak_pdf' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

    //INISIASI DATERANGEPICKER
    $('#created_at').daterangepicker({
    startDate: start,
    endDate: end


    }, function(first, last) {
    //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
    $('#exportpdf').attr('href', '/inputbahan/cetak_pdf' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
    });
    });
</script>
@endsection
