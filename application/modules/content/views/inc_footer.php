
<!--Footer-->
<footer id="footer">
  <div class="container">
    <div class="row-fluid">
      <div class="span3 cp"> Copyright &copy; <?php echo date('Y');?> CMEthority. </div>
      <!--/Copyright-->
      <div class="span9 footer-nav">
        <ul class=" pull-right">
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li><a href="<?php echo base_url().$menu_url?>">About</a></li>
          <li><a href="<?php echo base_url().$link_url?>">links</a></li>
          <li><a href="<?php echo base_url();?>pricing">Sign Up</a></li>
          <li><a href="<?php echo base_url().$contatc_page_url;?>">Contact Us</a></li>
          <?php 
			if($this->session->userdata('ses_user_id') !=''){?>
              <li><a href="<?php echo base_url();?>myaccount">My Account</a></li>
              <li><a href="<?php echo base_url();?>myaccount/logout">Logout</a></li>
      <?php }else{ ?>
          	  <li><a href="<?php echo base_url();?>register/signin">Log In</a></li>
      <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
<div class="container">
  <div class="span3 pull-left footer-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/footer-logo.jpg"></a></div>
  <div class="span3 pull-right text-right footer-socials"><a href="#"><img src="<?php echo base_url();?>images/f-icon.png"></a></div>
</div>
<!--/Footer--> 
<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
  <div class="modal-header"> <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
    <h4>Login Form</h4>
  </div>
  <!--Modal Body-->
  <div class="modal-body">
    <form class="form-inline" action="index.html" method="post" id="form-login">
      <input  class="input-small" 	type="text"  	 placeholder="Email">
      <input  class="input-small" 	type="password"  placeholder="Password">
      <label  class="checkbox"><input type="checkbox">Remember me</label>
      <button class="btn btn-primary" type="submit" >Sign in</button>
    </form>
    <a href="#">Forgot your password?</a> </div>
  <!--/Modal Body--> 
</div>
<!--  /Login form --> 

<script src="<?php echo base_url();?>js/vendor/jquery-1.11.0.min.js"></script><!-- Conflicting with multipage form JS--> 
<script src="<?php echo base_url();?>js/vendor/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>js/main.js"></script> 
<!-- Required javascript files for Slider --> 
<script src="<?php echo base_url(); ?>js/jquery.ba-cond.min.js"></script> 
<script src="<?php echo base_url(); ?>js/jquery.slitslider.js"></script> 
<!-- /Required javascript files for Slider --> 

<!---------------JQuery for Date---------------------->
<link rel="stylesheet" href="<?php echo base_url()?>css/jquery-ui.css">
<script src="<?php echo base_url();?>js/jquery-ui.js"></script> 
<!---------------/JQuery for Date---------------------> 

<!------------- Table Sorter --------------------> 
<script src="<?php echo base_url()?>js/jquery.tablesorter.js"></script> 
<script src="<?php echo base_url()?>js/tables.js"></script> 
<!------------- /Table Sorter--------------------> 

<!------------ Scripts.js -----------------------------> 
<script src="<?php echo base_url()?>js/scripts.js"></script> 
<!---*******************************************-------------------------- End Limit text plugin work here only --> 
<!-- SL Slider -->
<?php if ($this->uri->segment(1)=='' || $this->uri->segment(1)=='home' ) { ?>
<script type="text/javascript"> 
$(function() {
    var Page = (function() {
        var $navArrows = $( '#nav-arrows' ),
        slitslider = $( '#slider' ).slitslider( {
            autoplay : true
        } ),
        init = function() {
            initEvents();
        },
        initEvents = function() {
            $navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });
            $navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };
        return { init : init };
    })();
   Page.init();
});
</script> 
<!-- /SL Slider -->
<?php } ?>
</body></html>