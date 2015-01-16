@extends('layout')

@section('title','Usuarios')

@section('content')

<div class="main-content">
	@include('includes/breadcrumbs')
	<div class="page-content">
		<div class="page-content-area">
			<div class="page-header">
				<h1>
					Usuarios
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<table id="tabla-usuarios" class="table table-striped table-bordered table-hover dataTable no-footer dataTable" role="grid" aria-describedby="sample-table-2_info">
						<thead>
							<tr role="row">
								<th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
									N°
								</th>
								<th class="sorting" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">
									Nombre
								</th>
								<th>
									Apellido
								</th>
								<th>
									Correo
								</th>
								<th>
									Perfil
								</th>
								<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">
									Acciones
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;?>
							@foreach($usuarios as $k => $usuario)
							<tr role="row" class="odd">
								<td class="center">
									{{$i}}
								</td>
									
								<td>
									{{$usuario['nombre']}}
								</td>

								<td>
									{{$usuario['apellido']}}
								</td>
								<td>
									{{$usuario['email']}}
								</td>	
								<td>
									{{$usuario['nombre_perfil']}}
								</td>	

								<td>
									<div class="action-buttons" data-id="{{$usuario['uuid']}}">
										<a href="{{ url('crearUsuario', $usuario['uuid']) }}" class="green">
											<i class="ace-icon fa fa-pencil bigger-130 editar"></i>
										</a>

										<a href="#" class="red">
											<i class="ace-icon fa fa-trash-o bigger-130 eliminar"></i>
										</a>
									</div>
								</td>
							</tr>
							<?php $i++;?>
							@endforeach
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
	<script>
	var tablaUsuarios = $('#tabla-usuarios').dataTable({
		
		"language": {
		         	"lengthMenu": "Mostrar _MENU_ registros por página",
		            "zeroRecords": "No se han encontrado Registros.",
		            "info": "Showing page _PAGE_ of _PAGES_",
		            "infoEmpty": "No hay datos",
		            "infoFiltered": "(filtered from _MAX_ total records)",
		            'sSearch': "Buscar:",
		            "sLoadingRecords": "Cargando",
		            "oPaginate": {
		            	"sNext": "Siguiente",
		            	"sPrevious": "Anterior" 
		            }
		        }		
		
	});
	</script>
@stop