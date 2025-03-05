<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\States;
// use App\Models\City;
// use App\Models\District;
use App\Models\Ad;
// use App\Models\Subcategory;
// use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdController extends Controller
{
    public function adPage()
    {
        $get = Ad::get();
        return view('admin.ad.ad', compact('get'));
    }

    public function addad()
    {
        // $get = Ad::get();
        return view('admin.ad.add_ad');
    }
   

    public function savead(Request $request)
    {
        

        $rules = [
            // 'adname' => 'required',
            'adimage' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;

        $ad = new Ad();
        // $ad->adname = $request->adname;
        // $ad->position = $request->position;
        $ad->reurl = $request->reurl;
        if ($request->hasfile('adimage'))
        {
            $ext = $request->file('adimage')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/ad/image/' . $name;
            $request->file('adimage')->move(public_path() . '/assets/img/ad/image/', $name);
            $ad->adimage = $profile;
            
        }

        $saved = $ad->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.adpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editad($id)
    {

        $edit = Ad::where('id', $id)->first();
        // $state = States::all();
        // $category = Category::all();
        // $subcategory = Subcategory::all();

        return view('admin.ad.ad_edit', compact('edit'));
    }

    public function updatead(Request $request)
    {
        $rules = [
            // 'adname' => 'required'


        ];

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
        }

        $update = Ad::find($request->id);

        if ($request->hasfile('adimage')) {

            $ext = $request->file('adimage')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/ad/image/' . $name;
            $request->file('adimage')->move(public_path() . '/assets/img/ad/image/', $name);
        } else {
            $profile = $update->null;
        }

        // if ($request->hasfile('ad_icon')) {

        // $ad_icon = $request->file('ad_icon')->store('ad/icon');

        //     $ext = $request->file('ad_icon')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $ad_icon = 'storage/app/public/ad/icon/' . $name;
        //     $request->file('ad_icon')->move(storage_path() . '/app/public/ad/icon/', $name);
        // } else {
        //     $ad_icon = $update->ad_icon;
        // }
        // $update->adname = $request->adname;
        // $update->position = $request->position;
        $update->reurl = $request->reurl;
        $update->adimage = $profile;
        $update->update();


        if ($update) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.adpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function deletead(Request $request)
    {
        $delete = Ad::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.adpage')));
        }
    }

    public function adAjaxList(Request $request)
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

        $ad = Ad::select('ads.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('adimage', 'like', '%' . $search . '%');
                $query->orWhere('reurl', 'like', '%' . $search . '%');
            });


        $total = $ad->count();

        $ads = $ad->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($ads as $ad) {
            $color = $ad->status == 1 ? "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesatus_c" data-id="' . $ad->id . '">' . ($ad->status == 1 ? "Enable" : "Disable") . ' </button>';

            // $color_m = $ad->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<butto type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $ad->id . '">' . ($ad->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                // $ad->adname,
                // $ad->position,
                // $ad->reurl,
                '<img src="' . asset($ad->adimage) . '" height="40px" width="40px">',
                $ad->reurl,
                $status,
                '<a href="' . route('admin.editad', $ad->id) . '" class="h5 p-0 pl-2  edit_ad"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_ad" data-id = "' . $ad->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] = $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function ad_changestatus(Request $request)
    {
        $updatestatus = Ad::find($request->ad_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $subcatory_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

   
    // public function getDistrict(Request $request)
    // {
    //     try {
    //         $subs = District::where('state_id', $request->state_id)->get();
    //         // dd($subs);
    //         return response()->json(['status' => true, 'data' => $subs]);
    //     } catch (\Exception $ex) {
    //         return response()->json(['status' => false, 'data' => $ex->getMessage()]);
    //     }
    // }

    // public function getCity(Request $request)
    // {
    //     try {
    //         $subs = City::where('district_id', $request->district_id)->get();
    //         return response()->json(['status' => true, 'data' => $subs]);
    //     } catch (\Exception $ex) {
    //         return response()->json(['status' => false, 'data' => $ex->getMessage()]);
    //     }
    // }
    // public function modelOnchange(Request $request)
    // {
    //     try {
            
    //         $get = Subcategory::where('category_id', $request->catid)->get();

    //         return response()->json(['status' => true, 'data' => $get]);
    //     } catch (\Exception $ex) {
    //         return response()->json(['status' => false, 'data' => $ex->getMessage()]);
    //     }
    // }


}
