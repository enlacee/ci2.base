</head>

<body>


<!-- container -->
<div class="container">
  <div class="row">
    <div class="col-xs-12">

      <!-- navbar -->
      <nav class="navbar navbar-default" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button> <a class="navbar-brand" href="#">File upload</a>
        </div><!--/ navbar-header -->


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

            <!-- Jquery_file_upload -->
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jquery file upload<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo base_url('plugin_jquery_file_upload/index'); ?>">Register</a>
                </li>
                <li>
                  <a href="<?php echo base_url('plugin_jquery_file_upload/update'); ?>">Update</a>
                </li>
              </ul>
            </li>
            <!--/ Jquery_file_upload -->

            <!-- Uploadifive -->
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Upload I Five<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo base_url(); ?>plugin_uploadifive/index">Register</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>plugin_uploadifive/update">Update</a>
                </li>
              </ul>
            </li>
            <!--/ Uploadifive -->

            <!-- Dropzonejs -->
            <!--<li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropzone JS<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo base_url(); ?>frontend/dropzonejs">Register</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>frontend/dropzonejs/update">Update</a>
                </li>
              </ul>
            </li>-->
            <!--/ Dropzonejs -->

          </ul>

        </div><!--/ navbar-header -->

      </nav><!--/ navbar -->

    </div><!--/ col-xs-12 -->
  </div><!--/ row -->
</div>
<!--/ container -->
