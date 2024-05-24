

<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Panes Disponibles </h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
        

            <div class="row row-cols-1 row-cols-sm-2  row-cols-md-3 row-cols-lg-4  g-3">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                       $imagen = "img/productos/".$row->id.".jpg";
                      if (!file_exists($imagen)) {$imagen = "img/productos/150x150.png";}
                    ?>
                    <div class="col">
                        <div class="card shadow-lg card-danger">
                          <div class="card-header">
                            <h5><?php echo e($row->nombre); ?></h5>
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
                                      
                                      <button class="btn btn-sm btn-danger" type="button" onclick="addproducto(<?php echo e($row->id); ?>)" name="btn" onclick="#" >Agregar al carrito</button>
                                      
                                      
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
                    $("#ContadorCart").html(resultado.datos);
                    if (resultado.datos) {
                      toastr.success('Producto añadido correctamente','Añadido')
                    }
                }
            }
        });
    }

  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.basehome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/welcome.blade.php ENDPATH**/ ?>