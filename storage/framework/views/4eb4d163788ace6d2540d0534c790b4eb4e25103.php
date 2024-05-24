

<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark text-left">  Nota Venta </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      
        <div class="row">
            <div class="col-12">
              <div class="card card-outline card-danger">
                <div class="card-header">
                    <h5 class="text-center"> Lista de venta</h5>
                </div>

                    <div class="card-body">
                        
                        <?php if(count(Cart::getContent())): ?>
                        <div class="d-flex justify-content-end">
                            <div class="form-group">
                                <form action="<?php echo e(route('cart.clear')); ?>"method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger btn-sm" type ="submit" title="Eliminar"><i class="far fa-trash-alt"></i>&nbsp;Limpiar</button>
                                </form>
                                </div>
                        </div>
                        <?php endif; ?>
                        
                      <div class="table-responsive">
                        <table id="tabla-lista" class="table table-bordered table-sm table-hover mb-0">
                            <thead class="text-center">
                                <tr>
                                  <th width="5%" > Nro </th>
                                  <th> nombre </th>
                                  <th >Precio</th>
                                  <th width="15%" >Cantidad</th>
                                  <th width="12%">Subtotal</th>
                                  <th width="1%"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                              <?php
                                  $c=1;
                              ?>
                               <?php $__empty_1 = true; $__currentLoopData = Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($c++); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e(number_format($item->price,2)); ?></td>
                                    
                                    <td>
                                        <form id="form-update" action="<?php echo e(route('cart.update')); ?>" method="POST">
                                          <?php echo csrf_field(); ?>
                                            <div class="input-group input-group-sm mb-0">
                                         
                                              <input type="hidden" value="<?php echo e($item->id); ?>" id="id" name="id">
                                              <input type="number"class="form-control"style="width:25px;" id="quantity" name="quantity" title="cantidad"value="<?php echo e($item->quantity); ?>" min="1" pattern="^[1-9]+">
                                              <span class="input-group-append">
                                                  <button type="submit"class="btn btn-success btn-flat" title="Lista de producto" data-toggle="modal" data-target="#lista"><i class="fa fa-edit"></i></button>
                                              </span>
                                          </div> 
                                      </form>
                                    </td>
                                 
                                    <td><?php echo e($item->getPriceSum()); ?></td>
                                    <td class="py-1 align-middle text-center">
                                      <form id="form-del" action="<?php echo e(route('cart.removeitem')); ?>"method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                        <button class="btn btn-danger btn-sm" type ="submit" title="Eliminar"><i class="fas fa-trash"></i></button>
                                      </form>
                                    </td>
                                </tr>
                               
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Lista Vacia</td>
                                </tr>
                              <?php endif; ?>
                             
                            </tbody>
                            
                        </table>
                      </div>
                      <?php if(count(Cart::getContent())): ?>
                      <br>
                      <div class="row mb-0">
                        <div class="col">
                          <div class="d-flex justify-content-left">
                            <div class="form-group mb-0">
                              <div class="card mb-0">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Cantidad Total: </b><?php echo e(Cart::getTotalQuantity()); ?></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="d-flex justify-content-end">
                            <div class="form-group  mb-0">
                              <div class="card shadow-ms mb-0">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Monto Total: </b><?php echo e(number_format(Cart::getTotal(),2)); ?> Bs.</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div><!-- /.row -->
                      <div class="row">
                        <div class="col">
                            <div class="text-center">
                                <button class="btn btn-success btn-flat" type="button" id="completa_pedido" onclick="guardarpedido()">Completar Venta</button>

                            </div>
                        </div>
                        </div>
                      <?php endif; ?>

                    </div>
                    <!-- /.card-body -->
              </div>
            </div>
        </div>
            <div class="container">
            <div class="row row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg-4  g-3">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                       $imagen = "img/productos/".$row->id.".jpg";
                      if (!file_exists($imagen)) {$imagen = "img/productos/150x150.png";}
                    ?>
                    <div class="col">
                        <div class="card card-outline card-danger">
                          <div class="card-header">
                            <h3 class="card-title"><?php echo e($row->nombre); ?></h3>
                          </div>
                            <img src="<?php echo e(asset($imagen.'?'.time())); ?>" alt="imagen producto">
                            <div class="card-body">
                                <p class="card-text  mb-0"><?php echo e($row->precio); ?> Bs </p>
                                <p class="card-text mb-2 text-right">Stock:<?php echo e($row->totalstock); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                      
                                  </div>
                                    <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" id="producto_id"name="producto_id" value="<?php echo e($row->id); ?>">
                                      
                                      <button class="btn btn-sm btn-danger" type="button" onclick="addproducto(<?php echo e($row->id); ?>)" name="btn" onclick="#" >Agregar Producto</button>
                                      
                                      
                                    </form>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <!-- /.row -->
            </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script  type="text/javascript">

    //ESTA FUNICION ES PARA ELIMINAR UNA REGISTRO DE LA TABLA TEMPORAL
    function addproducto(id_producto) {
        var url='<?php echo e(url('')); ?>/carrito-agregar/'+ id_producto;
        $.ajax({
            url: url,
            method:"GET",
            success: function(resultado){
                if (resultado == 0) {
                }
                else{
                    var resultado= JSON.parse(resultado);
                    // alert(resultado.datos);
                   // $("#ContadorCart").html(resultado.datos);
                    if (resultado.datos) {
                      location.reload();
                      toastr.success('Producto añadido correctamente','Añadido');
                    }
                }
            }
        });
    }



    function guardarpedido() { 


        let url = '<?php echo e(url('')); ?>/venta/store';

        Swal.fire({
            title: '¿Desea Concluir la Venta?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '!Si!',

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                url: url,
                method: "POST",
                data: {
                    "_token"          :"<?php echo e(csrf_token()); ?>",
                },
                success: function(resultado){
                    if (!resultado) {
                        alert('error');
                    }
                    else{
                        var resultado= JSON.parse(resultado);
                        if(resultado.error){
                            mostrarerror('error','Error de stock vuelva a intentar más tarde') 
                        }else{
                       // $('#completa_pedido').prop('disabled', true);
                        mostrarerror('success','Datos registrados correctamente');
                        setTimeout(redirigir, '3000');
                        }
                    }
                },
                
            });
            }else{

            }
        });


    }

    function redirigir(){
      window.location.href ='<?php echo e(url('')); ?>/venta';
    }
    function mostrarerror(icono,error){
     Toast.fire({icon: icono,title: error});
    }

  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/administracion/ventas/nota_venta.blade.php ENDPATH**/ ?>