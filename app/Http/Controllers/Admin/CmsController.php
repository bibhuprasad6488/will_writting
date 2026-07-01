<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllServicePage;
use App\Models\ContactUsPage;
use App\Models\HomePage;
use App\Models\PricingPage;
use App\Models\StartYourWillPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsController extends Controller
{
    public function homePageCms(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'banner_title' => 'required|string',
                'banner_sub_title' => 'required|string',
                'banner_btn_one_text' => 'required|string',
                'banner_btn_two_text' => 'required|string',
                'banner_image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
                'ww_image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
                'ww_desc' => 'required',
            ]);

            DB::beginTransaction();
            try {
                $homePage = HomePage::find(1) ?? new HomePage();
                $homePage->banner_title = $request->banner_title;
                $homePage->banner_sub_title = $request->banner_sub_title;
                $homePage->banner_btn_one_text = $request->banner_btn_one_text;
                $homePage->banner_btn_two_text = $request->banner_btn_two_text;
                $homePage->ww_desc = $request->ww_desc ? preg_replace('/[^\x20-\x7E]/u', '', $request->ww_desc) : '';

                // /** Upload Path */
                $destinationPath = public_path('storage/images/cmspage/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $imageName = 'hbanner_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($homePage->banner_image)) {
                        $oldFilePath = $destinationPath . $homePage->banner_image;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $homePage->banner_image = $imageName;
                }

                if ($request->hasFile('ww_image')) {
                    $file = $request->file('ww_image');
                    $imageName = 'cww_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($homePage->ww_image)) {
                        $oldFilePath = $destinationPath . $homePage->ww_image;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $homePage->ww_image = $imageName;
                }

                $homePage->save();
                DB::commit();

                return back()->with('success', 'Page updated successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('error', 'Error: ' . $th->getMessage());
            }
        } else {
            $homePage = HomePage::find(1);
            if ($homePage) {
                $homePage->banner_image = $homePage->banner_image ? asset('storage/images/cmspage/' . $homePage->banner_image) : '';
                $homePage->ww_image = $homePage->ww_image ? asset('storage/images/cmspage/' . $homePage->ww_image) : '';
            }
            return view('admin.cmspages.homepage', compact('homePage'));
        }
    }


    public function contactUPage(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'page_title' => 'required|string',
                'page_desc' => 'nullable',
                'banner_image' => 'nullable|image|mimes:png,jpg,jpeg,webp'
            ]);

            DB::beginTransaction();
            try {
                $contactPage = ContactUsPage::find(1) ?? new ContactUsPage();
                $contactPage->page_title = $request->page_title;
                $contactPage->meta_title = $request->meta_title;
                $contactPage->meta_desc = $request->meta_desc;
                $contactPage->meta_key = $request->meta_key;
                $contactPage->page_desc = $request->page_desc ? preg_replace('/[^\x20-\x7E]/u', '', $request->page_desc) : '';

                // /** Upload Path */
                $destinationPath = public_path('storage/images/cmspage/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $imageName = 'cbanner_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($contactPage->banner_image)) {
                        $oldFilePath = $destinationPath . $contactPage->banner_image;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $contactPage->banner_image = $imageName;
                }

                if ($request->hasFile('c_img')) {
                    $file = $request->file('c_img');
                    $imageName = 'cRight_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($contactPage->c_img)) {
                        $oldFilePath = $destinationPath . $contactPage->c_img;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $contactPage->c_img = $imageName;
                }

                $contactPage->save();
                DB::commit();

                return back()->with('success', 'Page Updated successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('error', 'Error: ' . $th->getMessage());
            }
        } else {
            $contactPage = ContactUsPage::find(1);
            if ($contactPage) {
                $contactPage->banner_image = $contactPage->banner_image ? asset('storage/images/cmspage/' . $contactPage->banner_image) : '';
                $contactPage->c_img = $contactPage->c_img ? asset('storage/images/cmspage/' . $contactPage->c_img) : '';
            }
            return view('admin.cmspages.contactpage', compact('contactPage'));
        }
    }


    public function pricingPage(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'banner_title' => 'required|string',
                'banner_sub_title' => 'required|string',
                // 'banner_btn_one_text' => 'required|string',
                // 'banner_btn_two_text' => 'required|string',
                'banner_image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            ]);

            DB::beginTransaction();
            try {
                $pricingPage = PricingPage::find(1) ?? new PricingPage();
                $pricingPage->banner_title = $request->banner_title;
                $pricingPage->banner_sub_title = $request->banner_sub_title;
                // $pricingPage->banner_btn_one_text = $request->banner_btn_one_text;
                // $pricingPage->banner_btn_two_text = $request->banner_btn_two_text;
                $pricingPage->meta_title = $request->meta_title;
                $pricingPage->meta_desc = $request->meta_desc;
                $pricingPage->meta_key = $request->meta_key;

                // /** Upload Path */
                $destinationPath = public_path('storage/images/cmspage/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $imageName = 'pbanner_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($pricingPage->banner_image)) {
                        $oldFilePath = $destinationPath . $pricingPage->banner_image;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $pricingPage->banner_image = $imageName;
                }

                $pricingPage->save();
                DB::commit();

                return back()->with('success', 'Page updated successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('error', 'Error: ' . $th->getMessage());
            }
        } else {
            $pricingPage = PricingPage::find(1);
            if ($pricingPage) {
                $pricingPage->banner_image = $pricingPage->banner_image ? asset('storage/images/cmspage/' . $pricingPage->banner_image) : '';
            }
            return view('admin.cmspages.pricingpage', compact('pricingPage'));
        }
    }


    public function allServicePage(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'banner_title' => 'required|string',
                'banner_sub_title' => 'required|string',
                'law_services' => 'required|string',
                'our_expertise' => 'required|string',
                'guided_approach' => 'required|string',
                'wws_content' => 'required|string',
                'banner_image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            ]);

            DB::beginTransaction();
            try {
                $allServicePage = AllServicePage::find(1) ?? new AllServicePage();
                $allServicePage->banner_title = $request->banner_title;
                $allServicePage->banner_sub_title = $request->banner_sub_title;
                $allServicePage->meta_title = $request->meta_title;
                $allServicePage->meta_desc = $request->meta_desc;
                $allServicePage->meta_key = $request->meta_key;
                $allServicePage->law_services = $request->law_services ? preg_replace('/[^\x20-\x7E]/u', '', $request->law_services) : '';
                $allServicePage->our_expertise = $request->our_expertise ? preg_replace('/[^\x20-\x7E]/u', '', $request->our_expertise) : '';
                $allServicePage->guided_approach = $request->guided_approach ? preg_replace('/[^\x20-\x7E]/u', '', $request->guided_approach) : '';
                $allServicePage->wws_content = $request->wws_content ? preg_replace('/[^\x20-\x7E]/u', '', $request->wws_content) : '';

                // /** Upload Path */
                $destinationPath = public_path('storage/images/cmspage/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $imageName = 'asbanner_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($allServicePage->banner_image)) {
                        $oldFilePath = $destinationPath . $allServicePage->banner_image;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $allServicePage->banner_image = $imageName;
                }

                $allServicePage->save();
                DB::commit();

                return back()->with('success', 'Page updated successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('error', 'Error: ' . $th->getMessage());
            }
        } else {
            $allServicePage = AllServicePage::find(1);
            if ($allServicePage) {
                $allServicePage->banner_image = $allServicePage->banner_image ? asset('storage/images/cmspage/' . $allServicePage->banner_image) : '';
            }
            return view('admin.cmspages.allservices', compact('allServicePage'));
        }
    }

    public function startYourWills(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'banner_title' => 'required|string',
                'banner_image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            ]);

            DB::beginTransaction();
            try {
                $startYourWills = StartYourWillPage::find(1) ?? new StartYourWillPage();
                $startYourWills->banner_title = $request->banner_title;
                $startYourWills->meta_title = $request->meta_title;
                $startYourWills->meta_desc = $request->meta_desc;
                $startYourWills->meta_key = $request->meta_key;

                // /** Upload Path */
                $destinationPath = public_path('storage/images/cmspage/');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                if ($request->hasFile('banner_image')) {
                    $file = $request->file('banner_image');
                    $imageName = 'asbanner_image_' . time() . '_' . $file->getClientOriginalName();

                    if (!empty($startYourWills->banner_image)) {
                        $oldFilePath = $destinationPath . $startYourWills->banner_image;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }

                    $file->move($destinationPath, $imageName);
                    $startYourWills->banner_image = $imageName;
                }

                $startYourWills->save();
                DB::commit();

                return back()->with('success', 'Page updated successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('error', 'Error: ' . $th->getMessage());
            }
        } else {
            $startYourWills = StartYourWillPage::find(1);
            if ($startYourWills) {
                $startYourWills->banner_image = $startYourWills->banner_image ? asset('storage/images/cmspage/' . $startYourWills->banner_image) : '';
            }
            return view('admin.cmspages.startwills', compact('startYourWills'));
        }
    }
}
