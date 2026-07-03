<?php

namespace App\Http\Controllers;

use App\Models\AllServicePage;
use App\Models\CaseStudy;
use App\Models\CmsCaseStudy;
use App\Models\ContactUsPage;
use App\Models\GetInTouch;
use App\Models\GuidedJourney;
use App\Models\HomePage;
use App\Models\OurStory;
use App\Models\Partner;
use App\Models\PricePackage;
use App\Models\Pricing;
use App\Models\PricingCategory;
use App\Models\PricingPage;
use App\Models\PrivacyPolicy;
use App\Models\ProtectionPage;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\StartYourWillPage;
use App\Models\TermsOfBusiness;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Will;
use App\Models\WitnessesPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private $setting;

    public function __construct()
    {
        $this->setting = SiteSetting::find(1);
    }

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
        $home_page_data = HomePage::find(1);
        if ($home_page_data) {
            $home_page_data->banner_image = $home_page_data->banner_image ? asset('storage/images/cmspage/' . $home_page_data->banner_image) : '';
            $home_page_data->ww_image = $home_page_data->ww_image ? asset('storage/images/cmspage/' . $home_page_data->ww_image) : '';
        }
        // dd($services);
        $siteSetting = $this->setting;
        return view('home', compact('services', 'partners', 'home_page_data', 'testimonials', 'siteSetting'));
    }
    public function getServices()
    {
        $services = Service::where('status', 1)->get()->map(function ($service) {
            $service->service_image = $service->service_image ? asset('storage/images/services/' . $service->service_image) : '';
            $service->banner_image = $service->banner_image ? asset('storage/images/services/' . $service->banner_image) : '';
            return $service;
        });
        $siteSetting = $this->setting;

        $allServicePage = AllServicePage::find(1);
        if ($allServicePage) {
            $allServicePage->banner_image = $allServicePage->banner_image ? asset('storage/images/cmspage/' . $allServicePage->banner_image) : '';
        }
        return view('services', compact('services', 'siteSetting', 'allServicePage'));
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
        $siteSetting = $this->setting;
        return view('service_details', compact('service', 'services', 'siteSetting'));
    }

    public function guidedJourney()
    {
        $siteSetting = $this->setting;
        $journey = GuidedJourney::find(1);
        if ($journey) {
            $journey->step_img_one = $journey->step_img_one ? asset('storage/images/journey/' . $journey->step_img_one) : '';
            $journey->step_img_two = $journey->step_img_two ? asset('storage/images/journey/' . $journey->step_img_two) : '';
            $journey->step_img_three = $journey->step_img_three ? asset('storage/images/journey/' . $journey->step_img_three) : '';
            $journey->step_img_four = $journey->step_img_four ? asset('storage/images/journey/' . $journey->step_img_four) : '';
        }
        return view('journey', compact('siteSetting', 'journey'));
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
        $siteSetting = $this->setting;

        $caseStudyPage = CmsCaseStudy::find(1);
        if ($caseStudyPage) {
            $caseStudyPage->banner_image = $caseStudyPage->banner_image ? asset('storage/images/cmspage/' . $caseStudyPage->banner_image) : '';
        }

        return view('blogs', compact('blogs', 'topics', 'search', 'topic', 'siteSetting', 'caseStudyPage'));
    }


    public function blogDetails($slug)
    {
        $blog = CaseStudy::where('slug', $slug)->where('status', 1)->with('topic')->firstOrFail();
        $blog->image = $blog->image ? asset('storage/images/case_studies/' . $blog->image) : '';
        $relatedBlogs = CaseStudy::where('topic_id', $blog->topic_id)->where('id', '!=', $blog->id)->where('status', 1)->orderByDesc('id')->take(10)->get()->map(function ($rb) {
            $rb->image = $rb->image ? asset('storage/images/case_studies/' . $rb->image) : '';
            return $rb;
        });

        $topics = Topic::where('status', 1)->take(4)->get();

        return view('blog_details', compact('blog', 'relatedBlogs', 'topics'));
    }


    public function priceLists()
    {
        $priceArr = [];

        $pricingCategories = PricingCategory::where('status', 1)
            // ->with('pricing')
            ->get();

        foreach ($pricingCategories as $category) {
            $pricesDatas = Pricing::where('pricing_cat_id', $category->id)->orderByDesc('id')->get();
            $prices = [];
            if (count($pricesDatas) > 0) {

                foreach ($pricesDatas as $pricing) {
                    $prices[] = [
                        'title' => $pricing->pricing_title,
                        'text'  => $pricing->pricing_text,
                        'price' => $pricing->price,
                    ];
                }

                $priceArr[] = [
                    'cat_name'   => $category->name,
                    'cat_desc'   => $category->desctiption,
                    'cat_prices' => $prices,
                ];
            }
        }
        // dd($priceArr);
        $siteSetting = $this->setting;
        $packages = PricePackage::orderByDesc('id')->get();

        $pricingPage = PricingPage::find(1);
        if ($pricingPage) {
            $pricingPage->banner_image = $pricingPage->banner_image ? asset('storage/images/cmspage/' . $pricingPage->banner_image) : '';
        }
        return view('price_list', compact('priceArr', 'siteSetting', 'packages', 'pricingPage'));
    }

    public function contactUs()
    {
        $siteSetting = $this->setting;
        $contactPage = ContactUsPage::find(1);
        if ($contactPage) {
            $contactPage->banner_image = $contactPage->banner_image ? asset('storage/images/cmspage/' . $contactPage->banner_image) : '';
            $contactPage->c_img = $contactPage->c_img ? asset('storage/images/cmspage/' . $contactPage->c_img) : '';
        }
        return view('contact', compact('siteSetting', 'contactPage'));
    }

    public function contactUsStore(Request $request)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('app.recaptcha_secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$response->json('success')) {
            return back()->with('error', 'CAPTCHA verification failed. Please try again.');
        }

        $siteSetting = $this->setting;

        DB::beginTransaction();
        try {
            $c = new GetInTouch();
            $c->ct_name = $request->ct_name;
            $c->ct_email = $request->ct_email;
            $c->ct_phone = $request->ct_phone;
            $c->ct_message = $request->ct_message;
            $c->ip_address = request()->ip();
            $c->save();

            $adminEmail = $siteSetting->contact_email ?? $siteSetting->alt_email;
            $internalRecipients = [
                'bibhuprasad.maastrix@gmail.com',
                $adminEmail
            ];

            $internalSubject = "New Contact Requested: {$c->ct_name}";
            $internalMessage = "A new contact form has been submitted on Website.\n\n" .
                "Name: {$c->ct_name}\n" .
                "Email: {$c->ct_email}\n" .
                "Phone: {$c->ct_phone}\n" .
                "Message: {$c->ct_message}\n";

            Mail::raw($internalMessage, function ($message) use ($internalSubject, $internalRecipients, $c) {
                $message->to($internalRecipients)->subject($internalSubject);
                // ->replyTo($c->ct_email, $c->ct_name);
            });

            DB::commit();
            return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you as soon as possible');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error during submission: ' . $th->getMessage());
        }
    }

    public function startYourWills(Request $request)
    {
        $startYourWills = StartYourWillPage::find(1);
        if ($startYourWills) {
            $startYourWills->banner_image = $startYourWills->banner_image ? asset('storage/images/cmspage/' . $startYourWills->banner_image) : '';
        }
        return view('start_will', compact('startYourWills'));
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

            // Send email to admin
            try {
                $sub = 'New will form Submitted';
                $to = 'bibhuprasad.maastrix@gmail.com';
                $internalMessage = "A new will form submitted on Website.\n\n" .
                    "User Name:	{$will->full_name}\n" .
                    "Email:	{$will->email}\n" .
                    "Post Code:	{$will->postcode}\n";

                Mail::raw($internalMessage, function ($message) use ($sub, $to) {
                    $message->to($to)->subject($sub);
                    // ->replyTo($cForm->cf_email, $cForm->cf_name);
                });
                // Log::info('Email Successfully Send');
            } catch (\Throwable $th) {
                Log::info('Failed to send Internal email', ['response' => $th->getMessage()]);
            }

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

    public function privacyPolicy()
    {
        $privacy = PrivacyPolicy::find(1);
        return view('privacy_policy', compact('privacy'));
    }

    public function termsOfBusiness()
    {
        $term = TermsOfBusiness::find(1);
        return view('terms_of_business', compact('term'));
    }
    public function ourStory()
    {
        $story = OurStory::find(1);
        if ($story) {
            $story->banner_image = $story->banner_image ? asset('storage/images/cmspage/' . $story->banner_image) : '';
        }
        return view('our_story', compact('story'));
    }
    public function witnesses()
    {
        $witness = WitnessesPage::find(1);
        if ($witness) {
            $witness->w_img = $witness->w_img ? asset('storage/images/witnesses/' . $witness->w_img) : '';
        }
        return view('witness', compact('witness'));
    }

    public function protection()
    {
        $protect = ProtectionPage::find(1);
        if ($protect) {
            $protect->p_image = $protect->p_image ? asset('storage/images/protections/' . $protect->p_image) : '';
            $protect->ps_img_one = $protect->ps_img_one ? asset('storage/images/protections/' . $protect->ps_img_one) : '';
            $protect->ps_img_two = $protect->ps_img_two ? asset('storage/images/protections/' . $protect->ps_img_two) : '';
            $protect->ps_img_three = $protect->ps_img_three ? asset('storage/images/protections/' . $protect->ps_img_three) : '';
            $protect->ps_img_four = $protect->ps_img_four ? asset('storage/images/protections/' . $protect->ps_img_four) : '';
            $protect->pp_img = $protect->pp_img ? asset('storage/images/protections/' . $protect->pp_img) : '';
            $protect->pw_img_one = $protect->pw_img_one ? asset('storage/images/protections/' . $protect->pw_img_one) : '';
            $protect->pw_img_two = $protect->pw_img_two ? asset('storage/images/protections/' . $protect->pw_img_two) : '';
            $protect->pw_img_three = $protect->pw_img_three ? asset('storage/images/protections/' . $protect->pw_img_three) : '';
            $protect->pw_img_four = $protect->pw_img_four ? asset('storage/images/protections/' . $protect->pw_img_four) : '';
        }
        return view('protection', compact('protect'));
    }
}
