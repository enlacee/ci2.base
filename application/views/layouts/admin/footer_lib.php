
<script src="assets/js/jquery-2.1.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--Add JS (Layout)-->
<?php echo $this->layout->js; ?>
<!--End add JS-->
<?php if (!empty($stringJs)) : ?>
<script type="text/javascript">
	<?php echo $stringJs ?>
</script>
<?php endif; ?>