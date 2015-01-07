<?php

class UsuarioController extends Controller {

	public function inicio()
	{
		if(Auth::Check()){
			return View::make('cms/usuario/inicio');
		}else{
			return Redirect::to('login');	
		}
		exit;
		
	}
	public function login()
	{
		if(Request::isMethod('get')){
			return View::make('usuario/login');
		}else{
			$userData = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);	
			
			if(Input::get('recordar'))
				$recordar = Auth::attempt($userData, true);
			else
				$recordar = Auth::attempt($userData);
			
			if($recordar){
				return Redirect::to('inicio');
			}else{
				return Redirect::to('login')->withInput()->with('errors','Error de usuario y/o contraseña.');
			}
		}
	}
	
	public function salir(){
		Auth::logout();
		return Redirect::to('login')->withInput()->with('success','Session cerrada correctamente.');
	}
	
	public function recuperarContraseña(){
		if(Request::isMethod('get')){
		}else{
			$email = Input::get('emailRecuperarContraseña');
			$usuario = Usuario::where('email', '=', $email)->first();
			if(count($usuario)){
				$id = $usuario->id;
				$rand = rand(0, 100000);
				$aleatorio = $rand.uniqid();
				$newPassword = substr($aleatorio, 0, 6);
				if(DB::table('usuarios')->where('id', $id)->update(array('password' => Hash::Make($newPassword)))){
					return Redirect::to('login')->withInput()->with('success','Hemos enviado su nueva contraseña a su correo.'.$newPassword);
				}else{
					return Redirect::to('login')->withInput()->with('errors','No se ha podido reestablecer su contraseña.');
				}
			}else{
				return Redirect::to('login')->withInput()->with('errors','No existe usuario con ese correo electronico');
			}
			exit;
		}
	}
	
	public function crearUsuario(){
		/*if(!Auth::Check()){
			return Redirect::to('login');	
		}*/
		if(Request::isMethod('get')){
			$perfiles = Perfil::all();
			return View::make('usuario/crearUsuario' ,array('perfiles' => $perfiles));
		}else{
			$usuario = new Usuario;
			$usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');
			$usuario->email  = Input::get('email');
			$usuario->password = Hash::Make(Input::get('password'));
			$usuario->perfil_id = Input::get('perfil');
			$usuario->uuid = uniqid();
	
			$data = Input::all();
			
			/*print_r($data);
			print_r($usuario);
			exit;*/

			if($usuario->isValid($data)){
				$usuario->save();
				return Redirect::to('crearUsuario')->withInput()->with('success','La cuenta se ha creado con exito.');
			}else{
				return Redirect::to('crearUsuario')->withInput()->withErrors($usuario->errors);
			}
		}
		
	}

	public function configuracionCuenta(){
		if(!Auth::Check()){
			return Redirect::to('login');	
		}
		if(Request::isMethod('get')){
			$id = Auth::user()->id;
			$usuario = Usuario::find($id);
			
			return View::make('usuario/configuracionCuenta', array('usuario' => $usuario));
		}else{
			
			$email = Input::get('email');
			$passwordAntigua = Input::get('pass_Antigua');
			if(Auth::attempt(array('email' => $email, 'password' => $passwordAntigua)))
			{
				$id = Auth::user()->id;
				$usuario = Usuario::find($id);
			  	$usuario->nombre = Input::get('nombre');
				$usuario->apellido = Input::get('apellido');
				if(Input::get('password') != ''){
					$usuario->password = Hash::Make(Input::get('password'));
				}
				
				if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
					//echo 'entro'; exit;
					$allowed = array('png', 'jpg', 'gif','zip');
	
					$path = base_path().'/public';
						
					$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		
					if(!in_array(strtolower($extension), $allowed)){
						return Redirect::to('crearPost')->withInput()->withErrors('Error! Este formato no esta disponible.');
					}
		
					if(move_uploaded_file($_FILES['image']['tmp_name'], $path.'/uploads/avatar_usuario/'.$id.$_FILES['image']['name'])){
						$usuario->ruta_avatar = 'uploads/avatar_usuario/'.$id.$_FILES['image']['name'];
					}
				}
				
				$data = Input::all();
				//print_r($data); exit;
				if($usuario->isValidUpdate($data)){
					$usuario->save();
					return Redirect::to('configuracionCuenta')->withInput()->with('success','Cambios realizados exitosamente.');
				}else{
					return Redirect::to('configuracionCuenta')->withInput()->withErrors($usuario->errors);
				}
			}else{
				return Redirect::to('configuracionCuenta')->withInput()->with('error','Error de Usuario y/o contraseña.' );
			}
		}
	}

	public function eliminarAvatar(){
		$usuarioId = Input::get('usuarioId');
		$usuario = Usuario::find($usuarioId);
		$archivo = $usuario->ruta_avatar;
		$archivo = base_path().'/public/'.$archivo;
		@unlink($archivo);
		$usuario->ruta_avatar = '';
		if($usuario->save()){
			echo 0;
		}else{
			echo 1;
		}
	}
	
	public function usuarios(){
		return View::make('cms/usuario/usuarios');
	}
	
	
}
