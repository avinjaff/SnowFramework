<html>
	<head>
		<title><?php echo $title ?></title>
		<?php include 'desktop_static_head.php' ?>
	</head>
	<body>
		<header>
			<h2>
				<?php echo $title?>
				<img src="/logo" />
			</h2>
		</header>
		<div>
			<?php include $content;?>
		</div>
		<footer>
			<h4>
					I dont know what to say here.
			</h4>
		</footer>
	</body>
	<?php include 'desktop_static_end.php' ?>	
</html>