

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
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Delivery</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
        
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
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
                                         
                                            <a target="_blank" class="btn btn-info" rel="tooltip" data-placement="top" title="Ver ubicación" href="<?php echo e($pedido->url); ?>"><i class="fas fa-map-marked-alt"></i></a>
                                            
                                            <?php if($pedido->estadodelpedido == 'pendiente'): ?>
                                             <button class="btn btn-default intermitente" rel="tooltip" data-placement="top" title="¿Pedido entregado?" onclick="obtenerIdpedido(<?php echo e($pedido->id); ?>)" data-toggle="modal" data-target="#modal-repartidor"><i class="fas fa-question"></i></button>
                                            <?php elseif($pedido->estadodelpedido == 'cancelado'): ?>
                                              <button class="btn btn-danger" rel="tooltip" data-placement="top" title="No Entregado"><i class="far fa-calendar-times"></i></button>
                                            <?php elseif($pedido->estadodelpedido == 'entregado'): ?>
                                              <button class="btn btn-success" rel="tooltip" data-placement="top" title="Entregado"><i class="fas fa-clipboard-check"></i></button>
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

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>

    </div>
  </aside>
  <!-- /.control-sidebar -->


    <!-- Modal -->
    <div class="modal fade" id="modal-repartidor"  tabindex="-1"aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
  
          <div class="modal-body py-3">
              <form method="POST" action="<?php echo e(route('pedido.estado')); ?>" autocomplete="off" >
                <?php echo method_field('PUT'); ?>  
                <?php echo csrf_field(); ?>
                  <input type="hidden" id="id_pedido" name="id_pedido" class="mb-0">
                  <div class="form-group  mb-4">
                      <label for="recipient-name" class="col-form-label">Estado:</label>
                      <select class="form-control form-control-sm"  id="estado" name="estado"  required>
                      <option selected disabled value="">Seleccionar estado</option>
                          <option value="entregado">Entregado</option>
                          <option value="cancelado">Cancelado</option>
                      </select>
                      <div class="invalid-feedback">Seleccione un repartidor.</div>
                  </div>
  
                  <div class="d-flex justify-content-end ">
                      <div class="form-group mb-1">
                          <button type="button" class="btn btn-default btn-sm " data-dismiss="modal">Cancelar</button>
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

  <script  type="text/javascript">
    function obtenerIdpedido(id_pedido) {
        $("#id_pedido").val(id_pedido);
    }
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.basehome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/administracion/repartidores/pedidos-solicitados.blade.php ENDPATH**/ ?>