

<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Pedidos realizados</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
        
            <div class="row row-cols-1 row-cols-md-2  row-cols-lg-3 g-2">
                <?php $c=1; ?>
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <div class="col">
                        <div class="card shadow-md card-dark card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                      <h4 class="text-dark">
                                        <?php echo e($c++); ?>. <i class="fas fa-hard-hat"></i>
                                      </h4>
                                    </div>
                                    <div class="col-6">
                                        <h5>
                                          <small class="float-right">Fecha: <?php echo e($row->fecha); ?></small>
                                        </h5>
                                      </div>
                                </div>
                                <div class="invoice-col">
                                    <b>Orden ID:</b> <?php echo e($row->id); ?><br>
                                    <b>Nombre :</b> <?php echo e($row->nombre); ?><br>
                                    <b>Apellidos :</b> <?php echo e($row->apellidos); ?><br>
                                    <b>Correo electrónico:</b> <?php echo e(auth()->user()->email); ?><br>
                                    <b>Telefono:</b>  <?php echo e($row->telefono); ?><br>
                                    <b>Dirección:</b>  <?php echo e($row->referencia); ?><br>
                                    <b>Monto total:</b> <?php echo e($row->montototal); ?> Bs<br>
                                    <?php
                                      $separar = (explode(" ",$row->created_at));
                                      $fecha = $separar[0];
                                      $hora = $separar[1];
                                    ?>
                                    <b>Hora:</b>  <?php echo e($hora); ?><br>

                                    <b>Estado del pedido:</b>
                                  <?php if(($row->id_empleado == NULL && $row->id_repartidor == NULL)&&$row->estadodelpedido == 'solicitado'): ?>
                                   <span class="badge badge-warning text"><?php echo e($row->estadodelpedido); ?></span>
                                    <?php elseif($row->estadodelpedido == 'pendiente'): ?>
                                    <span class="text-info"><?php echo e($row->estadodelpedido); ?></span>
                                    <?php elseif($row->estadodelpedido == 'entregado'): ?>
                                    <span class="text-success"><?php echo e($row->estadodelpedido); ?></span>
                                    <?php elseif($row->estadodelpedido == 'cancelado'): ?>
                                    <span class="text-danger"><?php echo e($row->estadodelpedido); ?></span>
                                  <?php endif; ?>
                                    <br>
                                  </div>
                                  <br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                      <?php if(($row->id_empleado == NULL && $row->id_repartidor == NULL)&&$row->estadodelpedido == 'solicitado' ): ?>
                                        <button class="btn btn-sm btn-danger" rel="tooltip" data-placement="top" title="¿Pedido entregado?" onclick="obtenerIdpedido(<?php echo e($row->id); ?>)" data-toggle="modal" data-target="#cancelarpedido">Cancelar Pedido</button>
                                      <?php endif; ?>
                                    </div>
                                    <form action="#" method="POST">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" id="producto_id"name="producto_id" value="<?php echo e($row->id); ?>">
                                      <button class="btn btn-sm btn-dark" type="button" onclick="addproducto(<?php echo e($row->id); ?>)" name="btn" onclick="#" >Ver detalle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="cancelarpedido"  tabindex="-1"aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
  
          <div class="modal-body py-3">
              <form method="POST" action="<?php echo e(route('pedido.cancelar')); ?>" autocomplete="off" >
                <?php echo method_field('PUT'); ?>  
                <?php echo csrf_field(); ?>
                  <input type="hidden" id="id_pedido" name="id_pedido" class="mb-0">
                  <div class="form-group  mb-4">
                      <label for="recipient-name" class="col-form-label">Cancelar solicitud</label>
                      <p for="recipient-name" class="col-form-label">¿Desea Cancelar la solicitud?</p>
                  </div>
                  <div class="d-flex justify-content-end ">
                      <div class="form-group mb-1">
                          <button type="button" class="btn btn-default btn-sm mr-2 " data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-danger btn-sm" >Confirmar</button>
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
<?php echo $__env->make('layouts.basehome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/mispedidos.blade.php ENDPATH**/ ?>