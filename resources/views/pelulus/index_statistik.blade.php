@extends('mainpage.layouts.main')

@section('container')

<head>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Statistik</h1>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 bg-dark">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            Jumlah lagu dihantar</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $songs }}</div>
                    </div>
                    <div class="col-auto text-white">
                        <span data-feather="upload"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 bg-primary">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            Jumlah lagu dimuat turun</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $downloadCount }}</div>
                    </div>
                    <div class="col-auto text-white">
                        <span data-feather="download"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 bg-info">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            Jumlah Pengguna (Syarikat Rakaman)</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $syarikat_rakaman }}</div>
                    </div>
                    <div class="col-auto text-white">
                        <span data-feather="user"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 bg-warning">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            Jumlah Pengguna (Syarikat Stesen)</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $syarikat_stesen }}</div>
                    </div>
                    <div class="col-auto text-white">
                        <span data-feather="user"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 bg-success">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                            Jumlah Penilai</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $penilai }}</div>
                    </div>
                    <div class="col-auto text-white">
                        <span data-feather="user"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart" height="100px"></canvas>
        </div>
        <div class="col-md-6">
            <div class="table-responsive-sm col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Bil.</th>
                        <th scope="col">Tajuk</th>
                        <th scope="col">Jumlah Muat Turun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($songs1 as $song1 )
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $song1->tajuk }}</td>
                            <td>{{ $song1->downloadCount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $songs1->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
    <script type="text/javascript">
      
        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};
      
        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Lagu Dihantar',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
            }]
        };
      
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
      
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
      
</script>   

@endsection