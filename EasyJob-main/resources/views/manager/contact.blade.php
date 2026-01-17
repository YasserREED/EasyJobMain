@extends('layout.manager.master')
@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <div class="w-100">
            <h2 class="text-left mb-4 text-dark">رسائل التواصل</h2>

            <div class="card rounded">
                <div class="card-body">
                    <h3 class="text-dark">الرسائل المرسلة</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3 p-3">
                            <div class="table-responsive text-center">
                                <table class="table table-striped mb-0">
                                    <thead style="background-color: white;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">الإسم</th>
                                            <th scope="col">البريد الإلكتروني</th>
                                            <th scope="col">الموضوع</th>
                                            <th scope="col">الرسالة</th>
                                            <th scope="col">تاريخ الرسالة</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                <td> <button data-toggle="modal" data-target="#msg-{{$contact->id}}"  class="ml-3 btn btn-none"><img src="{{asset("assets/staff/imgs/contact.svg")}}" width="24px" height="24px" alt="msg"></a> </td>
                                                <td>{{ $contact->created_at }}</td>

                                            </tr>

                                            <div class="modal fade" id="msg-{{$contact->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title">رسالة رقم {{ $contact->id }}</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <p>{{ $contact->msg }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                        @empty
                                            <h2>لا يوجد اي رسالة :( </h2>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="disActive text-dark mb-5">
                        {{ $contacts->links() }}
                    </div>

                </div>
            </div>
        </div>


    </main>


@endsection
