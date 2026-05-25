<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $partners = Partner::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $partners = Partner::all();
        }
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image' 
        ]);

        $data = $request->all();
        
        if ($request->hasFile('logo')) {
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner ditambahkan');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image|nullable' 
        ]);

        $partner = Partner::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            if ($partner->logo_url) {
                Storage::disk('public')->delete($partner->logo_url);
            }
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner diupdate');
    }

    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        $partner->delete();
        
        return redirect()->route('admin.partners.index')->with('success', 'Partner dihapus');
    }
}