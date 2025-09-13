<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BundleController extends Controller
{
    public function index(Request $request)
    {
        $query = Bundle::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_sinhala', 'like', "%{$search}%");
            });
        }

        $bundles = $query->orderBy('created_at', 'desc')->paginate(20);

        $totalSavings = Bundle::all()->sum(function (Bundle $bundle) {
            $savings = ($bundle->original_price ?? 0) - ($bundle->price ?? 0);
            return $savings > 0 ? $savings : 0;
        });

        return view('admin.bundles.index', compact('bundles', 'totalSavings'));
    }

    public function create()
    {
        $products = Product::where('is_active', true)->orderBy('name')->get();
        return view('admin.bundles.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_sinhala' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_sinhala' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'required|numeric|min:0',
            'grade_level' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('bundles', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        Bundle::create($data);

        return redirect()->route('admin.bundles.index')
            ->with('success', 'Bundle created successfully!');
    }

    public function show(Bundle $bundle)
    {
        $bundle->load('products');
        return view('admin.bundles.show', compact('bundle'));
    }

    public function edit(Bundle $bundle)
    {
        $products = Product::where('is_active', true)->orderBy('name')->get();
        return view('admin.bundles.edit', compact('bundle', 'products'));
    }

    public function update(Request $request, Bundle $bundle)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_sinhala' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_sinhala' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'required|numeric|min:0',
            'grade_level' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($bundle->image && Storage::disk('public')->exists($bundle->image)) {
                Storage::disk('public')->delete($bundle->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('bundles', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $bundle->update($data);

        return redirect()->route('admin.bundles.index')
            ->with('success', 'Bundle updated successfully!');
    }

    public function destroy(Bundle $bundle)
    {
        if ($bundle->image && Storage::disk('public')->exists($bundle->image)) {
            Storage::disk('public')->delete($bundle->image);
        }

        $bundle->delete();
        return redirect()->route('admin.bundles.index')
            ->with('success', 'Bundle deleted successfully!');
    }
}
