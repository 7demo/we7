<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
	<form id="form1"  action="<?php  echo url('profile/jsauth')?>" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				借用 JS 分享设置
			</div>
			<input type="hidden" name="oauth[status]" value="1">
			<div class="panel-body">
				<div class="form-group" id="account">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择公众号</label>
					<div class="col-sm-9 col-xs-12">
						<select name="jsauth_acid" class="form-control">
							<option value="0">请选择公众号</option>
							<?php  if(is_array($accounts)) { foreach($accounts as $acid => $name) { ?>
							<option value="<?php  echo $acid;?>" <?php  if($jsauth_acid == $acid) { ?>selected<?php  } ?>><?php  echo $name;?></option>
							<?php  } } ?>
						</select>
						<span class="help-block">在系统中使用微信分享接口前，开发者需要先到公众平台网站的【公众号设置】 / 【功能设置】中配置 【JS 接口安全域名】。<a href="http://www.we7.cc/manual/dev:v0.6:qa:jsauth" target="_black">查看详情</a></span>
					</div>
				</div>
			</div>
		</div>
		<?php  if(!empty($accounts)) { ?>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1 col-sm-2 col-md-2 col-xs-3" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
		<?php  } ?>
	</form>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
