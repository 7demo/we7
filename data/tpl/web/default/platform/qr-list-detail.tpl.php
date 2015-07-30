<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo url('platform/qr/list');?>">管理二维码</a></li>
		<li><a href="<?php  echo url('platform/qr/post');?>">生成二维码</a></li>
		<li><a href="<?php  echo url('platform/qr/display');?>">扫描统计</a></li>
        <li class="active"><a href="#"><?php  echo $qrcode['name'];?></a></li>
	</ul>

    <div class="panel panel-info">
        <div class="panel-heading">简介</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-2">
                    <img width="100%" src="<?php  echo $recomendqrcode['url'];?>"
                         alt=""/>
                </div>
                <div class="col-lg-4">
                    <h4>
                        <?php  echo $recomendqrcode['name'];?>
                    </h4>
                    <p>开始时间：<?php  echo $recomendqrcode['time'];?></p>
                    <p>扫描人数：<?php  echo $total;?>人</p>
                    <p style="font-size: 12px"><a href="<?php  echo $recomendqrcode['url'];?>" download="<?php  echo $recomendqrcode['name'];?>.png" >下载二维码</a></p>

                </div>
            </div>
        </div>
    </div>

	<div class="panel panel-default">
		<div class="table-responsive panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>粉丝</th>
					<th>关注扫描</th>
					<th>扫描时间</th>
					<th>操作</th>
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
					<td><?php  echo $row['type'];?></td>
					<td>
					<?php  echo date('Y-m-d <br /> H:i:s', $row['createtime']);?>
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