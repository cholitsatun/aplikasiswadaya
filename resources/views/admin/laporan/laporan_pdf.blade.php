{{-- <html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan  Bahan Baku</h4>
	</center>
 
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
                
                <td>{{$item->tanggal_inb}}</td>
                <td>{{$item->bahanbaku->nama_bahan}}</td>
                <td>{{$item->supplier}}</td>
                <td>{{$item->jumlah_inb}}</td>
            </tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html> --}}



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h5>Laporan Order Periode ({{ $date[0] }} - {{ $date[1] }})</h5>
    <hr>
    <table width="100%" class="table-hover table-bordered">
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
            @forelse ($bahan as $item)
                <tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $item->tanggal_inb }}</td>
                    <td>{{ $item->bahanbaku->nama_bahan }}<br></td>
                    <td>{{ $item->supplier }}</td>
                    <td>{{ $item->jumlah_inb }}</td>
                </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>