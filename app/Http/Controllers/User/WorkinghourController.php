<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\WorkingHour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkingHourController extends Controller
{

    public function workinghourPage()
    {
        // $dayName = date('l', strtotime("Sunday +{$dayNumber} days"));
        return view('user.workinghour.workinghour');
    }


    public function create()
    {
        return view('user.workinghour.add_workinghour');
    }


    public function store(Request $request)
    {
        $days = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        foreach ($days as $day) {
            $workinghour = new WorkingHour();
            $workinghour->user_id = Auth::guard('web')->user()->id;
            $workinghour->day = $day;
            $workinghour->opentime = $request->input($day . '_open_time');
            $workinghour->closetime = $request->input($day . '_close_time');

            $workinghour->save();
        }
        // Redirect the user back with a success message
        if ($workinghour) {
            return response()->json(array('status' => true, 'msg' => 'Success fully Added', 'location' => route('user.workinghour')));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
        }
    }

    public function workinghourAjaxList(Request $request)
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

        $workinghour = WorkingHour::select('working_hours.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('day', 'like', '%' . $search . '%');
            });
        $id = Auth::guard('web')->user()->id;

        $total = $workinghour->where('user_id',$id)->count();

        $workinghours = $workinghour->where('user_id', $id)->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];


        foreach ($workinghours as $workinghour) {

            $data[] = array(
                $i++,
                $workinghour->day,
                $workinghour->opentime,
                $workinghour->closetime,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',

                '<a href="' . route('opening_hours.edit', $workinghour->id) . '" class="h5 p-0 pl-2  edit_workinghour"><i class="mdi mdi-account-edit"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }



    public function edit($id)
    {
        
        $edit = WorkingHour::find($id);
        return view('user.workinghour.edit_workinghour', compact('edit'));
    }


    public function updateworkinghour(Request $request)
    {

        try {
            $rules = [

                'day' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }
            $updateworkinghour = WorkingHour::find($request->id);


            $updateworkinghour->day = $request->day;
            $updateworkinghour->opentime = $request->opentime;
            $updateworkinghour->closetime = $request->closetime;
            $updateworkinghour->update();

            if ($updateworkinghour) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('user.workinghour')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something went wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
}
//     public function addworkinghour()
//     {
//         return view('user.workinghour.add_workinghour');
//     }

//     public function saveworkinghour(Request $request)
//     {
//         try {

//             $rules = [

//                 'day' => 'required',

//             ];

//             $validator = Validator::make($request->all(), $rules);
//             if ($validator->fails()) {
//                 return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
//             }


         

            

//             $workinghour = new WorkingHour();
//             $workinghour->user_id = Auth::guard('web')->user()->id;
//             $workinghour->day = $request->day;
//             $workinghour->opentime = $request->opentime;
//             $workinghour->closetime = $request->closetime;
//             // $workinghour->status = 1;
//             $workinghour->save();

//             if ($workinghour) {
//                 return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.workinghour')));
//             } else {
//                 return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
//             }
//         } catch (\Exception $ex) {
//             return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
//         }
//     }


//     public function editworkinghour($id)
//     {
//         $openingHours = WorkingHour::all();
//         return view('user.workinghour.edit_workinghour',compact('openingHours'));
//     }
//     public function updateworkinghour(Request $request)
//     {
//         $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

//         foreach ($days as $day) {
//             $openingHour = WorkingHour::where('day', $day)->first();
//             if ($openingHour) {
//                 $openingHour->update([
//                     'open_time' => $request->input($day . '_open_time'),
//                     'close_time' => $request->input($day . '_close_time'),
//                 ]);
//             } else {
//                 WorkingHour::create([
//                     'day' => $day,
//                     'open_time' => $request->input($day . '_open_time'),
//                     'close_time' => $request->input($day . '_close_time'),
//                 ]);
//             }
//         }

//         return redirect()->back()->with('success', 'Opening hours updated successfully.');
//     }


//     public function deleteworkinghour(Request $request)
//     {
//         $deleteworkinghour = WorkingHour::find($request->id);

//         $deleteworkinghour->delete();

//         if ($deleteworkinghour) {

//             return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

//         }
//     }

//     public function statusworkinghour(Request $request)
//     {
        
//         $updateworkinghour = WorkingHour::find($request->workinghour_id);

//         $updateworkinghour->status = $updateworkinghour->status == 1 ? 0 : 1;
//         $workinghour = $updateworkinghour->update();

//         if ($updateworkinghour) {
//             return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

//         }else{
  
//           return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
//         }

//     }
// }
