<?php

	if (isset($key) && $key == "hhdsfs1263z") {

 ?>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Мой <b>Блог</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<div class="d-flex align-items-center main-profile-link">
			<a href="profile.php">
				<i class="fa fa-user" aria-hidden="true"></i>&nbsp;
				<span>@<?php echo $_SESSION['username']; ?></span>
			</a>
		</div>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
			</div>
			<ul id="navList">
				<li>
					<a href="users.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Пользователи</span>
					</a>
				</li>
				<li>
					<a href="post.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
						<span>Посты</span>
					</a>
				</li>
				<li>
					<a href="category.php">
						<i class="fa fa-window-restore" aria-hidden="true"></i>
						<span>Категории</span>
					</a>
				</li>
				<li>
					<a href="comment.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Комментарии</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Настройки</span>
					</a>
				</li>
				<li>
					<a href="../logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Выйти</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">

<?php
	}
 ?>