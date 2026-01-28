<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\GetInTouch;
use App\Models\Partner;
use App\Models\PricingCategory;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Will;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::where('status', 1)->take(3)->get()->map(function ($service) {
            $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
            $service->banner_image = $service->banner_image ? asset('storage/images/services/' . $service->banner_image) : '';
            return $service;
        });
        $partners = Partner::where('status', 1)->get()->map(function ($p) {
            $p->logo_path = isset($p->logo_path) ? asset('storage/images/partners/' . $p->logo_path) : '';

            return $p;
        });
        $testimonials = Testimonial::orderByDesc('id')->get()->map(function ($t) {
            $t->client_photo_path = $t->client_photo_path ? asset('storage/images/testimonials/' . $t->client_photo_path) : '';
            return $t;
        });
        $home_page_data = '';
        // dd($services);
        return view('home', compact('services', 'partners', 'home_page_data', 'testimonials'));
    }
    public function getServices()
    {
        $services = Service::where('status', 1)->get()->map(function ($service) {
            $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
            $service->banner_image = $service->banner_image ? asset('storage/images/services/' . $service->banner_image) : '';
            return $service;
        });
        return view('services', compact('services'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->where('status', 1)->firstOrFail();
        $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
        $service->banner_image = $service->banner_image ? asset('storage/images/services/' . $service->banner_image) : '';

        $services = Service::where('status', 1)->get()->map(function ($service) {
            $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
            $service->banner_image = $service->banner_image ? asset('storage/images/services/' . $service->banner_image) : '';
            return $service;
        });
        return view('service_details', compact('service', 'services'));
    }

    public function guidedJourney()
    {
        return view('journey');
    }

    public function blogLists(Request $request)
    {
        $search = $request->query('search', ''); // default empty
        $topicSlug = $request->query('topic', null);
        $topic = $topicSlug ? Topic::where('slug', $topicSlug)->first() : null;

        $blogs = CaseStudy::where('status', 1)
            ->with('topic')
            // Filter by search if exists
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            })
            // Filter by topic if exists
            ->when($topic, function ($q) use ($topic) {
                $q->where('topic_id', $topic->id);
            })
            ->paginate(11);

        $topics = Topic::where('status', 1)->get();

        return view('blogs', compact('blogs', 'topics', 'search', 'topic'));
    }


    public function blogDetails($slug)
    {
        $blog = CaseStudy::where('slug', $slug)->where('status', 1)->with('topic')->firstOrFail();
        $blog->image = $blog->image ? asset('storage/images/case_studies/' . $blog->image) : '';
        return view('blog_details', compact('blog'));
    }


    public function priceLists()
    {
        $priceArr = [];
        $pricingCat = PricingCategory::where('status', 1)->with('pricing')->get();
        // dd($pricingCat);
        foreach ($pricingCat as $key => $pc) {
            foreach ($pc->pricing as $k => $v) {
                $priceArr[$pc->name][] = [
                    'text' => $v->pricing_text,
                    'price' => $v->price
                ];
            }
        }
        // dd($priceArr);

        return view('price_list', compact('priceArr'));
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function contactUsStore(Request $request)
    {
        DB::beginTransaction();
        try {
            $c = new GetInTouch();
            $c->ct_name = $request->ct_name;
            $c->ct_email = $request->ct_email;
            $c->ct_phone = $request->ct_phone;
            $c->ct_message = $request->ct_message;
            $c->ip_address = request()->ip();
            $c->save();
            DB::commit();
            return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you ASPA');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error during submission: ' . $th->getMessage());
        }
    }

    public function startYourWills(Request $request)
    {
        return view('start_will');
    }
    public function storeWills(Request $request)
    {
        // dd($request->all(), uniqid('SW'));
        DB::beginTransaction();
        try {
            $will = new Will();
            $will->will_unique_id = uniqid('SW');
            $will->setup = $request->setup ? implode(', ', $request->setup) : '';
            $will->full_name = $request->full_name;
            $will->email = $request->email;
            $will->postcode = $request->postcode;
            $will->confirm_england = $request->confirm_england;
            $will->confirm_self = $request->confirm_self;
            $will->confirm_no_advice = $request->confirm_no_advice;
            $will->confirm_free_will = $request->confirm_free_will;
            $will->assets = $request->assets ? implode(', ', $request->assets) : '';
            $will->save();
            DB::commit();
            return redirect()->route('thank-you');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Unable to Sunmi Error: ' . $th->getMessage());
        }
    }

    public function thankYou()
    {
        return view('thank_you');
    }
}
