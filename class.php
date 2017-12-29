<?php  
class Xe
{
    public function mauXe($a)
    {
        echo "mau do";
    }
    public function kieuXe($b)
    {
        echo "toyota";
    }
}
class xeMay extends Xe
{
    function mauXe($a)
    {
        echo $a;
    }
}

 class xeOto extends Xe
 {
 	
 	function kieuXe($b){
 		echo $b;
 	}
 }
$b = new xeOto();
$b->kieuXe("xe fotune");
$a = new xeMay();
$a->mauXe("Mau do tham dep");//it will print Hello You
 
?>