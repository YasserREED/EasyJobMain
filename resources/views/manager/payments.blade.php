@extends('layout.manager.master')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <div class="w-100">
        <h2 class="text-left mb-4 text-dark">المبيعات الإلكترونية</h2>
        <div class="card rounded mb-4">
            <div class="card-body">
                <h3 class="text-dark">إحصائيات سريعة</h3>
                <hr>
                <div class="row">
                    <div class="col-md mb-3">
                        <p>إجمالي الأرباح</p>
                    <h3 class="text-color-2">{{$total}}</h3>
                    </div>

                    <div class="col-md mb-3">
                        <p>المبلغ المستحق لهذا الشهر</p>
                        <h3 class="text-color-4">{{$total_month}}</h3>
                    </div>

                    <div class="col-md mb-3">
                        <p>المبلغ المستحق لهذا الإسبوع</p>
                        <h3 class="text-color-3">{{$total_weak}}</h3>
                    </div>

                </div>
            </div>
        </div>

        <div class="card rounded">
            <div class="card-body">
                <h3 class="text-dark"></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3 p-3">
                        <div class="table-responsive text-center">
                            <table id="showTable" class="table table-striped mb-0">
                              <thead style="background-color: white;">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">إسم المستخدم</th>
                                  <th scope="col">رقم الفاتورة</th>
                                  <th scope="col">الاسم للفاتورة</th>
                                  <th scope="col">البريد الإلكتروني للفاتورة</th>
                                  <th scope="col">نوع السداد</th>
                                  <th scope="col">المبلغ المدفوع</th>
                                  <th scope="col">التاريخ</th>
                                  <th scope="col">رمز خصم</th>

                                </tr>
                              </thead>
                              <tbody>
                            @forelse($payments as $payment)
                                <tr>
                                  <td>{{$payment->id}}</td>
                                  <td>{{$payment->user->name}}</td>
                                  <td>{{$payment->tran_ref}}</td>
                                  <td>{{$payment->customer_name}}</td>
                                  <td>{{$payment->customer_email}}</td>
                                  <td>{{$payment->payment_method}}</td>
                                  <td>{{$payment->tran_total}}</td>
                                  <td>{{$payment->created_at}}</td>

                                  @if(isset($payment->discount) && !empty($payment->discount))
                                  <td> <span class="badge badge-light">{{$payment->discount->coupon}}</span></td>
                                  @else
                                  <td>-</td>
                                  @endif
                                </tr>
                            @empty
                            <h2>لا يوجد أي مبيعات حتى الآن :(</h2>
                            @endforelse
                              </tbody>

                            </table>
                          </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</main>


@endsection


@section('scripts')

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
      const d = new Date();
  
      $('#showTable').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json'
        },
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excelHtml5',
            title: d.toISOString(), // Convert the Date to a string
          },
          {
            extend: 'csvHtml5',
            title: d.toISOString(), // Convert the Date to a string
          },
        ]
      });
    });
  </script>
@endsection
