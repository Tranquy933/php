<?php 
	$arr = [];
	$aArray = [];
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$core = $_POST['core'];
		// $str = $id . " " . $name. " " .$core;
		// $explode = explode(' ', $str);
		$aArray = array(
						'id'=>$id,
						'name'=>$name,
						'core'=>$core
					);
		$arr[] = $aArray;

	function nameArray($arr,$key)
	{
		$array = [];
		foreach ($arr as $value) {
			foreach ($value as $k => $item) {
				if ($k == $key) {
					$array[] = $item;
				}
			}
		}
		return $array;
	}
	print_r(nameArray($arr,"core"));
}
 ?>

 <!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="wtext/html; charset=utf-8" />
    <title>form</title>
    <?php include('includes/inc_css_js.php'); ?>
</head>
<body>         
    <div class="container">
        <div class="col-md-5">
            <div class="form-area">  
                <form role="form" method="POST">
                    <br style="clear:both">
                    <h3 class="green-text mb-5 mt-4 font-bold" >User</h3>
                    <div class="form-group">
                        <label for="name">id</label>
                        <input type="text" class="form-control" " name="id" value="<?php if(isset($id)) echo $id ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control"  name="name" value="<?php if(isset($name)) echo $name ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">core</label>
                        <input type="text" class="form-control"  name="core" value="<?php if(isset($core)) echo $core ?>">
                    </div>
                    <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-success btn-block btn-rounded z-depth-1 waves-effect waves-light" value="Submit"></input>
                 </form>
             </div>
         </div>
     </div>