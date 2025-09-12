@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')
@section('page-description', 'Update category information')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Edit: {{ $category->name }}</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.categories.show', $category) }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye mr-1"></i>View
                </a>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Categories
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="p-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Basic Information -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Basic Information</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Name (Sinhala) *</label>
                            <input type="text" name="name_sinhala" value="{{ old('name_sinhala', $category->name_sinhala) }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name_sinhala') border-red-500 @enderror">
                            @error('name_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon (Emoji)</label>
                            <input type="text" name="icon" value="{{ old('icon', $category->icon) }}" maxlength="10"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('icon') border-red-500 @enderror"
                                   placeholder="📚">
                            @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-sm text-gray-500 mt-1">Use an emoji to represent this category</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order *</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}" min="0" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('sort_order') border-red-500 @enderror">
                            @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-sm text-gray-500 mt-1">Lower numbers appear first</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Description</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="4"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Category Image -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Category Image</h4>
                    
                    <div class="space-y-4">
                        @if($category->image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" 
                                 class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                        </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $category->image ? 'Replace Image' : 'Upload Image' }}
                            </label>
                            <input type="file" name="image" accept="image/*"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
                            @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-sm text-gray-500 mt-1">Supported formats: JPEG, PNG, JPG, GIF, WebP. Max size: 5MB</p>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Settings</h4>
                    
                    <div class="space-y-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>Update Category
            </button>
        </div>
    </form>
</div>
@endsection