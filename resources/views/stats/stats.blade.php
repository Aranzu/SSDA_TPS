@extends('index.index_sidebar')
@section('content_home')

<h1 class="text-center blue_tps">Estadísticas </h1>

<script src='https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js'></script>
<div class = 'row col-5'>
    <canvas id="chart_users" width="1000" height="400"></canvas>
</div>
<script>
    var name = '{{$name}}';
    var counter = '{{$counter}}';
    const ctx = document.getElementById('chart_users').getContext('2d');
    const myChart = new Chart(ctx, {
        // setup
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script>

@if (isset($notes))
<div class="container table-responsive">
    <table id="stats_table" class="table table-bordered">
        <thead>
            <tr>
               <th></th>
               <th>Rut</th>
               <th>Nombre</th>
               <th>Cargo</th>
               <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 1;
            @endphp
            @foreach ( $notes as $row )
                <tr>
                    <td>{{$contador}}</td>
                    @php
                        $contador+=1;
                    @endphp
                    <td>{{$row["RUT"]}}</td>
                    <td>{{$row["NAME"]}}</td>
                    <td>{{$row["CARGO"]}}</td>
                    <td>{{$row["VALOR"]}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endif

@endsection
