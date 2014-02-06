<?php
include_once('conf/config.php');
include_once('Controllers/newArticle.php');
sys::needLog('login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="public/stylesheets/global.css"/>
	<link rel="stylesheet" type="text/css" href="public/stylesheets/issue.css"/>
    <script type="text/javascript" src="public/javascripts/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="public/javascripts/navSlide.js"></script>
	<script type="text/javascript" src="public/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="public/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" src="public/javascripts/key-value.js"></script>
	
</head>
<body>
    <?php include_once('menu.php') ?>
	<div id="mainBox">
		<div id="container">
			<form class="editor-content" action="Controllers/newArticle.php" method="post">
				<div class="editor-header">
					<span class="line"></span>
					<h2 class="editor-title">&nbsp;发表文章</h2>
					<input class="issue-title" type="text" name="title">
				</div>
				<textarea name="content" id="editor" cols="30" rows="10"></textarea>
                <input type="hidden" name="tags" id="formTags">
				<div class="tags-content">
					<h2 class="tags-title">添加标签</h2>
                    <ul class="tags-list">
                        <p id="nowTags">当前标签：</p>
                    </ul>
                    <div style="margin-top: 20px;">
						<input id="addTagsInput" class="tag" list="taglist" name="addTags" type="text" />
                        <datalist id="taglist">
                            <?php
                            foreach($taglist as $item) {
                                echo '<option value="'.$item['name'].'">';
                            }
                            ?>
                        </datalist>
						<button id="addTags" class="add-btn" type="button">添加</button>
					</div>
					<button class="submit-btn" type="submit">提交</button>
				</div>
			</form>
		</div>
	</div>
	<div id="footer">
		<ul class="footer-box">
			<li class="footer-from">Powered By - HCI人机交互中心</li>
			<li class="footer-info">
				联系我们&nbsp;|&nbsp;网站地图&nbsp;|&nbsp;返回首页&nbsp;|&nbsp;投诉举报&nbsp;|&nbsp;意见建议<br>
			</li>
		</ul>
	</div>
	<div id="goTopBtn" class="back-to-top">
		<a id="J_BackToTop" href="javascript:void(0)"></a>
	</div>
	<script type="text/javascript">
		var editor = new UE.ui.Editor();
		editor.render('editor');
    </script>
    <script type="text/javascript">
	window.onload = function(){
		//本页面对应栏，下标由0起始,首页为0
        initSlide(0);
        //建立标签哈希表
        var tags = new hashTable();
        <?php
            foreach($taglist as $item) {
                echo 'tags.put("'.$item['name'].'","'.$item['ID'].'");';
            }
        ?>
        $('#addTags').bind('click',function() {
            var val = $('#addTagsInput').val();
            var id = tags.get(val);
            if(id==-1) {
                alert('暂时没有这个标签');
                $('#addTagsInput').val('').focus();
            }
            else {
                $('#nowTags').after('<li class="tags-list-item">'+val+'</li>');
                if(!$('#formTags').val()) {
                    $('#formTags').val(id);
                }
                else {
                    $('#formTags').val($('#formTags').val()+'|'+id);
                }
                $('#addTagsInput').val('').focus();
            }
        });
	};
	</script>
</body>
</html>
