@extends('client.layout.master')

@section('content')
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">أرسل سيرتك الذاتية</h2>
            </div>
        </div>
        <!-- /Title -->

        
        <!-- Row -->
        <div class="row">
                <section class="container">
                    <h5 class="hk-sec-title text-right">خدمة إرسال السيرة الذاتية </h5>
                    <p class="mt-10 mb-40 text-right">اجعل بداية العثور على وظيفتك أمرًا سهلاً معنا. نحن هنا لنقودك خطوة بخطوة نحو فرصة مهنية مثمرة</p>

                    @if (Session::has('errors'))
                    <div class="text-center alert alert-danger mt-3">
                        {{ Session::get('errors')->first() }}
                    </div>
                    @endif

                    <div id="pricingDiv">
                        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card mb-20 text-right">
                                <img class="card-img-top" src="{{asset('assets/img/light-img/price-img1.png')}}" alt="basic">
                                <div class="card-body">
                                    <h3 class="card-title text-center">بريميوم</h3>
                                    <h4 class="card-text text-center">29 ريال</h4>

                                    <p class="card-text">تمكنك باقة بريميوم من التقديم على 100 وظيفة في وقت واحد</p>
                                    
                                    <button type="button" class="d-flex mx-auto btn btn-dark btn-rounded plan-button" data-plan="1">شراء الآن</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card mb-20 text-right">
                                <img class="card-img-top" src="{{asset('assets/img/light-img/price-img2.png')}}" alt="premium">
                                <div class="card-body">
                                    <h3 class="card-title text-center">بريميوم بلس</h3>
                                    <h4 class="card-text text-center" style="color:#ff8a73">85 ريال</h4>

                                    <p class="card-text">تمكنك باقة بريميوم بلس من التقديم على 300 وظيفة في وقت واحد                                    </p>
                                    
                                    <button type="button" class="d-flex mx-auto btn btn-warning btn-rounded plan-button" data-plan="2" style="background-color: #ff8a73">شراء الآن</button>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card mb-20 text-right">
                                <img class="card-img-top" src="{{asset('assets/img/light-img/price-img3.png')}}" alt="ultimate">
                                <div class="card-body">
                                    <h3 class="card-title text-center">بريميوم برو</h3>
                                    <h4 class="card-text text-center">99 ريال</h4>

                                    <p class="card-text">تمكنك باقة بريميوم برو من التقديم على 500 وظيفة في وقت واحد                                    </p>
                                    
                                    <button type="button" class="d-flex mx-auto btn btn-dark btn-rounded plan-button" data-plan="3">شراء الآن</button>
                                </div>
                            </div>
                        </div>
                        

                    </div>

            
                    </div>

        
                    <div id="formDiv" style="display: none;">
                        <form method="post" action="{{route('cv.create')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="selectedPlan" name="selectedPlan" value="">
                            
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 text-right">
                                    <input type="text" class="form-control mt-15 @error('subject') is-invalid @enderror" placeholder="IT Specialist - 5 Years experience" name="subject" value="{{ old('subject') ?? ($storedService->subject ?? '') }}" aria-describedby="subjectHelp" required>
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
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <select name="domain" class="form-control custom-select mt-15" required id="domain-select">
                                        <option selected disabled>مجال الوظيفة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mx-auto text-right my-2">

                                <label for="cDiscount">هل لديك كوبون خصم؟</label>
                                <input type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" name="discount" id="cDiscount" placeholder="كوبون">
                                @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                                <h5 class="hk-sec-title text-right mt-3">فضلاً قم بإرفاق السيرة الذاتية</h5>
                                <div  class="row mx-auto d-flex justify-content-center mb-2">
                                    <div class="col-6 text-right">
                                        <input name="file" type="file" id="input-file-now" aria-describedby="CVHelp" />
                                        <small id="CVHelp" class="form-text text-muted">
                                            اقصى حجم للملف المرفوع 10 ميجا
                                          </small>
                                          @if(isset($storedService->cv_file))
                                             <p>اخر نسخة من ملف السيرة الذاتية:
                                                <a href="{{@$storedService->cvPath()}}" target="_blank">{{@$storedService->created_at}}</a>

                                             </p>
                                             <small class="form-text font-weight-bold mt-2 text-danger">قم بترك حقل الملف فارغاً في حال عدم وجود نسخة جديدة </small>

                                          @endif
                                    </div>
                                </div>
    
                                <hr>
                                <h4 class="mb-40 mt-3 text-center">المعلومات الشخصية للباحث عن عمل</h4>
                                <div class="row">
                                    <div class="col-xl-12 mb-20">
                                            <div class="row">
                                                <div class="col-md-6 form-group text-right">
                                                    <label for="fullname">الاسم الرباعي *</label>
                                                    <input class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="الاسم الرباعي" type="text" value="{{ old('fullname') ?? ($storedData->fullname ?? '') }}" required>
                                                    @error('fullname')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-2 form-group text-right">
                                                    <label for="age">العمر *</label>
                                                    <select class="form-control custom-select d-block w-100" id="age" name="age" required>
                                                        <option value="1" @if(@$storedData->age == 1) selected @endif>18 - 24</option>
                                                        <option value="2" @if(@$storedData->age == 2) selected @endif>25 - 35</option>
                                                        <option value="3" @if(@$storedData->age == 3) selected @endif>36 - 45</option>
                                                        <option value="4" @if(@$storedData->age == 4) selected @endif>46 - 50</option>
                                                        <option value="5" @if(@$storedData->age == 5) selected @endif>ما فوق 50</option>          
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
                                                        <option value="دبلوم" @if(@$storedData->qualifications == 'دبلوم') selected @endif>دبلوم</option>
                                                        <option value="بكالوريوس" @if(@$storedData->qualifications == 'بكالوريوس') selected @endif>بكالوريوس</option>
                                                        <option value="ماجستير" @if(@$storedData->qualifications == 'ماجستير') selected @endif>ماجستير</option>
                                                        <option value="دكتوراه" @if(@$storedData->qualifications == 'دكتوراه') selected @endif>دكتوراه</option>                                                                                                        </select>
                                                    @error('qualifications')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-4 form-group text-right">
                                                    <label for="university">الجامعة / الكلية *</label>
                                                    <input class="form-control @error('university') is-invalid @enderror" id="university" name="university" placeholder="اسم الكلية او الجامعة" type="text" value="{{ old('university') ?? ($storedData->university ?? '') }}" required>
                                                    @error('university')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="col-md-4 form-group text-right">
                                                    <label for="major">التخصص *</label>
                                                    <input class="form-control @error('major') is-invalid @enderror" id="major" name="major" placeholder="اسم التخصص" type="text" value="{{ old('major') ?? ($storedData->major ?? '') }}" required>
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
                                                    <input class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" placeholder="تاريخ الميلاد" type="date" value="{{ old('birthday') ?? ($storedData->birthDay ?? '') }}" required>
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
                                                        <option value="1" @if(@$storedData->socialStatus == 1) selected @endif>أعزب</option>
                                                        <option value="2" @if(@$storedData->socialStatus == 2) selected @endif>متزوج</option>
                                                        <option value="3" @if(@$storedData->socialStatus == 3) selected @endif>غير ذلك</option>                                                                                                        </select>
                                                    @error('socialStatus')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <div class="col-md-3 mb-10 text-right">
                                                    <label for="work">على رأس العمل؟ </label>
                                                    <input class="form-control @error('work') is-invalid @enderror" id="work" name="work" placeholder="المسمى الوظيفي" type="text" value="{{ old('work') ?? ($storedData->work ?? '') }}">
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
                                                    <input class="form-control @error('experince') is-invalid @enderror" id="experince" name="experince" placeholder="إجمالي الخبرة" type="number" value="{{ old('experince') ?? ($storedData->experince ?? '') }}">
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
                                                        <option value="1" @if(@$storedData->gender == 1) selected @endif>ذكر</option>
                                                        <option value="2" @if(@$storedData->gender == 2) selected @endif>أنثى</option>                                                                                                        </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback text-right" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <hr>
                                    </div>
                                </div>




                                <div class="row mx-auto d-flex justify-content-center mt-4">
                                    <div class="col-6 text-right">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="agreeCheckbox" name="agreeCheckbox" required>
                                            <label class="custom-control-label" for="agreeCheckbox">أوافق على <a href="{{route('terms')}}" target="_blank"> الشروط والخصوصية </a></label>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row mx-auto d-flex justify-content-center mt-2">
                                    <button type="submit" class="d-flex mx-auto btn btn-primary btn-rounded" id="submitButton" disabled>إرسال</button>

                                </div>

                            
                        </div>


                        </form>
                </section>
                
            </div>
        </div>
        <!-- /Row -->
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('dist/js/intlTelInput.js') }}"></script>

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
</script>

    <script>
    $(document).ready(function () {
        const agreeCheckbox = document.getElementById("agreeCheckbox");
        const submitButton = document.getElementById("submitButton");

        agreeCheckbox.addEventListener("change", function () {
            submitButton.disabled = !this.checked;
        });

    });

   const pricingDiv = $("#pricingDiv");
        const formDiv = $("#formDiv");
        const showFormButton = $("#showFormButton");

        $(".plan-button").click(function() {
            const selectedPlan = $(this).data("plan");
            $("#selectedPlan").val(selectedPlan);

            pricingDiv.fadeOut(500, () => {
                formDiv.fadeIn(500);
            });
        });

        const updateButton = document.getElementById("enButton");
        const myTextarea = document.getElementById("msgText");


        $(document).ready(function() {
                $('#nationality').select2();
            });

const input = document.getElementById('input-file-now');

input.addEventListener('change', (event) => {
  const target = event.target
  	if (target.files && target.files[0]) {
      const maxAllowedSize = 10 * 1024 * 1024;
      if (target.files[0].size > maxAllowedSize) {
        Swal.fire(
        'حجم ملف غير مسموح',
        'فضلاً قم بإختيار ملف بحجم أقل',
        'info'
        );
       	target.value = ''
      }
  }
});
</script>

<script>
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


@endsection
