

<?php $__env->startSection('content'); ?>

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-0">
                  <div class="col-sm-6 mb-0">
                      <h1>Cliente</h1>
                  </div>
                 
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">

                          <!-- /.card-header -->
                          <div class="card-body">
                              <div class="d-flex justify-content-end">
                                  <div class="form-group">
                                      
                                      <a class="btn btn-danger btn-sm" href="<?php echo e(asset('administracion/cliente/eliminados')); ?>"><i class="far fa-trash-alt"></i>&nbsp;Eliminados</a>
                                  </div>
                              </div>
                              <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                          <th> id </th>
                                          <th> nombre </th>
                                          <th> apellidos </th>
                                          <th> edad </th>
                                          <th> telefono </th>
                                          <th> login </th>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto.producto')): ?>
                                              <th width="7px">Acción</th>
                                          <?php else: ?>
                                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto', true)): ?>
                                                  <th width="7px">Acción</th>
                                              <?php endif; ?>
                                          <?php endif; ?>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td><?php echo e($c['id']); ?></td>
                                              <td><?php echo e($c['nombre']); ?></td>
                                              <td><?php echo e($c['apellidos']); ?></td>
                                              <td><?php echo e($c['edad']); ?></td>
                                              <td><?php echo e($c['telefono']); ?></td>
                                              <?php ($id_user=$c['id_usuario']); ?>
                                              <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($id_user == $u['id']): ?>
                                                <td><?php echo e($u['email']); ?></td>  
                                                <?php endif; ?>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto.producto')): ?>
                                              <td class="py-1 align-middle text-center">
                                                <div class="btn-group btn-group-sm">
                                                  
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto', true)): ?>
                                                      <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="<?php echo e(asset('administracion/cliente/destroy')); ?>/<?php echo e($c['id']); ?>" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                              </td>
                                              <?php else: ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto', true)): ?>
                                                  <td class="py-1 align-middle text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="<?php echo e(asset('administracion/cliente/destroy')); ?>/<?php echo e($c['id']); ?>" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                  </td>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                          </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->

                      </div>
                      <!-- /.card -->

                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="modal-confirma" data-backdrop="static">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Desea Eliminar este registro?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger btn-ok btn-sm">Confirmar</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    <!-- /.modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/administracion/clientes/index.blade.php ENDPATH**/ ?>