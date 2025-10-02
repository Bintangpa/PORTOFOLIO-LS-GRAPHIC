<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // For homepage, get only 5 latest portfolios
        $portfolios = Portfolio::latest()->take(5)->get();
        
        return view('home', compact('portfolios'));
    }
    
    public function portfolio(Request $request)
    {
        $query = Portfolio::query();
        
        // Handle search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('technologies', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        // Get all portfolios with pagination
        $portfolios = $query->latest()->paginate(12);
        
        return view('portfolio', compact('portfolios'));
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolio-detail', compact('portfolio'));
    }
    
    public function search(Request $request)
    {
        $query = Portfolio::query();
        
        // Get all unique categories for filter
        $categories = Portfolio::whereNotNull('category')
                              ->distinct()
                              ->pluck('category')
                              ->filter()
                              ->sort();
        
        // Apply filters
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('technologies', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                case 'title_asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'title_desc':
                    $query->orderBy('title', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }
        
        $portfolios = $query->paginate(12)->withQueryString();
        
        return view('search', compact('portfolios', 'categories'));
    }
    
    public function about()
    {
        return view('about');
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);
        
        // Here you can add email sending logic
        // For now, we'll just redirect back with success message
        
        return redirect()->route('contact')->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}