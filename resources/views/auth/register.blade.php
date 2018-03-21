@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/papeleria.jpg') }}'); background-size: cover; background-position: top center;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="card card-signup">
					<form class="form" method="POST" action="{{ route('register') }}">
						@csrf
						<div class="header header-primary text-center">
							<h4>Registro</h4>
							<div class="social-line">
								<a href="#pablo" class="btn btn-simple btn-just-icon">
									<i class="fa fa-facebook-square"></i>
								</a>
								<a href="#pablo" class="btn btn-simple btn-just-icon">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#pablo" class="btn btn-simple btn-just-icon">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
						<p class="text-divider">Completa tus datos</p>
						<div class="content">

                            <div class="input-group form-group label-floating">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <label class="control-label">Nombre...</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

							<div class="input-group form-group label-floating">
								<span class="input-group-addon">
									<i class="material-icons">email</i>
								</span>
								<label class="control-label">Correo Electrónico...</label>
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="input-group form-group label-floating">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<label class="control-label">Contraseña...</label>
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

                            <div class="input-group form-group label-floating">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
								<label class="control-label">Confirmar contraseña...</label>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required/>
							</div>

							<!--If you want to add a checkbox to this form, uncomment this code-->

							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
									Recordar Sesión
								</label>
							</div> 	
												</div>
						<div class="footer text-center">
							<button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar registro</button>
						</div>

						 <!--<a class="btn btn-link" href="{{ route('password.request') }}">
			                Forgot Your Password?
			            </a>-->
					</form>
				</div>
			</div>
		</div>
	</div>

	@include('includes.footer')

</div>
@endsection
