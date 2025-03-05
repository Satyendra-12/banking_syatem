<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function dashboard()
   {
    return view('user.index');
   }
   public function review()
    {
        $id = Auth::guard('web')->user()->id;
        $review = Review::where('details_id',$id)->orderBy('id','desc')->get();
        return view('user.auth.review',compact('review'));
    }

    public function reviewAjaxList(Request $request)
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

        $review = Review::select('reviews.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('name', 'like', '%' . $search . '%');
            });
            $id = Auth::guard('web')->user()->id;

        $total = $review->where('user_id',$id)->count();

        $reviews = $review->where('details_id',$id)->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($reviews as $review) { 
         
            $data[] = array(
                $i++,
                $review->rating,
                $review->rating2,
                $review->rating3,
                $review->rating4,
                $review->rating5,
                $review->rating6,
                $review->name,
                $review->phone_number,
                $review->email,
                $review->reviews,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
              );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

  
}
