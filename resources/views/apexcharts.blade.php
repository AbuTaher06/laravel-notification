<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Apexcharts Chart Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
     
<body>
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Laravel 11 Apexcharts Chart Example - ItSolutionStuff.com</h3>
            <div class="card-body"> 
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
</body>
  
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
</html>
