<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BottomSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BottomSliderController extends Controller
{
    public function bottomslider()
    {
        return view('admin.add_bottomslider.bottomslider');
    }

    public function addbottomslider()
    {
        return view('admin.add_bottomslider.add_bottomslider');
    }

    public function storebottomslider(Request $request)
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
                $name = substr(uniqid(), 0, 9) . '.' . $ext;
                $profile = 'assets/img/bottomslider/image/' . $name;
                $request->file('image')->move(public_path() . '/assets/img/bottomslider/image/', $name);
            } else {
                $profile = null;
            }




            $bottomslider = new BottomSlider();
            $bottomslider->image = $profile;
            $bottomslider->save();

            if ($bottomslider) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('admin.bottomslider')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function bottomsliderAjaxList(Request $request)
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

        $bottomslider = BottomSlider::select('bottom_sliders.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('image', 'like', '%' . $search . '%');
            });


        $total = $bottomslider->count();

        $bottomsliders = $bottomslider->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($bottomsliders as $bottomslider) { 
            $color = $bottomslider->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changebottomsilderstatus" data-id="' . $bottomslider->id . '">' . ($bottomslider->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                '<img src="' . asset($bottomslider->image) . '" height="40px" width="40px">',
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('admin.editbottomslider', $bottomslider->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletebottomslider" data-id = "' . $bottomslider->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editbottomslider($id)
    {
        $editbottomslider = BottomSlider::find($id);
        return view('admin.add_bottomslider.edit_bottomslider',compact('editbottomslider'));
    }

    public function updatebottomslider(Request $request)
    {
      
        try {
           $rules =[

            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updatebottomslider = BottomSlider::find($request->id);

           if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(),0,9).'.'.$ext;
            $profile = 'assets/img/bottomslider/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/bottomslider/image/', $name);
           }else{
             
            $profile =  $updatebottomslider->image;

           }


           $updatebottomslider->image = $profile ? $profile : $updatebottomslider->image;
           $updatebottomslider->update();

           if ($updatebottomslider) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('admin.bottomslider')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deletebottomslider(Request $request)
    {
        $deletebottomslider = BottomSlider::find($request->id);

        $deletebottomslider->delete();

        if ($deletebottomslider) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusbottomslider(Request $request)
    {
        
        $updatebottomslider = BottomSlider::find($request->bottomslider_id);

        $updatebottomslider->status = $updatebottomslider->status == 1 ? 0 : 1;
        $bottomslider = $updatebottomslider->update();

        if ($updatebottomslider) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
