<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Services;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function servicePage()
    {
        return view('user.service.service');
    }

    public function addservice()
    {
        return view('user.service.add_service');
    }

    public function saveservice(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $service = new Services();
            $service->user_id = Auth::guard('web')->user()->id;
            $service->name = $request->name;
            $service->desc = $request->desc;
            $service->status = 1;
            $service->save();

            if ($service) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.services')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function serviceAjaxList(Request $request)
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

        $service = Services::select('services.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $service->where('user_id',$id)->count();

        $services = $service->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($services as $service) { 
            $color = $service->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changeservicestatus" data-id="' . $service->id . '">' . ($service->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $service->name,
                $service->desc,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editservices', $service->id) . '" class="h5 p-0 pl-2  edit_service"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteservice" data-id = "' . $service->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editservice($id)
    {
        $edit = Services::find($id);
        return view('user.service.edit_service',compact('edit'));
    }

    public function updateservice(Request $request)
    {
      
        try {
           $rules =[

            'name' => 'required',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updateservice = Services::find($request->id);

      
           $updateservice->name = $request->name ? $request->name : $updateservice->name;
           $updateservice->desc = $request->desc ? $request->desc : $updateservice->desc;
           $updateservice->update();

           if ($updateservice) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.services')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deleteservice(Request $request)
    {
        $deleteservice = Services::find($request->id);

        $deleteservice->delete();

        if ($deleteservice) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusservice(Request $request)
    {
        
        $updateservice = Services::find($request->services_id);

        $updateservice->status = $updateservice->status == 1 ? 0 : 1;
        $service = $updateservice->update();

        if ($updateservice) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
