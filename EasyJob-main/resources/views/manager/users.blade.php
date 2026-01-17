@extends('layout.manager.master')
@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <div class="w-100">
            <h2 class="text-left mb-4 text-dark">المستخدمين</h2>

            <div class="card rounded">
                <div class="card-body">
                    <h3 class="text-dark">المستخدمين المسجلين في الموقع</h3>
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
                                            <th scope="col">رقم الجوال</th>
                                            <th scope="col">تاريخ التسجيل</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->created_at }}</td>

                                            </tr>
                                        @empty
                                            <h2>لا يوجد احد :( </h2>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="disActive text-dark mb-5">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>


    </main>


@endsection
