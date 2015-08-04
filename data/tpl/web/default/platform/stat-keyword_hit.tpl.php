<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<div class="clearfix">
		<div class="stat">
			<div class="stat-div">
				<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('platform/stat-keyword_search', TEMPLATE_INCLUDEPATH)) : (include template('platform/stat-keyword_search', TEMPLATE_INCLUDEPATH));?>
				<div class="sub-item panel panel-default" id="table-list">
					<div class="panel-heading">
						详细数据
					</div>
					<div class="sub-content panel-body table-responsive">
						<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:100px;" class="row-hover">关键字<i></i></th>
									<th>规则<i></i></th>
									<th style="width:160px;">模块<i></i></th>
									<th style="width:80px;">命中次数<i></i></th>
									<th style="width:150px;">最后触发<i></i></th>
									<th style="width:80px;">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php  if(is_array($list)) { foreach($list as $row) { ?>
								<tr>
									<td class="row-hover"><?php  echo $keywords[$row['kid']]['content'];?></td>
									<td>
										<?php  if(empty($row['rid'])) { ?>
											N/A
										<?php  } else { ?>
											<a target="main" href="<?php  echo $rules[$row['rid']]['url'];?>"><?php  echo $rules[$row['rid']]['name'];?></a>
										<?php  } ?>
									</td>
									<td><?php  if($rules[$row['rid']]['module']) { ?><?php  echo $rules[$row['rid']]['module'];?><?php  } else { ?>default<?php  } ?></td>
									<td><?php  echo $row['hit'];?></td>
									<td style="font-size:12px; color:#666;"><?php  echo date('Y-m-d <br /> H:i:s', $row['lastupdate']);?></td>
									<td>
										<a target="main" href="<?php  echo url('platform/stat/trend', array('id' => $row['rid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="使用率走势"><i class="fa fa-bar-chart-o"></i></a>
									</td>
								</tr>
								<?php  } } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php  echo $pager;?>
			</div>
		</div>
	</div>

<script>
require(['bootstrap'],function($){
	$(function() {
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
