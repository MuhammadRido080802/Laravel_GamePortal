@extends('layouts.app')

@section('title')
Pemain
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME PORTAL</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- CSS untuk Sidebar -->
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    
</head>

<button type="button" class="btn btn-tambah">
  <a href="/pemain/tambah">Tambah Data Pemain</a>
</button>
<table class="table-data">
<thead style="background-color: #808080; color: #fff;">
  <tr>
    <th scope="col" style="width: 10%">Nama</th>
    <th scope="col" style="width: 10%">NIP</th>
    <th scope="col" style="width: 10%">Tier</th>
    <th scope="col" style="width: 10%">Game Di Mainkan</th> <br>
    <th scope="col" style="width: 10%">Device</th> <br>
    <th scope="col" style="width: 20%">Action</th>
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
