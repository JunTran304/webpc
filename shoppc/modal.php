<!DOCTYPE HTML>
<html>
    <head>
        <title>Bootstrap Validation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <script language="javascript" src="js/jquery.min.js"></script>
        <script language="javascript" src="js/bootstrap.min.js"></script>

        <style>
            .row{
                margin-bottom: 10px;
            }
        </style>
        <script language="javascript">
            $(document).ready(function(){
                // Khi người dùng click Đăng ký
                $('#register-btn').click(function(){
                    
                   
                    $.ajax({
                        type : "post",
                        dataType : "JSON",
                        url : "register.php",
                        data : {
                            user        : $('#user').val(),
                            hoten       : $('#hoten').val(),
                            password    : $('#password').val(),
                            email       : $('#email').val(),
                            Diachi      : $('#Diachi').val(),
                            Dienthoai   : $('#Dienthoai').val()                        
                        },
                        success : function(result)
                        {
                           
                            if (result.hasOwnProperty('error') && result.error == '1'){
                                var html = '';

                                // Lặp qua các key và xử lý nối lỗi
                                $.each(result, function(key, item){
                                    if (key != 'error'){ 
                                        html += '<li>'+item+'</li>';
                                    }
                                });
                                $('.alert-danger').html(html).removeClass('hide');
                                $('.alert-success').addClass('hide');
                            }
                            else{ 
                                $('.alert-success').html('Đăng ký thành công!').removeClass('hide');
                                $('.alert-danger').addClass('hide');

                               
                                setTimeout(function(){
                                    $('#myModal').modal('hide');
                                    $('.alert-danger').addClass('hide');
                                    $('.alert-success').addClass('hide');
                                }, 4000);
                            }
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
<!--         <div class="container">
            <!-- Button -->
            <!-- <button class="btn custombtn" data-toggle="modal" data-target="#myModal">Đăng Ký</button> -->

            <!-- Modal -->
            <!-- <div id="myModal" class="modal fade" role="dialog"> -->
                <!-- <div class="modal-dialog"> -->

                    <!-- Modal content-->
                    <!-- <div style="float:top"> -->
                        <!-- <div class="modal-header"> -->
                  <!--           <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">User</div>
                                <div class="col-md-7">
                                    <input type="text" id="User" />
                                </div>
                   -->      <!--     </div>
                            <div class="row">
                                <div class="col-md-5">Họ tên</div>
                                <div class="col-md-7">
                                    <input type="text" id="hoten" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Password</div>
                                <div class="col-md-7">
                                    <input type="text" id="password" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Email</div>
                                <div class="col-md-7">
                                    <input type="text" id="email" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Địa Chỉ</div>
                                <div class="col-md-7">
                                    <input type="text" id="Diachi" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">Điện Thoại</div>
                                <div class="col-md-7">
                                    <input type="text" id="Dienthoai" />
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger hide">

                        </div>
                        <div class="alert alert-success hide">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="register-btn">Đăng ký</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div> -->
                <!-- </div> -->
            <!-- </div> -->
       <!--  </div> --> 
       <form>
        <table width="560" cellspacing="0" cellpadding="0" bordercolordark="#FFFFFF" style="border:1px solid #CCC;">
          <tr>
            <td height="35" colspan="2" align="center" class="tieude"><div align="center">ĐĂNG KÝ THÀNH VIÊN</div></td>
          </tr>
          <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">  
            <td height="50" style="padding-left:70px"><div align="left" style="width:120px">Tên đăng nhập:</div></td>
            <td width="405" style="padding-left:15px" align="left">
                <input type="text" name="user" id="user" style="width:220px" value="<?php echo "$user"; ?>" onBlur="process()" />   
                <font color="#FF0000">* </font>
                <div id="kqkiemtra" style="color:#ff0000;"></div>
              </td>            
          </tr>
          <tr onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Mật khẩu:</div></td>
            <td width="405" style="padding-left:15px">
              <div align="left">
                <input type="password" name="pass" id="password"  style="width:220px" />
              <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">  
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Nhập lại mật khẩu:</div></td>
            <td width="405" style="padding-left:15px">
              <div align="left">
                <input type="password" name="apass" style="width:220px"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Họ tên:</div></td>
            <td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="hoten" id="hoten" style="width:220px" value="<?php echo "$hoten"; ?>"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Email:</div></td>
            <td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="email" id="email" style="width:220px" value="<?php echo "$email"; ?>"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">   
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Địa chỉ:</div></td>
            <td width="405" style="padding-left:15px" valign="top" align="left">              
                <textarea name="diachi" id="Diachi" rows="6" style="width:220px"><?php echo "$diachi"; ?></textarea>
              <font color="#FF0000">*              <input type="text" name="anti" style="width:1px"></font></td>            
          </tr>       
          <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Điện thoại:<span style="padding-left:15px">

            </span></div></td>
            <td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="dienthoai" id="Dienthoai" style="width:220px" value="<?php echo "$dienthoai"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>

          <tr>
            <td height="35" colspan="2" align="center"  >
              <div align="center">
                <input type="button" value="Đăng ký" id="register-btn" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >
                <input type="reset" value="Nhập lại" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >  
            <input type="hidden" name="act"/>
            </div></td>
          </tr>
          <tr><td>
              <div class="alert-danger hide">
              </div>
              <div class="alert-success hide">
              </div>
            </td></tr>
        </table>
    </form>
    </body>
</html>


