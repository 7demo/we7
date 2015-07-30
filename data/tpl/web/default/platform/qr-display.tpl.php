<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo url('platform/qr/list');?>">管理二维码</a></li>
		<li><a href="<?php  echo url('platform/qr/post');?>">生成二维码</a></li>
		<li class="active"><a href="<?php  echo url('platform/qr/display');?>">扫描统计</a></li>
	</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="qr">
			<input type="hidden" name="do" value="display">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<select name="acid" class="form-control">
							<option value="" selected="selected">不限</option>
							<?php  if(is_array($acidarr)) { foreach($acidarr as $ac) { ?>
							<option value="<?php  echo $ac['acid'];?>"<?php  if($ac['acid'] == $_GPC['acid']) { ?> selected="selected"<?php  } ?>><?php  echo $ac['name'];?></option>
							<?php  } } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">场景名称</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
						<input type="text" name="keyword" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="请输入场景名称">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">时间范围</label>
					<div class="col-sm-6 col-lg-8 col-xs-12">
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
		<div class="panel-heading">详细数据&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted" style="color:red;">扫描人数：<?php  echo count($list);?></span></div>
		<div class="table-responsive panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width:80px;">粉丝<i></i></th>
						<th style="width:80px;">场景名称<i></i></th>
						<th style="width:100px;">场景ID<i></i></th>
						<th style="width:110px;">关注扫描<i></i></th>
						<th style="width:150px;">扫描时间<i></i></th>
						<th style="width:110px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td>
							<a href="#" title="<?php  echo $row['openid'];?>">
								<?php  if($nickname[$row['openid']]['nickname']) { ?>
									<?php  echo $nickname[$row['openid']]['nickname'];?>
								<?php  } else { ?>
									<?php  echo cutstr($row['openid'], 15)?>
								<?php  } ?>
							</a>
						</td>
						<td><?php  echo $row['name'];?></td>
						<td><?php  echo $row['qrcid'];?></td>
						<td><?php  echo $row['type'];?></td>
						<td style="font-size:12px; color:#666;">
						<?php  echo date('Y-m-d H:i:s', $row['createtime']);?>
						</td>
						<td>
						<a href="<?php  echo url('platform/qr/delsata', array('id'=>$row['id']));?>"  onclick="javascript:return confirm('您确定要删除吗？')" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php  } } ?>
				</tbody>
			</table>
			<?php  echo $pager;?>
		</div>
	</div>
<script type="text/javascript">
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>