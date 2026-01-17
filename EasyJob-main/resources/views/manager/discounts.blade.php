@extends('layout.manager.master')
@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
        <div class="w-100">
            <h2 class="text-left mb-4 text-dark">الخصم</h2>

            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="text-dark">رموز الخصم</h3>
                        </div>

                        <div>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#disModal">إضافة</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @forelse ($keys as $key)
                            <div class="col-md-12 mb-2" id="d-{{ $key->id }}">
                                <div class="bg-light d-flex justify-content-between rounded p-3 mb-3">
                                    <div>
                                        <b>{{ $key->coupon }}</b> (تم إنشائه: {{ $key->created_at }})
                                    </div>
                                    <div>
                                        <span class="badge badge-secondary p-2 text-white">{{ $key->discount }}%</span>

                                        <span style="background-color:#FF9B7E "
                                            class="badge badge-secondary p-2 text-white">{{ $key->count }} مستخدم</span>
                                        @if ($key->status == 1)
                                            <a style="cursor: pointer" class="active badge badge-success p-2 text-white"
                                                onclick="ChangeStatus({{ $key->id }})" id="ChangeActive{{ $key->id }}">مفعل</a>

                                        @else
                                            <a style="cursor: pointer" class="disactive badge badge-danger p-2 text-white"
                                                onclick="ChangeStatus({{ $key->id }})" id="ChangeActive{{ $key->id }}">غير
                                                مفعل</a>
                                        @endif
                                        <a style="cursor: pointer" class="disactive badge badge-dark p-2 text-white"
                                            onclick="Remove({{ $key->id }})"><i class="fas fa-times"></i></a>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <h2 class="text-center">لا يوجد اكواد خصم حالياً</h2>
                        @endforelse






                    </div>
                    <div class="disActive text-dark mb-5">
                        {{ $keys->links() }}
                    </div>

                </div>
            </div>
        </div>


    </main>

    <!-- Modal -->
    <div class="modal fade" id="disModal" tabindex="-1" role="dialog" aria-labelledby="disTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="disTitle">إنشاء كود خصم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="KeyForm" onsubmit="return false;">
                        <div class="form-row">
                            <div class="col-12 mb-3">
                                <label for="disPer">
                                    نسبة الخصم
                                </label>
                                <input type="number" name="discount" id="disPer" min="1" max="100" placeholder="10%"
                                    class="form-control">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="disCode">
                                    كود الخصم
                                </label>
                                <input type="text" name="coupon" id="disCode" placeholder="OmarXtream2030"
                                    class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-primary" onclick="CreateKey()">إنشاء</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    function CreateKey() {
        var form = $('#KeyForm');
        sendData(" {{ route('manager.discount.store') }}", form.serialize())
            .then(function(response) {
                $.each(response.m, function(key, val) {
                    swal.fire({
                        title: response.t,
                        text: val[0],
                        icon: response.tp,
                        showConfirmButton: response.b,
                        confirmButtonText: 'حسناً'
                    });
                });
                if (response.tp == 'success') {
                    $('#disModal').modal('hide');
                    $('#KeyForm')[0].reset();
                    console.log('Key Created Successfuly');
                }
            });
    }


    function ChangeStatus(id, element) {
        swal.fire({
            title: 'هل انت متأكد؟',
            text: "سوف يتم تغيير حالة الرمز بشكل مباشر",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'تراجع',
            confirmButtonText: 'تأكيد'
        }).then((result) => {
            if (result.value) {
                sendData("{{ route('manager.discount.update') }}", "id=" + id)
                    .then(function(response) {
                        $.each(response.m, function(key, val) {
                            new toast({
                                icon: response.tp,
                                title: val[0]
                            });
                            if (response.tp == 'success') {
                                if ($("#ChangeActive" + id).hasClass("active")) {
                                    $("#ChangeActive" + id).text("غير مفعل");
                                    $("#ChangeActive" + id).removeClass("active").removeClass(
                                        "badge-success").addClass("badge-danger").addClass(
                                        "disactive");
                                } else {
                                    $("#ChangeActive" + id).text("مفعل");
                                    $("#ChangeActive" + id).removeClass("disactive").removeClass(
                                        "badge-danger").addClass("badge-success").addClass(
                                        "active");
                                }
                                // animateCSS('#k-'+id, 'flash').then((message) => {
                                //     $('#k-'+id).remove();
                                //     });
                                console.log('Key updates Successfuly');
                            }
                        });
                    });
            }
        });
    }

    function Remove(id) {
        swal.fire({
            title: 'هل انت متأكد؟',
            text: "سوف يتم حذف الرمز بشكل مباشر",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'تراجع',
            confirmButtonText: 'تأكيد'
        }).then((result) => {
            if (result.value) {
                sendData("{{ route('manager.discount.destory') }}", "id=" + id)
                    .then(function(response) {
                        $.each(response.m, function(key, val) {
                            new toast({
                                icon: response.tp,
                                title: val[0]
                            });
                            if (response.tp == 'success') {
                                animateCSS('#d-' + id, 'flash').then((message) => {
                                    $('#d-' + id).remove();
                                });
                                console.log('Key Removed Successfuly');
                            }
                        });
                    });
            }
        });
    }

</script>
@endsection
