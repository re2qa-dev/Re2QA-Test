<!-- Header -->
<?php echo $this->load->view('content/inc_header');?>
<!-- /Header -->
<section class="Search-main dash_board">
  <div class="container">
    <div class="row-fluid">
      <div <?php echo $span_class ?>>
        <h2 class="login"><?php echo $title;?></h2>
		<form name="form1" id="form1" method="post" action="" class="border-none">
          <h2 class="login"></h2>
          <?php
			if(validation_errors())
				echo '<div class="alert alert-danger alert-dismissable">'.validation_errors().'</div>';
			else if($this->session->flashdata('msg_success'))
				echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('msg_success').'</div>';?>
          <a class="btn btn-primary btn-lg search-btn-medium pull-right"	href="<?php echo base_url().'institutions/manage_institutions';?>">Add CME Recipient</a>
          <a class="btn btn-primary btn-lg search-btn-medium pull-right"	href="<?php echo base_url().'certificate/manage_certificate';?>">Add CME</a>
          <a class="btn btn-primary btn-lg search-btn-medium pull-right"	href="<?php echo base_url().'certificate';?>">Go To My CME</a>
		  <table class="table table-bordered">
            <thead>
              <tr>
                <th class="panel-hr header">Name of institution</th>
                <th class="panel-hr header">Contact Person</th>
                <tH class="panel-hr header">Contact Person’s Title </th>
				<th class="panel-hr header">Manage</th>
		     </tr>
            </thead>
            <tbody>
              <?php echo $results;?>
            </tbody>
          </table>
          <?php echo $this->pagination->create_links(); ?>
        </form> 
      </div>
    </div>
  </div>
</section>
<!-- Footer --> 
<?php echo $this->load->view('content/inc_footer');?> 
<!-- /Footer -->