<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "shop";
	$ERROR1 = "Loi mysql";
	$ERROR2 = "Loi DB";
@mysql_connect($HOST, $USER, $PASS) or die($ERROR1);
@mysql_select_db($DB) or die($ERROR2);
mysql_query("SET NAMES 'utf8'");


$sql="SELECT * FROM loaisanpham";// cho minh ten nhom sp cai 
$result = mysql_query($sql);
$return='[{';
while($row = mysql_fetch_array($result))
{
	$id_loai_a=$row["id_loai"];$tenloai=$row["tenloaisp"];
	$return .= "$id_loai_a".":"."$tenloai,";
	// cho nay minh ko nho lam
	// um 
}
echo $return.'}]';
// sau khi ẫ chay, no se lay noi dung cua trang nay
// danh lam kieu nay vay
// trong lenh sql thi dem so dong du lieu lay duoc de loai bo dau ','
?>