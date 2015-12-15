<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="javascript" src="../jquery-2.1.4.min.js" ></script>
        <script language="javascript" src="ajax.js" ></script>
        <style type="text/css">
		#loading {color: red; font-size: 20px; font-weight: bold; text-align: center;}
		.item{ height: 500px; border: solid 2px blue; background: #CCCCCC; line-height: 500px; color: blue; text-align: center;
				font-weight: bold; margin: 20px 0px;	}
		.hidden{display: none;}
		</style>

</head>
<body>
	<div class="content">
		<?php require ('data.php') ?>
	</div>
	<div id="loading" class="hidden">LOADING ...</div>
</body>
</html>