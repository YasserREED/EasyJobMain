<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>EasyJob - الباقة المجانية</title>
		<meta name="description" content="EasyJob - الباقة المجانية" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
        <link rel="stylesheet" href="{{asset('vendors/jquery-steps/demo/css/jquery.steps.css')}}">

		<!-- Toggles CSS -->
		<link href="{{asset('vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">
		
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('dist/css/intlTelInput.css') }}">

		<!-- Custom CSS -->
		<link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
	</head>
	<body>
        @auth
<!-- HK Wrapper -->
<div class="hk-wrapper hk-alt-nav">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
        <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
        <a class="navbar-brand font-weight-700" href="{{route('welcome')}}">
            EasyJob
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapseAlt">
            <ul class="navbar-nav mr-4">
 
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('welcome')}}"> الرئيسية </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}"> خدماتنا </a>
                </li>

                <li class="nav-item active">
                  <a class="nav-link" href="{{route('cv.index')}}" >خدمة الإرسال</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="{{route('cv.show')}}" >قائمة طلباتي</a>
            </li>

            @cannot('HasFree') 
            <li class="nav-item active">
                <a class="nav-link" href="{{route('cv.free')}}" >الخدمة المجانية</a>
            </li>
            @endcannot

            </ul>
        
        </div>
        <ul class="navbar-nav hk-navbar-content">
          
            <li class="nav-item dropdown dropdown-authentication">
                <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <div class="media-body">
                            <li class="nav-item dropdown mr-md-3" style="background: transparent">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <button class="btn btn-sm btn-light ml-2">
                                        {{ Auth::user()->name }} <i class="fa fa-user"></i>
                                    </button>
                                </a>
                                <div class="dropdown-menu position-absolute" style="left:0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                
                                </div>
                            </li>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /Top Navbar -->
        @endauth
		
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            @guest
            <a class="auth-brand text-center d-block mb-20 mt-3" href="{{route('welcome')}}">
                <h1>EasyJob</h1>
            </a>
            @endguest
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="{{route('welcome')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الباقة المجانية</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                @if (Session::has('errors'))
                <div class="text-center alert alert-danger mt-3">
                    {{ Session::get('errors')->first() }}
                </div>
                @endif

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <form id="freeForm" method="post" action="{{route('cv.free.create')}}" enctype="multipart/form-data">
                            @csrf
                            <div id="example-basic">
                            <h3>
								<span class="wizard-icon-wrap"><i class="ion ion-md-briefcase"></i></span>
								<span class="wizard-head-text-wrap">
									<span class="step-head">السيرة الذاتية</span>
								</span>	
							</h3>
                            <section>
                                <h4 class="display-4 mb-40 text-center">خدمة إرسال السيرة الذاتية (الباقة المجانية)</h4>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 text-right">
                                        <input type="text" class="form-control mt-15 @error('subject') is-invalid @enderror" placeholder="IT Specialist - 5 Years experience" name="subject" value="{{ old('subject') }}" aria-describedby="subjectHelp" required>
                                        @error('subject')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <small id="subjectHelp" class="form-text text-muted">
                                            يفضل كتابة المنصب الوظيفي وعدد سنوات الخبرة وفي حال حديث تخرج كتابة التخصص الدراسي.
                                          </small>  
                                        </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <select name="region" class="form-control custom-select mt-15" required id="region-select">
                                            <option selected disabled>المنطقة</option>
                                            <option value="1">المنطقة الوسطى</option>
                                            <option value="2">المنطقة الغربية</option>
                                            <option value="3">المنطقة الشرقية</option>
                                        </select>
                                        @error('region')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
    
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <select name="domain" class="form-control custom-select mt-15" required id="domain-select">
                                            <option selected disabled>مجال الوظيفة</option>
                                        </select>
                                        @error('domain')
                                        <span class="invalid-feedback text-right" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <h5 class="hk-sec-title text-right mt-3">فضلاً قم بإرفاق السيرة الذاتية</h5>
                                <div  class="row mx-auto d-flex justify-content-center mb-2">
                                    <div class="col-6 text-right">
                                        <input name="file" type="file" id="input-file-now" aria-describedby="CVHelp" onchange="validateFileSize()" required />
                                        <small id="CVHelp" class="form-text text-muted">
                                            اقصى حجم للملف المرفوع 10 ميجا
                                          </small>
    
                                    </div>
                                </div>

                                <div class="row mx-auto d-flex justify-content-center mt-4">
                                    <div class="col-6 text-right">
                                        <div class="custom-control">
                                            <label>باستخدامك لهذه الخدمة ف انت توافق على <a href="{{route('terms')}}" target="_blank"> الشروط والخصوصية </a></label>
                                        </div>
                                    </div>
                                </div>

                                </section>
                            <h3>
								<span class="wizard-icon-wrap"><i class="ion ion-md-information-circle-outline"></i></span>
								<span class="wizard-head-text-wrap">
									<span class="step-head">المعلومات الشخصية</span>
								</span>	
							</h3>
                            <section>
                                <h3 class="display-4 mb-40 text-center">المعلومات الشخصية للباحث عن عمل</h3>
                                <div class="row">
                                    <div class="col-xl-12 mb-20">
                                            <div class="row">
                                                <div class="col-md-6 form-group text-right">
                                                    <label for="fullname">الاسم الرباعي *</label>
                                                    <input class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="الاسم الرباعي" type="text" value="{{ old('fullname') }}" required>
                                                    @error('fullname')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-2 form-group text-right">
                                                    <label for="age">العمر *</label>
                                                    <select class="form-control custom-select d-block w-100" id="age" name="age" required>
                                                        <option value="1">18 - 24</option>
                                                        <option value="2">25 - 35</option>
                                                        <option value="3">36 - 45</option>
                                                        <option value="4">46 - 50</option>
                                                        <option value="5">ما فوق 50</option>
                                                    </select>
                                                    @error('age')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-4 form-group text-right">
                                                    <label for="linkedin">حساب اللينكد ان</label>
                                                    <input class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/ahmed-khalid/" type="text" value="{{ old('linkedin') ?? ($storedData->linkedin ?? '') }}">
                                                    <small class="form-text text-muted text-right">
                                                        هذا الحقل إختياري
                                                      </small>            
                                                    @error('linkedin')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 form-group text-right">
                                                    <label for="qualifications">المؤهل العلمي *</label>
                                                    <select class="form-control custom-select d-block w-100" id="qualifications" name="qualifications" required>
                                                        <option value="دبلوم">دبلوم</option>
                                                        <option value="بكالوريوس">بكالوريوس </option>
                                                        <option value="ماجستير">ماجستير</option>
                                                        <option value="دكتوراه">دكتوراه</option>
                                                    </select>
                                                    @error('qualifications')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-4 form-group text-right">
                                                    <label for="university">الجامعة / الكلية *</label>
                                                    <input class="form-control @error('university') is-invalid @enderror" id="university" name="university" placeholder="اسم الكلية او الجامعة" type="text" value="{{ old('university') }}" required>
                                                    @error('university')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-4 form-group text-right">
                                                    <label for="major">التخصص *</label>
                                                    <input class="form-control @error('major') is-invalid @enderror" id="major" name="major" placeholder="اسم التخصص" type="text" value="{{ old('major') }}" required>
                                                    @error('major')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-10 text-right">
                                                    <label for="birthday">تاريخ الميلاد *</label>
                                                    <input class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" placeholder="تاريخ الميلاد" type="date" value="{{ old('birthday') }}" required>
                                                    @error('birthday')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
        
                                                </div>

                                                <div class="col-md-6 mb-10 text-right">
                                                    <label for="nationality">الدولة *</label>
                                                    <select class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality" required>
                                                        <option value="">اختر الدولة</option>
                                                    </select>
                                                    @error('nationality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                     @enderror
                                                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-10 text-right">
                                                    <label for="socialStatus">الحالة الإجتماعية *</label>
                                                    <select class="form-control custom-select d-block w-100" id="socialStatus" name="socialStatus" required>
                                                        <option value="1">أعزب</option>
                                                        <option value="2">متزوج</option>
                                                        <option value="3">غير ذلك</option>
                                                    </select>
                                                    @error('socialStatus')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <div class="col-md-3 mb-10 text-right">
                                                    <label for="work">على رأس العمل؟ </label>
                                                    <input class="form-control @error('work') is-invalid @enderror" id="work" name="work" placeholder="المسمى الوظيفي" type="text" value="{{ old('work') }}">
                                                    <small class="form-text text-muted text-right">
                                                        هذا الحقل إختياري
                                                      </small>            
                                                    @error('work')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-3 mb-10 text-right">
                                                    <label for="experince">اجمالي سنين الخبرة العملية</label>
                                                    <input class="form-control @error('experince') is-invalid @enderror" id="experince" name="experince" placeholder="إجمالي الخبرة" type="number" value="{{ old('experince') }}">
                                                    <small class="form-text text-muted text-right">
                                                        هذا الحقل إختياري
                                                      </small>            
                                                    @error('experince')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-3 mb-10 text-right">
                                                    <label for="gender">الجنس *</label>
                                                    <select class="form-control custom-select d-block w-100" id="gender" name="gender" required>
                                                        <option value="1">ذكر</option>
                                                        <option value="2">انثى</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>                                            </div>
                                            <hr>
                                    </div>
                                </div>
                            </section>
                            @guest
                            <h3>
								<span class="wizard-icon-wrap"><i class="ion ion-md-person"></i></span>
								<span class="wizard-head-text-wrap">
									<span class="step-head">تسجيل الحساب</span>
								</span>	
							</h3>
                            <section>
                                <h3 class="display-4 mb-40 text-center">سجل حساب لدينا</h3>
                                <div class="row">
                                    <div class="col-xl-12 mb-20">
                                        <div class="form-group text-right">
                                            <label for="name">اسم المستخدم</label>
                                            <input class="text-right form-control @error('name') is-invalid @enderror" placeholder="اسم المستخدم" name="name"  type="text" value="{{ old('name') }}" required>
                                            @error('name')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
        
                                        </div>
                                        <div class="form-group text-right">
                                            <label for="email">البريد الإلكتروني</label>
                                            <input class="text-right form-control @error('email') is-invalid @enderror" placeholder="البريد الالكتروني" type="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
        
                                        </div>
                                    
                                        <div class="form-group text-center" dir="rtl">
                                            <label for="phone">رقم الهاتف</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <input type="hidden" id="dial_code" name="dial_code">

                                        <div class="form-group text-right">
                                            <label for="password">كلمة المرور</label>
                                            <input class="text-right form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" type="password" name="password" required>
                                            @error('password')
                                            <span class="invalid-feedback text-right" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
        
                                        </div>
                                        <div class="form-group text-right">
                                            <label for="password_confirmation">تأكيد كلمة المرور</label>
                                                <input class="text-right form-control" placeholder="تأكيد كلمة المرور" type="password" name="password_confirmation" id="password_confirmation">
                                        </div>
                                        </div>
                                </div>

                            </section>
                            @endguest
                            
                        </div>
                    </form>

                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->

            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>easyJob © 2023 | <a href="https://solo.to/omarxtream" class="text-muted" target="_blank"> <small>Developed By OmarXtream </small></a></p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->

        </div>
		
		<!-- JavaScript -->
		<!-- jQuery -->
		<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
		<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		
        <script src="{{ asset('dist/js/intlTelInput.js') }}"></script>

        
        <!-- Form Wizard JavaScript -->
        <script src="{{asset('vendors/jquery-steps/build/jquery.steps.min.js')}}"></script>
        <script src="{{asset('dist/js/form-wizard-data.js?t=2')}}"></script>

		<!-- Slimscroll JavaScript -->
		<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

		<!-- Fancy Dropdown JS -->
		<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="{{asset('dist/js/feather.min.js')}}"></script>
		
		<!-- Init JavaScript -->
		<script src="{{asset('dist/js/init.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
  var countryData = window.intlTelInputGlobals.getCountryData(),
  addressDropdown = document.querySelector("#nationality");

  
  // populate the country dropdown
for (var i = 0; i < countryData.length; i++) {
  var country = countryData[i];
  var optionNode = document.createElement("option");
  optionNode.value = country.iso2;
  var textNode = document.createTextNode(country.name);
  optionNode.appendChild(textNode);
  addressDropdown.appendChild(optionNode);
}
        

function validateFileSize() {
    const input = document.getElementById('input-file-now');
    
    input.addEventListener('change', (event) => {
        const target = event.target;

        if (target.files && target.files[0]) {
            const maxAllowedSize = 10 * 1024 * 1024;

            if (target.files[0].size > maxAllowedSize) {
                Swal.fire(
                    'حجم ملف غير مسموح',
                    'فضلاً قم بإختيار ملف بحجم أقل',
                    'info'
                );
                target.value = '';
            }
        }
    });
}
</script>

        
<script>
            $(document).ready(function() {
                $('#nationality').select2();
            });

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
            $(document).ready(function () {
                $('#region-select').change(function () {
                    var region = $(this).val();
                    var url = '{{route('cv.domains')}}';
        
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: { 
                            _token: csrfToken, 
                            region: region 
                        },
                        success: function (data) {
                            var domainSelect = $('#domain-select');
                            domainSelect.empty();
        
                            if (Object.keys(data).length === 1 && data.hasOwnProperty('')) {
                                // No domains available
                                domainSelect.append($('<option selected disabled>لا يوجد</option>'));
                            } else {
                                domainSelect.append($('<option selected disabled>مجال الوظيفة</option>'));
        
                                $.each(data, function (id, domain) {
                                    domainSelect.append($('<option></option>').attr('value', domain).text(domain));
                                });
                            }
                        },
                        error: function (xhr) {
                            // Handle error, if needed
                        }
                    });
                });
            });
        </script>

	</body>
</html>