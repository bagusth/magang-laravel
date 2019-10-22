@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
			<div class="container-fluid">
				<h5 class="mt-4">Dashboard</h5>
				<div class="row">
					<div class="col-sm-4 pl-2 rounded">
						<div class="card text-center">
						<div class="card-body bg-warning">
						<center><h5 class="card-title text-dark">Data Siswa</h5>
							<img src="icon/cunt.png" width="15%"/>
							<h4>{{ $siswa }}</h4>
						</div>
						<div class="card-footer text-muted bg-warning" >
                  			<a id="txt" href="{{ url('/data-siswa') }}" class="">Detail</a></center>
                		</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card text-center" >
						<div class="card-body" style="background-color:#6ebde4;">
						<center><h5 class="card-title">Data Tagihan</h5>
							<img src="icon/tax.png" width="15%"/>
							<h4>{{ $tagihan }}</h4></center>
						</div>
						<div class="card-footer text-muted" style="background-color:#6ebde4;" >
                  			<a id="txt" href="{{ url('/data-tagihan') }}" class="">Detail</a></center>
                		</div>
					</div>
				</div>
					<div class="col-sm-4">
						<div class="card text-center">
							<div class="card-body" style="background-color:#f06560;">
							<center><h5 class="card-title">Data Pembayaran</h5>
								<img src="icon/credit-card.png" width="15%"/>
								<h4>{{  $pembayaran }}</h4></center>
							</div>
							<div class="card-footer text-muted" style="background-color:#f06560;" >
                  				<a id="txt" href="{{ url('/data-pembayaran') }}" class="">Detail</a></center>
                			</div>
						</div>
			</div>
    	</div>
    <!-- /#page-content-wrapper -->

  </div>

  <canvas id="myChart"></canvas>
		<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'bar',
			// The data for our dataset
			data: {
				labels: ['Data Siswa','Data Tagihan','Data Pembayaran'],
				datasets: [{
					label: 'Grafik Data',
					backgroundColor: 'rgb(84,28,135)',
					borderColor: 'rgb(84,28,135)',
					data: [ {{ $siswa }}, {{ $tagihan }}, {{ $pembayaran }} ]
				}]
			},
			// Configuration options go here
			options: {}
		});
		</script>


  @endsection