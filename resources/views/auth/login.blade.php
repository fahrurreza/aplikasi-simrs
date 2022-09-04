@extends('layouts.app')

@section('content')

<section class="ftco-section" style="padding-top : 150px">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<form class="user" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="form-group">
								<input type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="************">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-sm rounded submit p-3 px-5">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
