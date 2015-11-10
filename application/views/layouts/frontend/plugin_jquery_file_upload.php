<?php $this->load->view("layouts/frontend/plugin/head_top.php"); ?>

<!-- Add styles file upload -->
<link href="<?php echo base_url(); ?>assets/css/stylee.css" type="text/css" rel="stylesheet">
<!--/ Add styles file upload -->

<?php $this->load->view("layouts/frontend/plugin/head_bottom.php"); ?>

<!--Body-->
<?php echo $content_for_layout; ?>
<!--/ Body-->

<?php $this->load->view("layouts/frontend/plugin/footer.php"); ?>

<?php $this->load->view("layouts/frontend/plugin/footer_lib.php"); ?>

<?php $this->load->view("layouts/frontend/plugin/closed_footer.php"); ?>
