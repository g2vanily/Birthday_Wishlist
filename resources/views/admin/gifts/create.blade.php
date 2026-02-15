@extends('layouts.app')

@section('title', 'Ajouter un Cadeau')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            <i class="fas fa-plus-circle text-pink-600"></i> Ajouter un Cadeau
        </h2>

        <form method="POST" action="{{ route('admin.gifts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nom -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    Nom du cadeau <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Prix -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2">
                    Prix (FCFA) <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       id="price" 
                       name="price" 
                       value="{{ old('price') }}"
                       step="1"
                       min="0"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 @error('price') border-red-500 @enderror">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">
                    Image <span class="text-red-500">*</span>
                </label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/jpeg,image/png,image/jpg,image/webp"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 @error('image') border-red-500 @enderror">
                <p class="text-gray-500 text-sm mt-1">Formats acceptés : JPEG, PNG, JPG, WEBP (max 2 Mo)</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">
                    Description
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lien d'achat -->
            <div class="mb-6">
                <label for="purchase_link" class="block text-gray-700 font-semibold mb-2">
                    Lien d'achat <span class="text-red-500">*</span>
                </label>
                <input type="url" 
                       id="purchase_link" 
                       name="purchase_link" 
                       value="{{ old('purchase_link') }}"
                       placeholder="https://example.com/produit"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 @error('purchase_link') border-red-500 @enderror">
                @error('purchase_link')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex space-x-4">
                <button type="submit" 
                        class="flex-1 bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
                <a href="{{ route('admin.gifts.index') }}" 
                   class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-4 rounded-lg text-center transition-colors duration-200">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
