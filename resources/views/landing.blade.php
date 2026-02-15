@extends('layouts.app')

@section('title', 'Ma Wishlist d\'Anniversaire')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- En-tête -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            <i class="fas fa-birthday-cake text-pink-600"></i>
            Ma Wishlist d'Anniversaire
        </h1>
        <p class="text-xl text-gray-600">Découvrez les cadeaux qui me feraient plaisir !</p>
    </div>

    @if($gifts->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-gift text-gray-300 text-6xl mb-4"></i>
            <p class="text-xl text-gray-500">Aucun cadeau dans la wishlist pour le moment.</p>
        </div>
    @else
        <!-- Grille de cadeaux -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @foreach($gifts as $gift)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 {{ $gift->isReserved() ? 'opacity-75' : '' }}">
                    <!-- Badge réservé -->
                    @if($gift->isReserved())
                        <div class="bg-red-500 text-white text-center py-2 px-4 font-semibold">
                            <i class="fas fa-lock mr-2"></i>Réservé par {{ $gift->reserved_by }}
                        </div>
                    @endif
                    
                    <!-- Image -->
                    <div class="h-48 bg-gray-200 overflow-hidden {{ $gift->isReserved() ? 'grayscale' : '' }}">
                        <img src="{{ $gift->image_url }}" 
                             alt="{{ $gift->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Contenu -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 truncate">
                            {{ $gift->name }}
                        </h3>
                        
                        <p class="text-2xl font-bold text-pink-600 mb-3">
                            {{ $gift->formatted_price }}
                        </p>
                        
                        @if($gift->description)
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $gift->description }}
                            </p>
                        @endif
                        
                        <!-- Boutons -->
                        <div class="space-y-2">
                            @if($gift->isReserved())
                                <!-- Cadeau réservé - Lien d'achat désactivé -->
                                <div class="w-full bg-gray-400 text-white text-center py-2 px-4 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-lock mr-2"></i>Déjà réservé
                                </div>
                            @else
                                <!-- Bouton réserver -->
                                <a href="{{ route('reservations.create', $gift) }}" 
                                   class="block w-full bg-green-600 hover:bg-green-700 text-white text-center py-2 px-4 rounded-lg transition-colors duration-200 font-semibold">
                                    <i class="fas fa-hand-holding-heart mr-2"></i>Réserver ce cadeau
                                </a>
                            @endif
                            
                            <!-- Lien d'achat -->
                            <a href="{{ $gift->purchase_link }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="block w-full bg-pink-600 hover:bg-pink-700 text-white text-center py-2 px-4 rounded-lg transition-colors duration-200">
                                <i class="fas fa-shopping-cart mr-2"></i>Voir le produit
                            </a>
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
