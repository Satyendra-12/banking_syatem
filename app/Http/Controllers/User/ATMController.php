<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ATM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ATMController extends Controller
{
    public function atmPage()
    {
        return view('user.atm.atm');
    }

    public function addatm()
    {
        return view('user.atm.add_atm');
    }

    public function saveatm(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $atm = new ATM();
            $atm->user_id = Auth::guard('web')->user()->id;
            $atm->name = $request->name;
            $atm->location = $request->location;
            $atm->status = 1;
            $atm->save();

            if ($atm) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.atm')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function atmAjaxList(Request $request)
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

        $atm = ATM::select('a_t_m_s.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $atm->where('user_id',$id)->count();

        $atms = $atm->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($atms as $atm) { 
            $color = $atm->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changeatmstatus" data-id="' . $atm->id . '">' . ($atm->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $atm->name,
                $atm->location,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editatm', $atm->id) . '" class="h5 p-0 pl-2  edit_atm"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteatm" data-id = "' . $atm->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editatm($id)
    {
        $edit = ATM::find($id);
        return view('user.atm.edit_atm',compact('edit'));
    }

    public function updateatm(Request $request)
    {
      
        try {
           $rules =[

            'name' => 'required',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updateatm = ATM::find($request->id);

      
           $updateatm->name = $request->name ? $request->name : $updateatm->name;
           $updateatm->location = $request->location ? $request->location : $updateatm->location;
           $updateatm->update();

           if ($updateatm) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.atm')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deleteatm(Request $request)
    {
        $deleteatm = ATM::find($request->id);

        $deleteatm->delete();

        if ($deleteatm) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusatm(Request $request)
    {
        
        $updateatm = ATM::find($request->atm_id);

        $updateatm->status = $updateatm->status == 1 ? 0 : 1;
        $atm = $updateatm->update();

        if ($updateatm) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
