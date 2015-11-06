<!-- container -->
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      
      <!-- form -->
      <form name="form" id="form" action="<?php echo base_url(); ?>frontend/uploadifive/save" method="POST" enctype="multipart/form-data">
        <legend>Actualización de usuario, imagen y documentos al servidor.</legend>
        <p><strong>Alcance:</strong> Crear varias aplicaciones funcionales, seguras y optimas para subir ficheros al servidor usando AJAX, PHP y MySQL, utilizaremos plugins especificos que iremos integrando a este proyecto base como ejemplos, luego de desarrollarlos todos chequearemos el rendimiento y requerimientos mínimos de detalles para integrarlos en todos los proyectos que desarrollemos. </p>
        
        <!-- row -->
        <div class="row">
          
          <!-- box -->
          <div class="col-xs-12 box box_1">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Información personal del usuario</h3>
              </div>
              <div class="panel-body">
                <div class="row">

                  <div class="col-xs-6 box_input">
                    <div class="form-group">
                      <label for="names">Nombres y apellidos:</label>
                      <input type="text" class="form-control" name="names" id="names">
                    </div><!--/ input file -->
                  </div><!--/ box_input -->

                  <div class="col-xs-6 box_input">
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" name="email" id="email">
                    </div><!--/ input file -->
                  </div><!--/ box_input -->

                </div><!--/ row -->
              </div><!--/ panel-body -->
            </div><!--/ panel -->
          </div><!--/ box -->


          <!-- box -->
          <div class="col-xs-12 box box_1">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Imagen del usuario - 1 Max</h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <input type="file" class="form-control" name="image" id="image">
                </div><!--/ input file -->
              </div><!--/ panel-body -->
            </div><!--/ panel -->
          </div><!--/ box -->


          <!-- box -->
          <div class="col-xs-12 box box_2">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Documento de identidad del usuario - 2 Max</h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <input type="file" class="form-control" name="dni[]" id="dni">
                </div><!--/ input file -->
              </div><!--/ panel-body -->
            </div><!--/ panel -->
          </div><!--/ box -->


          <!-- box -->
          <div class="col-xs-12 box box_3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Otros documentos del usuario - 10 Max</h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <input type="file" class="form-control" name="documents[]" id="documents">
                </div><!--/ input file -->
              </div><!--/ panel-body -->
            </div><!--/ panel -->
          </div><!--/ box -->

        </div>
        <!--/ row -->


        <div class="row">
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </div>

      </form>
      <!--/ form -->

    </div><!--/ col-xs-12 -->
  </div><!--/ row -->
</div><!--/ container -->