<?php $this->load->view("layouts/backend/base/head_top.php"); ?>

<?php $this->load->view("layouts/backend/base/head_bottom.php"); ?>

<!--Body-->
<?php echo $content_for_layout; ?>
<!--End body-->

<?php $this->load->view("layouts/backend/base/footer.php"); ?>

<?php $this->load->view("layouts/backend/base/footer_lib.php"); ?>


<!--Ventana modal para eliminar registros-->
<div class="modal fade" id="eliminar_registros_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">¡Eliminar registro!</h4>
      </div>
      <div class="modal-body">
        <p>¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?</p>
        <p><strong>Nota:</strong> Este registro se eliminará permanentemente de la base de datos.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Confirmar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(function () {
  /**
   * Eliminar registros
   */
  $('.eliminar').on('click', this, function(){
    $('#eliminar_registros_modal').modal({
      keyboard: false
    })
  });
}
</script>



<script type="text/javascript">

$(function () {


    /**
     * Eliminar registros
     */
    $('.eliminar').on('click', this, function(){
      $('#eliminar_registros_modal').modal({
        keyboard: false
      })
    });
      

    
    /**
     * Start table data
     * Add styles & custom
     */
    $('#table_id').DataTable({
      paging: true,
      scrollY: 400,
      searching: true,
      ordering:  true,

      "language": {
        "search": "Buscar:",
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No hay registros!",
        searchPlaceholder: "Ingrese palabra clave",
        "info": "Página _PAGE_ de _PAGES_",
        
          "paginate": {
            "previous": "Anterior",
            "first": "Primera página",
            "last": "Última página",
            "next": "Siguiente"
          }
      }
    });
} );

</script>

<?php $this->load->view("layouts/backend/base/footer_closed.php"); ?>

