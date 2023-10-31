@extends('mainpage.layouts.main')

@section('container')

<head>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;
    400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,
    800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family
    =Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;
    400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family
    =Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
</head>

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Statistik</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="/statistik">
            <div class="input-group mb-3">
                <select class="form-select" name="username" id="username">
                    <option value="">Pilih</option>
                    @foreach ($usernames as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <input type="date" class="form-control" id="startDate" name="startDate" value="{{ request('startDate') }}" >
                <input type="date" class="form-control" id="endDate" name="endDate" value="{{ request('endDate') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
                <button class="btn btn-success" onclick="window.print()">Print</button>
            </div>
        </form>
    </div>
</div>

@if (count($downloads) > 0)
    <div class="row">
        <div class="col-md-5">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="row mt-3">
        <div class="table-responsive-lg col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Bil.</th>
                    <th scope="col">Pengguna</th>
                    <th scope="col">Tajuk Lagu</th>
                    <th scope="col">Tarikh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($downloads as $download )
                        <tr>
                        <td>{{ $downloads->firstItem() + $loop->index }}</td>
                        <td>{{ $download->user->name}}</td>
                        <td>{{ $download->song->tajuk}}</td>
                        <td>{{ $download->created_at }}</td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $downloads->links() }}
            </div>
        </div>
    </div>
@else
    <div class="table-responsive-lg col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Bil.</th>
                    <th scope="col">Pengguna</th>
                    <th scope="col">Tajuk Lagu</th>
                    <th scope="col">Tarikh</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" class="text-center">Tiada Maklumat.</td>
                </tr>
            </tbody>
        </table>
    </div>
@endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
    <script type="text/javascript">

    var labels = {{ Js::from($labels) }};
    var users = {{ Js::from($data) }};
        var colors = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FDB45C", "#46BFBD", "#F7464A", "#949FB1", "#87CEEB"];
    
        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah lagu dimuat turun',
                backgroundColor: colors.slice(0, labels.length),
                borderColor: colors.slice(0, labels.length),
                borderWidth: 1,
                data: users,
            }]
        };
    
        const config = {
            type: 'bar',
            data: data,
            options:{
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                barThickness: 100
            }
        };
    
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    
    </script>

@endsection