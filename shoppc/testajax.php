<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- dung ajax phai co jquery -->
	<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
</head>
<body>
	
<!-- dau tien phai tao trang de lay du lieu -->
<button id="btn">send using $.ajax()</button>
<button id="btn2">send using $.get()</button>
<button id="btn3">send using $.post()</button>

<span id="ketqua"></span>

<script type="text/javascript">
	$("#btn").click(function() {
		$.ajax({
			url: 'target.php',
			type: 'GET',// phuong thuc gui du lieu GET/POST
			// dataType: 'json', // kieu du lieu tra ve de minh xu li, nen de tu dong
			data: {param1: 'value1'}, // du lieu minh gui di den trang target.php
		})
		.done(function(val) { // khi gui du lieu va nhan lai thanh cong thi thuc hieen			
			// json = JSON.parse(val);  // 
			console.log(val);
		})
		.fail(function(err) {
			console.log(err);
		})
		.always(function() { // cai nay luon thuc hien du co gui va nhan thanh cong hay ko
			console.log("complete");
		});
		// day la ajax tong quat, no gom ca post va get. thuong thi su dung du lieu gui ve dang json, 
	});

	$("#btn2").click(function() {
		$.get('target.php?param1=send_by_get', function(data) {
			// console.log(data);
			// do ben php minh ko khu duoc dau ',' o cuoi cung nen minh se xu i o ben nay
			// console.log(typeof(data));
			var tmp = data[0].substr(0,data[0].length-2)+'}'; // bo di ki tu cuoi cung
			console.log(tmp);
			var json = $.parseJSON(tmp);
			console.log(json);
		});
	});
	$("#btn3").click(function(event) {
		$.post('target.php', {param1: 'send_by_Post'}, function(data, textStatus, xhr) {
			console.log(data);
		});
	});
	// cai post voi get no gan nhu nhau, chi khac moi cai truyen du lieu thoi
</script>
</body>
</html>