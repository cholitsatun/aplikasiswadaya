@extends('layout')
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
        <h4>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
        <h5><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
    </center>
    <br/>
    <a href="/pegawai/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($pegawai as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->telepon}}</td>
                <td>{{$p->pekerjaan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
