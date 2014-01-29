<?php
include_once('Controllers/menu.php');
?>
    <div id="nav">
		<a href="index.html" title="hci活动首页">
			<img width="240" height="100" src="public/images/box4.png"id="imgIndex">
		</a>
		<div class="menu">
			<div id="menuLabel" style="display:block; ">
				<span></span>
			</div>
			<ul id="menuList">
                <li>
                    <a href="index.php">首页</a>
                </li>
                <?php
                foreach($menus as $item) {
                    echo '<li>';
                    echo '<a href="index.php?t='.$item['ID'].'">'.$item['name'].'</a>';
                    echo '</li>';
                }
                ?>
			</ul>
		</div>
	</div>
