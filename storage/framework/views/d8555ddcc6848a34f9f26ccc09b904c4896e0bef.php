

<?php $__env->startSection('content'); ?>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6 mb-0">
            <h1>Crear producto</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="POST" enctype="multipart/form-data" action="<?php echo e(asset('/producto/store')); ?>" autocomplete="off" class="needs-validation" novalidate>
              <?php echo method_field('POST'); ?>
              <?php echo csrf_field(); ?>
                <div class="card card-secondary card-outline">
                    <div class="card-body">
                     <!-- alert -->
                      <?php if($errors->any()): ?>
                      <div class="row ">
                        <div class="col-md-6 offset-md-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><?php echo e($error); ?></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                      </div>
                      <?php endif; ?>

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label for="nombre">Nombre</label> 
                                <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo e(old('nombre')); ?>"placeholder="ingrese su nombre " pattern=".*\S+.*" autofocus required />
                                <div class="invalid-feedback">Introduzca el nombre.</div>
                                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"> <?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label for="descripcion">Descripción</label> 
                                <input class="form-control" id="descripcion" name="descripcion" type="text" pattern=".*\S+.*" placeholder="ingrese una descripcion "value="<?php echo e(old('descripcion')); ?>" required />
                                <div class="invalid-feedback">Por favor, coloque una descripción.</div>
                                <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"> <?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="id_categoria">Categoría</label>
                                  <select class="form-control"  id="id_categoria" name="id_categoria"  required>
                                  <option selected disabled value="">Seleccionar categoría</option>
                                      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                  <div class="invalid-feedback">Seleccione una categoría.</div>
                                  <?php $__errorArgs = ['id_categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <small class="text-danger"> <?php echo e($message); ?></small>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="precio">Precio</label>
                              <input class="form-control" id="precio" name="precio" type="text"placeholder="ingrese el precio " pattern=".*\S+.*" value="<?php echo e(old('precio')); ?>" required/>
                              <div class="invalid-feedback">Introduzca un precio.</div>
                              <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <small class="text-danger"> <?php echo e($message); ?></small>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="id_provedor">Provedor</label>
                                <select class="form-control" data-show-content="true" id="id_provedor" name="id_provedor"  required>
                                <option selected disabled value="">Seleccionar Provedor</option >
                                    <?php $__currentLoopData = $provedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($empresa->id==$provedor->id): ?>
                                              <option value="<?php echo e($provedor->id); ?>">Empresa::<?php echo e($empresa->razonsocial); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($persona->id==$provedor->id): ?>
                                              <option value="<?php echo e($provedor->id); ?>">Persona::<?php echo e($persona->nombre.' '.$persona->apellidos); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback">Seleccione un provedor.</div>
                                <?php $__errorArgs = ['id_provedor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"> <?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                      <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="customFile">Previsualizar imagen</label>
                                <div class="row col-sm-6">
                                    <img id="blah" class="img-fluid" src="<?php echo e(asset('vendor/dist/img/150x150.png')); ?>" alt="Photo" style="max-height: 160px;">
                                </div>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                            <div class="custom-file">
                                <input style="cursor: pointer;" type="file" id="img_producto" name="img_producto" class="custom-file-input" accept="image/jpeg,jpg" >
                                <div class="invalid-feedback">Seleccione una imagen porfavor.</div>
                                <?php $__errorArgs = ['img_producto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"> <?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <label class="custom-file-label align-middle" for="img_producto" data-browse="Buscar">Seleccione una foto</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-end">
                                <div class="mt-4">
                                    <button type="submit" class= "btn btn-success btn-sm">Guardar</button>
                                    <a href="<?php echo e(url('producto')); ?>" class= "btn btn-secondary btn-sm">Regresar</a>
                                </div>
                            </div>
                        </div>
                      </div>
    
                    </div><!--/body card-->

                </div><!--/CARD FIN-->
            </form>

        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
function readImage (input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    }
}
$("#img_producto").change(function () {
    readImage(this);
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/productos/create.blade.php ENDPATH**/ ?>