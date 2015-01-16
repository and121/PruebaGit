@extends('layout')

@section('title','Inicio')

@section('content')

<div class="main-content">
	@include('includes/breadcrumbs')
	<div class="page-content">
		<div class="page-content-area">
			<div class="page-header">
				<h1>
					Crear Usuario
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="">
						<div class="user-profile row" id="user-profile-3">
							<div class="col-sm-offset-1 col-sm-10">
								<div class="space"></div>
								<form class="form-horizontal" id="crear-Usuario" action="/crearUsuario" method="post">
									<div class="tabbable">
										<ul class="nav nav-tabs padding-16">
											<li class="active">
												<a href="#edit-basic" data-toggle="tab">
												
													Información Básica
												</a>
											</li>

											<!--<li>
												<a href="#edit-settings" data-toggle="tab">
													<i class="purple ace-icon fa fa-cog bigger-125"></i>
													Opciones
												</a>
											</li>-->

										</ul>
										<div class="tab-content profile-edit-tab-content">
											<div class="tab-pane in active" id="edit-basic">
												<h4 class="header blue bolder smaller">General <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i></h4>
												<div class="row">
													<div class="vspace-12-sm"></div>
													<div class="col-xs-12 col-sm-8">
														@if(count($usuario))
															<input type="hidden" name="usuario_id" value="{{$usuario['id']}}" >
														@endif
														<div class="form-group">
															<label for="form-email" class="col-sm-4 control-label no-padding-right">Email</label>
															<div class="col-sm-8">
																<input type="email" placeholder="Email" id="form-email" class="col-xs-12 col-sm-12" name="email" @if(count($usuario)) value="{{ $usuario['email'] }}" @endif >
															</div>
														</div>
														<div class="space-4"></div>
														<div class="form-group">
															<label for="form-name" class="col-sm-4 control-label no-padding-right">Nombre</label>
															<div class="col-sm-8">
																<input type="text" placeholder="Nombre" id="form-name" class="col-xs-12 col-sm-12" name="nombre" @if(count($usuario)) value="{{ $usuario['nombre'] }}" @endif >
																
															</div>
														</div>
														<div class="form-group">
															<label for="form-apellido" class="col-sm-4 control-label no-padding-right">Apellido</label>
															<div class="col-sm-8">
																<input type="text" placeholder="Apellido" id="form-apellido" class="col-xs-12 col-sm-12" name="apellido" @if(count($usuario)) value="{{ $usuario['apellido'] }}" @endif >
															</div>
														</div>
														
														<div class="form-group">
															<label for="form-apellido" class="col-sm-4 control-label no-padding-right">Perfil</label>

															<div class="col-sm-8">
																@foreach($perfiles as $perfil)
																<div class="radio">
																	<label>
																		<input name="perfil" type="radio" class="ace" value="{{$perfil->id}}" @if(count($usuario)) @if($usuario['perfil_id'] == $perfil->id) checked  @endif @endif >
																		<span class="lbl"> {{$perfil->nombre_perfil}}</span>
																	</label>
																</div>
																&nbsp; &nbsp; &nbsp;
																@endforeach
															</div>
														</div>
													</div>
												</div>

												<div class="space-4"></div>				
												@if(!count($usuario))
												<h4 class="header blue bolder smaller">Contraseña <i class="orange ace-icon fa fa-key bigger-125"></i></h4>
												<div class="row">
													<div class="vspace-12-sm"></div>
													<div class="col-xs-12 col-sm-8">
														<div class="form-group">
															<label for="form-pass1" class="col-sm-4 control-label no-padding-right">Contraseña</label>
															<div class="col-sm-8">
																<input type="password" placeholder="Contraseña" id="form-pass1" class="col-xs-12 col-sm-12" name="password">
															</div>
														</div>
														<div class="space-4"></div>
														<div class="form-group">
															<label for="form-pass2" class="col-sm-4 control-label no-padding-right">Confirme Contraseña</label>
															<div class="col-sm-8">
																<input type="password" placeholder="Confirmar Contraseña" id="form-pass2" class="col-xs-12 col-sm-12" name="password_confirmation">
																
															</div>
														</div>
													</div>
												</div>
												@endif

											</div>
										</div>
										
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-info">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Guardar
											</button>

											&nbsp; &nbsp;
											<button type="reset" class="btn">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Borrar
											</button>
										</div>
									</div>
								</form>
							</div><!-- /.span -->
						</div><!-- /.user-profile -->
					</div>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content-area -->
	</div><!-- /.page-content -->
</div>

@stop

@section('script')
	<script>
		jQuery(function($) {
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('.date-picker').datepicker();
			});
	</script>
	@if (Session::has('success'))
	<script type="text/javascript">
			var msg = '<?php echo Session::get('success'); ?>';
			jQuery(function($) {
				$.gritter.add({
					// (string | mandatory) the heading of the notification
					title: 'Éxito!',
					// (string | mandatory) the text inside the notification
					text: msg,
					class_name: 'gritter-success',
					time: 2000,
				});
			});
		</script>
	@endif 	
	
	@if ($errors->any())
		<script>
		jQuery(function($) {
			$.gritter.add({
				title: 'Error!',
				text: '<ul><?php foreach($errors->all() as $error): ?><li><?php echo $error;?><li><?php endforeach; ?> ',
				class_name: 'gritter-error',
				time: 10000,
				
			});
		});
		</script>			
	@endif
@stop


