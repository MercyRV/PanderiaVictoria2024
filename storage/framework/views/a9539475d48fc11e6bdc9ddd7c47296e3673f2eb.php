

<?php $__env->startSection('content'); ?>

    
<style>
  .disabled {
    cursor: not-allowed;
    pointer-events: none;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-0">
                  <div class="col-sm-6 mb-0">
                      <h1>Panes</h1>
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
                                      <a class="btn btn-info btn-sm" href="<?php echo e(asset('producto/create')); ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar</a>
                                      <a class="btn btn-danger btn-sm" href="<?php echo e(asset('producto/eliminados')); ?>"><i class="far fa-trash-alt"></i>&nbsp;Eliminados</a>
                                  </div>
                              </div>
                              <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                        <th width="8%">Imagen</th>
                                        <th width="5%"> id </th>
                                        <th> nombre </th>
                                        <th> descripcion </th>
                                        <th> precio </th>
                                        <th> stock </th>
                                        <th width="7%">Acción</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                          <?php
                                             $imagen = "img/productos/".$producto->id.".jpg";
                                            if (!file_exists($imagen)) {
                                                $imagen = "img/productos/150x150.png";
                                            }
                                          ?>

                                          <td class="text-center"><img width="50"height="30"src="<?php echo e(asset($imagen.'?'.time())); ?>"/></td>
                                          <td><?php echo e($producto->id); ?></td>
                                          <td><?php echo e($producto->nombre); ?></td>
                                          <td><?php echo e($producto->descripcion); ?></td>
                                          <td><?php echo e($producto->precio); ?></td>
                                          <td><?php echo e($producto->stock); ?></td>
                                          <td class="py-1 align-middle text-center">
                                            <div class="btn-group btn-group-sm">
                                              
                                              <a class="btn btn-warning" rel="tooltip" data-placement="top" title="Editar" href="<?php echo e(url('producto/edit/'.$producto->id)); ?>"><i class="fas fa-pencil-alt"></i></a>
                                              <a href="#" class="btn btn-danger" rel="tooltip" data-placement="top" title="Eliminar" data-href="<?php echo e(url('producto/destroy/'.$producto->id)); ?>" data-toggle="modal" data-target="#modal-confirma"><i class="fas fa-trash"></i></a>
                                            </div>
                                          </td>
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

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/productos/index.blade.php ENDPATH**/ ?>