<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<h2 class="text-4xl font-extrabold text-center text-purple-600 mb-4">
    🎁 Ma Wishlist d’anniversaire
</h2>

<p class="text-center text-pink-500 mb-10">
   💕 Choisis un cadeau 💕
</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

<?php $__currentLoopData = $gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-white rounded-2xl shadow-lg p-5 transition hover:scale-105">

        <?php if($gift->image): ?>
            <img src="<?php echo e(asset('storage/'.$gift->image)); ?>"
                 class="rounded-xl mb-4 h-48 w-full object-cover">
        <?php else: ?>
            <img src="https://i.pinimg.com/736x/c2/18/a5/c218a5f012a7940ec5751aa5995419f6.jpg" alt="Cadeau par défaut"
                 class="rounded-xl mb-4 h-48 w-full object-cover">
        <?php endif; ?>

        <h3 class="text-xl font-bold text-purple-700">
            <?php echo e($gift->name); ?>

        </h3>

        <p class="text-pink-500 font-semibold mt-1">
            <?php echo e($gift->price); ?> €
        </p>

        <?php if($gift->description): ?>
            <p class="text-gray-600 text-sm mt-2">
                <?php echo e($gift->description); ?>

            </p>
        <?php endif; ?>

        <?php if($gift->is_reserved): ?>
            <p class="mt-4 text-sm text-red-500 font-semibold">
                💝 Déjà réservé par <?php echo e($gift->reserved_by); ?>

            </p>
        <?php else: ?>
            <form method="POST" action="<?php echo e(route('gifts.reserve', $gift->id)); ?>" class="mt-4">
                <?php echo csrf_field(); ?>
                <input
                    name="name"
                    placeholder="Ton prénom 💌"
                    class="w-full rounded-xl border border-pink-300 p-2 focus:ring-pink-400 focus:outline-none"
                    required
                >
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <button type="submit"
                    class="mt-3 w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-xl font-bold transition">
                    🎀 Je l’offre avec amour
                </button>
            </form>
        <?php endif; ?>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\Cours L3\Wish_List\resources\views/gifts/index.blade.php ENDPATH**/ ?>