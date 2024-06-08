@extends('layouts.app')

@section('title')
Pemain
@endsection

@section('content')
<style>
  body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: black; /* Mengatur warna teks menjadi hitam */
  }

  .btn-tambah {
      background-color: #0000FF; /* Warna hijau */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
  }

  .btn-tambah a {
      color: white;
      text-decoration: none;
  }

  .btn-tambah:hover {
      background-color: #218838; /* Warna hijau lebih gelap saat hover */
  }

  .table-data {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
  }

  .table-data th, .table-data td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
  }

  .table-data th {
      background-color: #f2f2f2;
      color: black;
  }

  .btn-detail, .btn-ubah, .btn-delete {
      color: #007bff; /* Warna biru */
      text-decoration: none;
      padding: 8px 16px; /* Atur ukuran padding agar tombol memiliki ruang yang lebih luas */
      border: none;
      border-radius: 5px;
  }

  .btn-detail:hover, .btn-ubah:hover, .btn-delete:hover {
      text-decoration: underline;
  }

  .btn-delete {
      color: #dc3545; /* Warna merah */
  }

  .active {
      background-color: #007bff; /* Warna latar belakang saat tombol aktif */
      color: #fff; /* Warna teks saat tombol aktif */
  }

  .icon {
      margin-right: 5px; /* Jarak antara ikon dan teks */
  }

  .sidebar-button img {
      width: 20px; /* Sesuaikan dengan ukuran yang diinginkan */
      height: auto;
      margin-left: 10px;
  }

  /* Tambahkan warna latar belakang default untuk tombol */
  .btn-detail {
      background-color: #00FF00; /* Warna hijau */
      color: #000; /* Warna teks putih */
      font-weight: bold; /* Teks menjadi tebal */
  }

  .btn-ubah {
      background-color: #FFFF00; /* Warna abu-abu */
      color: #fff; /* Warna teks putih */
      font-weight: bold; /* Teks menjadi tebal */
  }

  .btn-delete {
      background-color: #dc3545; /* Warna merah */
      color: #000; /* Warna teks putih */
      font-weight: bold; /* Teks menjadi tebal */
  }
</style>


<button type="button" class="btn btn-tambah">
  <a href="/pemain/tambah">Tambah Data Pemain</a>
</button>
<table class="table-data">
<thead style="background-color: #808080; color: #fff;">
  <tr>
    <th scope="col" style="width: 20%">Nama</th>
    <th scope="col" style="width: 15%">NIP</th>
    <th scope="col" style="width: 20%">Tier</th>
    <th scope="col" style="width: 20%">Game Di Mainkan</th> <br>
    <th scope="col" style="width: 30%">Device</th> <br>
    <th scope="col" style="width: 30%">Action</th>
  </tr>
</thead>

  <tbody>
    @forelse ($pemain as $pemain)
    <tr>

      <td>{{ $pemain->nama }}</td>
      <td>{{ $pemain->nip }}</td>
      <td>{{ $pemain->tier }}</td>
      <td>{{ $pemain->game_main }}</td>
      <td>{{ $pemain->device }}</td>
      <td>
        <a class='btn-detail' href="/pemain/detail/{{ $pemain->id_pemain }}"><i class="bi bi-info-circle-fill icon"></i> Detail</a>
        <a class='btn-ubah' href="/pemain/ubah/{{ $pemain->id_pemain }}"><i class="bi bi-pencil-fill icon"></i> Ubah</a>
        <form action="/pemain/hapus/{{ $pemain->id_pemain }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill icon"></i> Hapus</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="7" align="center">Tidak ada data</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection
