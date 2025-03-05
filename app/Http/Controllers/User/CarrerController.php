<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Carrer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarrerController extends Controller
{
    public function carrerPage()
    {
        return view('user.carrer.carrer');
    }

    public function addcarrer()
    {
        return view('user.carrer.add_carrer');
    }

    public function savecarrer(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $carrer = new Carrer();
            $carrer->user_id = Auth::guard('web')->user()->id;
            $carrer->name = $request->name;
            $carrer->desc = $request->roll;
            // $carrer->number = $request->phone;
            $carrer->status = 1;
            $carrer->save();

            if ($carrer) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.carrer')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function carrerAjaxList(Request $request)
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

        $carrer = Carrer::select('carrers.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $carrer->where('user_id',$id)->count();

        $carrers = $carrer->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($carrers as $carrer) { 
            $color = $carrer->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changecarrerstatus" data-id="' . $carrer->id . '">' . ($carrer->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $carrer->name,
                $carrer->desc,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editcarrer', $carrer->id) . '" class="h5 p-0 pl-2  edit_carrer"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletecarrer" data-id = "' . $carrer->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editcarrer($id)
    {
        $edit = Carrer::find($id);
        return view('user.carrer.edit_carrer',compact('edit'));
    }

    public function updatecarrer(Request $request)
    {
      
        try {
           $rules =[

            'name' => 'required',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updatecarrer = Carrer::find($request->id);

      
           $updatecarrer->name = $request->name ? $request->name : $updatecarrer->name;
           $updatecarrer->desc = $request->roll ? $request->roll : $updatecarrer->desc;
        //    $updatecarrer->number = $request->phone ? $request->phone : $updatecarrer->number;
           $updatecarrer->update();

           if ($updatecarrer) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.carrer')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deletecarrer(Request $request)
    {
        $deletecarrer = Carrer::find($request->id);

        $deletecarrer->delete();

        if ($deletecarrer) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statuscarrer(Request $request)
    {
        
        $updatecarrer = Carrer::find($request->career_id);

        $updatecarrer->status = $updatecarrer->status == 1 ? 0 : 1;
        $carrer = $updatecarrer->update();

        if ($updatecarrer) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
 