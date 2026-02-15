<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Reservation;
use Illuminate\Http\Request;

/**
 * Controller pour la gestion des réservations de cadeaux par les visiteurs
 */
class ReservationController extends Controller
{
    /**
     * Affiche le formulaire de réservation
     */
    public function create(Gift $gift)
    {
        // Vérifier si le cadeau est déjà réservé
        if ($gift->isReserved()) {
            return redirect()->route('wishlist.index')
                ->with('error', 'Ce cadeau a déjà été réservé.');
        }

        return view('reservations.create', compact('gift'));
    }

    /**
     * Enregistre la réservation
     */
    public function store(Request $request, Gift $gift)
    {
        // Vérifier si le cadeau est déjà réservé
        if ($gift->isReserved()) {
            return redirect()->route('wishlist.index')
                ->with('error', 'Ce cadeau a déjà été réservé.');
        }

        $validated = $request->validate([
            'visitor_name' => 'required|string|max:255|min:2',
        ], [
            'visitor_name.required' => 'Votre pseudo est obligatoire',
            'visitor_name.min' => 'Le pseudo doit contenir au moins 2 caractères',
            'visitor_name.max' => 'Le pseudo ne doit pas dépasser 255 caractères',
        ]);

        // Créer la réservation
        Reservation::create([
            'gift_id' => $gift->id,
            'visitor_name' => $validated['visitor_name'],
        ]);

        return redirect()->route('wishlist.index')
            ->with('success', 'Merci ' . $validated['visitor_name'] . ' ! Vous avez réservé "' . $gift->name . '"');
    }

    /**
     * Annule une réservation (Admin uniquement)
     */
    public function destroy(Reservation $reservation)
    {
        $giftName = $reservation->gift->name;
        $reservation->delete();

        return redirect()->back()
            ->with('success', 'La réservation de "' . $giftName . '" a été annulée.');
    }
}
