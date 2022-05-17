@extends('layouts._app')

@section('content')
	<div class="container center">
		<div class="row justify-content-center">
			<div class="login popup">
				<div class="card">
					<div class="title-login">{{ __('Accedi direttamente') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('login') }}">
							@csrf

							<div class="form-group row justify-content-center">
								<div class="row-custom">
									<div class="d-flex">
										<div class="user-login">
											<img src="../../img/icon/user.svg" alt="">
										</div>
										<input id="email" type="email"
										       class="form-control @error('email') is-invalid @enderror"
										       placeholder="Email" name="email" value="{{ old('email') }}" required
										       autocomplete="email" autofocus>
									</div>

									@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="form-group row justify-content-center">

								<div class="row-custom">
									<div class="d-flex">
										<div class="user-login">
											<img src="../../img/icon/padlock.svg" alt="">
										</div>
										<input id="password" type="password"
										       class="form-control @error('password') is-invalid @enderror"
										       placeholder="Password" name="password" required
										       autocomplete="current-password">
									</div>

									@error('password')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="form-group row justify-content-center">
								<div class="row-custom">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember"
										       id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											{{ __('Ricordami') }}
										</label>
									</div>
								</div>
							</div>

							<div class="form-group row justify-content-center">
								<div class="row-custom">
									<button type="submit" class="btn-login">
										{{ __('Accedi') }}
									</button>

									@if (Route::has('password.request'))
										<a class="ml-5 pass-forghet" href="{{ route('password.request') }}">
											{{ __('Password dimenticata?') }}
										</a>
									@endif
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
