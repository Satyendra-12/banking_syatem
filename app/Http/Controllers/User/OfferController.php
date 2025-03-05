<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function offerPage()
    {
        return view('user.offer.offer');
    }

    public function addoffer()
    {
        return view('user.offer.add_offer');
    }

    public function saveoffer(Request $request)
    {
        try {

            $rules = [

                

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


         

            

            $offer = new Offer();
            $offer->user_id = Auth::guard('web')->user()->id;
            if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/offer/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/offer/image/', $name);
            $offer->image = $profile;
            
        }
            $offer->status = 1;
            $offer->save();

            if ($offer) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.offer')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function offerAjaxList(Request $request)
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

        $offer = Offer::select('offers.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('image', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $offer->where('user_id',$id)->count();

        $offers = $offer->where('user_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($offers as $offer) { 
            $color = $offer->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changeofferstatus" data-id="' . $offer->id . '">' . ($offer->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
               
                '<img src="' . asset($offer->image) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editoffer', $offer->id) . '" class="h5 p-0 pl-2  edit_offer"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteoffer" data-id = "' . $offer->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editoffer($id)
    {
        $edit = Offer::find($id);
        return view('user.offer.edit_offer',compact('edit'));
    }

    public function updateoffer(Request $request)
    {
      
        try {
           $rules =[

          
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updateoffer = Offer::find($request->id);

      
           if ($request->hasfile('image'))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $name = substr(uniqid(), 0, 9) . '.' . $ext;
            $profile = 'assets/img/offer/image/' . $name;
            $request->file('image')->move(public_path() . '/assets/img/offer/image/', $name);
            $updateoffer->image = $profile;
            
        }
           $updateoffer->update();

           if ($updateoffer) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.offer')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deleteoffer(Request $request)
    {
        $deleteoffer = Offer::find($request->id);

        $deleteoffer->delete();

        if ($deleteoffer) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusoffer(Request $request)
    {
        
        $updateoffer = Offer::find($request->offer_id);

        $updateoffer->status = $updateoffer->status == 1 ? 0 : 1;
        $offer = $updateoffer->update();

        if ($updateoffer) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
