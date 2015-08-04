<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<?php  if($do == 'passport') { ?><li class="active"><a href="<?php  echo url('mc/passport/passport')?>"><i class="icon-edit"></i> 会员中心参数</a></li><?php  } ?>
	<?php  if($do == 'oauth') { ?><li class="active"><a href="<?php  echo url('mc/passport/oauth')?>"><i class="icon-user"></i> 公众平台oAuth选项</a></li><?php  } ?>
	<?php  if($do == 'sync') { ?><li class="active"><a href="<?php  echo url('mc/passport/sync')?>"><i class="icon-user"></i> 更新粉丝信息</a></li><?php  } ?>
</ul>
<?php  if($do == 'passport') { ?>
<div class="main">
	<form id="payform" action="<?php  echo url('mc/passport')?>" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				会员中心身份资料设置
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">开启强制注册</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="passport[focusreg]" value="1" <?php  if(!empty($passport['focusreg'])) { ?> checked="checked"<?php  } ?>/> 是
						</label>
						<label class="radio-inline">
							<input type="radio" name="passport[focusreg]" value="0" <?php  if(empty($passport['focusreg'])) { ?> checked="checked"<?php  } ?>/> 否
						</label>
						<span class="help-block">关闭强制注册时，用户从微信、易信等进入系统时，当模块使用"checkauth"验证用户身份时，可以在非登录状态下直接使用模块功能。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">身份验证项</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="passport[item]" value="mobile" <?php  if($passport['item'] == 'mobile') { ?> checked="checked"<?php  } ?>/> 手机注册
						</label>
						<label class="radio-inline">
							<input type="radio" name="passport[item]" value="email" <?php  if($passport['item'] == 'email') { ?> checked="checked"<?php  } ?>/> 邮箱注册
						</label>
						<label class="radio-inline">
							<input type="radio" name="passport[item]" value="random" <?php  if($passport['item'] == 'random' || empty($passport['item'])) { ?> checked="checked"<?php  } ?>/> 二者都行
						</label>
						<span class="help-block">该项设置用户注册时用户名的格式,如果设置为:"邮箱注册",系统会判断用户的注册名是否是邮箱格式</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">身份验证方式</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="passport[type]" value="code" <?php  if($passport['type'] == 'code') { ?> checked="checked"<?php  } ?>/> 随机密码
						</label>
						<label class="radio-inline">
							<input type="radio" name="passport[type]" value="password" <?php  if($passport['type'] == 'password' || empty($passport['type'])) { ?> checked="checked"<?php  } ?>/> 固定密码
						</label>
						<label class="radio-inline">
							<input type="radio" name="passport[type]" value="hybird" <?php  if($passport['type'] == 'hybird') { ?> checked="checked"<?php  } ?>/> 混合密码
						</label>
						<span class="help-block">使用邮箱或者手机号+密码来登录系统</span>
						<span class="help-block">随机密码方式: 采用发送验证码的方式, 用户不需要记录密码. 在微信以外的渠道登录系统时, 需要输入手机或邮箱+验证码来进入系统</span>
						<span class="help-block">固定密码方式: 采用设置密码的方式, 用户在首次使用时设置固定的访问密码. 在微信以外的渠道登录系统时, 需要输入手机或邮箱+密码来进入系统</span>
						<span class="help-block">混合密码方式: 混合使用两种验证方式, 用户可以自己选择是否设置访问密码. 如果设置了访问密码, 那么登录是可以使用手机或邮箱+随机密码或固定密码来进入系统</span>
						<span class="help-block"><strong>注意: 使用随机密码或者混合密码时, 必须先 <a href="<?php  echo url('profile/notify');?>" target="_blank">设置邮件</a> 或 <a href="<?php  echo url('account/post');?>" target="_blank">短信</a> 选项</strong></span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<?php  } else if($do == 'oauth') { ?>
<div class="main">
	<form id="form1"  action="<?php  echo url('mc/passport',array('do' => 'oauth'))?>" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				公众平台oAuth设置
			</div>
			<input type="hidden" name="oauth[status]" value="1">
			<div class="panel-body">
				<div class="form-group" id="account">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择公众号</label>
					<div class="col-sm-9 col-xs-12">
						<select name="oauth[account]" class="form-control">
							<option value="0">请选择公众号</option>
							<?php  if(is_array($accounts)) { foreach($accounts as $acid => $name) { ?>
							<option value="<?php  echo $acid;?>" <?php  if($oauth['account'] == $acid) { ?>selected<?php  } ?>><?php  echo $name;?></option>
							<?php  } } ?>
						</select>
						<span class="help-block">在微信公众号请求用户网页授权之前，开发者需要先到公众平台网站的【开发者中心】<b>网页服务</b>中配置授权回调域名。<a href="http://www.we7.cc/manual/dev:v0.6:qa:mobile_redirect_url_error" target="_black">查看详情</a></span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<?php  } ?>

<?php  if($do == 'sync') { ?>
<div class="main">
	<form id="form1" action="<?php  echo url('mc/passport',array('do' => 'sync'))?>" method="post" class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				设置自动更新粉丝信息
			</div>
			<div class="panel-body">
			<div class="alert alert-warning">开启此功能后,系统会自动从微信公众号平台拉取<a href="<?php  echo url('mc/fans');?>"> 粉丝信息 </a>(性别,昵称,头像,所在地等)来更新粉丝信息。更多信息参考 <a href="http://mp.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E7%94%A8%E6%88%B7%E5%9F%BA%E6%9C%AC%E4%BF%A1%E6%81%AF%28UnionID%E6%9C%BA%E5%88%B6%29" target="_blank">《获取用户基本信息》</a></div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否开启</label>
					<div class="col-sm-8 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="sync" <?php  if($sync == 1) { ?>checked<?php  } ?> value="1"/>
							开启
						</label>
						<label class="radio-inline">
							<input type="radio" name="sync" <?php  if($sync == 0) { ?>checked<?php  } ?> value="0"/>
							关闭
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
