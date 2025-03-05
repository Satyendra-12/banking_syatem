<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    public function featurePage()
    {
        return view('user.feature.feature');
    }

    public function addfeature()
    {
        return view('user.feature.add_feature');
    }

    public function savefeature(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $feature = new Feature();
            $feature->user_id = Auth::guard('web')->user()->id;
            $feature->name = $request->name;
            $feature->desc = $request->desc;
            $feature->status = 1;
            $feature->save();

            if ($feature) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.feature')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function featureAjaxList(Request $request)
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

        $feature = Feature::select('features.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $feature->where('user_id',$id)->count();

        $features = $feature->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($features as $feature) { 
            $color = $feature->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changefeaturestatus" data-id="' . $feature->id . '">' . ($feature->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $feature->name,
                $feature->desc,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editfeature', $feature->id) . '" class="h5 p-0 pl-2  edit_feature"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletefeature" data-id = "' . $feature->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editfeature($id)
    {
        $edit = Feature::find($id);
        return view('user.feature.edit_feature',compact('edit'));
    }

    public function updatefeature(Request $request)
    {
      
        try {
           $rules =[

            'name' => 'required',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updatefeature = Feature::find($request->id);

      
           $updatefeature->name = $request->name ? $request->name : $updatefeature->name;
           $updatefeature->desc = $request->desc ? $request->desc : $updatefeature->desc;
           $updatefeature->update();

           if ($updatefeature) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.feature')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deletefeature(Request $request)
    {
        $deletefeature = Feature::find($request->id);

        $deletefeature->delete();

        if ($deletefeature) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusfeature(Request $request)
    {
        
        $updatefeature = Feature::find($request->feature_id);

        $updatefeature->status = $updatefeature->status == 1 ? 0 : 1;
        $feature = $updatefeature->update();

        if ($updatefeature) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
