<!-- Header -->
<?php echo $this->load->view('content/inc_header');?>
<!-- /Header -->
<section class="Search-main dash_board">
  <div class="container">
    <div class="row-fluid">
      <div>
        <h2 class="login"><?php echo $title;?></h2>
          <?php
		  	if($result->num_rows()>0){
				$record	= $result->row();?>
                <table class="table table-bordered table-striped table-hover table-condensed tabel-custome">
                  <tbody>
                    <tr><td><strong>Name of institution	  <strong></td><td><?php echo $record->institution_name;	?></td></tr>
                    <tr><td><strong>Contact Person		  <strong></td><td><?php echo $record->contact_person;		?></td></tr>
                    <tr><td><strong>Contact Person’s Title<strong></td><td><?php echo $record->contact_Person_title;?></td></tr>
                    <tr><td><strong>City				  <strong></td><td><?php echo $record->city;				?></td></tr>
                    <tr><td><strong>State				  <strong></td><td><?php echo $record->state_id;			?></td></tr>
                    <tr><td><strong>Address line 1		  <strong></td><td><?php echo $record->address1; 			?></td></tr>
                    <tr><td><strong>Address line 2		  <strong></td><td>
                    <?php 
					if($record->address2!='')
                        echo $record->address2; 
                    else
                        echo 'N/A';
                    ?>
                    </td></tr>
                    <tr><td><strong>Zip Code			  <strong></td><td><?php echo $record->zip_code; ?></td></tr>
                    <tr><td><strong>Recipient Fax		  <strong></td><td>
					<?php 
                    if($record->recipient_fax!='')
                        echo $record->recipient_fax; 
                    else
                        echo 'N/A';
                    ?>
                    </td></tr>
                    <tr><td><strong>Recipient phone		  <strong></td><td>
					<?php
					if($record->recipient_phone!='')
                    	echo $record->recipient_phone; 
					else
						echo 'N/A';
					?>
                    </td></tr>
                  </tbody>
                </table>
          <?php }else{
			  		echo 'Sorry! no record found.';
				}?>
        <div class="gap"></div>
        <a href="<?php echo base_url();?>institutions" class="btn btn-primary btn-lg search-btn-medium" style="margin-left:0px">Back</a>
      </div>
    </div>
  </div>
</section>
<!-- Footer --> 
<?php echo $this->load->view('content/inc_footer');?> 
<!-- /Footer -->
