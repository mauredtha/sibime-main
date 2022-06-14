<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
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

				</div>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
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
