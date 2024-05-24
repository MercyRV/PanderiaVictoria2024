

<?php $__env->startSection('content'); ?>

    
<style>
  .intermitente{
    border: 1px solid green;
    padding: 0% 0%;
    box-shadow: 0px 0px 10px;
    color: green;
    animation: infinite resplandorAnimation 2s;
  }
  @keyframes  resplandorAnimation {
    0%,100%{
      box-shadow: 0px 0px 20px;
    }
    50%{
    box-shadow: 0px 0px 0px;
    }
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-0">
                  <div class="col-sm-6 mb-0">
                      <h1>Pedidos</h1>
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
                                                                     </div>
                              </div>
                              <table id="example2" class="table table-bordered table-sm table-hover table-striped ">
                                  <thead>
                                      <tr>
                                        <th width="5%"> id </th>
                                        <th>fecha</th>
                                        <th>montototal</th>
                                        <th>Estado</th>
                                        <th>Cliente</th>
                                        <th>Telefono</th>
                                        <th width="7%">Acción</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                          <td><?php echo e($pedido->id); ?></td>
                                          <td><?php echo e($pedido->fecha); ?></td>
                                          <td><?php echo e($pedido->montototal); ?></td>
                                    
                                          <?php if($pedido->estadodelpedido == 'solicitado'): ?>
                                            <td class="text-center"><span class="badge bg-warning"><?php echo e($pedido->estadodelpedido); ?></span></td>
                                          <?php elseif($pedido->estadodelpedido == 'pendiente'): ?>
                                            <td class="text-center"><span class="badge bg-info"><?php echo e($pedido->estadodelpedido); ?></span></td>
                                            <?php elseif($pedido->estadodelpedido == 'entregado'): ?>
                                            <td class="text-center"><span class="badge bg-success"><?php echo e($pedido->estadodelpedido); ?></span></td>
                                            <?php elseif($pedido->estadodelpedido == 'cancelado'): ?>
                                            <td class="text-center"><span class="badge bg-danger"><?php echo e($pedido->estadodelpedido); ?></span></td>
                                          <?php endif; ?>
                                          <td><?php echo e($pedido->nombre.' '.$pedido->apellidos); ?></td>
                                          <td><?php echo e($pedido->telefono); ?></td>
                                          <td class="py-1 align-middle text-center">
                                            <div class="btn-group btn-group-sm">
                                              <a target="_blank" class="btn btn-info" rel="tooltip" data-placement="top" title="Ver ubicación" href="<?php echo e($pedido->url); ?>"><i class="fas fa-map-marker-alt"></i></a>
                                              
                                             <?php if($pedido->id_repartidor): ?>
                                                <button onclick="obtenerIdpedido(<?php echo e($pedido->id); ?>)" class="btn btn-success" rel="tooltip" data-placement="top" title="Repartidor seleccionado" data-toggle="modal" data-target="#modal-repartidor"></span><i class="fas fa-user-check"></i></button>
                                             <?php else: ?>
                                                 <?php if($pedido->estadodelpedido == 'cancelado'): ?>
                                                 <button class="btn btn-default" rel="tooltip" data-placement="top" title="No habilitado" disabled><i class="fas fa-user-slash"></i></button>
                                                <?php else: ?>
                                                <button onclick="obtenerIdpedido(<?php echo e($pedido->id); ?>)" class="btn btn-default intermitente" rel="tooltip" data-placement="top" title="Seleccionar repartidor" data-toggle="modal" data-target="#modal-repartidor"><i class="fas fa-user-plus "></i></button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                              
                                            </div>
                                          </td>
                                      </tr>
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
  <div class="modal fade" id="modal-repartidor"  tabindex="-1"aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body py-2">
            <form method="POST" action="<?php echo e(route('pedido.update')); ?>" autocomplete="off" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <input type="hidden" id="id_pedido" name="id_pedido">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Repartidor:</label>
                    <select class="form-control form-control-sm"  id="id_repartidor" name="id_repartidor"  required>
                    <option selected disabled value="">Seleccionar repartidor</option>
                        <?php $__currentLoopData = $repartidores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repartidor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($repartidor->id); ?>"><?php echo e($repartidor->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback">Seleccione un repartidor.</div>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="form-group mb-2">
                        <button type="button" class="btn btn-default btn-sm mr-1" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-sm" >Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    <!-- /.modal -->

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
<script>
    function obtenerIdpedido(id_pedido) {
        $("#id_pedido").val(id_pedido);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/administracion/pedidos/index.blade.php ENDPATH**/ ?>