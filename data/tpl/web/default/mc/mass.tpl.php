<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	.clear{width:100%;height:0;clear:both;}
	.alert{margin:1px 0;padding:10px 15px;background:#F5F5F5;}
	.item-show .reply-news-list-cover{width:30%;height:100px;float:right;overflow:hidden;}
	.item-show .reply-news-list-cover img{width:100%;height:auto;}
	.item-show .reply-news-list-detail{width:100%;float:left;overflow:hidden;height:auto}
	.item-show .reply-news-list-detail .help-block{margin:5px 0}
	.require{color:red;}
</style>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo url('mc/mass')?>"> 微信群发</a></li>
	<li><a href="<?php  echo url('mc/mass/send')?>"> 已发送</a></li>
</ul>

<div class="clearfix">
	<div class="alert alert-danger" style="margin-bottom:10px">
		使用微信群发,首先确定您的公众号为"认证服务号"或"认证订阅号"。确定后,在 <a href="<?php  echo url('mc/fangroup')?>">粉丝分组</a> 拉取您的粉丝分组。
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			批量发送通知
		</div>
		<div class="panel-body">
			<form action=""  class="form-horizontal" role="form" id="form0">
				<input type="hidden" name="fansnum" value="">
				<input type="hidden" name="groupname" value="">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择公众号</label>
					<div class="col-sm-9 col-xs-12">
						<select name="acid" id="acid" class="form-control">
							<option value="0" name="acid">请选择公众号</option>
							<?php  if(is_array($accdata)) { foreach($accdata as $accda) { ?>
							<option value="<?php  echo $accda['acid'];?>" name="acid"><?php  echo $accda['name'];?></option>
							<?php  } } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择粉丝分组</label>
					<div class="col-sm-9 col-xs-12">
						<select name="groupid" id="groupid" class="form-control">
							<option value="0" name="groupid">请选择粉丝分组</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息类型</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline"><input type="radio" value="7" name="msgtype" checked>文本</label>
						<label class="radio-inline"><input type="radio" value="2" name="msgtype">图片</label>
						<label class="radio-inline"><input type="radio" value="3" name="msgtype">语音</label>
						<label class="radio-inline"><input type="radio" value="4" name="msgtype">视频</label>
						<label class="radio-inline"><input type="radio" value="6" name="msgtype">图文</label>
					</div>
				</div>
			</form>
			<form action="<?php  echo url('mc/notice/post')?>" method="post" class="form-horizontal reply" role="form" id="form7">
				<input type="hidden" name="msgtype" value="text">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息内容</label>
					<div class="col-sm-9 col-xs-12">
						<textarea name="content" id="contentinput" class="form-control" style="width:500px" cols="20" rows="3" placeholder="添加要回复的内容"></textarea>
						<div class="help-block">设置用户添加公众帐号好友时，发送的欢迎信息。<a href="javascript:;" id="content"><i class="fa fa-github-alt"></i> 表情</a></div>
					</div>
				</div>
			</form>
			<form action="<?php  echo url('mc/notice/post')?>" method="post" class="form-horizontal reply" role="form" id="form2" style="display:none;">
				<input type="hidden" name="msgtype" value="image">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">上传图片</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_wechat_image('media_id', '', '');?>
						<span class="help-block">请上传所要回复的图片，上传图片必须是JPG类型</span>
					</div>
				</div>
			</form>
			<form action="<?php  echo url('mc/notice/post')?>" method="post" class="form-horizontal reply" role="form" id="form3" style="display:none;">
				<input type="hidden" name="msgtype" value="voice">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">上传语音</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_wechat_voice('media_id', '');?>
						<span class="help-block">请上传所要回复的语音，上传语音必须是MP3类型</span>
					</div>
				</div>
			</form>
			<form action="<?php  echo url('mc/notice/post')?>" method="post" class="form-horizontal reply" role="form" id="form4" style="display:none;">
				<input type="hidden" name="msgtype" value="mpvideo">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">视频标题</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" placeholder="添加视频消息的标题" name="title" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">上传视频</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_wechat_video('media_id', '');?>
						<span class="help-block">请上传所要回复的视频，上传视频必须是MP4类型</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
					<div class="col-sm-9 col-xs-12">
						<textarea style="height:80px;" class="form-control" cols="70" name="description" placeholder="添加视频消息的简短描述" ></textarea>
						<span class="help-block">描述内容将出现在视频名称下方，建议控制在20个汉字以内最佳</span>
					</div>
				</div>
			</form>
			<form action="<?php  echo url('mc/notice/post')?>" method="post" class="form-horizontal reply" role="form" id="form6" style="display:none">
				<input type="hidden" name="msgtype" value="mpnews">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息内容</label>
					<div class="col-sm-9 col-xs-12" id="new-reply" style="margin-left:-15px">
						<div class="row">

						</div>
						<div class="col-sm-12">
							<div class="alert" style="text-align:center;">
								<a href="javascript:;" class="btn btn-default" onclick="newsHandler.buildForm();"><i class="fa fa-plus"></i> 添加回复条目</a>
							</div>
						</div>
					</div>
				</div>
			</form>

			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-10">
					<input type="submit" class="btn btn-primary span3" name="submit" value="立即发送" id="submit"/>
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
			</div>
		</div>
	</div>
</div>
<?php  echo tpl_ueditor('')?>
<script id="news-form-html" type="text/html">
	<div class="reply-item" (editor-index)>
		<div class="col-sm-12 item-show" style="display:none" id="(item-add-show)" >
			<div class="alert">
				<div style="position:relative">
					<div class="reply-news-list-detail">
						<span class="help-block title"><strong><?php  echo $li['title'];?></strong></span>
						<span class="help-block content"><?php  echo cutstr($li['description'], 30, '...')?></span>
									<span class="help-block pull-right">
										<a href="javascript:;" onclick='newsHandler.doEditItem("(item-add-show)", "(item-add-form)");'>编辑</a>
										<a href="javascript:;" onclick='newsHandler.doDeleteItem("(item-add-show)");'>删除</a>
									</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div id="(item-add-form)" class="item-form col-sm-12">
			<div class="alert">
			<form action="">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>标题</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" placeholder="添加图文消息的标题" name="title"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">作者</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" placeholder="添加图文消息的作者" name="author"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>封面</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_wechat_image('thumb_media_id', '', '', array('type' => 'thumb'));?>
						<span class="help-block">请上传所要回复的图片，上传图片必须是JPG类型</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="checkbox-inline">
							<input type="checkbox" name="show_cover_pic" value="1"/> 封面图片显示在正文中
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
					<div class="col-sm-9 col-xs-12">
						<textarea class="form-control" placeholder="添加图文消息的简短描述" name="digest"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span> 详情</label>
					<div class="col-sm-9 col-xs-12">
						<textarea class="richtext" name="content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">来源</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="图文消息的来源地址" name="content_source_url"/>
										<span class="input-group-btn">
											<button class="btn btn-default link_select" type="button"><i class="fa fa-external-link"></i> 系统链接</button>
										</span>
						</div>
					</div>
				</div>
			</form>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<button class="btn btn-danger" type="button" onclick="$(this).parent().parent().parent().parent().parent().remove()"><i class="fa fa-times"></i> 取消</button>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<script>
		var arr = new Array();
		require(['util'], function(u){
			$('#new-reply .reply-item').each(function(){
				var findex = $(this).attr('editor-index');
				arr[findex] = new UE.ui.Editor(ueditoroption);
				arr[findex].render($(this).find('.richtext')[0]);
			});

			$('.link_select').click(function(){
				var ipt = $(this).parent().prev();
				u.linkBrowser(function(href){
					ipt.val(href);
				});
			});
		});
	</script>
</script>
<script>
	var size = 0;
	require(['jquery', 'util'], function($, u){
		u.emotion($("#content"), $("#contentinput")[0]);

		$('#form0 :radio').click(function(){
			$('.reply').hide();
			var msgtype =  $('#form0 :radio:checked').val();
			$('#form' + msgtype).show();
		});
		$('#form0 #acid').change(function(){
			var acid = $(this).val();
			if(!acid) return;
			$.post('<?php  echo url("mc/mass/groupdata")?>', {'acid' : acid}, function(data) {
				data = $.parseJSON(data);
				$('#form0 #groupid').html('<option name="" value="">请选择粉丝分组</option>');
				if(data.status == 'empty') {
					u.message('该公众号还没有从公众平台获取粉丝分组，现在去获取', '', 'info');
					return;
				} else {
					$('#form0 #groupid').html(data.message);
				}
			});
		});
		$('#form0 #groupid').change(function(){
			$('#form0 :hidden[name="fansnum"]').val($(this).find("option:selected").attr('data-num'));
			$('#form0 :hidden[name="groupname"]').val($(this).find("option:selected").html());
		});

		$('#submit').click(function(){
			var groupid = $('#groupid option:selected').val();
			var acid = $.trim($('#acid :selected').val());
			var fansnum = $('#form0 input[name="fansnum"]').val();
			var groupname = $('#form0 input[name="groupname"]').val();
			if(acid == 0) {
				u.message('请选择公众号', '', 'error');
				return;
			}
			if(groupid == 0) {
				u.message('请选择粉丝分组', '', 'error');
				return;
			}

			var msgtype = $('#form0 :radio:checked').val();
			var params = {
				'acid' : acid,
				'groupid' : groupid,
				'msgtype' : msgtype,
				'fansnum' : fansnum,
				'groupname' : groupname
			};
			if(msgtype == '7') {
				var content = $('#form7 textarea[name="content"]').val();
				if(!content) {
					u.message('请完善消息内容', '', 'error');
					return;
				}
				var formdata = $('#form7').serialize();
				params.formdata = formdata;
			} else if (msgtype == '2') {
				var media_id = $('#form2 :text[name="media_id"]').val();
				if(!media_id) {
					u.message('请上传图片,仅支持JPG格式', '', 'error');
					return;
				}
				var formdata = $('#form2').serialize();
				params.formdata = formdata;
			} else if (msgtype == '3') {
				var media_id = $('#form3 :text[name="media_id"]').val();
				if(!media_id) {
					u.message('请上传语音消息', '', 'error');
					return;
				}
				var formdata = $('#form3').serialize();
				params.formdata = formdata;
			} else if (msgtype == '4') {
				var media_id = $('#form4 :text[name="media_id"]').val();
				if(!media_id) {
					u.message('请上传视频消息', '', 'error');
					return;
				}
				var formdata = $('#form4').serialize();
				params.formdata = formdata;
			} else if (msgtype == '5') {
				var thumb_media_id = $('#form5 :text[name="thumb_media_id"]').val();
				var musicurl = $('#form5 :text[name="musicurl"]').val();
				if(!thumb_media_id) {
					u.message('请上传媒体缩略图', '', 'error');
					return;
				}
				if(!musicurl) {
					u.message('请上传音频文件或填写音频链接', '', 'error');
					return;
				}
				var formdata = $('#form5').serialize();
				params.formdata = formdata;
			} else if (msgtype == '6') {
				var formdata = new Array();
				var content = new Array();
				$('.reply-item').each(function(){
					var dindex = $(this).attr('editor-index');
					content.push(arr[dindex].getContent());
					var content_source_url = $(this).find('form :input[name="content_source_url"]');
					content_source_url.val(content_source_url.val().replace(/&/g, '*').replace(/=/g, '$'));
					formdata.push($(this).find('form').serialize());
				});
				params.formdata = formdata;
				params.content = content;
			}
			var url = "<?php  echo url('mc/mass/post')?>";
			$.post(url, params, function(data){
				if(data == 'success') {
					u.message('发送成功', '', 'success');
				} else {
					data = $.parseJSON(data);
					if(data.errno || data.type == 'error' || data.type == 'info') {
						u.message(data.message, '', 'error');
					}
				}
				try{data = $.parseJSON(data);}catch (e) {eval(data);}
				if(data.type) {
					u.message(data.message, '', 'error');
					return;
				}
				if(data.status == 'error') {
					u.message(data.message, '', 'error');
					return;
				} else if(data.status == 'success') {
					u.message(data.message, '', 'success');
					return;
				}
			});

			return;
		});
	});

	var newsHandler = {
		'buildForm' : function(){
			if($('#new-reply .item-show').size() >= 10) {
				require(['util'], function(u){
					u.message('单条图文信息最多添加十条内容！', '', 'error');
				});
				return false;
			}
			this.updateList();
			var html_temp = $('#news-form-html').html().replace(/\(item-add-show\)/gm, 'item-show-' + (++size));
			var html = html_temp.replace(/\(item-add-form\)/gm, 'item-form-' + (size));
			var html = html.replace(/\(editor-index\)/gm, 'editor-index=' + (size));
			$('#new-reply .row').append(html);

		},
		'updateList' : function(){
			$('#new-reply .reply-item').each(function(){
				$(this).find('.item-show').css('display', 'block').siblings().css('display', 'none');
				$(this).find('.item-show .title').html($(this).find("input[name^='title']").val());
				$(this).find('.item-show .content').html($(this).find("textarea[name^='digest']").val());
			});
		},
		'doEditItem' : function(showid, formid){
			this.updateList();
			$('#' + showid).hide();
			$('#' + formid).show();
		},
		'doDeleteItem' : function(itemid){
			$('#' + itemid).parent().remove();
		}
	};
	newsHandler.buildForm();
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
