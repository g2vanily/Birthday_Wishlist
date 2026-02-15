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
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-purple-800 mb-6">Tableau de bord Admin</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="p-6 bg-white rounded-lg border border-gray-100 shadow-sm">
                            <p class="text-sm text-gray-500">Total cadeaux</p>
                            <p class="text-4xl font-extrabold text-purple-800"><?php echo e($total ?? 0); ?></p>
                        </div>

                        <div class="p-6 bg-white rounded-lg border border-gray-100 shadow-sm">
                            <p class="text-sm text-gray-500">Réservés</p>
                            <p class="text-4xl font-extrabold text-red-600"><?php echo e($reserved ?? 0); ?></p>
                        </div>

                        <div class="p-6 bg-white rounded-lg border border-gray-100 shadow-sm">
                            <p class="text-sm text-gray-500">Disponibles</p>
                            <p class="text-4xl font-extrabold text-green-600"><?php echo e($available ?? 0); ?></p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="<?php echo e(route('admin.gifts.index')); ?>" class="inline-block bg-purple-700 hover:bg-purple-800 text-white font-semibold py-2 px-4 rounded-lg shadow">Gérer les cadeaux</a>
                        <a href="<?php echo e(route('home')); ?>" class="inline-block ml-3 text-gray-700 hover:text-gray-900">Voir la wishlist publique</a>
                    </div>
                </div>
            </div>
        </div>
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
<?php endif; ?>
<?php /**PATH D:\Cours L3\Wish_List\resources\views/dashboard.blade.php ENDPATH**/ ?>