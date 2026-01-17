@extends('client.layout.master')
@section('content')
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">مرحباً بك في لوحة تحكم العميل</h2>
                <p>ترقب مستقبلاً أفضل.. </p>
                
            </div>
            @cannot('HasFree') 
            <div class="text-left mt-3">

            <a href="{{route('cv.free')}}">
                <button type="button" class="btn btn-primary btn-rounded mt-2">قم بتجربة الباقة المجانية الآن</button>
            </a>
            </div>
            @endcannot

        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title text-right">خدمة إرسال السيرة الذاتية </h5>
                    <p class="mt-10 mb-40 text-right">اجعل بداية العثور على وظيفتك أمرًا سهلاً معنا. نحن هنا لنقودك خطوة بخطوة نحو فرصة مهنية مثمرة</p>
                    
                    <div class="row">
                        <div class="col-sm text-center">
                          
                            <img class="d-block mx-auto" src="{{asset('assets/img/light-img/service1.png')}}" alt="email" height="200px">

                            <a href="{{route('cv.index')}}">
                            <button type="button" class="btn btn-primary btn-rounded mt-2">إبدأ الخدمة</button>
                            </a>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->


@endsection