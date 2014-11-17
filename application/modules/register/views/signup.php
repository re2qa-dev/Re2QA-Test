<?php echo $this->load->view('content/inc_header');?>
<section class="Search-main dash_board">
  <div class="container">
    <div class="row-fluid">
      <div>
        <h2 class="login">Registration</h2>
        <?php if(validation_errors())
				echo '<div class="alert alert-danger alert-dismissable">'.validation_errors().'</div>';?>
        <form class="login" name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
          <label class="login pkg_hide">	First Name: *	</label>
          <input class="login pkg_hide"		type="text" 	id="first_name" 		name="first_name" 		value="<?php echo $this->input->post('first_name');?>" />
          <label class="login pkg_hide">	Last Name: *	</label>
          <input class="login pkg_hide" 	type="text"  	id="last_name" 			name="last_name" 		value="<?php echo $this->input->post('last_name');?>" />
          <label class="login pkg_hide">	Address: *</label>
          <input class="login pkg_hide"		type="text" 	 id="address1" 			name="address1" 		value="<?php echo $this->input->post('address1');?>" />
          <label class="login">				Email: *			</label>
          <input class="login"				type="text" 	id="email" 				name="email" 			value="<?php echo $this->input->post('email');?>" />
          <label class="login">				Password: *</label>
          <input class="login"				type="password"	id="password" 			name="password"			value="<?php echo $this->input->post('');?>" />
		  <label class="login">				Confirm Password: *</label>
          <input class="login"				type="password"	id="cpassword" 			name="cpassword"		value="<?php echo $this->input->post('');?>" />
		  Fields with * are required
          <div class="span5 margin-left">
            <button class="btn btn-primary btn-lg search-btn" type="submit" onclick="document.form1.submit()">Register</button>
          </div>
        </form>
      </div>
    </div>
</section>
<!-- Footer --> 
<?php echo $this->load->view('content/inc_footer');?> 
<!-- /Footer -->

