<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }  if (ROLE != 'admin') { msg('权限不足！'); }
global $m;

if (isset($_GET['ok'])) {
	echo '<div class="alert alert-success">操作用户成功</div>';
}
if (isset($_GET['add'])) {	?>

<form action="setting.php?mod=admin:users" method="post">
<input type="hidden" name="do" value="add">
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:35%">参数</th>
			<th style="width:65%">值</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>用户名</td>
			<td><input type="text" name="name" class="form-control" required></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="pwd" class="form-control" required></td>
		</tr>
		<tr>
			<td>邮箱</td>
			<td><input type="email" name="mail" class="form-control" required></td>
		</tr>
		<tr>
			<td>用户组</td>
			<td><input type="radio" name="role" value="user" required> 用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="role" value="admin" required> 管理员</td>
		</tr>
	</tbody>
</table>
<input type="submit" class="btn btn-primary" value="提交更改">
</form>

<?php } else {
$userc = $m->fetch_row($m->query("SELECT COUNT(*) FROM `".DB_NAME."`.`".DB_PREFIX."users`"));
$users = '';
$s = $m->query('SELECT * FROM  `'.DB_NAME.'`.`'.DB_PREFIX.'users`');

while ($x = $m->fetch_array($s)) {
	$users .= '<tr><td>'.$x['id'].'<br/><input type="checkbox" name="user[]" value="'.$x['id'].'"></td><td>'.$x['name'].'<br/>用户组：'.getrole($x['role']).'</td><td>'.$x['email'].'<br/>数据表：'.$x['t'].'</td></tr>';
}

?>
<div class="alert alert-info">目前共有 <?php echo $userc[0]; ?> 名用户。点击 UID 下面的复选框表示对该用户进行操作<br/><a href="index.php?mod=admin:users&add">点击此处可以添加一名用户</a></div>
<form action="setting.php?mod=admin:users" method="post" onsubmit="return confirm('此操作不可逆，你确定要执行吗？');">
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:7%">UID</th>
			<th style="width:40%">用户名/用户组</th>
			<th style="width:25%">电子邮箱/数据表</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $users; ?>
	</tbody>
</table>
选择操作：<input type="radio" name="do" value="cookie" required> 清除 Cookie &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="radio" name="do" value="clean"> 清除贴吧数据 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="radio" name="do" value="delete"> 删除用户 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="radio" name="do" value="crole"> 提/降 用户组 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="radio" name="do" value="cset"> 清除个人设置
<br/><br/><input type="submit" class="btn btn-primary" value="执行操作">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-default" onclick="location = 'index.php?mod=admin:users&add'">添加用户</button>
</form><?php } ?>
<br/><br/><?php echo SYSTEM_FN ?> V<?php echo SYSTEM_VER ?> By <a href="http://zhizhe8.net" target="_blank">无名智者</a>