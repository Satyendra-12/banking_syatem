<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function slider()
    {
        return view('admin.add_slider.slider');
    }

    public function addSlider()
    {
        return view('admin.add_slider.add_slider');
    }

    public function storeSlider(Request $request)
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
                $profile = 'assets/img/slider/image/' . $name;
                $request->file('image')->move(public_path() . '/assets/img/slider/image/', $name);
            } else {
                $profile = null;
            }



            $convert = strtolower(str_replace(' ', '_', $request->name));


            $slider = new Slider();
            $slider->name = $request->name;
            $slider->image = $profile;
            $slider->slug = $convert;
            $slider->save();

            if ($slider) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('admin.slider')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function sliderAjaxList(Request $request)
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

        $slider = Slider::select('sliders.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('image', 'like', '%' . $search . '%');
            });


        $total = $slider->count();

        $sliders = $slider->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($sliders as $slider) { 
            $color = $slider->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changesilderstatus" data-id="' . $slider->id . '">' . ($slider->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                '<img src="' . asset($slider->image) . '" height="40px" width="40px">',
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('admin.editSlider', $slider->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteslider" data-id = "' . $slider->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editSlider($id)
    {
        $editslider = Slider::find($id);
        return view('admin.add_slider.edit_slider',compact('editslider'));
    }

    public function updateSlider(Request $request)
    {
      
        try {
           $rules =[

            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updateslider = Slider::find($request->id);

           if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(),0,9).'.'.$ext;
            $profile = 'assets/img/slider/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/slider/image/', $name);
           }else{
             
            $profile =  $updateslider->image;

           }

           $convert = strtolower(str_replace(' ' ,'_',$request->name));

           $updateslider->name = $request->name ? $request->name : $updateslider->name;
           $updateslider->image = $profile ? $profile : $updateslider->image;
           $updateslider->slug = $convert ? $convert : $updateslider->slug;
           $updateslider->update();

           if ($updateslider) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('admin.slider')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deleteSlider(Request $request)
    {
        $deleteslider = Slider::find($request->id);

        $deleteslider->delete();

        if ($deleteslider) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusSlider(Request $request)
    {
        
        $updateslider = Slider::find($request->slider_id);

        $updateslider->status = $updateslider->status == 1 ? 0 : 1;
        $slider = $updateslider->update();

        if ($updateslider) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
