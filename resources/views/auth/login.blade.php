<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>EasyJob - دخول</title>
		<meta name="description" content="EasyJob Login" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Toggles CSS -->
		<link href="{{asset('vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
	</head>
	<body>
		
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				<header class="d-flex justify-content-end align-items-center">
					<div class="btn-group btn-group-sm">
						<a href="{{route('welcome')}}" class="btn btn-outline-secondary">الرئيسية</a>
					</div>
				</header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="{{route('welcome')}}">
										EasyJob
									</a>

									@if (Session::has('errors'))
									<div class="text-center alert alert-danger mt-3">
										{{ Session::get('errors')->first() }}
									</div>
									@endif
				
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                    <h1 class="display-4 text-center mb-10">تسجيل الدخول</h1>
										<p class="text-center mb-30">جودة الخدمة هي شعارنا ورضاك هو هدفنا</p> 
										<div class="form-group">
											<input class="form-control @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني" type="email" name="email" value="{{ old('email') }}" required>
                                            
                                            @error('email')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
        
                                        </div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" name="password" required type="password">
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"></span></span>
												</div>
											</div>
											<small class="form-text text-muted text-right">
												<a href="{{route('password.request')}}">هل نسيت كلمة المرور ؟ </a>
											  </small>		

                                            @error('password')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
        
										</div>
										<div class="text-center">
										<button class="btn btn-primary btn-lg mb-2" type="submit" style="border-radius: 60px;width:50%">دخول</button>
									    </div>
										{{-- @if (Route::has('password.request'))
										<a href="{{route('password.request')}}"><p class="font-14 text-center mt-15">نسيت كلمة المرور ؟</p></a>
										<div class="option-sep">او</div>
										@endif --}}

                                        <p class="text-center mt-2">ليس لديك حساب ؟ <a href="{{route('register')}}">تسجيل الآن</a></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
		<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="{{asset('dist/js/feather.min.js')}}"></script>
		
		<!-- Init JavaScript -->
		<script src="{{asset('dist/js/init.js')}}"></script>
	</body>
</html>