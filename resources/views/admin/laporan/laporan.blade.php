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
<div class="container">
    <center>
        <h4>Laporan Bahan Baku</h4>
        <h4>TIMBANGAN SWADAYA</h4>
    </center>
    <br/>
    <a href="/inputbahan/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
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
    </table>

</div>

@endsection
