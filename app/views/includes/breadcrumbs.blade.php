<script>
	try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>
<div id="breadcrumbs" class="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="/inicio">Inicio</a>
		</li>

		<li class="active" >
			<a href="{{ substr(Route::currentRouteAction(), (strpos(Route::currentRouteAction(), '@') + 1) ) }}">
				Here
			</a>
		</li>
	</ul><!-- /.breadcrumb -->

	<div id="nav-search" class="nav-search">
		<form class="form-search">
			<span class="input-icon">
				<input type="text" autocomplete="off" id="nav-search-input" class="nav-search-input" placeholder="Search ...">
				<i class="ace-icon fa fa-search nav-search-icon"></i>
			</span>
		</form>
	</div><!-- /.nav-search -->
</div>
<a class="btn-scroll-up btn btn-sm btn-inverse display" id="btn-scroll-up" href="#">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>