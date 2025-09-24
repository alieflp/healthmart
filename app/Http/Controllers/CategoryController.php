<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 🟢 Tampilkan semua kategori
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // 🟢 Form tambah kategori
    public function create()
    {
        return view('admin.categories.create');
    }

    // 🟢 Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->only(['name', 'description']));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // 🟢 Detail kategori
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // 🟢 Form edit kategori
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // 🟢 Update kategori
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->only(['name', 'description']));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // 🟢 Hapus kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
