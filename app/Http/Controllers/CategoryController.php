<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $categories = Category::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $categories = Category::all();
        }
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        
        return redirect()->route('admin.categories.index')->with('success', 'Kategori ditambahkan');
    }

    public function show(string $id)
    {
        // Kosongkan saja tidak apa-apa, soal UTS tidak minta detail per kategori
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required']);
        $category = Category::findOrFail($id);
        
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        
        return redirect()->route('admin.categories.index')->with('success', 'Kategori diupdate');
    }

    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori dihapus');
    }
}
