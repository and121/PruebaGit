<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		 <title>@yield('title')	</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		{{ HTML::style('css/bootstrap.min.css') }}
	    {{ HTML::style('css/font-awesome.min.css') }}  
	    
		<!-- page specific plugin styles -->

		<!-- ace styles -->
		{{ HTML::style('css/general.css') }} 
		{{ HTML::style('css/gritter.css') }} 
	

	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">CMS</span>
									<span id="id-text2" class="white">Two</span>
								</h1>
								<h4 id="id-company-text" class="light-blue">&copy; Company Name</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div class="login-box visible widget-box no-border" id="login-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Por favor ingrese su información
											</h4>

											<div class="space-6"></div>

											<form method="post" action="/login" id="form-login">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input required="" type="email" placeholder="Email" class="form-control" name="email">
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input required="" type="password" placeholder="Contraseña" class="form-control" name="password">
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" name="recordar" value="{{TRUE}}">
															<span class="lbl"> Recordarme</span>
														</label>

														<button class="width-35 pull-right btn btn-sm btn-primary" type="submit">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Ingresar</span>
														</button>
													</div>
<br />
										<fieldset>
											@if (Session::has('success'))
											<div class="alert alert-block alert-success">
												<button data-dismiss="alert" class="close" type="button">
													<i class="ace-icon fa fa-times"></i>
												</button>
	
												<p>
													<strong>
														<i class="ace-icon fa fa-check"></i>
														Exito!
													</strong>
													{{Session::get('success')}}
												</p>
											</div>
											@endif 	
											@if (Session::has('errors'))
											<div class="alert alert-danger">
												<button data-dismiss="alert" class="close" type="button">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<strong>
													<i class="ace-icon fa fa-times"></i>
													Error.
												</strong>
												{{Session::get('errors')}}
												<br>
											</div>
											@endif
										</fieldset>
													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div style="width: 100%;">
												<a class="forgot-password-link" data-target="#forgot-box" href="#">
													<i class="ace-icon fa fa-arrow-left"></i>
													¿Olvido su contraseña?
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div class="forgot-box widget-box no-border" id="forgot-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Recuperar Contraseña
											</h4>

											<div class="space-6"></div>
											<p>
												Ingrese su email para recibir instrucciones.
											</p>

											<form action="/recuperarContraseña" id="recuperar-contraseña" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input required="" type="email" placeholder="Email" class="form-control" name="emailRecuperarContraseña">
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button class="width-35 pull-right btn btn-sm btn-danger" type="submit">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Enviar!</span>
														</button>
													</div>
												</fieldset>
												<br />
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a class="back-to-login-link" data-target="#login-box" href="#">
												Volver atrás
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		{{ HTML::script('js/jquery.js') }}  

		<!-- inline scripts related to this page -->
		{{ HTML::script('js/bootstrap.min.js') }} 
		{{ HTML::script('js/bootstrapValidator.js') }} 
		{{ HTML::script('js/validarFormularios.js') }} 
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	

</body></html>