<?php defined('IN_IA') or exit('Access Denied');?><div class="panel panel-default">
	<div class="panel-heading">
		回复内容
	</div>
	<ul class="list-group">
		<li class="list-group-item" ng-repeat="item in context.items" id="append-list">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">音频标题</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="添加音乐消息的标题" name="title[]" ng-model="item.title">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">音频链接</label>
				<div class="col-sm-9 col-xs-12" ng-invoker="context.bind($index, item);">
					<?php  echo tpl_form_field_audio('url[]', '', array('extras' => array('text' => 'ng-model="item.url"')));?>
					<span class="help-block">选择上传的音频文件或直接输入URL地址，常用格式：mp3</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">高品质链接</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="" name="hqurl[]" ng-model="item.hqurl">
					<span class="help-block">没有高品质音乐链接，请留空。高质量音乐链接，WIFI环境优先使用该链接播放音乐</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
				<div class="col-sm-9 col-xs-12">
					<textarea style="height:80px;" class="form-control" cols="70" name="description[]" ng-model="item.description" placeholder="添加音乐消息的简短描述" ></textarea>
					<span class="help-block">描述内容将出现在音乐名称下方，建议控制在20个汉字以内最佳</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-1 col-xs-12 col-sm-10 col-md-10 col-lg-11">
					<a href="javascript:;" class="btn btn-default hidden" ng-click="context.saveItem(item);">{{item.saved ? '编辑' : '保存'}}</a>
					<a href="javascript:;" class="btn btn-default" ng-click="context.removeItem(item);">删除</a>
				</div>
			</div>
		</li>
	</ul>
	<div class="panel-footer">
		<a href="javascript:;" class="btn btn-default" ng-click="context.addItem();">添加语音回复</a>
		<span class="help-block">添加多条回复内容时, 随机回复其中一条</span>
	</div>
</div>

<script>
	window.initReplyController = function($scope) {
		$scope.context = {};
		$scope.context.items = <?php  echo json_encode($replies)?>;
		if(!$.isArray($scope.context.items)) {
			$scope.context.items = [];
		}
		if($scope.context.items.length == 0) {
			$scope.context.items.push({});
		}
		$scope.context.bind = function(i, v) {
			$('input[name="url[]"]').eq(i).val(v.url);
		};
		$scope.context.addItem = function(){
			$scope.context.items.push({});	
		};
		$scope.context.saveItem = function(item){
			item.saved = !item.saved;
		};
		$scope.context.removeItem = function(item) {
			require(['underscore'], function(_){
				$scope.context.items = _.without($scope.context.items, item);
				$scope.$digest();
			});
		}
	};
	window.validateReplyForm = function(form, $, _, util, $scope) {
		$scope.$digest();
		var error = false;
		angular.forEach($scope.context.items, function(v, k){
			v.url = $('input[name="url[]"]').eq(k).val();
			//音频标题和链接不能为空(两种链接至少有一种)
			if(!$.trim(v.title) || (!$.trim(v.url) && !$.trim(v.hqurl))) {
				error = true;
			}
		});
		if(error) {
			util.message('必须输入音频标题和音频链接.');
			return false;
		}
		return true;
	};
</script>