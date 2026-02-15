@extends('layouts.app')

@section('title', 'Gestion des Cadeaux')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- En-tête -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            <i class="fas fa-cog text-pink-600"></i> Gestion des Cadeaux
        </h1>
        <a href="{{ route('admin.gifts.create') }}" 
           class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>Ajouter un cadeau
        </a>
    </div>

    @if($gifts->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <i class="fas fa-gift text-gray-300 text-6xl mb-4"></i>
            <p class="text-xl text-gray-500 mb-4">Aucun cadeau dans la wishlist.</p>
            <a href="{{ route('admin.gifts.create') }}" 
               class="inline-block bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-6 rounded-lg">
                Ajouter le premier cadeau
            </a>
        </div>
    @else
        <!-- Grille de cadeaux -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($gifts as $gift)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Image -->
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ $gift->image_url }}" 
                             alt="{{ $gift->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Contenu -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                            {{ $gift->name }}
                        </h3>
                        
                        <p class="text-2xl font-bold text-pink-600 mb-3">
                            {{ $gift->formatted_price }}
                        </p>
                        
                        @if($gift->description)
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $gift->description }}
                            </p>
                        @endif

                        <!-- Statut de réservation -->
                        @if($gift->isReserved())
                            <div class="bg-green-100 border border-green-300 rounded-lg p-3 mb-4">
                                <p class="text-green-800 text-sm font-semibold">
                                    <i class="fas fa-user-check mr-1"></i>
                                    Réservé par : {{ $gift->reserved_by }}
                                </p>
                                <form method="POST" 
                                      action="{{ route('admin.reservations.destroy', $gift->reservation) }}" 
                                      onsubmit="return confirm('Annuler cette réservation ?');"
                                      class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                        <i class="fas fa-times-circle mr-1"></i>Annuler la réservation
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="bg-gray-100 border border-gray-300 rounded-lg p-3 mb-4">
                                <p class="text-gray-600 text-sm">
                                    <i class="fas fa-clock mr-1"></i>
                                    Disponible
                                </p>
                            </div>
                        @endif
                        
                        <!-- Actions -->
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.gifts.edit', $gift) }}" 
                               class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-lg transition-colors duration-200">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            
                            <form method="POST" 
                                  action="{{ route('admin.gifts.destroy', $gift) }}" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce cadeau ?');"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $gifts->links() }}
        </div>
    @endif
</div>
@endsection
