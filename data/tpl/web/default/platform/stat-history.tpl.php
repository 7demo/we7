<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="stat">
			<input type="hidden" name="do" value="history">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则类型</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<select name="searchtype" class="form-control">
							<option value="" selected="selected">不限</option>
							<option value="rule" <?php  if('rule' == $_GPC['searchtype']) { ?> selected="selected"<?php  } ?>>已有规则回复</option>
							<option value="default" <?php  if('default' == $_GPC['searchtype']) { ?> selected="selected"<?php  } ?>>默认规则回复</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">内容关键字</label>
					<div class="col-sm-6 col-lg-8 col-xs-12" >
						<input type="text" name="keyword" class="form-control" placeholder="请输入内容关键字">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">日期范围</label>
					<div class="col-sm-6 col-xs-12 col-lg-8 col-xs-12">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			详细数据
		</div>
		<div class="table-responsive panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width:10%;">用户</th>
						<th style="width:20%;">内容</th>
						<th style="width:20%;">规则</th>
						<th style="width:20%;">模块</th>
						<th style="width:20%;">时间</th>
						<th style="width:10%;">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td>
							<a href="#" title="<?php  echo $row['from_user'];?>"><?php  echo cutstr($row['from_user'], 8, '.')?></a>
						</td>
						<td align="left" class="row-hover wexin-image">
							<div style="max-width:515px; overflow:hidden; word-break:break-all; word-wrap:break-word;"><?php  echo $row['message'];?></div>
						</td>
						<td>
							<?php  if(empty($row['rid']) && $row['module']) { ?>
								该消息由<span class="text-danger"><?php  echo $row['module'];?></span>模块直接处理
							<?php  } else if($row['rid']) { ?>
								<a target="main" href="<?php  echo $rules[$row['rid']]['url'];?>"><?php  echo cutstr($rules[$row['rid']]['name'], 6)?></a>
							<?php  } else { ?>
								未触发规则
							<?php  } ?>
						</td>
						<td>
							<?php  if($row['module'] == 'default') { ?>
								没有回复规则,由<span class="text-danger">default</span>模块处理
							<?php  } else { ?>
								<?php  if($rules[$row['rid']]['module']) { ?>
									<?php  echo $rules[$row['rid']]['module'];?>
								<?php  } else if($row['module']) { ?>
									<?php  echo $row['module'];?>
								<?php  } else { ?>
									未触发模块
								<?php  } ?>
							<?php  } ?>
						</td>
						<td style="font-size:12px; color:#666;">
							<?php  echo date('Y-m-d <br /> H:i:s', $row['createtime']);?>
						</td>
						<td>
							<a href="<?php  echo url('platform/stat/del', array('op' => 'history', 'id' => $row['id']))?>" onclick="return confirm('删除后不能恢复，您确定删除吗？')" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php  } } ?>
				</tbody>
			</table>
		</div>
	</div>
<?php  echo $pager;?>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
