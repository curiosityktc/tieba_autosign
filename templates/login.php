<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } loadhead(); ?>
<div class="panel panel-primary" style="margin:5% 15% 5% 15%;">
	<div class="panel-heading">
          <h3 class="panel-title">请输入您的账号信息</h3>
    </div>
    <div style="margin:0% 5% 5% 5%;">
	<div class="login-top"></div><br/><?php doAction('login_page_1'); ?>
	<b>您需要输入账户和密码才能继续使用 <?php echo SYSTEM_FN ?>，请输入您的账号信息</b><br/><br/>
  <?php if (isset($_GET['error_msg'])): ?><div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  错误：<?php echo strip_tags($_GET['error_msg']); ?></div><?php endif;?>
  <form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:login">
	<div class="input-group">
  <span class="input-group-addon">账户</span>
  <input type="text" class="form-control" name="user" placeholder="账户可以为用户名或者邮箱地址">
</div><br/>
<div class="input-group">
  <span class="input-group-addon">密码</span>
  <input type="password" class="form-control" name="pw" id="pw">
</div>
	<div class="login-button"><br/>
  <input type="checkbox" name="ispersis" id="ispersis" value="1" />&nbsp;<label for="ispersis">记住密码及账户</label><br/><br/>
	<?php doAction('login_page_2'); if (option::get('enable_reg') == 1) { ?>
  <button type="submit" class="btn btn-primary" style="width:45%;float:left;">登陆</button>
	<button type="button" class="btn btn-success" onclick="location = '<?php echo SYSTEM_URL ?>index.php?mod=reg'" style="width:45%;float:right;">注册</button>
  <?php } else { ?>
  <button type="submit" class="btn btn-primary" style="width:100%;float:left;">登陆</button>
  <?php } doAction('login_page_3'); ?>
	</div><br/><br/><br/>
	<?php echo SYSTEM_FN ?> V<?php echo SYSTEM_VER ?> By <a href="http://zhizhe8.net" target="_blank">无名智者</a> @ <a href="http://www.stus8.com/" target="_blank">StusGame GROUP</a>
	<?php 
  $icp=option::get('icp');
    if (!empty($icp)) {
      echo ' | <a href="http://www.miitbeian.gov.cn/" target="_blank">'.$icp.'</a>';
    }
    echo '<br/>'.option::get('footer');
    doAction('footer');
  ?>
  <div style=" clear:both;"></div>
	<div class="login-ext"></div>
	<div class="login-bottom"></div>
</div>