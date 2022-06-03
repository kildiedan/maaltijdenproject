<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>" />

    <?php if(app()->environment('production')): ?>
    <link rel="manifest" href="/app.manifest">
    <?php
    $manifest = json_decode(file_get_contents(public_path('js/manifest.json')), true);
    ?>
    <?php $__currentLoopData = $manifest['resources/js/app.js']['imports']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $importName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link rel="modulepreload" href="/js/<?php echo e($manifest[$importName]['file']); ?>" as="script">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $manifest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $export): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($export['css'])): ?>
    <?php $__currentLoopData = $export['css']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link rel="stylesheet" href="/js/<?php echo e($url); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <title><?php echo e(env('APP_NAME')); ?></title>
</head>

<body>
    <div id="app"></div>

    <?php if(app()->environment('production')): ?>
    <script type="module" src="/js/<?php echo e($manifest['resources/js/app.js']['file']); ?>"></script>
    <?php else: ?>
    <script type="module" src="http://localhost:3000/@vite/client"></script>
    <script type="module" src="http://localhost:3000/resources/js/app.js"></script>
    <?php endif; ?>
</body>

</html><?php /**PATH C:\Users\kildi\OneDrive\Documenten\GitHub\maaltijdenproject\resources\views/welcome.blade.php ENDPATH**/ ?>