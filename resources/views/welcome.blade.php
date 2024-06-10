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
            color: black;
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
<body>
<span id="menuIcon" class="menu-icon" onclick="toggleSidebar()">&#9776; GAME PORTAL <img src="{{ asset('img/bg/logo12.png') }}" alt="Game Portal" class="game-portal-logo"></span>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase fixed-top" style="padding-bottom: 2px; padding-top: 30px;">
    <div class="container">
        <!-- Ikon menu -->
        <div class="sidebar" id="sidebar">
            <ul class="left-align">
                <li></li>
                <li></li>
                <hr></hr>
                <li><a href="{{ url('admin') }}"><i class="bi bi-house-door"></i> <span>Home</span></a></li>
                <li><a href="{{ url('pemain') }}"><i class="bi bi-joystick"></i> <span>Pemain</span></a></li>
                <li><a href="{{ url('game') }}"><i class="bi bi-controller"></i> <span>Game</span></a></li>
                <li><a href="{{ url('about') }}"><i class="bi bi-info-circle"></i> <span>About</span></a></li>
                <li><a href="{{ url('logout') }}"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Close Navbar -->
<!-- Container -->
<div class="container" style="padding-top: 80px;">
    <div class="row">
        <div class="col-md-6">
            <div class="card widget">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-fill" style="font-size: 5rem; margin-right: 10px; color: #FFB400;"></i>
                    <div>
                        <h5 class="card-title widget-title">Jumlah Data Pemain</h5>
                        <p class="card-text widget-data">{{ $jumlahPemain }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card widget">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <i class="bi bi-controller" style="font-size: 5rem; margin-right: 10px; color: #00E396"></i>
                    <div>
                        <h5 class="card-title widget-title">Jumlah Data Game</h5>
                        <p class="card-text widget-data">{{ $jumlahGame }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card widget">
                <div class="card-body">
                    <h5 class="card-title widget-title">Grafik Data</h5>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Widget -->

<!-- JavaScript untuk membuka dan menutup sidebar -->
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        if (sidebar.style.left === '-240px') {
            sidebar.style.left = '0';
        } else {
            sidebar.style.left = '-240px';
        }
    }

    // JavaScript untuk menampilkan chart data menggunakan ApexCharts
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            series: [{
                name: 'Jumlah Pemain',
                data: [{{ $jumlahPemain }}]
            }, {
                name: 'Jumlah Game',
                data: [{{ $jumlahGame }}]
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10,
                },
            },
            xaxis: {
                categories: ['Data']
            },
            legend: {
                position: 'bottom',
                offsetY: 0,
                labels: {
                    colors: ['#212121']
                },
            },
            colors: ['#FFB400', '#00E396'],
            grid: {
                show: true,
                borderColor: '#000000',
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function(val) {
                        return val + " data";
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"></script>
</body>
</html>
