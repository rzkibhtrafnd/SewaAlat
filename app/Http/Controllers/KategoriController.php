<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); // Fetch all categories
        return view('admin.kategori.index', compact('kategori')); // Pass categories to the view
    }

    public function create()
    {
        return view('admin.kategori.create'); // Ensure the view name matches
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create($request->all()); // Create new category with request data
        return redirect()->route('admin.kategori.index')->with('success', 'Category created successfully.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori')); // Pass category to edit view
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update($request->all()); // Update category with request data
        return redirect()->route('admin.kategori.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete(); // Delete the category
        return redirect()->route('admin.kategori.index')->with('success', 'Category deleted successfully.');
    }
}
