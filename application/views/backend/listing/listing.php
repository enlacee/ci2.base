<!--Body-->
<section id="#a_body">
  <article>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 frame">
          
          <div class="boxes">

            <div class="boxes_head">
              <h1>Titulo de la sección 
                <span class="btn_right">
                  <a href="add.php" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Agregar nuevo registro</a>
                </span>
              </h1>

              <!--Breadcrumbs-->
              <?php echo $this->breadcrumbs->show(); ?>
              <!--End Breadcrumbs-->
              
              </div><!--End boxes_head-->

            <div class="boxes_body">
              <table id="table_id" class="table table-striped table-bordered table-hover table-condensed display">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=0; $i<=50; $i++): ?>
                  <tr>                  
                    <td>1</td>
                    <td>Nombres</td>
                    <td>email@email.com</td>
                    <td>27/05/2015</td>
                    <td>
                      <a href="edit.php" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i>&nbsp;Editar</a>&nbsp;
                      <a href="javascript:void()" class="eliminar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;Eliminar</a>&nbsp;
                      
                    </td>
                  </tr>
                  <?php endfor; ?>

                </tbody>
              </table>
            </div><!--End boxesBody-->


          </div><!--End boxes-->

        </div>
      </div>
    </div>
  </article><!--End article-->  
</section>
<!--End body-->