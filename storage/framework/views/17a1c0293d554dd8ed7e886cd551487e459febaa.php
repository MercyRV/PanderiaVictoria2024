

<?php ( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') ); ?>
<?php ( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') ); ?>

<?php if(config('adminlte.use_route_url', false)): ?>
    <?php ( $login_url = $login_url ? route($login_url) : '' ); ?>
    <?php ( $register_url = $register_url ? route($register_url) : '' ); ?>
<?php else: ?>
    <?php ( $login_url = $login_url ? url($login_url) : '' ); ?>
    <?php ( $register_url = $register_url ? url($register_url) : '' ); ?>
<?php endif; ?>

<?php $__env->startSection('auth_header','Registrar Cliente'); ?>)

<?php $__env->startSection('auth_body'); ?>
    <form action="<?php echo e($register_url); ?>" method="post" autocomplete="off" class="needs-validation" novalidate>
        <?php echo csrf_field(); ?>

        
        <div class="input-group mb-3">
            <input type="text" id="name" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('name')); ?>" placeholder="ingrese su nombre" pattern=".*\S+.*" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user classes_auth_icon"></span>
                </div>
            </div>
            <div class="invalid-feedback">Introduzca nombre</div>
        </div>
        
        <div class="input-group mb-3">
            <input type="text" name="apellidos" class="form-control <?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('apellidos')); ?>" placeholder="ingrese su apellido paterno y materno" pattern=".*\S+.*" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-address-card classes_auth_icon"></span>
                </div>
            </div>
            <div class="invalid-feedback">Introduzca su apellido paterno y materno</div>
        </div>
        
        <div class="input-group mb-3">
            <input type="number" name="edad" class="form-control <?php $__errorArgs = ['edad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('edad')); ?>" placeholder="ingrese su edad" pattern=".*\S+.*" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="far fa-address-card classes_auth_icon "></span>
                </div>
            </div>
            <div class="invalid-feedback">Introduzca su edad</div>

        </div>
         
         <div class="input-group mb-3">
            <input type="number" name="telefono" class="form-control <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('telefono')); ?>" placeholder="ingrese su nro de telefono" pattern=".*\S+.*" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-mobile classes_auth_icon"></span>
                </div>
            </div>
            <div class="invalid-feedback">Introduzca su nro de telefono</div>

        </div>

        
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('email')); ?>" placeholder="cuenta de usuario" pattern=".*\S+.*" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope classes_auth_icon"></span>
                </div>
            </div>
            <div class="invalid-feedback">Introduzca cuenta de usuario</div>

        </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder=" ingrese su contraseña" pattern=".*\S+.*" autofocus required>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock classes_auth_icon"></span>
                </div>
            </div>
            <div class="invalid-feedback">password corregir</div>

        </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="verificar su contraseña" pattern=".*\S+.*" autofocus required >
           
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock classes_auth_icon"></span>
                </div>
            </div>
            <div class="invalid-feedback">password diferente</div>

        </div>

        
        <button type="submit" class="btn btn-block classes_auth_btn btn-flat btn-success">
            <span class="fas fa-user-plus"></span>
            Registrame
        </button>

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('auth_footer'); ?>
    <p class="my-0">
        <a href="<?php echo e($login_url); ?>">
            Login 
        </a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::auth.auth-page', ['auth_type' => 'register'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/vendor/adminlte/auth/register.blade.php ENDPATH**/ ?>