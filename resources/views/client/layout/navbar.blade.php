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

 
<div class="hk-pg-wrapper">
