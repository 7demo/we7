<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li class=""><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li class="active">一键更新</li>
</ol>
<ul class="nav nav-tabs">
	<li<?php  if($do == 'upgrade') { ?> class="active"<?php  } ?>><a href="<?php  echo url('cloud/upgrade');?>">自动更新</a></li>
	<?php  if($do == 'shipping') { ?><li class="active"><a href="javscript:;">升级处理</a></li><?php  } ?>
</ul>
<div class="clearfix">
	<script type="text/javascript" src="http://addons.we7.cc/tips.php"></script>
	<div id="tips" style="display:block; overflow:hidden;">
		<style>
		.refresh-log ul{margin:10px 0 0 0;}
		.refresh-log ul em{font-style:normal; float:right;}
		</style>
		<div class="row">
			<div class="col-lg-6">
				<div class="alert alert-info refresh-log">
					<h4><i class="fa fa-refresh"></i> 更新日志</h4>
					<ul class="list-unstyled">
					<script type="text/javascript" src="http://bbs.we7.cc/api.php?mod=js&bid=17"></script>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="alert alert-info refresh-log">
					<h4><i class="fa fa-bullhorn"></i> 系统公告</h4>
					<ul class="list-unstyled">
					<script type="text/javascript" src="http://bbs.we7.cc/api.php?mod=js&bid=20"></script>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="alert alert-danger">
		<i class="fa fa-exclamation-triangle"></i> 更新时请注意备份网站数据和相关数据库文件！官方不强制要求用户跟随官方意愿进行更新尝试！
	</div>
	<form action="" method="post" class="form-horizontal" role="form">
		<?php  if(!empty($upgrade) && !empty($upgrade['upgrade'])) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">版本</label>
			<div class="col-sm-10">
				<p class="form-control-static"><span class="fa fa-square-o"></span> &nbsp; 系统当前版本: v<?php  echo IMS_VERSION?></p>
				<?php  if($upgrade['version'] != IMS_VERSION) { ?>
				<p class="form-control-static"><span class="fa fa-square-o"></span> &nbsp; 存在的新版本: v<?php  echo $upgrade['version'];?></p>
				<?php  } ?>
				<div class="help-block">在一个发布版中可能存在多次补丁, 因此版本可能未更新</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">发布日期</label>
			<div class="col-sm-10">
				<p class="form-control-static"><span class="fa fa-square-o"></span> &nbsp; 系统当前Release版本: Build <?php  echo IMS_RELEASE_DATE?></p>
				<?php  if($upgrade['release'] != IMS_RELEASE_DATE) { ?>
				<p class="form-control-static"><span class="fa fa-square-o"></span> &nbsp; 存在的新Release版本: Build <?php  echo $upgrade['release'];?></p>
				<?php  } ?>
				<div class="help-block">系统会检测当前程序文件的变动, 如果被病毒或木马非法篡改, 会自动警报并提示恢复至默认版本, 因此可能修订日期未更新而文件有变动</div>
			</div>
		</div>
		<?php  if(!empty($upgrade['message'])) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">注意事项</label>
			<div class="col-sm-10">
				<div class="alert alert-danger">
					<?php  echo $upgrade['message'];?>
				</div>
			</div>
		</div>
		<?php  } ?>
		<?php  if(!empty($upgrade['scripts'])) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">更新通告</label>
			<div class="col-sm-10">
				<?php  if(is_array($upgrade['scripts'])) { foreach($upgrade['scripts'] as $ver) { ?>
				<p class="form-control-static">(<?php  echo $upgrade['family'];?><?php  echo $ver['version'];?> Build <?php  echo $ver['release'];?>) - <?php  echo $ver['message'];?></p>
				<?php  } } ?>
			</div>
		</div>
		<?php  } ?>
		<?php  if(!empty($upgrade['database'])) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">数据库同步情况</label>
			<div class="col-sm-10">
				<div class="help-block"><strong>注意: 重要: 本次更新涉及到数据库变动, 请做好备份.</strong></div>
				<div class="alert alert-success" style="line-height:20px;margin-top:20px;">
					<?php  if(is_array($upgrade['database'])) { foreach($upgrade['database'] as $line) { ?>
					<div class="row">
						<div class="col-xs-2 col-lg-1">表名:</div>
						<div class="col-xs-2 col-lg-2"><?php  echo $line['tablename'];?></div>
						<?php  if($row['new']) { ?>
						<div class="col-xs-8 col-lg-9">New</div>
						<?php  } else { ?>
						<div class="col-xs-8 col-lg-9"><?php  if(!empty($line['fields'])) { ?>fields: <?php  echo $line['fields'];?>; <?php  } ?><?php  if(!empty($line['indexes'])) { ?>indexes: <?php  echo $line['indexes'];?><?php  } ?></div>
						<?php  } ?>
					</div>
					<?php  } } ?>
				</div>
			</div>
		</div>
		<?php  } ?>
		<?php  if(!empty($upgrade['files'])) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">文件同步情况</label>
			<div class="col-sm-10">
				<div class="help-block"><strong>注意: 重要: 本次更新涉及到程序变动, 请做好备份.</strong></div>
				<div class="alert alert-info" style="line-height:20px;margin-top:20px;">
					<?php  if(is_array($upgrade['files'])) { foreach($upgrade['files'] as $line) { ?>
					<div><span style="display:inline-block; width:30px;"><?php  if(is_file(IA_ROOT . $line)) { ?>M<?php  } else { ?>A<?php  } ?></span><?php  echo $line;?></div>
					<?php  } } ?>
				</div>
			</div>
		</div>
		<?php  } ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">更新协议</label>
			<div class="col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="agreement_0"> 我已经做好了相关文件的备份工作
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" id="agreement_1"> 认同官方的更新行为并自愿承担更新所存在的风险
					</label>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" id="agreement_2"> 理解官方的辛勤劳动并报以感恩的心态点击更新按钮
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-1 col-xs-12 col-sm-10 col-md-10 col-lg-11">
				<input type="button" id="forward" value="立即更新" class="btn btn-primary" />
			</div>
		</div>
		<?php  } else { ?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-1 col-xs-12 col-sm-10 col-md-10 col-lg-11">
				<input name="submit" type="submit" value="立即检查新版本" class="btn btn-primary" />
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				<div class="help-block">当前系统未检测到有新版本, 你可以点击此按钮, 来立即检查一次.</div>
			</div>
		</div>
		<?php  } ?>
	</form>
</div>
<?php  if(!empty($upgrade) && !empty($upgrade['upgrade'])) { ?>
<script type="text/javascript">
	require(['jquery', 'util'], function($, u){
		$('#forward').click(function(){
			var a = $("#agreement_0").is(':checked');
			var b = $("#agreement_1").is(':checked');
			var c = $("#agreement_2").is(':checked');
			if(a && b && c) {
				if(confirm('更新将直接覆盖本地文件, 请注意备份文件和数据. \n\n**另注意** 更新过程中不要关闭此浏览器窗口.')) {
					location.href = '<?php  echo url("cloud/process");?>';
				}
			} else {
				u.message("抱歉，更新前请仔细阅读更新协议！", '', 'error');
				return false;
			}
		});
	});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>
