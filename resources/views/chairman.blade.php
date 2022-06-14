<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="-1" />
	<title>Sibime</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Si</span>bime</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
				<div class="profile-usertitle-status">{{ Auth::user()->email }}</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="{{route('home')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ route('users.edit', Auth::user()->id) }}"><em class="fa fa-dashboard">&nbsp;</em> Change Password</a></li>
			<li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{'home'}}">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
				<li class="active"><a class="btn btn-md btn-primary" href="{{ url()->previous() }}" >Back</a></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-home color-blue"></em>
							<div class="large">{{$kelas}}</div>
							<div class="text-muted"> <a href="">Kelas</a> </div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-orange"></em>
							<div class="large">{{$mapel}}</div>
							<div class="text-muted"> <a href="">Mata Pelajaran</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large">{{$teacher}}</div>
							<div class="text-muted"><a href="">Guru</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large">{{$siswa}}</div>
							<div class="text-muted"><a href="">Siswa</a></div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<hr>

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-blue"></em>
							<div class="large">{{$buku_kerja_i}}</div>
							<div class="text-muted"><a href="{{ route('buku_kerja_satu') }}">Buku Kerja 1</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-orange"></em>
							<div class="large">{{$buku_kerja_ii}}</div>
							<div class="text-muted"><a href="{{ route('buku_kerja_dua') }}">Buku Kerja 2</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-teal"></em>
							<div class="large">{{$buku_kerja_iii}}</div>
							<div class="text-muted"><a href="{{ route('buku_kerja_tiga') }}">Buku Kerja 3</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-red"></em>
							<div class="large">{{$buku_kerja_iv}}</div>
							<div class="text-muted"><a href="{{ route('buku_kerja_empat') }}">Buku Kerja 4</a></div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Pilih Tahun Ajaran :
                        <select form-control  id="tahun_ajaran" name="tahun_ajaran">
                        	@foreach($list_tahun_ajar as $tahun)
								<option value="{{$tahun->tahun_ajaran}}">{{$tahun->tahun_ajaran}}</option>
							@endforeach
                        </select>
					</div>

					<!-- Mapel -->
					<div class="panel-heading">
					Pilih Tingkatan Kelas :
						<?php $level = array('X', 'XI', 'XII'); ?>
						@foreach($level as $lvl)
                        <button id="{{$lvl}}" name="{{$lvl}}" class="btn btn-md btn-primary" onclick='getMapel(this.id)'>{{$lvl}}  </button>
						@endforeach
					</div>

					<div class="panel-heading">
						Siswa Per Kelas Overview
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>

					<div class="panel-body">
						<table class="table table-bordered" id="laravel_crud">
							<thead>
								<tr>
									<th style="text-align:center;">No</th>
									<th style="text-align:center;">Mata Pelajaran</th>
									<th style="text-align:center;">KKM</th>
								</tr>
							</thead>
							<tbody id="data_mapel">
							</tbody>
						</table>
					</div>

					<!-- Detail Class -->
					<div class="panel-heading">
					Detail Kelas :
					</div>

					<div class="panel-body">
						<table class="table table-bordered" id="laravel_crud">
							<thead>
								<tr>
									<th style="text-align:center;">No</th>
									<th style="text-align:center;">Nama Kelas</th>
									<th style="text-align:center;"> </th>
								</tr>
							</thead>
							<tbody id="data_kelas">
							</tbody>
						</table>
					</div>


				</div>
			</div>
		</div><!--/.row-->




		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">SIBIME - Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>


		$(document).ready(function() {
			var tahun_ajaran = $("#tahun_ajaran").val();
			var tahun = tahun_ajaran.replace("/", "_");

			$.ajax({
				type:'GET',
				url:"{{ route('courses') }}/" + tahun + "/X",
				data:{},
				success:function(data){
					var no = 0;
					$.each(data.Mapel, function(i, item) {
						no++;
						var row = "";
						var link = "{{ route('courses_komponen') }}/X/" + item.id + "";
						row += "<tr><td>"+ no + "</td><td><a href=" + link +">"+ item.name + "</a></td><td>" + item.kkm + "</td></tr>";

						// get the current table body html as a string, and append the new row
						var html = document.getElementById("data_mapel").innerHTML + row;

						// set the table body to the new html code
						document.getElementById("data_mapel").innerHTML = html;

					})

					var num = 0;
					$.each(data.Kelas, function(a, kelas) {
						num++;
						var row_kelas = "";
						var link_kelas = "{{ route('all_students') }}/" + kelas.id + "";
						row_kelas += "<tr><td>"+ num + "</td><td>"+ kelas.name + "</td><td><a class='btn btn-primary' href=" + link_kelas +">Daftar Siswa</a></td></tr>";

						// get the current table body html as a string, and append the new row
						var html_kelas = document.getElementById("data_kelas").innerHTML + row_kelas;

						// set the table body to the new html code
						document.getElementById("data_kelas").innerHTML = html_kelas;
					})

					dataChart(data.LabelKelas, data.DataSiswa, data.DataGuru);
				}
			});

		});

		function getMapel(id){
			var tahun_ajaran = $("#tahun_ajaran").val();
			var tahun = tahun_ajaran.replace("/", "_");

			if($("#data_mapel tr").length > 0){
				$("#data_mapel tr").remove();
				// document.getElementById("data_mapel").parentNode.removeChild('tr');
			}

			if($("#data_kelas tr").length > 0){
				$("#data_kelas tr").remove();
			}

			$.ajax({
				type:'GET',
				url:"{{ route('courses') }}/" + tahun + "/" + id,
				data:{},
				success:function(data){

					var no = 0;
					$.each(data.Mapel, function(i, item) {
						no++;
						var row = "";
						var link = "{{ route('courses_komponen') }}/" + id + "/" + item.id + "";
						row += "<tr><td>"+ no + "</td><td><a href=" + link +">"+ item.name + "</a></td><td>" + item.kkm + "</td></tr>";

						// get the current table body html as a string, and append the new row
						var html = document.getElementById("data_mapel").innerHTML + row;

						// set the table body to the new html code
						document.getElementById("data_mapel").innerHTML = html;

					})

					var num = 0;
					$.each(data.Kelas, function(a, kelas) {
						num++;
						var row_kelas = "";
						var link_kelas = "{{ route('all_students') }}/" + kelas.id + "";
						row_kelas += "<tr><td>"+ num + "</td><td>"+ kelas.name + "</td><td><a class='btn btn-primary' href=" + link_kelas +">Daftar Siswa</a></td></tr>";

						// get the current table body html as a string, and append the new row
						var html_kelas = document.getElementById("data_kelas").innerHTML + row_kelas;

						// set the table body to the new html code
						document.getElementById("data_kelas").innerHTML = html_kelas;
					})

					dataChart(data.LabelKelas, data.DataSiswa, data.DataGuru);

				}
			});
		}


		function dataChart(label, dataSiswa, dataGuru){

			var barChartSiswa = {
				labels : label,
				datasets : [
					{
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data : dataSiswa
					},
					{
						fillColor : "rgba(48, 164, 255, 0.2)",
						strokeColor : "rgba(48, 164, 255, 0.8)",
						highlightFill : "rgba(48, 164, 255, 0.75)",
						highlightStroke : "rgba(48, 164, 255, 1)",
						data : dataGuru
					}
				]

			}

			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myBar = new Chart(chart1).Bar(barChartSiswa, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});

		}

		$(window).load(dataChart);

		$(document).on('change', '#tahun_ajaran',function(){
			var tahun_ajaran = $(this).val();
			var tahun = tahun_ajaran.replace("/", "_");
			$.ajax({
					type:'GET',
					url:"{{ route('level_class') }}/" + tahun,
					data:{},
					success:function(data){
							console.log(data);
					}
			});
		});

	</script>

</body>
</html>
