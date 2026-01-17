<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>EasyJob - تسجيل حساب</title>
    <meta name="description" content="EasyJob Signup" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('dist/css/intlTelInput.css') }}">

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
            
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                  <h1 class="display-4 mb-10 text-center">تسجيل حساب</h1>
                                    <p class="mb-30 text-center">اجعل بداية العثور على وظيفتك أمرًا سهلاً معنا</p>
                                    <div class="form-group">
                                        <input class="text-right form-control @error('name') is-invalid @enderror" placeholder="اسم المستخدم" name="name"  type="text" value="{{ old('name') }}" required>
                                        @error('name')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
                                    </div>
                                    <div class="form-group">
                                        <input class="text-right form-control @error('email') is-invalid @enderror" placeholder="البريد الالكتروني" type="email" name="email" value="{{ old('email') }}" required>
                                        <small class="form-text text-muted text-right">
                                            .فضلاً قم بكتابة بريدك الإلكتروني الرسمي , سيتم إستعماله في رسائل الخدمات
                                          </small>
    
                                        @error('email')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
                                    </div>
                                    <div class="form-group text-center">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
                                    </div>
                                    <div class="form-group">
                                        <input class="text-right form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" type="password" name="password" required>
                                        @error('password')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
    
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="text-right form-control" placeholder="تأكيد كلمة المرور" type="password" name="password_confirmation">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit">تسجيل</button>

                                    
                                    <p class="text-center mt-2">لديك حساب بالفعل ؟ <a href="{{route('login')}}">دخول</a></p>
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

    <!-- Toggles JavaScript -->
    <script src="{{asset('vendors/jquery-toggles/toggles.min.js')}}"></script>
    <script src="{{asset('dist/js/toggle-data.js')}}"></script>

    <!-- Init JavaScript -->
    <script src="{{asset('dist/js/init.js')}}"></script>

    <script src="{{ asset('dist/js/intlTelInput.js') }}"></script>

<script>
  var countryData = window.intlTelInputGlobals.getCountryData(),
  input = document.querySelector("#phone"),
  addressDropdown = document.querySelector("#address_country");

  var iti = window.intlTelInput(input, {
    geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () {}, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "sa";
                    callback(countryCode);
                });
            },
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/utils.js", // just for formatting/placeholders etc
  initialCountry: "auto",
  hiddenInput: "dial_code",

  });

  // populate the country dropdown
for (var i = 0; i < countryData.length; i++) {
  var country = countryData[i];
  var optionNode = document.createElement("option");
  optionNode.value = country.iso2;
  var textNode = document.createTextNode(country.name);
  optionNode.appendChild(textNode);
  addressDropdown.appendChild(optionNode);
}
// set it's initial value
addressDropdown.value = iti.getSelectedCountryData().iso2;

// listen to the telephone input for changes
input.addEventListener('countrychange', function(e) {
  addressDropdown.value = iti.getSelectedCountryData().iso2;
});

// listen to the address dropdown for changes
addressDropdown.addEventListener('change', function() {
  iti.setCountry(this.value);
});
</script>
</body>

</html>