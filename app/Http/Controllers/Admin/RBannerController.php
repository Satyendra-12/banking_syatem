<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RBannerController extends Controller
{
    public function banner()
    {

        return view('admin.rbanner.banner');
    }

    public function addBanner()
    {

        return view('admin.rbanner.add_banner');
    }

    public function storeBanner(Request $request)
    {
        try {
            $rules = [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:4096'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }

            if ($request->hasFile('image')) {
                
                $ext = $request->file('image')->getClientOriginalExtension();
                $name = substr(uniqid(),0,9).'.'.$ext;
                $profile = 'assets/img/rbanner/image/'.$name;
                $request->File('image')->move(public_path() . '/assets/img/rbanner/image/', $name);
                
            }else{
                $profile = null;
            }

            $banner = new RBanner();
            $banner->image = $profile;
            $banner->save();

            if ($banner) {
                return response()->json(array('status' => true, 'msg' => 'Successfullly Added','location'=>route('admin.rbanner')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went wrong , Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }


    public function bannerAjaxList(Request $request)
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

        $rbanner = RBanner::select('r_banners.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('image', 'like', '%' . $search . '%');
            });


        $total = $rbanner->count();

        $rbanners = $rbanner->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($rbanners as $rbanner) { 
            $color = $rbanner->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changebannerstatus" data-id="' . $rbanner->id . '">' . ($rbanner->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                '<img src="' . asset($rbanner->image) . '" height="40px" width="40px">',
               
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('admim.rbanneredit', $rbanner->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletebanner" data-id = "' . $rbanner->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function bannerEdit($id)
    {

        $banneredit = RBanner::find($id);

        return view('admin.rbanner.edit_banner',compact('banneredit'));

    }

    public function updateBanner(Request $request)
    {
     
        try {
            $rules = [
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }
            $bannerupdate =  RBanner::find($request->id);
         
            if ($request->hasFile('image')) {
                
                $ext = $request->file('image')->getClientOriginalExtension();
                $name = substr(uniqid(),0,9).'.'.$ext;
                $profile = 'assets/img/rbanner/image/'.$name;
                $request->File('image')->move(public_path() . '/assets/img/rbanner/image/', $name);
                
            }else{
                $profile =   null;
            }

             $bannerupdate->image = $profile;
             $bannerupdate->update();

            if ( $bannerupdate) {
                return response()->json(array('status' => true, 'msg' => 'Successfullly Added','location'=>route('admin.rbanner')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went wrong , Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }




    public function deleteBanner(Request $request)
    {
        $deletebanner = RBanner::find($request->id);

        $deletebanner->delete();

        if ($deletebanner) {

            return response()->json(array('status' => true, 'msg' => 'Successfullly deleted'));

           
        }
    }


    public function bannerStatus(Request $request)
    {
        $updatebanner = RBanner::find($request->banner_id);

        $updatebanner->status = $updatebanner->status == 1 ? 0 : 1;
        $banner = $updatebanner->update();

        if ($updatebanner) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }
    }
}
