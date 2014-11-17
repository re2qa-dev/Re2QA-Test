<?php $this->load->view('content/inc_header');?>
<section class="Search-main dash_board">
  <div class="container">
    <div class="row-fluid">
      <div class="span9">
        <h2 class="login"><?php echo $login_title ?></h2>
        <p class="login-detail"><?php echo $login_text ?></p>
        <form name="form1" id="form1" method="post" class="login"  action="<?php echo base_url();?>register/signin">
		<?php
        if(validation_errors())
	        echo '<div class="alert alert-danger alert-dismissable" style="margin-bottom: 10px;">Incorrect Username or Password.</div>';
        elseif (isset($login_error) && $login_error!='' )
	        echo '<div class="alert alert-danger alert-dismissable" style="margin-bottom: 10px;">'.$login_error .'</div>';
        elseif ($this->session->flashdata('login_errors') !='')
	        echo '<div class="alert alert-danger alert-dismissable" style="margin-bottom: 10px;">'.$this->session->flashdata('login_errors') .'</div>';
        elseif($this->session->flashdata('message'))
    	    echo '<div class="alert alert-success alert-dismissable" style="margin-bottom: 10px;">'.$this->session->flashdata('message').'</div>';
        elseif (isset($login_success) && $login_success!='' )
        	echo '<div class="alert alert-success alert-dismissable" style="margin-bottom: 10px;">'.$login_success .'</div>';
        ?>        
          <label class="login">Username</label>
          <input type="text" class="login" name="username" value="<?php echo $username_login;?>">
          <label class="login">Password</label>
          <input type="password" class="login" name="password" value="<?php echo $password_login;?>">
          <div class="span6 margin-left">
          <div class="gap"></div>
          <div class="span5 margin-left">
            <input class="login-btn" type="button" value="Login" onclick="fsubmit();" />
          </div>
        </form>
      </div>
	</div>
  </div>
</section>
<!-- Footer --> 
<?php echo $this->load->view('content/inc_footer');?> 
<!-- /Footer -->
<script type="text/javascript"> 
function fsubmit(){
 	document.form1.submit();
}
</script>
