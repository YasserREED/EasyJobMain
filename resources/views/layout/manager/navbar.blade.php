<nav class="navbar navbar-light sticky-top flex-md-nowrap p-0 mb-3">
    <a class="navbar-brand col-md-3 col-lg-2 mx-0 h-100 d-flex align-items-center text-muted" href="#">EasyJob</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="w-100 d-none d-md-flex h-100 align-items-center">


        <ul class="navbar-nav px-3 ml-auto">

            <li class="nav-item dropdown mr-md-3" style="background: transparent">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="text-left mb-0 ml-3 text-dark mr-auto"
                        style="color: #7F7F7F">{{ Auth::guard('manager')->user()->username }}</span>
                    <button class="btn btn-sm btn-light ml-2" style="color: #7F7F7F">
                        <i class="far fa-user"></i>
                    </button>
                </a>
                <div class="dropdown-menu position-absolute" style="left:0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">تسجيل خروج</a>
                    <form id="logout-form" action="{{ route('manager.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>
    </div>

</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3 mt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('managerHome') }}">
                            <img src="{{ asset('assets/staff/imgs/home.svg') }}" width="24px" height="24px" alt="home">
                            الرئيسية
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manager.users') }}">
                            <img src="{{ asset('assets/staff/imgs/users.svg') }}" width="24px" height="24px" alt="users">
                            المستخدمين
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('manager.payments.index')}}">
                            <img src="{{ asset('assets/staff/imgs/payment.svg') }}" width="24px" height="24px"
                                alt="payments">
                            المبيعات
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('manager.discounts.index')}}">
                            <img src="{{ asset('assets/staff/imgs/discounts.svg') }}" width="24px" height="24px"
                                alt="discounts"> رموز الخصم
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('manager.contact')}}">
                            <img src="{{ asset('assets/staff/imgs/contact.svg') }}" width="24px" height="24px"
                                alt="discounts"> التواصل
                        </a>
                    </li>


                 

                    {{-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    <img src="{{asset("staff/imgs/alert.svg")}}" width="24px" height="24px" alt="alerts">  الإشعارات
                  </a>
                </li> --}}
                  

                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt ml-1 mr-1"></i> تسجيل الخروج
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
