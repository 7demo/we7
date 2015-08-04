<?php defined('IN_IA') or exit('Access Denied');?>	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="stat">
			<input type="hidden" name="do" value="rule">
			<input type="hidden" name="m" value=<?php  echo $_GPC['m'];?>>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则类型</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<select name="foo" class="form-control">
							<option value="hit" <?php  if('hit' == $_GPC['foo']) { ?> selected="selected"<?php  } ?>>已触发规则</option>
							<option value="miss" <?php  if('miss' == $_GPC['foo']) { ?> selected="selected"<?php  } ?>>未触发规则</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">日期范围</label>
					<div class="col-sm-6 col-lg-8 col-xs-6">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>