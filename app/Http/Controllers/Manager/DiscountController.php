<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

use Illuminate\Support\Facades\Validator;
use App\Traits\MyFunctions;

use DB;

class DiscountController extends Controller
{
    use MyFunctions;

    public function __construct()
    {
        $this->middleware('is.manager');
    }

    public function index()
    {
        $keys = Discount::where('status', '!=', 2)->paginate(5);

        return view('manager.discounts', compact('keys'));
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'coupon' => 'bail|required|string|unique:discounts,coupon|max:30', 'discount' => 'bail|required|integer|between:1,100',

            ]);

            if ($validator->fails()) {
                $response = $this->RespError($validator->errors());
                return response()
                    ->json($response);
            }

            $create = Discount::create(['coupon' => $request->coupon, 'discount' => $request->discount,]);
            if (!$create->save()) {
                App::abort(500, 'Error');
            } else {
                $response = $this->RespSuccess('تم إنشاء كود الخصم بنجاح');
                return response()
                    ->json($response);
            }
        } catch (\Exception $ex) {
            $response = $this->RespError(['Error' => ['حدث خطا ما']]);
            return response()
                ->json($response);
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ['id' => 'bail|required|integer|exists:discounts,id']);

            if ($validator->fails()) {
                $response = $this->RespError($validator->errors());
                return response()
                    ->json($response);
            }
            $id = $request->input('id');
            DB::update('update discounts SET status = CASE WHEN status = 1 THEN 0 ELSE 1 END WHERE id = ?', [$id]);

            $response = $this->RespSuccess('تم تحديث الرمز بنجاح');
            return response()
                ->json($response);
        } catch (\Exception $ex) {
            $response = $this->RespError(['Error' => ['حدث خطا ما']]);
            return response()
                ->json($response);
        }
    }

    public function destory(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ['id' => 'bail|required|integer|exists:discounts,id']);

            if ($validator->fails()) {
                $response = $this->RespError($validator->errors());
                return response()
                    ->json($response);
            }
            $id = $request->input('id');
            $Discount = Discount::findOrFail($id);
            $Discount->update(['status' => 2]);
            if ($Discount->save()) {
                $response = $this->RespSuccess('تم حذف الرمز بنجاح');
            } else {
                $response = $this->RespError(['Error' => [__('حدث خطا ما')]]);
            }
            return response()->json($response);
        } catch (\Exception $ex) {
            $response = $this->RespError(['Error' => ['حدث خطا ما']]);
            return response()
                ->json($response);
        }
    }
}
