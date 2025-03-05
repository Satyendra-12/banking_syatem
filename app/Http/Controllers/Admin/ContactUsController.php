<?php

namespace App\Http\Controllers\Admin;
use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\PrivacyPolicies;
use App\Models\Terms;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;


class ContactUsController extends Controller
{
    
    // Display a listing of the resource
    public function index()
    {
        $contacts = ContactUs::orderBy('id','DESC')->get();
         return view('admin.contact_us.contact_us',compact('contacts'));
    }
    
    // Show the form for creating a new resourc
    public function create()
    {
        return view('frontend.contact');

    }

    
    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // echo"<pre>",print_r($request->all());   
        // exit;
      
            $rules = [
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // dd($validator);
                return back()->withError($validator);
            }

            $contactus = new ContactUs;
            $contactus->purpose_id  =   $request->purpose_id;
            $contactus->cname  =   $request->name;
            $contactus->number  =   $request->mobile;
            $contactus->email   =   $request->email;
            $contactus->message   =   $request->message;
            $save = $contactus->save();
            
      
            return redirect()->back()->with('success', 'Data saved successfully!');
            // return response()->json(['status' => true, 'msg' => 'Data saved successfully']);
            
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contactus = ContactUs::find($id);
        return view('admin.contact_us.edit_contact_us',compact('contactus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $rules = [
                'mobile'=>'required',
                'email'=>'required'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withError($validator);
            }

            $contactus = ContactUs::findOrFail($id);
            $contactus->number =  $request->mobile;
            $contactus->email  =  $request->email;
            $update = $contactus->update();
            
            if ($update) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Updated', 'location' => route('contact-us.index')));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Something Went wrong,please try again'));
            }
        }catch (\Exception $ex) {
            // dd($ex);
            return response()->$ex->getMessage();
        }
    }
   
    public function destroy(Request $request)
    {
        try {
            $delete = ContactUs::find($request->id);
            $delete->delete();

            if ($delete) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Delete'));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Nhi chl rha......!'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
    
    public function contactUsAjaxList(Request $request)
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

        $Contact =ContactUs::select('contact_us.*','purposes.name')
        ->join('purposes', 'contact_us.purpose_id', '=', 'purposes.id')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('contact_us.cname', 'like', '%' . $search . '%');
            });


        $total = $Contact->count();

        $contactus = $Contact->offset($ofset)->limit($limit)->get();
        $i = 1 + $ofset;
        $data = [];

        foreach ($contactus as $contact) {         

            $data[] = array(
                $i++,
                $contact->name,
                $contact->cname,
                $contact->number,
                $contact->email,
                $contact->message,
              
                '',
            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);


    }

    public function contactus_changestatus(Request $request)
    {
        $updatestatus = ContactUs::find($request->id);
        // dd($updatestatus);
        $updatestatus->status = $updatestatus->status == '1' ? '0' : '1';
        $updatestatus = $updatestatus->save();

        if ($updatestatus) {
            return response()->json(array('status' => true, 'msg' => 'Status Updated  Successfully'));
        } else {
            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try again later'));
        }
    }
     

    public function privacy_policies()
    {
        $getdata = PrivacyPolicies::first();
        // dd($getdata);
        return view('admin.privacy.create',compact('getdata'));
    }

    public function privacy_save_update(Request $request)
    {
            $rules = [
                'title'=>'required',
                'description'=>'required'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withError($validator);
            }

            $privacypolicies = PrivacyPolicies::first();
            // dd($privacypolicies);
            if ($privacypolicies != null) {   
                $privacypolicies->title =  $request->title;
                $privacypolicies->discription  =  $request ->description;
                $update = $privacypolicies->save();
            }else{
                $privacypolicies = new PrivacyPolicies();
                $privacypolicies->title =  $request->title;
                $privacypolicies->discription  =  $request ->description;
                $update = $privacypolicies->save();     
            }
            
            if ($update) {
                return redirect()->route('privacy-policies.index');
            }
    }


    public function terms()
    {
        $getdata = Terms::first();
        // dd($getdata);
        return view('admin.terms.create',compact('getdata'));
    }

    public function terms_save_update(Request $request)
    {
            $rules = [
                'title'=>'required',
                'description'=>'required'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withError($validator);
            }

            $terms = Terms::first();
            // dd($privacypolicies);
            if ($terms != null) {   
                $terms->title =  $request->title;
                $terms->discription  =  $request ->description;
                $update = $terms->save();
            }else{
                $terms = new Terms();
                $terms->title =  $request->title;
                $terms->discription  =  $request ->description;
                $update = $terms->save();     
            }
            
            if ($update) {
                return redirect()->route('terms.index');
            }
    }
    public function delete(Request $request)
    {
        try {
            $delete = ContactUs::find($request->id);
            $delete->delete();

            if ($delete) {
                return response()->json(array('status' => true, 'msg' => 'Successfully Delete'));
            } else {
                return response()->json(array('status' => false, 'msg' => 'Nhi chl rha......!'));
            }
        } catch (\Exception $ex) {
            return response()->json(array('status' => false, 'msg' => $ex->getMessage()));
        }
    }
    public function aboutus()
    {
        $getdata = About::first();
        return view('admin.uphello.create',compact('getdata'));
    }

    public function aboutus_save_update(Request $request)
    {
            $rules = [
                'description'=>'required'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withError($validator);
            }

            $aboutus = About::first();
            if ($aboutus != null) {   
                // $aboutus->title =  $request->title;
                $aboutus->description  =  $request ->description;
                $update = $aboutus->save();
            }else{
                $aboutus = new About();
                // $aboutus->title =  $request->title;
                $aboutus->description  =  $request ->description;
                $update = $aboutus->save();     

            }
            
            if ($update) {
                return redirect()->route('about-up.index');
            }
    }

    

}
