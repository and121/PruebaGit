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

		<!-- text fonts -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		{{ HTML::style('css/general.css') }}

		<!-- Estilos generales-->
		{{ HTML::style('css/jqueryUi.css') }} 
		{{ HTML::style('css/jqgrid.css') }} 
		{{ HTML::style('css/datepicker.css') }}  
		{{ HTML::style('css/gritter.css') }} 
		{{ HTML::style('css/chosen.css') }} 
		{{ HTML::style('css/spectrum.css') }} 
		{{ HTML::style('css/estilo.css') }} 
		
	</head>
	<body class="no-skin">
		<div role="dialog" tabindex="-1" class="bootbox modal fade bootbox-confirm in" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content">
				</div>
			</div>
		</div>
			@include('includes/header')
		<div id="main-container" class="main-container">
			@include('includes/menu')
		<div class="main-content">
			@yield('content')
		</div>
		
		</div>
		
		<!-- basic scripts -->

		<!--[if !IE]> -->
		{{ HTML::script('js/jquery.js') }}  

		<!-- <![endif]-->

		{{ HTML::script('js/bootstrap.min.js') }} 
		{{ HTML::script('js/jquery-ui.custom.min.js') }}  
		{{ HTML::script('js/jquery.gritter.min.js') }}  
		{{ HTML::script('js/bootbox.min.js') }}
		{{ HTML::script('js/bootstrap-datepicker.min.js') }}
		{{ HTML::script('js/select2.min.js') }}   
		{{ HTML::script('js/spinner.js') }}
		{{ HTML::script('js/chosen.js') }}
		{{ HTML::script('js/spectrum.js') }}
		{{ HTML::script('js/bootbox.js') }}
		{{ HTML::script('js/bootstrapValidator.js') }} 
		{{ HTML::script('js/dataTable.min.js') }} 
		{{ HTML::script('js/dataTable.bootstrap.js') }}  	
		 
		
		<!-- ace scripts -->  
		{{ HTML::script('js/ace.min.js') }} 
		{{ HTML::script('js/ace-elements.min.js') }} 
	
		<!-- validar form-->
		{{ HTML::script('js/validarFormularios.js') }} 

		<!-- inline scripts related to this page -->
		
		@yield('script')
		
	</body>
</html>
