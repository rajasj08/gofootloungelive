<?php echo $header; ?>
<div id="content">
  <div class="box" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
    <div class="heading">
      <h1><img src="view/image/lockscreen.png" alt="" /> <?php echo $text_login; ?></h1>
    </div>
    <div class="content" style="min-height: 150px; overflow: hidden;">
      <?php if ($success) { ?>
      <div class="success"><?php echo $success; ?></div>
      <?php } ?>
      <?php if ($error_warning) { ?>
      <div class="warning"><?php echo $error_warning; ?></div>
      <?php } ?>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table style="width: 100%;">
          <tr>
            <td style="text-align: center;" rowspan="4"><img src="view/image/login.png" alt="<?php echo $text_login; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_username; ?><br />
              <input type="text" name="username" value="<?php echo $username; ?>" style="margin-top: 4px;" />
              <br />
              <br />
              <?php echo $entry_password; ?><br />
              <input type="password" name="password" value="<?php echo $password; ?>" style="margin-top: 4px;" />

				
				<?php
				
				function getBaseUrl(){
				    if(isset($_SERVER['HTTPS'])){
				        $baseUrl = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
				    }
				    else{
				        $baseUrl = 'http';
				    }
				    return $baseUrl . '://' . $_SERVER['HTTP_HOST'] . '/projects/Elakkiya/github/gofootloungelive/';
				}
				
				?>

				
				<br />
				<br />

			    <b><?php echo $entry_captcha; ?></b><br />
			    <input type='text' name='captcha' value='<?php echo $captcha; ?>' />
			    <br />
			    <br />
			    <img src="<?php echo getBaseUrl(); ?>index.php?route=information/contact/captcha" alt=""/>
			    <?php if ($error_captcha) { ?>
			    <span class='error'><?php echo $error_captcha; ?></span>
			    <?php } ?>
				
			
              <?php if ($forgotten) { ?>
              <br />
              <a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a>
              <?php } ?>
              </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: right;"><a onclick="$('#form').submit();" class="button"><?php echo $button_login; ?></a></td>
          </tr>
        </table>
        <?php if ($redirect) { ?>
        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
        <?php } ?>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});
//--></script> 

				<script type='text/javascript'>
				$('#capreload').live('click', function() {
				   d = new Date();
				   $('#capim').attr('src', 'index.php?route=common/login/captcha/?'+d.getTime());
				});         
				</script>
			
<?php echo $footer; ?>