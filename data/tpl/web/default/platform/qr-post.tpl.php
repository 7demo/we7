<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo url('platform/qr/list');?>">管理二维码</a></li>
		<li class="active"><a href="<?php  echo url('platform/qr/post');?>">生成二维码</a></li>
		<li><a href="<?php  echo url('platform/qr/display');?>">扫描统计</a></li>
	</ul>
	<div class="clearfix">
		<form class="form-horizontal form" action="" method="post" id="form1">
			<input type="hidden" name="id" value="<?php  echo $row['id'];?>" />
			<input type="hidden" name="acid" value="<?php  echo $row['acid'];?>" />
			<div class="panel panel-default">
				<div class="panel-heading">
					生成二维码
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号</label>
						<?php  if(!empty($row['id'])) { ?>
						<div class="col-sm-9 col-xs-12">
							<select name="acid" class="form-control" disabled>
								<?php  if(is_array($acidarr)) { foreach($acidarr as $ac) { ?>
								<option value="<?php  echo $ac['acid'];?>"<?php  if($ac['acid'] == $row['acid']) { ?> selected="selected"<?php  } ?>><?php  echo $ac['name'];?></option>
								<?php  } } ?>
							</select>
						</div>
						<?php  } else { ?>
						<div class="col-sm-9 col-xs-12">
							<select name="acid" class="form-control">
								<?php  if(is_array($acidarr)) { foreach($acidarr as $ac) { ?>
								<option value="<?php  echo $ac['acid'];?>"<?php  if($ac['acid'] == $_GPC['acid']) { ?> selected="selected"<?php  } ?> <?php  if($ac['level'] != 4) { ?>disabled<?php  } ?>><?php  echo $ac['name'];?> <?php  if($ac['level'] != 4) { ?>[权限不足]<?php  } ?></option>
								<?php  } } ?>
							</select>
						</div>
						<?php  } ?>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">场景名称</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" id="scene-name" class="form-control" placeholder="" name="scene-name" value="<?php  echo $row['name'];?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">关联关键字</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" id="keyword" class="form-control" name="keyword" value="<?php  echo $row['keyword'];?>" /><span class="help-block">二维码对应关键字, 用户扫描后系统将通过场景ID返回关键字到平台处理.</span>
						</div>
					</div>
					<?php  if(empty($id)) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码类型</label>
						<div class="col-sm-9 col-xs-12">
							<label for="radio_1" class="radio-inline"><input type="radio" name="qrc-model" id="radio_1" onclick="$('#displayorder').show();" value="1" <?php  if(empty($row['model']) || $row['model'] == 1) { ?>checked="checked"<?php  } ?> /> 临时</label>
							<label for="radio_0" class="radio-inline"><input type="radio" name="qrc-model" id="radio_0" onclick="$('#displayorder').hide();" value="2" <?php  if($row['model'] == 2) { ?>checked="checked"<?php  } ?> /> 永久</label>
							<span class="help-block">目前有2种类型的二维码, 分别是临时二维码和永久二维码, 前者有过期时间, 最大为7天（604800秒）, 但能够生成较多数量, 后者无过期时间, 数量较少(目前参数只支持1--100000).</span>
						</div>
					</div>
					<?php  } ?>
					<div class="form-group" id="displayorder" <?php  if($row['model'] == 2) { ?> style="display:none;"<?php  } ?>>
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">过期时间</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" id="expire-seconds" class="form-control" placeholder="" name="expire-seconds" value="604800" />
							<span class="help-block">临时二维码过期时间, 最大为7天（604800秒）.</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
						<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交">提交</button>
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
			</div>
		</form>
	</div>
<script type="text/javascript">
	require(['jquery', 'util'], function($, u){
		$("#form1").submit(function(){
			if(!$("select[name='acid']").val()) {
				u.message('请选择公众号！', '', 'error');
				return false;
			}
			if($(":text[name='scene-name']").val() == '') {
				u.message('抱歉，场景名称为必填项，请返回修改！', '', 'error');
				return false;
			}
			if($(":text[name='keyword']").val() == '') {
				u.message('抱歉，场景管理关键字为必填项，请返回修改！', '', 'error');
				return false;
			}
			if($("#radio_1").attr("checked") == "checked") {
				if ($(":text[name='expire-seconds']").val() == '') {
					u.message('抱歉，临时二维码过期时间为必填项，请返回修改！', '', 'error');
					return false;
				}
				var r2 = /^\+?[1-9][0-9]*$/;
				if(!r2.test($(":text[name='expire-seconds']").val())){
					u.message('抱歉，临时二维码过期时间必须为正整数，请返回修改！', '', 'error');
					return false;
				}
				if(parseInt($(":text[name='expire-seconds']").val())<30 || parseInt($(":text[name='expire-seconds']").val())>604800) {
					u.message('抱歉，临时二维码过期时间必须在30-604800秒之间，请返回修改！', '', 'error');
					return false;
				}
			}
			return true;
		});
	});


function formcheck(form) {
	if (form['scene-name'].value == '') {
		message('抱歉，场景名称为必填项，请返回修改！', '', 'error');
		return false;
	}
	if (form['keyword'].value == '') {
		message('抱歉，场景管理关键字为必填项，请返回修改！', '', 'error');
		return false;
	}

	if($("#radio_1").attr("checked") == "checked") {
		if (form['expire-seconds'].value == '') {
			message('抱歉，临时二维码过期时间为必填项，请返回修改！', '', 'error');
			return false;
		}
		var r2 = /^\+?[1-9][0-9]*$/;
		if(!r2.test(form['expire-seconds'].value)){
			message('抱歉，临时二维码过期时间必须为正整数，请返回修改！', '', 'error');
			return false;
		}
		if(parseInt(form['expire-seconds'].value)<30 || parseInt(form['expire-seconds'].value)>604800) {
			message('抱歉，临时二维码过期时间必须在30-604800秒之间，请返回修改！', '', 'error');
			return false;
		}
		
	}
	return true;
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>