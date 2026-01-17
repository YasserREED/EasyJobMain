@extends('client.layout.master')


@section('content')
    <!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">قائمة طلباتك</h2>
            </div>
        </div>
        <!-- /Title -->

        
        <!-- Row -->
        <div class="row">
                <section class="container">
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="briefcase"></i> </span> </span>  قائمة خدمة إرسال السيرة الذاتية  </h4>
                    </div>
                    @if (Session::has('errors'))
                    <div class="text-center alert alert-danger mt-3">
                        {{ Session::get('errors')->first() }}
                    </div>
                    @endif

                    @cannot('HasFree') 
                    <div class="text-center mt-3 mb-5">

                    <a href="{{route('cv.free')}}">
                        <button type="button" class="btn btn-primary btn-rounded mt-2">قم بتجربة الباقة المجانية الآن</button>
                    </a>
                    </div>
                    <br><br>
                    @endcannot
        
                    <div class="row mt-3">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>المنطقة</th>
                                            <th>المجال</th>
                                            <th>الباقة</th>
                                            <th>التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list as $cv)
                                        <tr>
                                            <td>{{$cv->id}}</td>
                                            <td>{{$cv->subject}}</td>
                                            <td>{{$cv->regionText()}}</td>
                                            <td>{{$cv->domain}}</td>
                                            <td>{!! $cv->planText() !!}</td>
                                            <td>{{ $cv->created_at->diffForHumans() }}</td>
                                        </tr>
                                        
                                        @empty
                                        <h3>لا يوجد اي طلب مدفوع حتى الآن :( </h3>
                                    
                                        @endforelse

                                        @foreach($freeList as $freeCv)
                                        <tr>
                                            <td>Free</td>
                                            <td>{{$freeCv->subject}}</td>
                                            <td>{{$freeCv->regionText()}}</td>
                                            <td>{{$freeCv->domain}}</td>
                                            <td>{!! $freeCv->planText() !!}</td>
                                            <td>{{ $freeCv->created_at->diffForHumans() }}</td>
                                        </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
                
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->


@endsection




