<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function branchPage()
    {
        return view('user.branch.branch');
    }

    public function addbranch()
    {
        return view('user.branch.add_branch');
    }

    public function savebranch(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $branch = new Branch();
            $branch->user_id = Auth::guard('web')->user()->id;
            $branch->name = $request->name;
            $branch->location = $request->location;
            $branch->number = $request->number;
            $branch->status = 1;
            $branch->save();

            if ($branch) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.branch')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function branchAjaxList(Request $request)
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

        $branch = Branch::select('branches.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $branch->where('user_id',$id)->count();

        $branchs = $branch->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($branchs as $branch) { 
            $color = $branch->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changebranchstatus" data-id="' . $branch->id . '">' . ($branch->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $branch->name,
                $branch->location,
                $branch->number,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editbranch', $branch->id) . '" class="h5 p-0 pl-2  edit_branch"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletebranch" data-id = "' . $branch->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editbranch($id)
    {
        $edit = Branch::find($id);
        return view('user.branch.edit_branch',compact('edit'));
    }

    public function updatebranch(Request $request)
    {
      
        try {
           $rules =[

            'name' => 'required',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updatebranch = Branch::find($request->id);

      
           $updatebranch->name = $request->name ? $request->name : $updatebranch->name;
           $updatebranch->location = $request->location ? $request->location : $updatebranch->location;
           $updatebranch->number = $request->number ? $request->number : $updatebranch->number;
           $updatebranch->update();

           if ($updatebranch) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.branch')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deletebranch(Request $request)
    {
        $deletebranch = Branch::find($request->id);

        $deletebranch->delete();

        if ($deletebranch) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusbranch(Request $request)
    {
        
        $updatebranch = Branch::find($request->Branch_id);

        $updatebranch->status = $updatebranch->status == 1 ? 0 : 1;
        $branch = $updatebranch->update();

        if ($updatebranch) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
