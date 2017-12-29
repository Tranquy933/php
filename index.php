<?php
    $nameErr = $phoneErr= $emailErr = $addErr = $optionErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $add = $_POST['address'];
        $option = $_POST['option'];

        if (empty($_POST['name'])) 
        {
            $nameErr = "Vui long nhap ten";
        }
        else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Vui long chi cho phep chu cai va khoang trong trang"; 
            }
        else
        {
            $name = $_POST['name'];
        }
        if (empty($_POST['phone'])) 
        {
            $phoneErr = "Vui long nhap so dien thoai";
        }
        else if (!preg_match('/^[0-9]+$/', $phone)) {
            $phoneErr = "Số điện thoại phải là số";
        }
        else
        {
            $phone = $_POST['phone'];
        }
        if (empty($_POST['email'])) 
        {
            $emailErr = "Vui long nhap dia chi mail";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Khong dung dinh dang mail"; 
            }
        else
        {
            $email = $_POST['email'];
        }
        if (empty($_POST['address'])) 
        {
            $addErr = "Vui long nhap email";
        }
        else
        {
            $email = $_POST['email'];
        }
        if (empty($_POST['option'])) 
        {
            $optionErr = "Vui long chon thanh pho";
        }
        else
        {
            $option = $_POST['option'];
        }
        $formdata = array(
                              'name'    =>  $_POST['name'],
                              'phone'   =>  $_POST['phone'],
                              'email'   =>  $_POST['email'],
                              'address' =>  $_POST['address'],
                              'option'  =>  $_POST['option']
            );
            $urlfile=dirname(__FILE__).'/new/ghi.txt';
            $arr_data = array();
            if (file_exists($urlfile)) {
                $value_txt = file_get_contents($urlfile);
                $arr_data = json_decode($value_txt, true);
                $number_arr_data = count($arr_data);
                $names = array();
                for ($i = 0; $i < $number_arr_data; $i++) { 
                    $names[] = $arr_data[$i]['name'];
                }
                if (in_array($formdata['name'],$names)==true) {
                    echo '<script language="javascript">alert("name đã tồn tại")</script>';
                }
                else{
                    $arr_data[] = $formdata;
                    $value_txt = json_encode($arr_data, JSON_PRETTY_PRINT);
                    file_put_contents($urlfile, $value_txt);
                }

            }
            setcookie('user',$value_txt, time() +3600);

            if(isset($_COOKIE['user']))
            {
                $value_txt=$_COOKIE['user'];
            }
            
        if ($nameErr == null && $phoneErr == null && $emailErr == null && $addErr == null && $optionErr == null && in_array($formdata['name'],$names)==false) 
        {
            echo "THANH CONG";
        }
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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="myName" name="name" value="<?php if(isset($name)) echo $name ?>">
                        <div class="help-inline text-danger"><?php  echo $nameErr; ?></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input class="form-control" type="text" name="phone" value="<?php if(isset($phone)) echo $phone ?>">
                        <div class="help-inline text-danger"><?php  echo $phoneErr; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control" type="text" name="email" value="<?php if(isset($email)) echo $email ?>">
                        <div class="help-inline text-danger"><?php  echo $emailErr; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input class="form-control" type="text" name="address" value="<?php if(isset($add)) echo $add ?>">
                        <div class="help-inline text-danger"><?php  echo $addErr; ?></div>
                    </div>
                        <label for="name">City</label>
                        <select name="option" class="form-control" >
                            <option value="">---Chon---</option>
                            <option value="Ha noi" <?php if(isset($option) && $option == 'Ha noi' ){ echo 'selected';}?>>Ha noi</option>
                            <option value="Phu tho" <?php if(isset($option) && $option == 'Phu tho'){ echo 'selected';}?>>Phu tho</option>
                            <option value="Da nang" <?php if(isset($option) && $option == 'Da nang'){ echo 'selected';}?>>Da nang</option>
                            
                        </select>
                        <div class="help-inline text-danger"><?php  echo $optionErr; ?></div>
                    <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-success btn-block btn-rounded z-depth-1 waves-effect waves-light" value="Submit"></input>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


