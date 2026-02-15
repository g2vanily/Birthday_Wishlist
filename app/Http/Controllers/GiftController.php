<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controller pour la gestion des cadeaux (Admin)
 */
class GiftController extends Controller
{
    /**
     * Affiche la liste des cadeaux avec les réservations (Admin)
     */
    public function index()
    {
        $gifts = Gift::with('reservation')->latest()->paginate(12);
        return view('admin.gifts.index', compact('gifts'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('admin.gifts.create');
    }

    /**
     * Enregistre un nouveau cadeau
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:999999999',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string|max:1000',
            'purchase_link' => 'required|url|max:500',
        ], [
            'name.required' => 'Le nom du cadeau est obligatoire',
            'price.required' => 'Le prix est obligatoire',
            'price.numeric' => 'Le prix doit être un nombre',
            'image.required' => 'L\'image est obligatoire',
            'image.image' => 'Le fichier doit être une image',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou webp',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo',
            'purchase_link.required' => 'Le lien d\'achat est obligatoire',
            'purchase_link.url' => 'Le lien d\'achat doit être une URL valide',
        ]);

        // Upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gifts', 'public');
            $validated['image'] = $imagePath;
        }

        Gift::create($validated);

        return redirect()->route('admin.gifts.index')
            ->with('success', 'Cadeau ajouté avec succès !');
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Gift $gift)
    {
        return view('admin.gifts.edit', compact('gift'));
    }

    /**
     * Met à jour un cadeau
     */
    public function update(Request $request, Gift $gift)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:999999999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string|max:1000',
            'purchase_link' => 'required|url|max:500',
        ]);

        // Upload nouvelle image si fournie
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image
            if ($gift->image) {
                Storage::disk('public')->delete($gift->image);
            }
            $imagePath = $request->file('image')->store('gifts', 'public');
            $validated['image'] = $imagePath;
        }

        $gift->update($validated);

        return redirect()->route('admin.gifts.index')
            ->with('success', 'Cadeau modifié avec succès !');
    }

    /**
     * Supprime un cadeau
     */
    public function destroy(Gift $gift)
    {
        // Supprime l'image du storage
        if ($gift->image) {
            Storage::disk('public')->delete($gift->image);
        }

        $gift->delete();

        return redirect()->route('admin.gifts.index')
            ->with('success', 'Cadeau supprimé avec succès !');
    }
}
