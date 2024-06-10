@extends('layouts.app')

@section('title')
Game
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

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: black; /* Mengatur warna teks menjadi hitam */
        }

        .btn-tambah {
            background-color: #0000FF; /* Warna biru */
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
            color: #000; /* Warna teks hitam */
            font-weight: bold; /* Teks menjadi tebal */
        }

        .btn-ubah {
            background-color: #FFFF00; /* Warna kuning */
            color: #000; /* Warna teks hitam */
            font-weight: bold; /* Teks menjadi tebal */
        }

        .btn-delete {
            background-color: #dc3545; /* Warna merah */
            color: #000; /* Warna teks hitam */
            font-weight: bold; /* Teks menjadi tebal */
        }

        .sidebar {
            width: 240px;
            height: 100%;
            background-color: #202020;
            position: fixed;
            top: 0;
            left: -240px;
            overflow-x: hidden;
            transition: left 0.3s ease;
            z-index: 1000;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar ul li:hover {
            background-color: #303030;
        }

        .menu-icon {
            color: #fff;
            cursor: pointer;
            font-size: 24px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2000;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        #menuIcon {
            display: flex;
            align-items: center;
        }

        .game-portal-logo {
            width: 1em;
            height: auto;
            margin-right: 5px;
        }

        .left-align {
            text-align: left;
        }

        .dataTables_filter label,
        .dataTables_length label {
            color: transparent;
        }

        .dataTables_length,
        .dataTables_filter {
            display: flex;
            align-items: center;
        }

        .dataTable_length {
            display: none;
        }

        .dataTables_info {
            color: black;
            text-align: left;
        }

        .widget {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        .widget-title {
            color: black;
            font-weight: bold;
        }

        .widget-data {
            font-size: 24px;
            color: black;
        }

        .home-content h2, .home-content h4 {
            color: black;
            text-align: left;
        }
    </style>
</head>


<button type="button" class="btn btn-tambah">
  <a href="/pemain/tambah">Tambah Data Game</a>
</button>
<table class="table-data">
<thead style="background-color: #808080; color: #fff;">
  <tr>
    <th scope="col" style="width: 20%">Nama Game</th>
    <th scope="col" style="width: 15%">Nama Pemain</th>
    <th scope="col" style="width: 20%">Tanggal</th>
    <th scope="col" style="width: 20%">Platform</th> <br>
    <th scope="col" style="width: 30%">Ulasan</th> <br>
    <th scope="col" style="width: 30%">Action</th>
  </tr>
</thead>


        <tbody>
            @forelse ($games as $game)
                <tr>
                    <td>{{ $game->updated_at }}</td>
                    <td>{{ $game->nama_game }}</td>
                    <td>{{ $game->pemain->nama}}</td>
                    <td>{{ $game->tanggal}}</td>
                    <td>{{ $game->platform }}</td>
                    <td style='display: none;'>{{ $game->ulasan }}</td>
                    <td>
                        <button class='btn_detail' data-nomorhp='{{ $game->ulasan }}'
                            onclick='showDetails("{{ $game->nama_game }}", "{{ $game->pemain->nama_pemain }}", "{{ $game->tanggal}}", "{{ $game->platform }}", "{{ $game->ulasan }}")'>Detail</button>
                    </td>
                @empty
                <tr>
                    <td colspan="6" align="center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
