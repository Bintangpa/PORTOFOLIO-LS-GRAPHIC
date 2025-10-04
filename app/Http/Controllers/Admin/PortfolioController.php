<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:15360',
            'category' => 'nullable|max:255',
            'client' => 'nullable|max:255',
            'project_date' => 'nullable|date',
        ]);

        $imagePath = $request->file('image')->store('portfolios', 'public');

        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'client' => $request->client,
            'project_date' => $request->project_date,
            'image_path' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15360',
            'category' => 'nullable|max:255',
            'client' => 'nullable|max:255',
            'project_date' => 'nullable|date',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($portfolio->image_path);
            // Upload gambar baru
            $data['image_path'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil diupdate!');
    }

    public function destroy(Portfolio $portfolio)
    {
        Storage::disk('public')->delete($portfolio->image_path);
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil dihapus!');
    }
}