<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class mediaController extends Controller
{
    public function mediaPage()
    {
        $id = Auth::guard('web')->user()->id;

        $mediatotal = media::where('user_id',$id)->count();

        return view('user.media.media',compact('mediatotal'));
    }

    public function addmedia()
    {
        return view('user.media.add_media');
    }

    public function savemedia(Request $request)
    {
        try {

            $rules = [

                

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $media = new media();
            $media->user_id = Auth::guard('web')->user()->id;
        //     if ($request->hasfile('image'))
        // {
        //     $ext = $request->file('image')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $profile = 'assets/img/media/image/' . $name;
        //     $request->file('image')->move(public_path() . '/assets/img/media/image/', $name);
        //     $media->image = $profile;
            
        // }
            $media->youtube_link = $request->youtube_link;
            $media->status = 1;
            $media->save();

            if ($media) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.media')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function mediaAjaxList(Request $request)
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

        $media = media::select('media.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('youtube_link', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $media->where('user_id',$id)->count();

        $medias = $media->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($medias as $media) { 
            $color = $media->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changemediastatus" data-id="' . $media->id . '">' . ($media->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
               
                // '<img src="' . asset($media->image) . '" height="100px" width="150px">',
                
                $media->youtube_link,
                $status,
                '<a href="' . route('user.editmedia', $media->id) . '" class="h5 p-0 pl-2  edit_media"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deletemedia" data-id = "' . $media->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editmedia($id)
    {
        $edit = media::find($id);
        return view('user.media.edit_media',compact('edit'));
    }

    public function updatemedia(Request $request)
    {
      
        try {
           $rules =[

          
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updatemedia = media::find($request->id);

      
        //    if ($request->hasfile('image'))
        // {
        //     $ext = $request->file('image')->getClientOriginalExtension();
        //     $name = substr(uniqid(), 0, 9) . '.' . $ext;
        //     $profile = 'assets/img/media/image/' . $name;
        //     $request->file('image')->move(public_path() . '/assets/img/media/image/', $name);
        //     $updatemedia->image = $profile;
            
        // }
        $updatemedia->youtube_link = $request->youtube_link;
           $updatemedia->update();

           if ($updatemedia) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.media')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deletemedia(Request $request)
    {
        $deletemedia = media::find($request->id);

        $deletemedia->delete();

        if ($deletemedia) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusmedia(Request $request)
    {
        
        $updatemedia = media::find($request->media_id);

        $updatemedia->status = $updatemedia->status == 1 ? 0 : 1;
        $media = $updatemedia->update();

        if ($updatemedia) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
