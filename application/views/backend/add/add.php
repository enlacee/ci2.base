<!--Body-->
<section id="#a_body">
	<article>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 frame">
          
          <div class="boxes">

            <div class="boxes_head">
              <h1>Titulo de la sección</h1>

              <!--Breadcrumbs-->
              <?php echo $this->breadcrumbs->show(); ?>
              <!--End Breadcrumbs-->

              </div><!--End boxes_head-->

            <div class="boxes_body">

              <form action="" method="POST" class="form-horizontal"id="form" role="form" enctype="multipart/form-data">

              <table id="table_id" class="table_form table table-striped table-bordered table-hover table-condensed display">
                <tbody>

                  <tr>
                    <td><span>Nombre:</span></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="names" name="names" placeholder="Ingrese su nombre">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>Email:</span></td>
                    <td>
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>País:</span></td>
                    <td>
                      <div class="form-group">
                        <select name="pais" id="pais" class="form-control">
                          <option value="">Seleccione</option>
                          <option value="Aruba">Aruba</option>
                          <option value="mexico">Mexico</option>
                          <option value="venezuela">Venezuela</option>
                        </select>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>Sexo:</span></td>
                    <td>
                      <div class="radio_input">
                        <div class="form-group">
                          Mujer&nbsp;<input type="radio" name="sexo" value="m">&nbsp;&nbsp;
                          Hombre&nbsp;<input type="radio" name="sexo" value="h">
                        </div>                        
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>Opciones:</span></td>
                    <td>
                      <div class="checkbox">
                        <div class="form-group">
                          <ul>
                            <li class="text1"><input type="checkbox" name="opciones[]" value="opcion 1">Opción 1</li>
                            <li class="text2"><input type="checkbox" name="opciones[]" value="opcion 2">Opción 2</li> 
                          </ul>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>Descripción:</span></td>
                    <td>
                      <div class="form-group">
                        <textarea name="description" id="description"  class="form-control" cols="30" rows="10"></textarea>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>Acciones</span></td>
                    <td>
                      <button type="submit" class="btn btn-primary">Enviar</button>&nbsp;
                      <a href="javascript:history.back();" class="btn btn-default">Cancelar</a>
                    </td>
                  </tr>

                </tbody>
              </table>
              </form>
            </div><!--End boxesBody-->


          </div><!--End boxes-->

        </div>
      </div>
    </div>
  </article><!--End article-->  
</section>
<!--End body-->