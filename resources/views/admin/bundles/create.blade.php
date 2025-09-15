@extends('admin.layouts.app')

@section('title', 'Add Bundle')
@section('page-title', 'Add Bundle')
@section('page-description', 'Create a new product bundle')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Add New Bundle</h2>
                <p class="text-gray-600">Create a special product bundle with discounted pricing</p>
            </div>
            <a href="{{ route('admin.bundles.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-medium transition-colors inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Bundles
            </a>
        </div>
    </div>

    <!-- Bundle Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form method="POST" action="{{ route('admin.bundles.store') }}" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Bundle Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Bundle Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bundle Name Sinhala -->
                    <div>
                        <label for="name_sinhala" class="block text-sm font-medium text-gray-700 mb-2">Bundle Name (Sinhala)</label>
                        <input type="text" name="name_sinhala" id="name_sinhala" value="{{ old('name_sinhala') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name_sinhala') border-red-500 @enderror">
                        @error('name_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grade Level -->
                    <div>
                        <label for="grade_level" class="block text-sm font-medium text-gray-700 mb-2">Grade Level</label>
                        <select name="grade_level" id="grade_level"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('grade_level') border-red-500 @enderror">
                            <option value="">Select Grade Level</option>
                            <option value="Grade 1" {{ old('grade_level') == 'Grade 1' ? 'selected' : '' }}>Grade 1</option>
                            <option value="Grade 2" {{ old('grade_level') == 'Grade 2' ? 'selected' : '' }}>Grade 2</option>
                            <option value="Grade 3" {{ old('grade_level') == 'Grade 3' ? 'selected' : '' }}>Grade 3</option>
                            <option value="Grade 4" {{ old('grade_level') == 'Grade 4' ? 'selected' : '' }}>Grade 4</option>
                            <option value="Grade 5" {{ old('grade_level') == 'Grade 5' ? 'selected' : '' }}>Grade 5</option>
                            <option value="Grade 6-9" {{ old('grade_level') == 'Grade 6-9' ? 'selected' : '' }}>Grade 6-9</option>
                            <option value="O/L" {{ old('grade_level') == 'O/L' ? 'selected' : '' }}>O/L</option>
                            <option value="A/L" {{ old('grade_level') == 'A/L' ? 'selected' : '' }}>A/L</option>
                            <option value="All Grades" {{ old('grade_level') == 'All Grades' ? 'selected' : '' }}>All Grades</option>
                        </select>
                        @error('grade_level')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Original Price -->
                    <div>
                        <label for="original_price" class="block text-sm font-medium text-gray-700 mb-2">Original Price (Rs.) *</label>
                        <input type="number" name="original_price" id="original_price" value="{{ old('original_price') }}" step="0.01" min="0" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('original_price') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Total value if bought separately</p>
                        @error('original_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bundle Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Bundle Price (Rs.) *</label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Discounted bundle price</p>
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Options -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                   {{ old('is_featured') ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="is_featured" class="ml-2 text-sm text-gray-700">Featured</label>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Bundle Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Bundle Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewImage(this)">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                            </div>
                        </div>
                        <div id="image-preview" class="mt-2 hidden">
                            <img id="preview-img" class="h-32 w-32 object-cover rounded-lg mx-auto">
                        </div>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Sinhala -->
                    <div>
                        <label for="description_sinhala" class="block text-sm font-medium text-gray-700 mb-2">Description (Sinhala)</label>
                        <textarea name="description_sinhala" id="description_sinhala" rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description_sinhala') border-red-500 @enderror">{{ old('description_sinhala') }}</textarea>
                        @error('description_sinhala')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.bundles.index') }}"
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Create Bundle
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
