<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div align="center">
        <?php echo $__env->yieldContent('content'); ?>
	</div>
</body>
</html>
<?php /**PATH C:\MAMP\htdocs\Activity5\resources\views/layouts/appmaster.blade.php ENDPATH**/ ?>