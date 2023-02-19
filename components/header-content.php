<header>
	<div class="full-menu">
		<div class="container flex">
			<div class="header-logo">
					<img src="/wp-content/uploads/2022/12/logo.png" alt="rainbow logo">
			</div>
			<div id="hamburger">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div id="navigation">
					<?php
					$mds_menu_args = array('menu' => 'mainNav');
					wp_nav_menu($mds_menu_args);
					?>
			</div>
		</div>
	</div>
</header>