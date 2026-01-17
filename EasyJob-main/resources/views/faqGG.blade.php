<!DOCTYPE html>
<html class="no-js" lang="ar">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">

  <style>

.faq-container {
  width: 600px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.faq-item {
  padding: 20px;
  border-bottom: 1px solid #e0e0e0;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.faq-item:last-child {
  border-bottom: none;
}

.faq-question {
  font-size: 18px;
  font-weight: 700;
  padding-bottom: 3px;
  patting-top: 3px;
}

.faq-answer {
  font-size: 16px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease-in-out;
  text-align: center;
  padding-left: 10px;
  padding-right: 10px;
}

.faq-answer.active {
  border-bottom: 1px solid #e0e0e0;
}

.icon-container i {
  font-size: 16px;
  cursor: pointer;
  transition: transform 0.3s ease-in-out;
}

.icon-container i.active {
  transform: rotate(90deg);
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
                <li><a href="{{route('faq')}}">الأسئلة الشائعة</a></li>
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

  <div class="st-content">

  <div class="st-about-wrap st-section-top mt-5">
    <div class="container">
      <div class="row">
     
        <h1> الاسئلة الشائعة</h1>

      </div>
    </div>
  </div>

  <div class="st-about-wrap st-section-top">
    <div class="container">
      <div class="row">
     
        <div class="faq-container mx-auto">
            <div class="faq-item">
                <div class="faq-question">من يسكن البحر ويحبه الناس؟</div>
                <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
            </div>
            <div class="faq-answer">
                <p>سبونج بوب سكوير بانتز</p>
            </div>
            <div class="faq-item">
                <div class="faq-question">لونه أًصفر مربع حساس ؟</div>
                <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
            </div>
            <div class="faq-answer">
              <p>سبونج بوب سكوير بانتز</p>
            </div>
            <div class="faq-item">
                <div class="faq-question"><p>لو كنت تبحث عن مرح البحار؟</p></div>
                <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
            </div>
            <div class="faq-answer">
              <p>سبونج بوب سكوير بانتز</p>
            </div>
        </div>
        
       
      </div>
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

  <script>
    const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
  const question = item.querySelector('.faq-question');
  const answer = item.nextElementSibling;
  const icon = item.querySelector('i');

  item.addEventListener('click', () => {
    faqItems.forEach(otherItem => {
      if (otherItem !== item) {
        const otherAnswer = otherItem.nextElementSibling;
        const otherIcon = otherItem.querySelector('i');

        otherAnswer.classList.remove('active');
        otherIcon.classList.remove('active');
        otherAnswer.style.maxHeight = "0";
      }
    });

    answer.classList.toggle('active');
    icon.classList.toggle('active');
    if (answer.classList.contains('active')) {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = "0";
    }
  });
});
  </script>
</body>
</html>
