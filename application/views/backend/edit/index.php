<?php if(isset($data)): ?>
<section id="#a_body">
  <article>
    <div class="container">
      <pre><?php echo !empty($data['result']) ? $data['result'] : ''; ?>
      </pre>
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
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data'); ?>
            <?php echo form_open('', $attributes); ?>
              <!--<form action="" method="POST" class="form-horizontal"id="form" role="form" enctype="multipart/form-data">-->

              <table id="table_id" class="table_form table table-striped table-bordered table-hover table-condensed display">
                <tbody>

                  <tr>
                    <td><span>id:</span></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id"
                        value="<?php echo !empty($data['id']) ? $data['id'] : '' ?>" readonly>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><span>id_language:</span></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="id_language" name="id_language"
                        value="<?php echo !empty($data['id_language']) ? $data['id_language'] : '' ?>" disabled="disabled">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>title:</span></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Ingrese su nombre"
                        value="<?php echo !empty($data['title']) ? $data['title'] : '' ?>">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>title_seo:</span></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="title_seo" name="title_seo"
                        value="<?php echo !empty($data['title_seo']) ? $data['title_seo'] : '' ?>" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><span>desccription:</span></td>
                    <td>
                      <div class="form-group">
                        <textarea name="description" id="description"  class="form-control" cols="30" rows="10"><?php echo !empty($data['description']) ? $data['description'] : '' ?></textarea>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><span>description_seo:</span></td>
                    <td>
                      <div class="form-group">
                        <textarea name="description_seo" id="description_seo"  class="form-control" cols="30" rows="10"><?php echo !empty($data['description_seo']) ? $data['description_seo'] : '' ?></textarea>
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
<?php else: ?>
  registro no encontrado.
<?php endif; ?>
