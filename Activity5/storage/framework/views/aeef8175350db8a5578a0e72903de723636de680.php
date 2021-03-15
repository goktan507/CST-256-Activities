<?php $__env->startSection('title', 'Login Page'); ?>
<?php $__env->startSection('content'); ?>
<body>
	<div>
		<form action="doLogin" method="post">
			<?php echo e(csrf_field()); ?>

			<div class=demo-table>
				<div class="form-head">Login</div>
    				<div class="form-column">
    					<div>
    						<label for="username">Username</label><span id="user_info" class="error-info"></span>
    					</div>
    					<div>
    						<input name="user_name" id="user_name" type="text" class="demo-input-box">
    					</div>
    				</div>
    				<div class="form-column">
    					<div>
    						<label for="password">Password</label><span id="password_info" class="error-info"></span>
    					</div>
    					<div>
    						<input name="password" id="password" type="text" class="demo-input-box">
    					</div>
    				</div>
				<div>
					<input type="submit" class="btnLogin">
				</div>
			</div>
		</form>
	</div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\Activity5\resources\views/login2.blade.php ENDPATH**/ ?>