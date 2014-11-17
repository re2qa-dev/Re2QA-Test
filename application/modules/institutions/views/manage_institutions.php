<!-- Header -->
<?php echo $this->load->view('content/inc_header');?>
<!-- /Header -->
<section class="Search-main dash_board">
  <div class="container">
    <div class="row-fluid">
      <div class="span9">
        <h2 class="login"><?php echo $page_title;?></h2>
        <?php
		if(validation_errors())
			echo '<div class="alert alert-danger alert-dismissable">'.validation_errors().'</div>';
		else if(isset($error) && $error!='')
			echo '<div class="alert alert-danger alert-dismissable">'.$error.'</div>';
		else if($this->session->flashdata('success_msg'))
			echo '<div class="alert alert-success alert-dismissable">'.$this->session->flashdata('success_msg').'</div>';?>
        <form 	 class="login" method="post" action="<?php echo base_url().'institutions/manage_institutions/'.$id;?>"	name="form1" 	id="form1" enctype="multipart/form-data">
          <input type="hidden" 	name="id" 	id="id" 	value="<?php echo $id;?>"/>
          <label class="login"> Name of institution : *	</label>
          <input class="login" 	type="text" name="institution_name" value="<?php echo $institution_name;?>" placeholder="Name of institution">
          <label class="login">	Contact Person : *		</label>
          <input class="login" 	type="text" name="contact_person"	value="<?php echo $contact_person;?>" 	placeholder="Contact Person">
          <label class="login">	Contact Person’s Title : *	</label>
          <input class="login" 	type="text" name="contact_Person_title"	value="<?php echo $contact_Person_title;?>" placeholder="Contact Person’s Title">
          <label class="login">	Address line 1: *		</label>
          <input class="login"	type="text" name="address1"			id="address1" 	value="<?php echo $address1;?>" />
          <label class="login">	Address line 2: 		</label>
          <input class="login"	type="text" name="address2"			id="address2" 	value="<?php echo $address2;?>" />
          <label class="login">	City: *					</label>
          <input class="login" 	type="text" name="city"				id="city" 		value="<?php echo $city;?>" />
          <label class="login">	State: *				</label>	
          <?php echo form_dropdown('state_id', 	$states, 			$state_id, 		'class="select"') ?>
          <label class="login">	Zip Code: *				</label>
          <input class="login"	type="text" name="zip_code"			id="zip_code" 	value="<?php echo $zip_code;?>" />
          <label class="login">	Recipient Fax: 			</label>
          <input class="login"	type="text" name="recipient_fax" 	id="recipient_fax" 	value="<?php echo $recipient_fax;?>" />
          <label class="login">	Recipient Phone:		</label>
          <input class="login"	type="text" name="recipient_phone"	id="recipient_phone" value="<?php echo $recipient_phone;?>" />
          <br/>Fields with * are required
          <div class="gap"></div>
          <div class="span5 margin-left"><input type="button" class="login-btn" 	value="Submit" onclick="document.form1.submit()"/></div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Footer --> 
<?php echo $this->load->view('content/inc_footer');?> 
<!-- /Footer -->