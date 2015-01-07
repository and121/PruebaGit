@extends('layout')

@section('title','Inicio')

@section('content')
<div class="main-content">
	@include('includes/breadcrumbs')
	<div class="page-content">
		<div class="page-content-area">
			<div class="page-header">
				<h1>
					Configuración Cuenta
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="">
						<div class="user-profile row" id="user-profile-3">
							<div class="col-sm-offset-1 col-sm-10">
								<div class="alert alert-info">
									<button data-dismiss="alert" class="close">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-hand-o-right"></i>
									Para cualquier cambio es necesario la contraseña.
								</div>

								<div class="space"></div>

									{{ Form::open(array('url' => 'configuracionCuenta', 'files' => true, 'id'=>'formulario-configuracion-cuenta', 'class'=>'form-horizontal')) }}
									<div class="tabbable">
										<ul class="nav nav-tabs padding-16">
											<li class="active">
												<a href="#edit-basic" data-toggle="tab">
													
													Información Básica
												</a>
											</li>
											
										</ul>

										<div class="tab-content profile-edit-tab-content">
											<div class="tab-pane in active" id="edit-basic">
												<h4 class="header blue bolder smaller">General <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i></h4>
												<div class="row">
													<div class="col-xs-12 col-sm-4">
														<?php if($usuario->ruta_avatar != ''): $hide='hide'; else: $hide = 'show'; endif; ?>
														<div class="{{$hide}}" id="div-input-file">
															<label class="ace-file-input ace-file-multiple">
																{{ Form::file('image');}}
															</label>
														</div>
														@if($usuario->ruta_avatar != '')
														<div>
															<button data-dismiss="alert" class="close eliminarAvatar" data-usuario-id="{{$usuario->id}}">
																<i class="ace-icon fa fa-times"></i>
															</button>
															<img src="<?php echo url($usuario->ruta_avatar); ?>" style="width:100%" >
														</div>
														@endif
													</div>
													<div class="vspace-12-sm"></div>

													<div class="col-xs-12 col-sm-8">
														<div class="form-group">
															<label for="form-field-username" class="col-sm-4 control-label no-padding-right">Email</label>
															<div class="col-sm-8">
																<input type="email" placeholder="Email" id="form-field-username" class="col-xs-12 col-sm-10" readonly="" value="{{$usuario->email}}" name="email">
															</div>
														</div>
														<div class="space-4"></div>
														<div class="form-group">
															<label for="form-field-first" class="col-sm-4 control-label no-padding-right">Nombre</label>
															<div class="col-sm-8">
																<input type="text" placeholder="Nombre" id="form-field-first" class="input-small" value="{{$usuario->nombre}}" name="nombre">
																<input type="text" placeholder="Apellido" id="form-field-last" class="input-small" value="{{$usuario->apellido}}" name="apellido">
															</div>
														</div>
													</div>
												</div>

												<div class="space-4"></div>
												<h4 class="header blue bolder smaller">Contraseña <i class="orange ace-icon fa fa-key bigger-125"></i></h4>
												<div class="form-group">
													<label for="form-field-pass1" class="col-sm-3 control-label no-padding-right">Contraseña Antigua</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass1" name="pass_Antigua">
													</div>
												</div>
												
												<div class="form-group">
													<label for="form-field-pass1" class="col-sm-3 control-label no-padding-right">Contraseña Nueva</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass1" name="password">
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label for="form-field-pass2" class="col-sm-3 control-label no-padding-right">Contraseña Confirmación</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass2" name="password_confirmation">
													</div>
												</div>

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
												Limpiar
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
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,
					
					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				//$('.input-mask-phone').mask('9945-0739');
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
	@if (Session::has('error'))
	<script type="text/javascript">
			var msg = '<?php echo Session::get('error'); ?>';
			jQuery(function($) {
				$.gritter.add({
					// (string | mandatory) the heading of the notification
					title: 'Error!',
					// (string | mandatory) the text inside the notification
					text: msg,
					class_name: 'gritter-error',
					time: 10000,
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
	
	<script>
		$('.eliminarAvatar').click(function(e){
			var usuarioId = $(this).attr('data-usuario-id');
			var urlEliminarAvatar = '<?php echo url('eliminarAvatar')?>';
			$.post(urlEliminarAvatar,{usuarioId: usuarioId})
			.done(function(data){
				if(data == 0){
					$('#div-input-file').removeClass('hide');
				}
			});
		});
	</script>
@stop
