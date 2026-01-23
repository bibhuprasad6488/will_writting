<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
}
