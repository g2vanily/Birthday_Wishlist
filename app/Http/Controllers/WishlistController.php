<?php

namespace App\Http\Controllers;

use App\Models\Gift;

/**
 * Controller pour la page publique de la wishlist
 */
class WishlistController extends Controller
{
    /**
     * Affiche la wishlist publique avec les réservations
     */
    public function index()
    {
        $gifts = Gift::with('reservation')->latest()->paginate(12);
        return view('landing', compact('gifts'));
    }
}
