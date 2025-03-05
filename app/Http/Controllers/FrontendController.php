<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\path\PrivacyPolicies;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Purpose;
use App\Models\Review;
use App\Models\Category;
use App\Models\Ad;
use App\Models\media;
use App\Models\Services;
use App\Models\Offer;
use App\Models\Whou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Articles;
use App\Models\Banner;
use App\Models\RBanner;
use App\Models\Slider;
use App\Models\BottomSlider;
use App\Models\Branch;
use App\Models\ATM;
use App\Models\Carrer;
use App\Models\Feature;
use App\Models\management;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\WProfile;
use App\Models\User;
use App\Models\WorkingHour;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

// use ProtoneMedia\LaravelFFMpeg\Filesystem\Media;

class FrontendController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now();

        // Get the next month's date
        $nextMonthDate = $currentDate->copy()->addMonth();

        // Get the name of the next month
        $nextMonthName = $nextMonthDate->format('F');
        $nextMonthNameCapitalized = strtoupper($nextMonthName);
        // dd( $nextMonthNameCapitalized);
        // $orderType = $request->order[0]['dir'];
        // $nameOrder = $request->columns[$request->order[0]['column']]['position'];
        $category = Category::where('status', '=', 1)->orderBy('position', 'ASC')->get();
        $profile = WProfile::where('status', 1)->orderBy('pos', 'asc')->paginate(6);
        $newes = News::where('status', '=', 1)->orderBy('id', 'desc')->first();
        // dd($newes);
        $events = Articles::where('status', '=', 1)->orderBy('id', 'desc')->first();

        $nextMonth = Carbon::now()->addMonth();
        // dd($nextMonth->year);
        // Constructing the query to retrieve events for May

        $news = Articles::whereMonth('date', $nextMonth->month)
            ->whereYear('date', $nextMonth->year)
            ->get();



        $rows = Articles::where('status', 1)->first();

        $slide = Slider::where('status', 1)->get();
        $bottomslide = BottomSlider::where('status', 1)->get();
        $banner = Banner::where('status', 1)->get();
        $rbanner = RBanner::where('status', 1)->get();
        $ad = Ad::where('status', 1)->first();
        // dd($ad);
        $featured = User::where('member', '1')->where('status', 1)->get();


        return view('frontend.index', compact('category', 'nextMonthNameCapitalized', 'news', 'events', 'bottomslide', 'slide', 'banner', 'ad', 'newes', 'profile', 'featured', 'rbanner'));
    }


    public function feature(Request $request, $title = null)
    {
        $slide = Slider::where('status', 1)->get();
        $category = Category::where('status', 1)->orderBy('position', 'asc')->get();

        if (!empty($request->get('search'))) {
            $fea = User::where('member', '1')
                ->where('username', 'like', '%' . $request->get('search') . '%')
                ->where('status', 1)
                ->get();

            if ($fea->isEmpty()) {
                $message = "No results found for your search.";
                
                return view('frontend.feature', compact( 'message', 'slide', 'category'));
            }
        } else {
            $fea = User::where('member', '1')
                ->where('status', 1)
                ->get();
        }

        return view('frontend.feature', compact('fea', 'slide', 'category'));
    }




    public function financial()
    {
        $slide = Slider::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->where('category_id', 1)->get();
        $asubcategories = Subcategory::where('status', 1)->where('service_id', 2)->paginate(10);

        return view('frontend.financial', compact('slide', 'subcategories', 'asubcategories'));
    }

    public function financial_page($id)
    {
        $slide = Slider::where('status', 1)->get();
        $support = Subcategory::find($id);
        $supportuser = User::where('status', 1)->where('subcategor_id', $id)->paginate(10);
        return view('frontend.financial-support', compact('slide', 'support', 'supportuser'));
    }

    public function financial_service($id)
    {
        $slide = Slider::where('status', 1)->get();
        $financial = Subcategory::find($id);
        // dd($financial);
        $users = User::where('status', 1)->where('subcategor_id', $id)->paginate(10);
        // dd($users);

        return view('frontend.financial2', compact('slide', 'financial', 'users'));
    }

    public function who_profile($id)
    {
        // dd($id);
        $slide = Slider::where('status', 1)->get();
        // $edit = WProfile::find($id);
        // $edit = WProfile::find($id);
        // dd($edit);
        $edit = Whou::find($id);

        return view('frontend.who-profile', compact('slide', 'edit'));
    }

    public function whous_profile($id)
    {
        // dd($id);
        $slide = Slider::where('status', 1)->get();
        // $edit = WProfile::find($id);
        // $edit = WProfile::find($id);
        // dd($edit);
        $edit1 = WProfile::find($id);

        return view('frontend.whous-profile', compact('slide', 'edit1'));
    }

    public function support()
    {
        $slide = Slider::where('status', 1)->get();
        $supportsubcategories = Subcategory::where('status', 1)->where('category_id', 3)->paginate(20);
        return view('frontend.support', compact('slide', 'supportsubcategories'));
    }
    public function profile()
    {
        $slide = Slider::where('status', 1)->get();
        $profile = Whou::where('status', 1)->orderBy('pos', 'asc')->get();
        $wprofile = WProfile::where('status', 1)->orderBy('pos', 'asc')->get();
        // dd($wprofile );

        return view('frontend.profile', compact('slide', 'profile','wprofile'));
    }


    public function detail_page($id)
    {
        $slide = Slider::where('status', 1)->get();
        $user = User::find($id);
        // dd($user);
        $users = User::where('id', $id)->where('status', 1)->first();
        $subcategory = Subcategory::where('id', $users->subcategor_id)->where('status', 1)->first();
        $singlemanagement = management::where('user_id', $id)->where('status', 1)->first();
        $management = management::where('user_id', $id)->where('status', 1)->get();
        $singlefeature = Feature::where('user_id', $id)->where('status', 1)->first();
        $feature = Feature::where('user_id', $id)->where('status', 1)->get();
        $singlewhou = Whou::where('user_id', $id)->where('status', 1)->first();
        $whou = Whou::where('user_id', $id)->where('status', 1)->get();
        $singleservice = Services::where('user_id', $id)->where('status', 1)->first();
        $service = Services::where('user_id', $id)->where('status', 1)->get();
        $singlebranch = Branch::where('user_id', $id)->where('status', 1)->first();
        $branch = Branch::where('user_id', $id)->where('status', 1)->get();
        $atm = ATM::where('user_id', $id)->where('status', 1)->get();
        $singlecarrer = Carrer::where('user_id', $id)->where('status', 1)->first();
        $carrer = Carrer::where('user_id', $id)->where('status', 1)->get();
        $offer = Offer::where('user_id', $id)->where('status', 1)->get();
        $media = media::where('user_id', $id)->where('status', 1)->get();
        $workinghour = WorkingHour::where('user_id', $id)->orderBy('id', 'asc')->get();
        // dd($workinghour);
        $singleoffer = Offer::where('user_id', $id)->where('status', 1)->first();

        // $features = strip_tags($feature);
        return view('frontend.details', compact('slide', 'user', 'users', 'subcategory', 'singlemanagement', 'singlefeature', 'whou', 'service', 'branch', 'atm', 'carrer', 'offer', 'management', 'feature', 'singlewhou', 'singleservice', 'singlebranch', 'singlecarrer', 'singleoffer', 'media', 'workinghour'));
    }



    public function fdetail_page($id)
    {
        $slide = Slider::where('status', 1)->get();
        $user = User::find($id);
        // dd($user);
        $users = User::where('id', $id)->where('status', 1)->first();
        $subcategory = Subcategory::where('id', $users->subcategor_id)->where('status', 1)->first();
        $singlemanagement = management::where('user_id', $id)->where('status', 1)->first();
        $management = management::where('user_id', $id)->where('status', 1)->get();
        $singlefeature = Feature::where('user_id', $id)->where('status', 1)->first();
        $feature = Feature::where('user_id', $id)->where('status', 1)->get();
        $singlewhou = Whou::where('user_id', $id)->where('status', 1)->first();
        $whou = Whou::where('user_id', $id)->where('status', 1)->get();
        $singleservice = Services::where('user_id', $id)->where('status', 1)->first();
        $service = Services::where('user_id', $id)->where('status', 1)->get();
        $singlebranch = Branch::where('user_id', $id)->where('status', 1)->first();
        $branch = Branch::where('user_id', $id)->where('status', 1)->get();
        $atm = ATM::where('user_id', $id)->where('status', 1)->get();
        $singlecarrer = Carrer::where('user_id', $id)->where('status', 1)->first();
        $carrer = Carrer::where('user_id', $id)->where('status', 1)->get();
        $offer = Offer::where('user_id', $id)->where('status', 1)->get();
        $media = media::where('user_id', $id)->where('status', 1)->get();
        $workinghour = WorkingHour::where('user_id', $id)->orderBy('id', 'asc')->get();
        // dd($workinghour);
        $singleoffer = Offer::where('user_id', $id)->where('status', 1)->first();

        // $features = strip_tags($feature);
        return view('frontend.fdetails', compact('slide', 'user', 'users', 'subcategory', 'singlemanagement', 'singlefeature', 'whou', 'service', 'branch', 'atm', 'carrer', 'offer', 'management', 'feature', 'singlewhou', 'singleservice', 'singlebranch', 'singlecarrer', 'singleoffer', 'media', 'workinghour'));
    }


    public function sdetail_page($id)
    {
        $slide = Slider::where('status', 1)->get();
        $user = User::find($id);
        // dd($user);
        $users = User::where('id', $id)->where('status', 1)->first();
        $subcategory = Subcategory::where('id', $users->subcategor_id)->where('status', 1)->first();
        $singlemanagement = management::where('user_id', $id)->where('status', 1)->first();
        $management = management::where('user_id', $id)->where('status', 1)->get();
        $singlefeature = Feature::where('user_id', $id)->where('status', 1)->first();
        $feature = Feature::where('user_id', $id)->where('status', 1)->get();
        $singlewhou = Whou::where('user_id', $id)->where('status', 1)->first();
        $whou = Whou::where('user_id', $id)->where('status', 1)->get();
        $singleservice = Services::where('user_id', $id)->where('status', 1)->first();
        $service = Services::where('user_id', $id)->where('status', 1)->get();
        $singlebranch = Branch::where('user_id', $id)->where('status', 1)->first();
        $branch = Branch::where('user_id', $id)->where('status', 1)->get();
        $atm = ATM::where('user_id', $id)->where('status', 1)->get();
        $singlecarrer = Carrer::where('user_id', $id)->where('status', 1)->first();
        $carrer = Carrer::where('user_id', $id)->where('status', 1)->get();
        $offer = Offer::where('user_id', $id)->where('status', 1)->get();
        $media = media::where('user_id', $id)->where('status', 1)->get();
        $workinghour = WorkingHour::where('user_id', $id)->orderBy('id', 'asc')->get();
        // dd($workinghour);
        $singleoffer = Offer::where('user_id', $id)->where('status', 1)->first();

        // $features = strip_tags($feature);
        return view('frontend.sdetails', compact('slide', 'user', 'users', 'subcategory', 'singlemanagement', 'singlefeature', 'whou', 'service', 'branch', 'atm', 'carrer', 'offer', 'management', 'feature', 'singlewhou', 'singleservice', 'singlebranch', 'singlecarrer', 'singleoffer', 'media', 'workinghour'));
    }



    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'ratings.*' => 'required|integer|min:1|max:5',
            // You may add more validation rules here
        ]);
        $user = User::find($request->id);
        $review = new Review();
        $review->details_id = $request->id;
        $review->rating = $request->ratings1;
        $review->rating2 = $request->ratings2;
        $review->rating3 = $request->ratings3;
        $review->rating4 = $request->ratings4;
        $review->rating5 = $request->ratings5;
        $review->rating6 = $request->ratings6;
        $review->reviews = $request->reviews;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->phone_number = $request->phone_number;
        // Save the review to the database
        $review->save();
        // }


        return response()->json(['status' => true, 'msg' => 'Your Reviews is stored successfully']);
        // return redirect()->back()->with('success',"Your Reviews is stored successfully");
    }

    public function detail_page1()
    {
        $slide = Slider::where('status', 1)->get();

        return view('frontend.details1', compact('slide'));
    }
    public function event()
    {
        $slide = Slider::where('status', 1)->get();
        $news = News::orderBy('id', 'desc')->where('status', 1)->paginate(10);

        return view('frontend.event', compact('slide', 'news'));
    }
    public function event1()
    {
        $slide = Slider::where('status', 1)->get();
        $events = Articles::orderBy('id', 'desc')->where('status', 1)->paginate(10);

        return view('frontend.event1', compact('slide', 'events'));
    }
    public function news_event($id)
    {
        $slide = Slider::where('status', 1)->get();
        $edit = News::find($id);
        // dd($edit);
        return view('frontend.news-event', compact('slide', 'edit'));
    }
    public function news_event1($id)
    {
        $edit = Articles::find($id);
        $slide = Slider::where('status', 1)->get();

        return view('frontend.event-details', compact('slide', 'edit'));
    }
    public function package()
    {
        $slide = Slider::where('status', 1)->get();

        return view('frontend.package', compact('slide'));
    }
    public function comming()
    {
        $slide = Slider::where('status', 1)->get();

        return view('frontend.comming', compact('slide'));
    }
    public function contact()
    {
        $slide = Slider::where('status', 1)->get();

        $purpose = Purpose::get();
        return view('frontend.contact', compact('purpose', 'slide'));
    }
    public function menu()
    {
        $slide = Slider::where('status', 1)->get();
        $menu = Menu::get();

        return view('frontend.package', compact('menu', 'slide'));
    }
    public function privacy()
    {
        $slide = Slider::where('status', 1)->get();

        return view('frontend.privacy', compact('slide'));
    }
    public function terms()
    {
        $slide = Slider::where('status', 1)->get();

        return view('frontend.terms', compact('slide'));
    }


    // public function store_modif(Request $request)
    // {
    //     $data = $request->input('data'); // Get the data from the AJAX request
    //     session(['country' => $data]); // Store the data in the session
    //     return response()->json(['message' => 'Data stored in session']);
    // }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        // dd(lang);
        return redirect()->back();
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $slide = Slider::where('status', 1)->get();

        $profile = Whou::where('name', 'like', '%' . $searchTerm . '%')
            ->get();
        $wprofile = WProfile::where('name', 'like', '%' . $searchTerm . '%')
            ->get();
        // dd($profile);
        return view('frontend.profile', compact('slide', 'profile', 'searchTerm','wprofile'));
    }





    public function send(Request $request)
    {
        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'messageContent' => $request->input('message'),
                'purpose_id' => $request->input('purpose_id'),
            ];
    
            Mail::send('emails.contact', $data, function ($message) {
                $message->to('info@bahrainbanksdirectory.com')
                        ->subject('New Enquiry ');
            });
    
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            \Log::error('Error sending email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }
    
}
