@extends('admin.layouts.app')

@section('title', 'Add Product')
@section('page-title', 'Add New Product')
@section('page-description', 'Create a new product for your store')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Product Information</h3>
            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-2"></i>Back to Products
            </a>
        </div>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" class="p-6" enctype="multipart/form-data">
        @csrf
<<<<<<< HEAD

=======
        
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Basic Information -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Basic Information</h4>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name (Sinhala)</label>
                            <input type="text" name="name_sinhala" value="{{ old('name_sinhala') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name_sinhala') border-red-500 @enderror">
                            @error('name_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">SKU *</label>
                            <input type="text" name="sku" value="{{ old('sku') }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('sku') border-red-500 @enderror">
                            @error('sku')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="category_id" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Description</h4>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                            <textarea name="description" rows="4"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description (Sinhala)</label>
                            <textarea name="description_sinhala" rows="4"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description_sinhala') border-red-500 @enderror">{{ old('description_sinhala') }}</textarea>
                            @error('description_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Image -->
            <div>
                <h4 class="text-md font-semibold text-gray-800 mb-4">Product Image</h4>
<<<<<<< HEAD

=======
                
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload Image</label>
                        <input type="file" name="image" accept="image/*"
                               class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Supported formats: JPEG, PNG, JPG, GIF, WebP. Max size: 5MB</p>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Pricing -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Pricing & Inventory</h4>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Regular Price (Rs.) *</label>
                            <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                            @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sale Price (Rs.)</label>
                            <input type="number" name="sale_price" value="{{ old('sale_price') }}" step="0.01" min="0"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('sale_price') border-red-500 @enderror">
                            @error('sale_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" min="0" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stock_quantity') border-red-500 @enderror">
                            @error('stock_quantity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Grades -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Grade Levels</h4>
                    <div class="grid grid-cols-2 gap-2">
                        @php
                        $grades = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6-9', 'O/L', 'A/L'];
                        @endphp
                        @foreach($grades as $grade)
                        <label class="flex items-center">
<<<<<<< HEAD
                            <input type="checkbox" name="grades[]" value="{{ $grade }}"
=======
                            <input type="checkbox" name="grades[]" value="{{ $grade }}" 
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                                   {{ in_array($grade, old('grades', [])) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">{{ $grade }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Settings -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Settings</h4>
<<<<<<< HEAD

=======
                    
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
                    <div class="space-y-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Featured Product</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>Create Product
            </button>
        </div>
    </form>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 21bd8714d811c712b89c6bec34d5a020b1420858
