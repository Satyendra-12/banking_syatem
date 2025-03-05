<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function productPage()
    {
        return view('user.product.product');
    }

    public function addproduct()
    {
        return view('user.product.add_product');
    }

    public function saveproduct(Request $request)
    {
        try {

            $rules = [

                'pname' => 'required',
                'pimage' => 'required|image|mimes:jpeg,png,jpg|max:4096'

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
            }


            if ($request->hasFile('pimage')) {

                $ext = $request->file('pimage')->getClientOriginalExtension();
                $name = substr(uniqid(), 0, 9) . '.' . $ext;
                $profile = 'assets/img/product/image/' . $name;
                $request->file('pimage')->move(public_path() . '/assets/img/product/image/', $name);
            } else {
                $profile = null;
            }



            

            $product = new Product();
            $product->pname = $request->pname;
            $product->pimage = $profile;
            $product->desc = $request->desc;
            $product->save();

            if ($product) {
                return response()->json(array('status' => true, 'msg' => 'Success fully Added','location'=>route('user.product')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went Wrong,Please Try Again'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }

    public function productAjaxList(Request $request)
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

        $product = Product::select('products.*')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('pname', 'like', '%' . $search . '%');
            });


        $total = $product->count();

        $products = $product->offset($ofset)->limit($limit)->orderBy($nameOrder, $orderType)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($products as $product) { 
            $color = $product->status == 1 ?  "btn-success" : "btn-warning";
            $status = '<button  type="button" class="btn '. $color .' changeproductstatus" data-id="' . $product->id . '">' . ($product->status == 1 ? "Active" : "Inactive") . ' </button>';

            $data[] = array(
                $i++,
                $product->pname,
                '<img src="' . asset($product->pimage) . '" height="40px" width="40px">',
                $product->desc,
                // '<img src="' . url($item->icon) . '" height="100px" width="150px">',
                $status,
                '<a href="' . route('user.editproduct', $product->id) . '" class="h5 p-0 pl-2  edit_prduct"><i class="mdi mdi-account-edit"></i></a>
             <a href="javascript:void(0)" class="h5 p-0 pl-2 deleteproduct" data-id = "' . $product->id . '"  ><i class="mdi mdi-delete"></i></a>',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function editproduct($id)
    {
        $editproduct = Product::find($id);
        return view('user.product.edit_product',compact('editproduct'));
    }

    public function updateproduct(Request $request)
    {
      
        try {
           $rules =[

            'pname' => 'nullable|max:100',
            'pimage' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
           ];

           $validator = Validator::make($request->all(),$rules);

           if ($validator->fails()) {
              return response()->json(array('status'=>false,'msg'=>$validator->errors()->first()));
           }
           $updateproduct = Product::find($request->id);

           if ($request->hasFile('pimage')) {
            $ext = $request->file('pimage')->getClientOriginalExtension();
            $name = substr(uniqid(),0,9).'.'.$ext;
            $profile = 'assets/img/product/image/' . $name;
            $request->file('pimage')->move(public_path() . '/assets/img/product/image/', $name);
           }else{
             
            $profile =  $updateproduct->pimage;

           }


           $updateproduct->pname = $request->pname ? $request->pname : $updateproduct->pname;
           $updateproduct->desc = $request->desc ? $request->desc : $updateproduct->desc;
           $updateproduct->pimage = $profile ? $profile : $updateproduct->pimage;
           $updateproduct->update();

           if ($updateproduct) {
            return response()->json(array('status'=>true, 'msg'=>'Successfully Updated','location'=>route('user.product')));
           }else{
            return response()->json(array('status'=>false, 'msg'=>'Something went wrong,Please Try Again'));

           }

        } catch (\Exception $ex) {
            return response()->json(array('status'=>false,'msg'=>$ex->getMessage()));
            
        }
    }

    public function deleteproduct(Request $request)
    {
        $deleteproduct = Product::find($request->id);

        $deleteproduct->delete();

        if ($deleteproduct) {

            return response()->json(array('status'=>true, 'msg'=> 'Successfully Delete'));

        }
    }

    public function statusproduct(Request $request)
    {
        
        $updateproduct = Product::find($request->product_id);

        $updateproduct->status = $updateproduct->status == 1 ? 0 : 1;
        $product = $updateproduct->update();

        if ($updateproduct) {
            return response()->json(array('status'=>true, 'msg'=>'Succesfully updated'));

        }else{
  
          return response()->json(array('status'=>false, 'msg'=>'Errors Occurs !! Try again later'));
  
        }

    }
}
