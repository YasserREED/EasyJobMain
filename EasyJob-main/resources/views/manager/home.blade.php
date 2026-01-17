@extends('layout.manager.master')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <div class="w-100">
        <div class="card rounded">
            <div class="card-body">
                <h3 class="text-dark">إحصائيات</h3>
                <hr>
                <div class="row">
                    <div class="col-md mb-3">
                        <p>عدد المستخدمين</p>
                        <h3 class="text-color-3">{{ $userCount }}</h3>
                    </div>
                    <div class="col-md mb-3">
                        <p>عدد طلبات الخدمة المدفوعة</p>
                        <h3 class="text-color-4">{{$CVCount}}</h3>
                    </div>


                    <div class="col-md mb-3">
                        <p>عدد الطلبات المجانية</p>
                    <h3 class="text-color-2">{{$FreeCVCount}}</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="card rounded">
        <div class="card-body">
            <h3 class="text-dark"></h3>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3 p-3">
                    <h3>{{ $chart1->options['chart_title'] }}</h3>
                    {!! $chart1->renderHtml() !!}

                      </div>


                      <div class="col-md-6 mb-3 p-3">
                        <h3>{{ $chart2->options['chart_title'] }}</h3>
                        {!! $chart2->renderHtml() !!}
    
                          </div>
    
                </div>

            </div>

        </div>
    </div>
           
</main>


@endsection

@section('scripts')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}


{!! $chart2->renderChartJsLibrary() !!}
{!! $chart2->renderJs() !!}


@endsection


