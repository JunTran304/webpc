        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <script language="javascript" src="js/jquery.min.js"></script>
        <script language="javascript" src="js/bootstrap.min.js"></script>
<?php


// dựa vào key error để nhận biết có lỗi hay không
$errors = array(
    'error' => 0
);

// LẤY THÔNG TIN
$user   = isset($_POST['user']) ? trim($_POST['user']) : '';
$password   = isset($_POST['password']) ? trim($_POST['password']) : '';
$email      = isset($_POST['email'])    ? trim($_POST['email'])    : '';
$Diachi   = isset($_POST['Diachi']) ? trim($_POST['Diachi']) : '';
$Dienthoai = isset($_POST['Dienthoai']) ? trim($_POST['Dienthoai']) : '';
$hoten   =  isset($_POST['hoten']) ? trim($_POST['hoten']) : '';
//  VALIATE THÔNG TIN ĐƠN GIẢN
if (empty($user)){
    $errors['user'] = 'Bạn chưa nhập tên đăng nhập';
}

if (empty($password)){
    $errors['password'] = 'Bạn chưa nhập mật khẩu';
}

if (empty($email)){
    $errors['email'] = 'Bạn chưa nhập Email';
}

if (empty($hoten)){
    $errors['hoten'] = 'Bạn chưa nhập Họ tên';
}



//KIỂM TRA CÓ LỖI KHÔNG, NẾU CÓ LỖI THÌ TRẢ VỀ LUÔN, CÒN KHÔNG THÌ TIẾP TỤC KIỂM TRA
if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
}


//  KẾT NỐI CSDL VÀ KIỂM TRA THÔNG TIN
$conn = mysqli_connect('localhost', 'root', '', 'shop');
if (!$conn){
    $errors['connect_db'] = 'Không thể kết nối đến database';
}

$user = addslashes($user);
$email = addslashes($email);

$sql = "SELECT * "
        . "FROM thanhvien "
        . "WHERE user='".addslashes($user)."' "
                . "OR email='".addslashes($email)."'";

$result = mysqli_query($conn, $sql);
// chay roi day nhung ma sai nhap r ma van k thay
if (!$result){
    $errors['sql_db'] = mysqli_error($conn);
}
mysqli_set_charset($conn, "utf8");
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    if ($row['user'] == $user){
        $errors['user'] = 'Tên đăng nhập đã tồn tại';
    }
    if ($row['email'] == $email){
        $errors['email'] = 'Email đã tồn tại';
    }
}

// TRẢ KẾT QUẢ VỀ NẾU CÓ LỖI
if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
}

// LƯU VÀO CSDL
$sql = "INSERT INTO thanhvien(`user`, `hoten`,`pass`, `email`, `Diachi` , `dienthoai`,`hieuluc`,`capquyen`)".
        " VALUES('".addslashes($user)."','".addslashes($hoten)."','".addslashes($password)."','".addslashes($email)."','".addslashes($Diachi)."','".addslashes($Dienthoai)."','".addslashes(1)."','".addslashes(3)."');";
if (!mysqli_query($conn, $sql)){
    $errors['error'] = 1;
    $errors['sql_db'] = mysqli_error($conn); //'Lỗi câu truy vấn SQL 2';
} /// dung roi con j nhung ma van sai

// Trả kết quả cuối cùng
die (json_encode($errors));
// hinh nhu con 1 cai set header nua
// chac vay nen k thay chay. the nay neu chay thi loi font tv.
//k loi dau chi thieu js vs bootstrap. 
// cai ket qua ghi vao csdl kia
// sua ho t phat. 
// cai cho nay minh lam lau roi, h ko nho 
// :))
// ua the thoi// thu chay di k chay dc :)))
// ??? n k ket noi gui di k gui dc
// mo web minh xem nao
?>
