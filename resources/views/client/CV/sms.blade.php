<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>EasyJob - تحقق</title>
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
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{ Session::get('errors')->first() }}
                                    </div>
                                    @endif
                                    <form method="POST" action="{{route('cv.free.verify.check')}}">
                                        @csrf
                                        <input type="hidden" name="phone" value="{{session('phoneNum')}}">

                                    <h1 class="display-4 text-center mb-10">التحقق من رقم الهاتف</h1>
										<p class="text-center mb-20"> فضلاً قم بكتابة الرمز المُرسل الى رقم هاتفك </p> 
                                        <p class="text-center mb-20">{{session('phoneNum')}}</p>
										<div class="form-group">
											<input class="form-control @error('verification_code') is-invalid @enderror" placeholder="رمز التحقق" type="tel" name="verification_code" value="{{ old('verification_code') }}" required>
                                            
                                            @error('verification_code')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
        
                                        </div>
										<button class="btn btn-primary btn-block" type="submit">تأكيد رقم الهاتف</button>
                                        {{-- @if (Route::has('password.request'))
										<a href="{{route('password.request')}}"><p class="font-14 text-center mt-15">نسيت كلمة المرور ؟</p></a>
										<div class="option-sep">او</div>
										@endif --}}

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
		<script src="vendors/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
		<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="dist/js/feather.min.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
