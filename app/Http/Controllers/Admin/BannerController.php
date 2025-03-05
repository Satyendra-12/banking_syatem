<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function banner()
    {

        return view('admin.banner.banner');
    }

    public function addBanner()
    {

        return view('admin.banner.add_banner');
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
                $profile = 'assets/img/banner/image/'.$name;
                $request->File('image')->move(public_path() . '/assets/img/banner/image/', $name);
                
            }else{
                $profile = null;
            }

            $banner = new Banner();
            $banner->name = $request->name;
            $banner->image = $profile;
            $banner->save();

            if ($banner) {
                return response()->json(array('status' => true, 'msg' => 'Successfullly Added','location'=>route('admin.banner')));
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

        $banner = Banner::select('banners.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('image', 'like', '%' . $search . '%');
            });


        $total = $banner->count();

        $banners = $banner->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($banners as $banner) { 
            $color = $banner->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changebannerstatus" data-id="' . $banner->id . '">' . ($banner->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                '<img src="' . asset($banner->image) . '" height="40px" width="40px">',
                // $banner->name,
               
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('admim.banneredit', $banner->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletebanner" data-id = "' . $banner->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function bannerEdit($id)
    {

        $banneredit = Banner::find($id);

        return view('admin.banner.edit_banner',compact('banneredit'));

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
            $bannerupdate =  Banner::find($request->id);

            if ($request->hasFile('image')) {
                
                $ext = $request->file('image')->getClientOriginalExtension();
                $name = substr(uniqid(),0,9).'.'.$ext;
                $profile = 'assets/img/banner/image/'.$name;
                $request->File('image')->move(public_path() . '/assets/img/banner/image/', $name);
                
            }else{
                $profile =   $bannerupdate->image;
            }

             $bannerupdate->image = $profile;
             $bannerupdate->update();

            if ( $bannerupdate) {
                return response()->json(array('status' => true, 'msg' => 'Successfullly Added','location'=>route('admin.banner')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went wrong , Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }




    public function deleteBanner(Request $request)
    {
        $deletebanner = Banner::find($request->id);

        $deletebanner->delete();

        if ($deletebanner) {

            return response()->json(array('status' => true, 'msg' => 'Successfullly deleted'));

           
        }
    }


    public function bannerStatus(Request $request)
    {
        $updateslider = Banner::find($request->banner_id);

        $updateslider->status = $updateslider->status == 1 ? 0 : 1;
        $slider = $updateslider->update();

        if ($updateslider) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }
    }
}
