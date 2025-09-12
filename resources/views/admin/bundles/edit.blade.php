@extends('admin.layouts.app')

@section('title', 'Edit Bundle')
@section('page-title', 'Edit Bundle')
@section('page-description', 'Update bundle information')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Edit: {{ $bundle->name }}</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.bundles.show', $bundle) }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye mr-1"></i>View
                </a>
                <a href="{{ route('admin.bundles.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Bundles
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.bundles.update', $bundle) }}" method="POST" class="p-6" enctype="multipart/form-data">
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bundle Name *</label>
                            <input type="text" name="name" value="{{ old('name', $bundle->name) }}" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bundle Name (Sinhala)</label>
                            <input type="text" name="name_sinhala" value="{{ old('name_sinhala', $bundle->name_sinhala) }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name_sinhala') border-red-500 @enderror">
                            @error('name_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Grade Level</label>
                            <select name="grade_level" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Grade Level</option>
                                <option value="Grade 1" {{ old('grade_level', $bundle->grade_level) == 'Grade 1' ? 'selected' : '' }}>Grade 1</option>
                                <option value="Grade 2" {{ old('grade_level', $bundle->grade_level) == 'Grade 2' ? 'selected' : '' }}>Grade 2</option>
                                <option value="Grade 3" {{ old('grade_level', $bundle->grade_level) == 'Grade 3' ? 'selected' : '' }}>Grade 3</option>
                                <option value="Grade 4" {{ old('grade_level', $bundle->grade_level) == 'Grade 4' ? 'selected' : '' }}>Grade 4</option>
                                <option value="Grade 5" {{ old('grade_level', $bundle->grade_level) == 'Grade 5' ? 'selected' : '' }}>Grade 5</option>
                                <option value="Grade 6-9" {{ old('grade_level', $bundle->grade_level) == 'Grade 6-9' ? 'selected' : '' }}>Grade 6-9</option>
                                <option value="O/L" {{ old('grade_level', $bundle->grade_level) == 'O/L' ? 'selected' : '' }}>O/L</option>
                                <option value="A/L" {{ old('grade_level', $bundle->grade_level) == 'A/L' ? 'selected' : '' }}>A/L</option>
                                <option value="All Grades" {{ old('grade_level', $bundle->grade_level) == 'All Grades' ? 'selected' : '' }}>All Grades</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Description</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                            <textarea name="description" rows="4"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $bundle->description) }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description (Sinhala)</label>
                            <textarea name="description_sinhala" rows="4"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description_sinhala') border-red-500 @enderror">{{ old('description_sinhala', $bundle->description_sinhala) }}</textarea>
                            @error('description_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Bundle Image -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Bundle Image</h4>
                    
                    <div class="space-y-4">
                        @if($bundle->image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <img src="{{ asset('storage/' . $bundle->image) }}" alt="{{ $bundle->name }}" 
                                 class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                        </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $bundle->image ? 'Replace Image' : 'Upload Image' }}
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

                <!-- Pricing -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Pricing</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bundle Price (Rs.) *</label>
                            <input type="number" name="price" value="{{ old('price', $bundle->price) }}" step="0.01" min="0" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                            @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Original Price (Rs.) *</label>
                            <input type="number" name="original_price" value="{{ old('original_price', $bundle->original_price) }}" step="0.01" min="0" required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('original_price') border-red-500 @enderror">
                            @error('original_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-sm text-gray-500 mt-1">Price if items were bought separately</p>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div>
                    <h4 class="text-md font-semibold text-gray-800 mb-4">Settings</h4>
                    
                    <div class="space-y-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $bundle->is_featured) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Featured Bundle</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $bundle->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.bundles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>Update Bundle
            </button>
        </div>
    </form>
</div>
@endsection