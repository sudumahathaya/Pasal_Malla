<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index(Request $request)
    {
        $query = Bundle::where('is_active', true);

        // Filter by grade level
        if ($request->has('grade') && $request->grade) {
            $query->where('grade_level', $request->grade);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_sinhala', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $bundles = $query->orderBy('is_featured', 'desc')
            ->orderBy('name')
            ->paginate(8);

        return view('bundles.index', compact('bundles'));
    }

    public function show(Bundle $bundle)
    {
        $bundle->load('products');

        return view('bundles.show', compact('bundle'));
    }
}
