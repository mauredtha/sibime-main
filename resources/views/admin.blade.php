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
			<li class="active"><a href="{{'home'}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ route('workbooks.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Buku Kerja</a></li>
			<li><a href="{{ route('classes.index') }}"><em class="fa fa-calendar">&nbsp;</em> Kelas</a></li>
			<li><a href="{{ route('courses.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Mata Pelajaran</a></li>
			<li><a href="{{ route('class_courses.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Konfigurasi Kelas - Guru</a></li>
			<li><a href="{{ route('users.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Users</a></li>
			<li><a href="{{ route('users.edit', Auth::user()->id) }}"><em class="fa fa-bar-chart">&nbsp;</em> Change Password</a></li>
			<li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href={{'home'}}>
					<em class="fa fa-home"></em>
				</a></li>
				<li>Dashboard</li>
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
							<div class="text-muted"> <a href="{{route('classes.index')}}">Kelas</a> </div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-orange"></em>
							<div class="large">{{$mapel}}</div>
							<div class="text-muted"> <a href="{{route('courses.index')}}">Mata Pelajaran</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large">{{$teacher}} | {{$siswa}} </div>
							<div class="text-muted"><a href="{{route('users.index')}}">Guru | Siswa</a></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right ">
						<div class="row no-padding"><em class="fa fa-xl fa-clone color-red"></em>
							<div class="large">{{$workbook}}</div>
							<div class="text-muted"><a href="{{route('workbooks.index')}}">Buku Kerja</a></div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>


		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">SIBIME - Medialoot</a></p>
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
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
