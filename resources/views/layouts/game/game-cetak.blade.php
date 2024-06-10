<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Transaksi</title>
  <style>
    .table-data {
      border-collapse: collapse;
      width: 100%;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #2c3e50;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <h3>Data Categories</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Status</th>
        <th>nomorhp</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($game as $game)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $game->updated_at }}</td>
        <td>{{ $game->nama_game }}</td>
        <td>{{ $game->pemain->nama_pemain}}</td>
        <td>{{ $game->tanggal }}</td>
        <td>{{ $game->platform }}</td>
        <td >{{ $game->ulasan }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="7" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>

</html>
