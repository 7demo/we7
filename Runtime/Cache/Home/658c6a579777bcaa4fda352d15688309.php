<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
这是tutors 模板
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?> + <?php echo ($vo["name"]); ?> + <?php echo ($vo["word"]); ?>
    <br /><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>