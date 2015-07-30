<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>这是测试</h1>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><p><?php echo ($u["title"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
<h1>3333</h1>
    <p><?php echo ($select["title"]); ?></p>
</body>
</html>