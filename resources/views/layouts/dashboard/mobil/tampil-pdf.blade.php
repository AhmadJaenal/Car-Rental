<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<table id="customers">
  <tr>
    <th>No.</th>
    <th>Nopol</th>
    <th>Merk</th>
    <th>Warna</th>
    <th>Tahun</th>
    <th>Perjam</th>
    <th>Perhari</th>
    <th>Perminggu</th>
    <th>Status</th>
    <th>Kategori</th>
  </tr>
  @php
  $no=1;
  @endphp
  @foreach ($cars as $car)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $car->no_plat }}</td>
    <td>{{ $car->merk }}</td>
    <td>{{ $car->warna }}</td>
    <td>{{ $car->tahun }}</td>
    <td>{{ $car->sewa_perjam }}</td>
    <td>{{ $car->sewa_perhari }}</td>
    <td>{{ $car->sewa_perminggu }}</td>
    <td>{{ $car->status }}</td>
    <td>{{ $car->id_kategori }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>


