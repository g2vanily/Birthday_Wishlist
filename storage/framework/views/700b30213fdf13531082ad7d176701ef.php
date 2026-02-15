

<?php $__env->startSection('title', 'Réserver un Cadeau'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-md p-8">
        <!-- En-tête -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                <i class="fas fa-gift text-pink-600"></i> Réserver ce Cadeau
            </h2>
            <p class="text-gray-600">Entrez votre pseudo pour réserver ce cadeau</p>
        </div>

        <!-- Aperçu du cadeau -->
        <div class="bg-gray-50 rounded-lg p-6 mb-8">
            <div class="flex items-center space-x-4">
                <img src="<?php echo e($gift->image_url); ?>" 
                     alt="<?php echo e($gift->name); ?>" 
                     class="w-24 h-24 object-cover rounded-lg">
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-900"><?php echo e($gift->name); ?></h3>
                    <p class="text-2xl font-bold text-pink-600 mt-1"><?php echo e($gift->formatted_price); ?></p>
                </div>
            </div>
        </div>

        <!-- Formulaire de réservation -->
        <form method="POST" action="<?php echo e(route('reservations.store', $gift)); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-6">
                <label for="visitor_name" class="block text-gray-700 font-semibold mb-2">
                    Votre Pseudo <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="visitor_name" 
                       name="visitor_name" 
                       value="<?php echo e(old('visitor_name')); ?>"
                       placeholder="Ex: Marie, Jean, Alex..."
                       required
                       autofocus
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-600 focus:border-transparent <?php $__errorArgs = ['visitor_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['visitor_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <p class="text-gray-500 text-sm mt-2">
                    <i class="fas fa-info-circle mr-1"></i>
                    Ce pseudo sera visible par l'administrateur
                </p>
            </div>

            <!-- Avertissement -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <p class="text-yellow-800 text-sm">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <strong>Attention :</strong> Une fois réservé, ce cadeau ne sera plus disponible pour les autres visiteurs.
                </p>
            </div>

            <!-- Boutons -->
            <div class="flex space-x-4">
                <button type="submit" 
                        class="flex-1 bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                    <i class="fas fa-check mr-2"></i>Confirmer la Réservation
                </button>
                <a href="<?php echo e(route('wishlist.index')); ?>" 
                   class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg text-center transition-colors duration-200">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Cours L3\Wish_List\resources\views/reservations/create.blade.php ENDPATH**/ ?>