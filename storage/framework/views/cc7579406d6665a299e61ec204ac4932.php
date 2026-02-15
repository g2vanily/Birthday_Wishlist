

<?php $__env->startSection('title', 'Bienvenue'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center py-12">
        <!-- En-tête -->
        <div class="mb-12">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">
                <i class="fas fa-gift text-pink-600"></i>
                Bienvenue sur Birthday Wishlist
            </h1>
            <p class="text-xl text-gray-600">
                Découvrez la wishlist d'anniversaire et réservez un cadeau !
            </p>
        </div>

        <!-- Choix Visiteur / Admin -->
        <div class="grid md:grid-cols-2 gap-8 max-w-3xl mx-auto">
            <!-- Carte Visiteur -->
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                <div class="mb-6">
                    <i class="fas fa-users text-pink-600 text-6xl mb-4"></i>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Je suis Visiteur</h2>
                    <p class="text-gray-600">
                        Voir la wishlist et réserver un cadeau
                    </p>
                </div>
                <a href="<?php echo e(route('wishlist.index')); ?>" 
                   class="block w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-4 px-6 rounded-lg transition-colors duration-200 text-lg">
                    <i class="fas fa-arrow-right mr-2"></i>Voir la Wishlist
                </a>
            </div>

            <!-- Carte Admin -->
            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                <div class="mb-6">
                    <i class="fas fa-user-shield text-purple-600 text-6xl mb-4"></i>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Je suis Admin</h2>
                    <p class="text-gray-600">
                        Gérer les cadeaux et les réservations
                    </p>
                </div>
                <a href="<?php echo e(route('login')); ?>" 
                   class="block w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-4 px-6 rounded-lg transition-colors duration-200 text-lg">
                    <i class="fas fa-lock mr-2"></i>Se Connecter
                </a>
            </div>
        </div>

        <!-- Informations supplémentaires -->
        <div class="mt-12 text-gray-500">
            <p class="text-sm">
                <i class="fas fa-info-circle mr-1"></i>
                Les visiteurs peuvent réserver un cadeau avec leur pseudo. Chaque cadeau ne peut être réservé qu'une seule fois.
            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Cours L3\Wish_List\resources\views/welcome.blade.php ENDPATH**/ ?>