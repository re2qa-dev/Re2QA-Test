<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
<?php echo $this->load->view('inc_head');?>
</head>
<body>

<!--Header-->
<header class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <div id="logo" class="pull-left"> <a href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>images/logo.png"></a> </div>
      <div class="nav-collapse collapse pull-right">
        <ul class="nav">
          <?php	
		    $upgrade='';
			if($this->session->userdata('ses_user_id') !='')
			{
					$upgrade='/pricing_upgrade';
			}
			$seo_url 		= $this->uri->segment(1);
			$seo_url_2 		= $this->uri->segment(2);
			$home_cls 		= '';
			$signin_cls 	='';
			$signup_cls 	='';
			
			$aboutus_cls 	= '';
			$myacc_cls 		= '';
			$links_cls 		= '';
			$price_cls 		= '';
			$contact_cls	= '';
			
			if($seo_url_2 =='' && $seo_url =='' )
				$home_cls = ' class="active"';
			if(trim(strtolower($seo_url)) == trim(strtolower($menu_url)) || trim(strtolower($seo_url)) == trim(strtolower($find_menu_url))){
				$aboutus_cls = ' class="active"';
			}
			if(trim(strtolower($seo_url)) == trim(strtolower($find_menu_url))){
				$aboutus_cls_find = ' class="active"';
			}
			
			if(trim(strtolower($seo_url)) == trim(strtolower($link_url))){
				$links_cls = ' class="active"';
			}
			
			if(trim(strtolower($seo_url_2)) =='signin'){
				$signin_cls = ' class="active"';
			}
			if(trim(strtolower($seo_url_2)) =='signup'){
				$signup_cls = ' class="active"';
			}
			if(trim(strtolower($seo_url)) =='myaccount' || trim(strtolower($seo_url)) =='institutions' || trim(strtolower($seo_url)) =='certificate' || trim(strtolower($seo_url)) =='forum'){
				$myacc_cls = ' class="active"';
			}
			if(trim(strtolower($seo_url)) =='pricing'){
				$price_cls = ' class="active"';
			}
			?>
          <li <?php echo $home_cls; ?>	><a href="<?php echo base_url();?>"			 > Home </a></li>
          <li <?php echo $aboutus_cls;?>><a href="<?php echo base_url().$menu_url?>" > About </a></li>
          <li <?php echo $links_cls;?>	><a href="<?php echo base_url().$link_url?>" > Links </a></li>
          <li <?php echo $price_cls;?>	><a href="<?php echo base_url();?>pricing<?php echo $upgrade ?>	" > Sign Up </a></li>
          <?php if($this->session->userdata('ses_user_id') !=''){?>
          <li <?php echo $myacc_cls;?>><a href="<?php echo base_url();?>myaccount" > My Account </a></li>
          <li><a href="<?php echo base_url();?>myaccount/logout"> Logout </a></li>
          <?php 
		  }else{
		  ?>
          <li <?php echo $signin_cls; ?>><a href="<?php echo base_url();?>register/signin">Log In </a></li>
          <li <?php echo $signup_cls; ?>><a href="<?php echo base_url();?>register/signup"> Register </a></li>
          <?php }  ?>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</header>
