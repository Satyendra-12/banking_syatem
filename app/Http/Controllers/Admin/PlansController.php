<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlansController extends Controller
{
    public function plansPage()
    {
        return view('admin.plans.plans');
    }

    public function addPlans()
    {
        return view('admin.plans.add_plans');
    }


    public function storePlans(Request $request)
    {
        try {
            $rules = [
                'month' => 'required',
                'price' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }

            $plans = new Plans();
            $plans->months = $request->month;
            $plans->price = $request->price;
            $plans->save();

            if ($plans) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.planspage')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something went wrong , Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }


    public function plansAjaxList(Request $request)
    {

        if (isset($request->search['value'])) {
            $search = $request->search['value'];
        } else {
            $search = '';
        }

        if (isset($request->length)) {
            $limit = $request->length;
        } else {
            $limit = 10;
        }

        if (isset($request->start)) {
            $ofset = $request->start;
        } else {
            $ofset = 0;
        }
        $orderType = $request->order[0]['dir'];
        $nameOrder = $request->columns[$request->order[0]['column']]['name'];

        $plan = Plans::orWhere(function ($query) use ($search) {
            $query->orWhere('months', 'like', '%' . $search . '%');
        });
        $total = $plan->count();

        $plans = $plan->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();

        $i = 1 + $ofset;
        $data = [];

        foreach ($plans as $plan) {
            $color = $plan->status == 1 ?  "btn-success" : "btn-warning";
            // $productImage = '<img src="' . asset($products->image) . '" style="width: 50px; height: 50px;">';
            $status =  '<span  class="btn ' . $color . ' p-1  statusChange_plans" style="width:80px;"  data-id="' . $plan->id . '">' . ($plan->status == 1 ?  "Active" : "Inactive") . '</span>';

            $data[] = array(
                $i++,
                $plan->months,
                $plan->price,
                $status,



                //     $i++,
                //     $products->product_name,
                //     $productImage,
                //     $products->price,
                //     $products->unit,
                //     $products->description,
                //     $status,

                '<a href="' . route('admin.editplans', $plan->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteplans" data-id = "' . $plan->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editPlans($id)
    {

        $editplans = Plans::find($id);
        return view('admin.plans.edit_plans', compact('editplans'));
    }


    public function updatePlans(Request $request)
    {

        try {
            $rules = [
                'month' => 'required',
                'price' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }

            $plansupdate = plans::find($request->id);
            $plansupdate->months = $request->month;
            $plansupdate->price = $request->price;
            $plansupdate->update();

            if ($plansupdate) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.planspage')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something went wrong , Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function deletePlans(Request $request)
    {

        $deleteplans = Plans::find($request->id);
        $deleteplans->delete();


        if ($deleteplans) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete'));
        }
    }

    public function status_change_plans(Request $request)
    {
        $chagessatatus = Plans::find($request->plan_id);
        // dd($chagessatatus);
        $chagessatatus->status = $chagessatatus->status == '1' ? '0' : '1';
        $coupon = $chagessatatus->save();

        if ($coupon) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }
    }
}
