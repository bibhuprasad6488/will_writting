<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderByDesc('id')->get()->map(function ($p) {
            $p->logo_path = isset($p->logo_path) ? asset('storage/' . $p->logo_path) : '';
            return $p;
        });
        return view('admin.partners.list', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048|accepted_formats:jpg,jpeg,png,webp',
            'website_url' => 'nullable|url|max:255',
            'desc' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $partner = new Partner();
            $partner->name = $validated['name'];
            if (isset($validated['website_url'])) {
                $partner->website_url = $validated['website_url'];
            }
            if (isset($validated['desc'])) {
                $partner->desc = $validated['desc'];
            }
            // Handle Logo Upload
            $destinationPath = public_path('storage/images/partners/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $validated['name'] . '_' . time() . '.' . $image->getClientOriginalExtension();

                // Move new file
                if ($image->move($destinationPath, $imageName)) {
                    $partner->logo_path = $imageName;
                } else {
                    // $this->sendToastResponse('error', 'Failed to upload image');
                    return back()->with('error', 'Failed to upload image');
                }
            }
            $partner->save();
            DB::commit();
            return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while creating the partner: ' . $th->getMessage());
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
