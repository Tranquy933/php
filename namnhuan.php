<?php 
    if (isset($_POST['submit'])) 
    {
        $nhuan = $_POST['nhuan'];
        if ($nhuan%4 != 0) 
        {
            echo ' nam '.$nhuan.' khong nhuan';
        }
        else
        {
            if ($nhuan%400 == 0) {
                echo "nam ".$nhuan." la nhuan";
            }
            else
            {
                if ($nhuan%100==0) 
                {
                    echo "nam ".$nhuan." khong nhuan";
                }
                else
                {
                    echo "nam ".$nhuan." la nam nhuan";
                }
            }
        }
    }
 ?>

<!DOCTYPE>
<html>
    <body>
        <div class="nam_nhuan">
            <form method="POST">
                <label>Nhap nam :</label>
                <input type="text" name="nhuan" value="">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>         
    </body>
</html>