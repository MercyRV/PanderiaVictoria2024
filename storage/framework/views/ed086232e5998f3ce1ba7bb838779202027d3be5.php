

<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Perfil de usuario</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Datos Personales</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo e(asset('perfil/update')); ?>/<?php echo e(Auth::user()->id); ?>" method="POST"  role="form">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($nombre); ?>" placeholder="escriba su nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo e($apellidos); ?>" placeholder="escriba su apellido" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="<?php echo e($edad); ?>" placeholder="escriba su edad" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo e($telefono); ?>" placeholder="escriba su telefono" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo e(Auth::user()->email); ?>" disabled placeholder="escriba su correo" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Rol</label>
                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo e(Auth::user()->roles[0]->name); ?>" disabled placeholder="escriba su correo" required>
                  </div>

                  <?php if($licencia!=""): ?>
                    <div class="form-group">
                        <label>Categoria de licencia</label>
                        <select disabled class="form-control"  id="nro_licencia" name="nro_licencia"  required>
                        <option  value="">Seleccionar categoria</option>
                            <option  <?php if($licencia=="Categoria A"): ?> <?php echo e('selected'); ?>  <?php endif; ?> value="Categoria A">categoria A</option>
                            <option  <?php if($licencia=="Categoria B"): ?> <?php echo e('selected'); ?>  <?php endif; ?> value="Categoria B">categoria B</option>
                            <option  <?php if($licencia=="Categoria C"): ?> <?php echo e('selected'); ?>  <?php endif; ?> value="Categoria C">categoria C</option>
                        </select>
                    </div>  
                  <?php endif; ?>

                  <?php if($direccion!=""): ?>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Direccion</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e($direccion); ?>" placeholder="escriba su direccion" required>
                    </div> 
                  <?php endif; ?>

                  <?php if($sueldo!=""): ?>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Sueldo</label>
                      <input disabled type="text" class="form-control" id="sueldo" name="sueldo" value="<?php echo e($sueldo); ?>" placeholder="escriba su sueldo" required>
                    </div> 
                  <?php endif; ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Cambiar Contraseña</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo e(asset('perfil/update/password')); ?>/<?php echo e(Auth::user()->id); ?>" method="POST" role="form">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">contraseña actual</label>
                    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nueva Contraseña</label>
                    <input type="password" class="form-control" name="nueva_contraseña" id="nueva_contraseña" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirmar Nueva Contraseña</label>
                    <input type="password" class="form-control" name="confirmar_nueva_contraseña" id="confirmar_nueva_contraseña" placeholder="" required>
                  </div>
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
                </div>
              </form>
            </div>
          </div>


        </div>
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

  <script  type="text/javascript">

  $(document).ready(function() {
    $(".btn-submit").click(function(e){
      e.preventDefault();
      let link="<?php echo e(asset('')); ?>card-add";
      var _token = $("input[name='_token']").val();
      var producto_id = $("#producto_id").val();
  
      $.ajax({
        url: link,
        type:'POST',
        data: {_token:_token, producto_id:producto_id},
        success: function(data) {
          alert('j')
          printMsg(data);
        }
      });
    }); 

    function printMsg (msg) {
      if($.isEmptyObject(msg.error)){
        console.log(msg.success);
        $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
      }else{
        $.each( msg.error, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
      }
    }
  });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.basehome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\panaderia\resources\views/perfil.blade.php ENDPATH**/ ?>