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
  <style>
    .answer {
      font-weight: 600;
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
            <a href="#" class="st-logo-link"><img src="assets/img/light-img/logo.png" alt="logo"></a>
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
                <li><a href="#about" class="smooth-scroll">من نحن</a></li>
                <li><a href="#service" class="smooth-scroll">خدماتنا</a></li>
                <li><a href="#price" class="smooth-scroll">الباقات</a></li>
                <li><a href="#faq" class="smooth-scroll">الأسئلة الشائعة</a></li>
                <li><a href="#contact" class="smooth-scroll">تواصل معنا</a></li>

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
    <!-- Start Hero Slider -->
    <div class="st-hero-slide st-style1 st-flex text-center st-type2" id="home">
      <div id="st-partical-wrap" class=" wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.35s"></div>
      <div class="container">
        <div class="st-hero-text st-style1">
          <h1 class="st-hero-title">هدفنا ان تصبح وظيفتك <br>سهلة بين يديك</h1>
          <div class="st-hero-subtitle">
            ترقب مستقبلًا أفضل..
          </div>
          <div class="st-btn-group st-style1 st-flex" style="z-index: 100;position: relative;">
            <a href="#price" class="st-btn st-style1 st-color1 smooth-scroll">ابدأ الآن</a>
            <a href="https://www.youtube.com/embed/jRcfE2xxSAw?autoplay=1" class="st-btn st-style2 st-video-open"><i class="flaticon-multimedia"></i> </a>
          </div>
        </div>
        <div class="st-pattern-animation-wrap">
          <img src="{{asset('assets/img/light-img/pattern.png')}}" alt="pattern" class="st-pattern-animation">
        </div>
      </div>
    </div>
    <!-- End Hero Slider -->

    <!-- Start Icon Box -->
    <section class="st-iconbox-wrap st-style1">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="st-iconbox st-style1 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
              <div class="st-iconbox-icon">
                <i class="flaticon-focus"></i>
              </div>
              <h3 class="st-iconbox-title">صناع القرار</h3>
              <div class="st-iconbox-text">
                تسویق السیرة الذاتیة و إرسالھا إلى للموارد البشریة ومسؤولي التوظیف لدى الجھات والشركات السعودیة
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="st-iconbox st-style1 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
              <div class="st-iconbox-icon">
                <i class="flaticon-career"></i>
              </div>
              <h3 class="st-iconbox-title">أحدث الفرص</h3>
              <div class="st-iconbox-text">
                تحدیث مستمر لقائمة الشركات السعودیة التي لدیھا شواغر وظیفیة.
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="st-iconbox st-style1 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
              <div class="st-iconbox-icon">
                <i class="flaticon-career-1"></i>
              </div>
              <h3 class="st-iconbox-title">الفرصة المناسبة لك</h3>
              <div class="st-iconbox-text">
                يتم إرسال سيرتك الذاتية إلى اهم الجهات والشركات التي تتناسب مع مجالك وتخصصك بشكل خاص

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Icon Box -->

    <!-- Start About Section -->
    <div class="st-about-wrap st-section-top" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="st-vertical-middle">
              <div class="st-vertical-middle-in">
                <div class="st-about-img wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s"><img src="{{asset('assets/img/light-img/about-img1.png')}}" alt="demo"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="st-section-heading st-style1">
              <h2>من نحن؟</h2><br>
              <h3>سهولة استثنائية ترافقك في كل خطوة </h3>
            </div>
            <div class="st-about-text">
              <p>
                نحن موقع إلكتروني يوفر أكبر عدد ممكن من الفرص الوظيفية المتاحة ونقوم بالتقديم على عدد كبير من الوظائف المتاحة في وقت واحد خلال دقائق معدودة بإمكانيات سريعة عن طريق الذكاء الصناعي بعد شراء باقة محددة تمكن العميل من التقديم على عدد كبير من الوظائف المتاحة في وقت واحد.

              </p>
              <a href="#contact" class="smooth-scroll st-btn st-style1 st-size1 st-color2">تواصل معنا</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End About Section -->

    <!-- Start Service Section -->
    <section class="st-service-section st-section-top " id="service">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2>خدماتنا</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="{{asset('assets/img/light-img/seperator-icon.png')}}" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p>سهولة تحقيق النجاح المهني تبدأ هنا..</p>
        </div>
      </div>
      <div class="st-owl-controler3-hover">
        <div class="container">
          <div class="st-service-carousel owl-carousel st-style2 st-owl-controler3">
            <div class="st-image-box st-style1 text-center wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
              <a href="#" class="st-image"><img src="{{asset('assets/img/light-img/service3.png')}}" alt="demo"></a>
              <div class="st-image-box-info">
                <h3 class="st-image-box-title"><a href="#">خدمات مخصصة</a></h3>
                <div class="st-image-box-text">

                  <h3>قريباً...</h3>
                </div>
              </div>
            </div>
            <div class="st-image-box st-style1 text-center wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.25s">
              <a href="#" class="st-image"><img src="{{asset('assets/img/light-img/service2.png')}}" alt="cv"></a>
              <div class="st-image-box-info">
                <h3 class="st-image-box-title"><a href="#">إنشاء السيرة الذاتية</a></h3>
                <div class="st-image-box-text">
                  <h3>قريباً...</h3>

                </div>
              </div>
            </div>
            <div class="st-image-box st-style1 text-center wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.3s">
              <a href="#" class="st-image"><img src="{{asset('assets/img/light-img/service1.png')}}" alt="email"></a>
              <div class="st-image-box-info">
                <h3 class="st-image-box-title"><a href="#">خدمة إرسال السيرة الذاتية</a></h3>
                <div class="st-image-box-text">إرسال السيرة الذاتية بسهولة لإدارة الموارد البشرية وشواغر الوظائف في السعودية وعالميًا في أقل من 5 دقائق، مع تحديث دائم للفرص الوظيفية </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Service Section -->

    <!-- Start Fun Fact Section -->
    <div class="st-funfact-wrap st-section-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="st-funfact text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
              <div class="st-funfact-icon"><i class="flaticon-rate"></i></div>
              <h2 class="st-funfact-number st-counter">7384</h2>
              <h3 class="st-funfact-title">عملائنا</h3>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="st-funfact text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.25s">
              <div class="st-funfact-icon"><i class="flaticon-skyline"></i></div>
              <h2 class="st-funfact-number st-counter">20000</h2>
              <h3 class="st-funfact-title">شركات وجهات</h3>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="st-funfact text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
              <div class="st-funfact-icon"><i class="flaticon-laptop"></i></div>
              <h2 class="st-funfact-number st-counter">3</h2>
              <h3 class="st-funfact-title">مدراء وصناع قرار</h3>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Fun Fact Section -->




    <!-- Start CTA Section -->
    <section class="st-cta-wrap st-gray-bg mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 offset-lg-1">
            <div class="st-cta text-center st-section">
              <h3 class="st-cta-title"> هل تبحث عن فرصة جديدة لبداية مسيرتك المهنية؟</h3>
              <div class="st-cta-text"> اجعل رحلة العثور على وظيفتك تجربة سهلة ومثيرة معنا! نحن هنا لنكون بجانبك خطوة بخطوة نحو فرصة مهنية لا تُنسى. <br> انضم إلينا اليوم واستعد لتحقيق اهدافك المهنية</div>
              <div class="st-cta-btn">
                <a href="#price" class="smooth-scroll st-btn st-style1 st-size1 st-color1">إنضم الآن</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="st-vertical-middle">
              <div class="st-vertical-middle-in st-flex">
                <div class="st-cta-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                  <img src="{{asset('assets/img/light-img/cta-img.png')}}" alt="demo">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End CTA Section -->

    <!-- Start Pricing Plan -->
    <section class="st-pricing-wrap st-section" id="price">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2>باقاتنا</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="{{asset('assets/img/light-img/seperator-icon.png')}}" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p>جودة الخدمة هي شعارنا ورضاك هو هدفنا. اكتشف باقاتنا اليوم وانطلق نحو مستقبل مهني مشرق..</p>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="st-price-card text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
              <div class="st-price-card-img"><img src="{{asset('assets/img/light-img/price-img1.png')}}" alt="demo"></div>
              <h3 class="st-price-card-title">بريميوم</h3>
              <div class="st-price">
                <h3>29 ريال</h3>
              </div>
              <p>
                استمتع بسرعة باقة البريميوم التي تمكنك من تقديم طلبات لـ100 وظيفة في لمح البصر!

              </p>
              <div class="st-price-card-btn">
                <a href="{{route('cv.index')}}" class="st-btn st-style1 st-size1 st-color1">تفاصيل اكثر</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="st-price-card text-center st-featured-price wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
              <div class="st-price-card-img"><img src="{{asset('assets/img/light-img/price-img2.png')}}" alt="demo"></div>
              <h3 class="st-price-card-title">بريميوم بلس</h3>
              <div class="st-price">
                <h3>85 ريال</h3>
              </div>
              <p>
                استمتع بسرعة باقة البريميوم بلس التي تمكنك من تقديم طلبات لـ300 وظيفة في لمح البصر!

              </p>
              <div class="st-price-card-btn">
                <a href="{{route('cv.index')}}" class="st-btn st-style1 st-size1 st-color2">تفاصيل اكثر</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="st-price-card text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
              <div class="st-price-card-img"><img src="{{asset('assets/img/light-img/price-img3.png')}}" alt="demo"></div>
              <h3 class="st-price-card-title">بريميوم برو</h3>
              <div class="st-price">
                <h3>139 ريال</h3>
              </div>
              <p>
                استمتع بسرعة باقة البريميوم برو التي تمكنك من تقديم طلبات لـ500 وظيفة في لمح البصر!

              </p>
              <div class="st-price-card-btn">
                <a href="{{route('cv.index')}}" class="st-btn st-style1 st-size1 st-color1">تفاصيل اكثر</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Pricing Plan -->


    <!-- Sart FAQ -->
    <section class="st-faq-section st-section" id="faq">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2 style="margin-top: -60px;">الاسئلة الشائعة</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="{{asset('assets/img/light-img/seperator-icon.png')}}" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p>رضاكم غايتنا</p>
        </div>
      </div>

      <div class="st-owl-controler3-hover">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="accordion" id="faqAccordion">
                <!-- FAQ items -->
                <!-- FAQ item #1 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading1" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" style="padding: 20px; background: white" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        كيف يمكنني التقديم للوظائف عبر المنصة؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      التقديم على الوظائف يتم عن طريق اختيار الباقة المناسبة من الصفحة الرئيسية
                    </div>
                  </div>
                </div>

                <!-- FAQ item #2 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        هل يجب علي دفع رسوم لاستخدام خدمة التقديم على الوظائف؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      بالتأكيد، هي باقة مدفوعة بمبلغ رمزي ومنافس
                    </div>
                  </div>
                </div>

                <!-- FAQ item #3 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading3" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        هل يتطلب تسجيل حساب لاستخدام الخدمة؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      نعم، يجب تسجيل حساب والتأكد من بياناتك بدقة، وذلك لتسجيل وإرسال بياناتك الشخصية
                      المطلوبة لدى الشركات لوصولهم إليك بشكل كامل بالإضافة للتحقق من وسيلة الدفع
                      وإتمام الطلب بشكل كامل
                    </div>
                  </div>
                </div>

                <!-- FAQ item #4 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading4" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        كيف يمكنني تحديدالمجالات التي أبحث فيها عن الوظائف؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      يوجد قائمة عند إكمال بيانات الحساب المطلوبة تتضمن بها المجالات للتقدّم عليها بالإضافة
                      للمناطق المختارة
                    </div>
                  </div>
                </div>

                <!-- FAQ item #5 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading5" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        هل تقدمون خدمات لتحسين سيرتي الذاتية أو تقديم نصائح للمتقدمين؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      نعمل حاليًا على تطوير هذه الخدمة كما أننا سوف نطور لمستقبل باهر وتقديم أفضل خدمة
                      لتصميم السيرة الذاتية الإحترافية وتلبية جميع رغباتكم
                    </div>
                  </div>
                </div>

                <!-- FAQ item #6 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading6" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        كم يستغرق عادة الرد على طلبات التوظيف لدى الشركات التي تم التقديم عليها؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      يعتمد ذلك على خبراتك المهنية ومهاراتك وإحترافية سيرتك الذاتية وكلما كانت مكتملة
                      ومختصرة بشكل أكبر ومرفق بها بياناتك الشخصية بشكل دقيق وتجاربك المهنية السابقة بشكل
                      تفصيلي كلما زادت نسبة الرد عليك بشكل أسرع من قِبل الشركات التي لديها شواغر وظيفية
                    </div>
                  </div>
                </div>

                <!-- FAQ item #7 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading7" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        هل يمكنني تتبع حالة طلبي عبر المنصة؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      نعم يمكنك ذلك علمًا أنه تنفيذ الطلب فوري ويقوم به الذكاء الصناعي للتقديم على الوظائف
                      بشكل كامل
                    </div>
                  </div>
                </div>

                <!-- FAQ item #8 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading8" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        هل تقدمون خدمات لتنبيهي عند ظهور وظيفة تناسب مؤهلاتي؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      لا تتوفر هذه الخدمة بالوقت الحالي ولكن نحن نعمل على توفيرها مستقبلًا لتطوير خدماتنا بشكل
                      واسع
                    </div>
                  </div>
                </div>

                <!-- FAQ item #9 -->
                <div class="card">
                  <div class="card-header text-wrap faq-item" id="heading9" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse9" style="padding: 20px; background: white">
                    <h5 class="mb-0">
                      <div class="faq-question">
                        كيف أعرف أنه تم تفعيل الباقة بشكل صحيح؟
                      </div>
                    </h5>
                    <div class="icon-container"><i class="fas fa-chevron-down"></i></div>
                  </div>
                  <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#faqAccordion">
                    <div class="card-body text-right answer">
                      بعد انتهاء تنفيذ الطلب سيتم تحديث حاله الطلب في لوحة تحكم الخاصة بالمستخدم علمًا بأن
                      التقديم على إجمالي عدد الوظائف في الباقة المطلوبة يتم التقديم عليها خلال 5 دقائق فقط
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End FAQ -->

    <!-- Start Contact Section -->
    <section class="st-contact-wrap st-gray-bg st-section" id="contact">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2>تواصل معنا</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="{{asset('assets/img/light-img/seperator-icon.png')}}" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p>نتطلع لخدمتك
            ونسعد بتواصلك معنا

          </p>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div id="cf-msg"></div>
            <form action="{{ route('contact') }}" method="post" class="st-contact-form" id="cf">
              @csrf
              <input type="text" placeholder="الاسم الكامل" id="name" name="name" value="{{ old('name') }}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <input type="text" placeholder="البريد الالكتروني" id="email" name="email" value="{{ old('email') }}">
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <input type="text" placeholder="الموضوع" id="subject" name="subject" value="{{ old('subject') }}">
              @error('subject')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <textarea cols="30" rows="10" placeholder="الرسالة" id="msg" name="msg">{{ old('msg') }}</textarea>
              @error('msg')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <button class="st-btn st-style1 st-size1 st-color1" type="submit" id="submit" name="submit">إرسال</button>
            </form>
          </div>
          <div class="col-lg-6">
            <div class="st-contact-info st-style1">
              <div class="st-contact-info-in">
                <h3 class="st-contact-info-title">تواصل معنا</h3>
                <div class="st-contact-info-text">.تواصل معنا لأي أستفسار سوف ندعمك بكل احترافية واهتمام. نحن رفقاء رحلتك نحو التفوق والنجاح. لا تتردد في مشاركة ملاحظاتك وأفكارك القيمة لتطوير خدماتنا حتى نحقق رضاكم</div>
                <h3 class="st-contact-info-title">معلومات التواصل</h3>
                <ul>
                  <li><i class="fas fa-map-signs"></i>Twitter</li>
                  <li><i class="fas fa-phone"></i>instagram</li>
                  <li><i class="fas fa-envelope"></i><a href="mailto:support@easy-job.net">support@easy-job.net</a></li>
                  <li><i class="fas fa-globe"></i><a href="https://easy-Job.net">www.easy-Job.net</a></li>
                </ul>
              </div>
              <div class="st-svg-animation1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="590px" height="436px">
                  <defs>
                    <filter filterUnits="userSpaceOnUse" id="Filter_0" x="0px" y="0px" width="590px" height="436px">
                      <feOffset in="SourceAlpha" dx="0" dy="5" />
                      <feGaussianBlur result="blurOut" stdDeviation="3.162" />
                      <feFlood flood-color="rgb(106, 106, 106)" result="floodOut" />
                      <feComposite operator="atop" in="floodOut" in2="blurOut" />
                      <feComponentTransfer>
                        <feFuncA type="linear" slope="0.15" />
                      </feComponentTransfer>
                      <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                      </feMerge>
                    </filter>
                  </defs>
                  <g filter="url(#Filter_0)">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M359.506,400.811 C311.350,416.741 266.303,427.200 215.885,416.924 C166.065,406.770 119.155,382.030 83.358,345.883 C32.880,294.910 5.320,222.074 9.403,150.433 C11.889,106.817 27.202,61.676 61.083,34.027 C101.026,1.428 158.043,-0.486 208.701,8.960 C259.358,18.407 308.226,37.556 359.592,41.763 C414.001,46.218 473.787,34.861 519.488,64.652 C532.722,73.279 543.780,84.912 553.231,97.563 C563.583,111.419 572.219,126.797 576.587,143.532 C584.814,175.056 577.226,208.904 563.417,238.444 C538.267,292.240 493.162,335.144 441.630,364.721 C415.638,379.639 387.934,391.407 359.506,400.811 Z" />
                  </g>
                </svg>
              </div><!-- .st-svg-animation1 -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

    <!-- Start Map Section -->
    <!-- <div class="st-map-wrap">
      <div class="st-map-bar st-flex">
        <div class="st-map-bar-img">
          <img src="{{asset('assets/img/light-img/map-icon-img.png')}}" alt="demo">
          <div class="st-map-bar-icon"><i class="fas fa-map-marker-alt"></i></div>
        </div>
      </div>
      <div class="st-map-wrpa">
        <div class="st-google-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96652.27317354927!2d-74.33557928194516!3d40.79756494697628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3a82f1352d0dd%3A0x81d4f72c4435aab5!2sTroy+Meadows+Wetlands!5e0!3m2!1sen!2sbd!4v1563075599994!5m2!1sen!2sbd" allowfullscreen></iframe>
        </div>
      </div>
    </div> -->
    <!-- End Map Section -->
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
  <!-- Start Video Popup -->
  <div class="st-video-popup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
      <div class="st-video-popup-layer"></div>
      <div class="st-video-popup-container">
        <div class="st-video-popup-align">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="about:blank"></iframe>
          </div>
        </div>
        <div class="st-video-popup-close"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->
  <!-- Scripts -->
  <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script src="{{asset('assets/js/mailchimp.min.js')}}"></script>
  <script src="{{asset('assets/js/owlCarousel.min.js')}}"></script>
  <script src="{{asset('assets/js/tamjid-counter.min.js')}}"></script>
  <script src="{{asset('assets/js/wow.min.js')}}"></script>
  <script src="{{asset('assets/js/partical.js')}}"></script>
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>