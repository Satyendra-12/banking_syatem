<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Whou;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhouController extends Controller
{
    public function whouPage()
    {
        return view('user.who.who');
    }
    public function whodetails($id)
    {
        $edit = Whou::find($id);
        $slide = Slider::where('status', 1)->get();
        return view('user.who.who-profile',compact('edit','slide'));
    } 

    public function addwhou()
    {
        return view('user.who.add_who');
    }

    public function savewhou(Request $request)
    {
        try {

            $rules = [

                'name' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         
// dd($request->all());
            

            $who = new Whou();
            $who->user_id = Auth::guard('web')->user()->id;
            $who->name = $request->name;
        $who->roll = $request->roll;
        $who->position = $request->position;
        $who->pos = $request->pos;
        $who->address = $request->address;
        $who->description = $request->description;
        $who->status = $request->status;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/whou/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/whou/image/', $name);
            $who->image = $profile;
            
        }
        
        
        $saved = $who->save();

            if ($saved) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.who')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function whouAjaxList(Request $request)
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

        $whou = Whou::select('whous.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $whou->where('user_id',$id)->count();

        $whous = $whou->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($whous as $whou) { 
            // dd($whou->id);

            $color = $whou->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changewhoustatus" data-id="' . $whou->id . '">' . ($whou->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $whou->name,
                '<img src="' . asset($whou->image) . '" height="50px" width="50px">',
                $whou->position,
                $whou->roll,
                $whou->address,
                $whou->pos,
              
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editwho', $whou->id) . '" class="h5 p-0 pl-2  edit_whou"><i class="mdi mdi-account-edit"></i></a>
                <a href="javascript:void(0)" class="h5 p-0 pl-2 deletewhou" data-id = "' . $whou->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editwhou($id)
    {
        $edit = Whou::find($id);
        return view('user.who.edit_who',compact('edit'));
    }

    public function updatewhou(Request $request)
    {
      
        try {
           $rules =[

            'name' => 'required',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $update = Whou::find($request->id);

           $update->user_id = Auth::guard('web')->user()->id;
           $update->name = $request->name;
        $update->position = $request->position;
        $update->pos = $request->pos;
        $update->roll = $request->roll;
        $update->address = $request->address;
        $update->description = $request->description;
        $update->status = 1;
        if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/whou/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/whou/image/', $name);
            $update->image = $profile;
            
        }
        $update->update();

           if ($update) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.who')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deletewhou(Request $request)
    {
        $deletewhou = Whou::find($request->id);

        $deletewhou->delete();

        if ($deletewhou) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function whou_changestatus(Request $request)
    {
        
        $updatewhou = Whou::find($request->who_id);

        $updatewhou->status = $updatewhou->status == 1 ? 0 : 1;
        $whou = $updatewhou->update();

        if ($updatewhou) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
