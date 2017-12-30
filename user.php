<?php 

	$urlfile = dirname(__FILE__).'/new/ghi.txt';
	if (file_exists($urlfile)) {
		$value_txt = file_get_contents($urlfile, FILE_USE_INCLUDE_PATH );
		$arr_data = json_decode($value_txt, true);
	}
 ?>


<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="wtext/html; charset=utf-8" />
    <title>form</title>
    <?php include(dirname(__FILE__).'/includes/inc_css_js.php'); ?>
    <style type="text/css">
    	td{
    		padding: 10px 30px;
    	}
    	th{
    		padding: 10px 30px;
    	}
    </style>
</head>
<body> 
	<div class="wrapper_content">
		<div class="container">
			<table class="table_user">
				<tr>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Addres</th>
					<th>City</th>
				</tr>
			<?php 
				foreach ($arr_data as $value) { ?>
				<tr>
					<td><?php echo $value['name'] ?></td>
					<td><?php echo $value['phone'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td><?php echo $value['address'] ?></td>
					<td><?php echo $value['option'] ?></td>
				</tr>
				<?php 
				}
			?>
			</table>
		</div>
	</div>
</body>
</html>
asdfasdasdasd