<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="EasyJob" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- Page Title -->
  <title>EasyJob - توظف بسهولة</title>
  <!-- Favicon Icon -->
  <link rel="icon" href="{{asset('assets/img/favicon.png')}}" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/owlCarousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
  <style>
    h3 {
      font-size: 24px;
    }
  </style>
</head>

<body class="rtl">
  <div id="st-preloader">
    <div class="st-preloader-wave"></div>
    <div class="st-preloader-wave"></div>
    <div class="st-preloader-wave"></div>
    <div class="st-preloader-wave"></div>
    <div class="st-preloader-wave"></div>
  </div>
  <header class="st-header st-style1 st-sticky-menu">
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-site-branding ml-md-auto">
            <a href="{{route('welcome')}}" class="st-logo-link"><img src="assets/img/light-img/logo.png" alt="demo"></a>
          </div>
          <!-- For Site Title -->
          <!-- <span class="st-site-title">
            <a href="index.html">Logo</a>
          </span> -->
          <div class="st-nav-wrap st-fade-down ml-md-auto">
            <div class="st-nav-toggle st-style1">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <nav class="st-nav st-desktop-nav">
              <ul class="st-nav-list onepage-nav">
                <li><a href="{{route('welcome')}}">الرئيسية</a></li>
                <li><a href="{{route('welcome')}}" class="smooth-scroll">من نحن</a></li>
                <li><a href="{{route('welcome')}}" class="smooth-scroll">خدماتنا</a></li>
                <li><a href="{{route('welcome')}}" class="smooth-scroll">الباقات</a></li>
                <li><a href="{{route('welcome')}}" class="smooth-scroll">الأسئلة الشائعة</a></li>
                <li><a href="{{route('welcome')}}" class="smooth-scroll">تواصل معنا</a></li>

              </ul>
            </nav><!-- .st-nav -->
            @guest
           <a href="{{route('login')}}" style="height: unset;" class="st-btn st-style1 st-color1 mr-5 d-none d-md-block">تسجيل الدخول</a>
            @endguest

            @auth
            <a href="{{route('home')}}" style="height: unset;" class="st-btn st-style1 st-color1 mr-5 d-none d-md-block">حسابي</a>
            @endauth

          </div><!-- .st-nav-wrap -->
        </div>
      </div>
    </div>
  </header>

   <!-- Terms Section -->
   <div class="st-content">
    <div class="st-about-wrap st-section-top">
      <div class="container">
        <h1 style="font-size: 30px;"> الشروط والأحكام</h1>
        <br>
        <h2 style="font-size: 25px;">شروط الخدمة وسياسة الخصوصية لشركة Easyjob</h2> <br>
        <h3>المقدمة</h3>
        <p>هذه الوثيقة تحدد شروط الاستخدام وسياسة الخصوصية لخدمات شركة Easyjob (المشار إليها فيما يلي بـ "الشركة" أو "نحن")، والتي تقدم خدمات التوظيف والتوسط الوظيفي.</p>
        <br>
        <h3>جمع البيانات واستخدامها</h3>
        <ul>
          <li><strong>جمع البيانات:</strong> نجمع البيانات الشخصية من الباحثين عن العمل والشركات. هذه البيانات تشمل، ولكن لا تقتصر على، الاسم، العمر، المؤهل العلمي، التخصص، الخبرة العملية، وبيانات الاتصال.</li>
          <li><strong>استخدام البيانات:</strong> نستخدم هذه البيانات لتوفير خدماتنا بما في ذلك مطابقة الباحثين عن العمل مع فرص العمل المناسبة وتلبية طلبات
          <li><strong>طريقة التقديم:</strong> نتحفظ على طريقة التقديم عن طريق موقعنا الإلكتروني كما أننا نعمل على التقديم عن طريق الذكاء الصناعي ولا يحق للعميل أو الشركات الراغبة بالتوظيف معرفة الأكواد البرمجية وكيف يتم ذلك.</li>
        </ul>
        <br>
        <h3>الحفاظ على الخصوصية</h3>
        <ul>
          <li><strong>سرية المعلومات:</strong> نلتزم بحماية خصوصية وسرية المعلومات التي نجمعها.</li>
          <li><strong>الإفصاح عن المعلومات:</strong> لن يتم الإفصاح عن المعلومات الشخصية للأطراف الثالثة إلا في حالات محددة وبموافقة صريحة من الأفراد المعنيين أو وفقًا للقانون.</li>
        </ul>
        <br>
        <h3>حقوق المستخدم</h3>
        <p>المستخدمون لديهم الحق في الوصول إلى بياناتهم الشخصية، تصحيحها، وطلب حذفها.</p>
        <br>
        <h3>التزامات الشركات الشريكة</h3>
        <p>الشركات الشريكة ملزمة بالتعامل مع البيانات التي تُقدم لها بسرية وأمان، ولا يجوز استخدامها لأغراض غير المطلوبة.</p>
        <br>
        <h3>التغييرات على الشروط والسياسات</h3>
        <p>يحق لشركة Easyjob تعديل هذه الشروط والسياسات وفقًا للقانون المعمول به، مع إشعار المستخدمين بأي تغييرات جوهرية.</p>
        <br>
        <h3>التحكيم وحل النزاعات</h3>
        <p>في حالة نشوء أي نزاعات تتعلق بتفسير أو تطبيق هذه الشروط، يتم حلها عبر التحكيم وفقًا للقوانين السعودية.</p>
        <br>
        <h3>الاختصاص القضائي</h3>
        <p>تخضع هذه الشروط لقوانين المملكة العربية السعودية، وتفسر وفقًا لها.</p>
        <br>
      </div>
    </div>
  </div>
  <!-- Start Footer Seciton -->
  <footer class="st-site-footer st-style1 st-sticky-footer">
    <div class="st-main-footer text-center">
      <div class="container">
        <div class="st-footer-logo">
          <img src="assets/img/light-img/footer-logo.png" alt="demo">
        </div>
        <div class="st-footer-text">          
                 موقع إلكتروني يوفر أكبر عدد ممكن من الفرص الوظيفية المتاحة ونقوم بالتقديم على عدد كبير من الوظائف المتاحة في وقت واحد خلال دقائق معدودة بإمكانيات سريعة .

        </div>
        <div class="st-footer-social">
          <ul class="st-footer-social-btn st-flex st-mp0">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="st-copyright text-center">
        <div class="st-copyright-text">© EasyJob, 2023. <a target="_blank" href="https://solo.to/OmarXtream"><small class="text-muted">Developed by OmarXtream</small></a></div>
    </div>
  </footer>
  <!-- End Footer Seciton -->
 
  <!-- Scripts -->
  <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script src="{{asset('assets/js/mailchimp.min.js')}}"></script>
  <script src="{{asset('assets/js/owlCarousel.min.js')}}"></script>
  <script src="{{asset('assets/js/tamjid-counter.min.js')}}"></script>
  <script src="{{asset('assets/js/wow.min.js')}}"></script>
  <script src="{{asset('assets/js/partical.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
