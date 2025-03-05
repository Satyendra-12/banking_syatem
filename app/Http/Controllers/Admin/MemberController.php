<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Memberoption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MemberController extends Controller
{
    public function memberPage()
    {
        $get = Memberoption::get();
        return view('admin.member.member', compact('get'));
    }

    public function addmember()
    {
        
        $excludedUserIds = DB::table('memberoptions')->pluck('user_id');
        $member = User::whereNotIn('id', $excludedUserIds)
                      ->orderBy('id', 'desc')
                      ->get();
    
        return view('admin.member.add_member', compact('member'));
    }
    
   

    public function savemember(Request $request)
    {
        

        $rules = [
            'user_id' => 'required',
            
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
        }

        $profile = null;

        $member = new Memberoption();
        $member->user_id = $request->user_id;
        $member->management = $request->managements;
        $member->feature = $request->features;
        $member->who = $request->who;
        $member->product = $request->products;
        $member->branch = $request->branches;
        $member->atm = $request->atm;
        $member->career = $request->careers;
        $member->offer = $request->offers;
        $member->review = $request->reviews;
       
       $saved = $member->save();

        if ($saved) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Added', 'location' => route('admin.memberpage')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
        }
    }

    public function editmember($id)
    {

        $edit = Memberoption::where('id', $id)->latest('updated_at')
        ->first();
        $member = User::get();
        // dd( $edit);
        // $state = States::all();
        // $category = Category::all();
        // $subcategory = Subcategory::all();

        return view('admin.member.edit_member', compact('edit','member'));
    }

    public function updatemember(Request $request)
    {
        $rules = [
            'user_id' => 'required'
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['status' => false, 'msg' => $validator->errors()->first()]);
        }
    
        $update = Memberoption::find($request->id);
    
        if (!$update) {
            return response()->json(['status' => false, 'msg' => 'Member option not found']);
        }
    
        // Update only the fields that are present in the request
        if ($request->has('user_id')) {
            $update->user_id = $request->user_id;
        }
    
        // Update each field based on the request value
        $update->management = $request->input('managements', 0);
        $update->feature = $request->input('features', 0);
        $update->who = $request->input('who', 0);
        $update->product = $request->input('products', 0);
        $update->branch = $request->input('branches', 0);
        $update->atm = $request->input('atm', 0);
        $update->career = $request->input('careers', 0);
        $update->offer = $request->input('offers', 0);
        $update->review = $request->input('reviews', 0);
    
        $update->save();
    
        return response()->json(['status' => true, 'msg' => 'Successfully Updated', 'location' => route('admin.memberpage')]);
    }
    
    
    public function deletemember(Request $request)
    {
        $delete = Memberoption::find($request->id);
        $delete->delete();

        if ($delete) {
            return response()->json(array('status' => true, 'msg' => 'Successfully Delete', 'location' => route('admin.memberpage')));
        }
    }

    public function memberAjaxList(Request $request)
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

        $new = Memberoption::select('memberoptions.*','users.username')
        ->join('users', 'memberoptions.user_id', '=', 'users.id')
        ->orWhere(function ($query) use ($search) {
            $query->orWhere('users.username', 'like', '%' . $search . '%');
            });


        $total = $new->count();

        $member = $new->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($member as $new) {
            $color = $new->status == 1 ? "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn ' . $color . ' changesatus_c" data-id="' . $new->id . '">' . ($new->status == 1 ? "Enable" : "Disable") . ' </button>';
            $overview = $new->overview == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $management = $new->management == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $feature = $new->feature == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $who = $new->who == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $product = $new->product == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $branch = $new->branch == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $atm = $new->atm == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $career = $new->career == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $offer = $new->offer == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            $review = $new->review == 1 ? '<a href ="' . route('user.userloginid', $new->user_id) . '" target="_blank">Add Data </a>' : "N/A";
            // $color_m = $ad->manu_status == 1 ?  "btn-success" : "btn-warning";
            // $status_m = '<button  type="button" class="btn '. $color_m .' changemanustatus" data-id="' . $ad->id . '">' . ($ad->manu_status == 1 ? "Active" : "Inactive") . ' </button>';
            $data[] = array(
                $i++,
                $new->username,
                $overview,
                $management,
                $feature,
                $who,
                $product,
                $branch,
                $atm,
                $career,
                $offer,
                $review,
                // $status,
                '<a href="' . route('admin.editmember', $new->id) . '" class="h5 p-0 pl-2  edit_member"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 delete_member" data-id = "' . $new->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] = $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function member_changestatus(Request $request)
    {
        $updatestatus = Memberoption::find($request->member_id);
        $updatestatus->status = $updatestatus->status == 1 ? 0 : 1;
        $member_id = $updatestatus->update();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }

   
   

}
