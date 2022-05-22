<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<style>
/*      * {
	outline: 1px solid red;
	}  */
	body {
	width: 
	border: 1px solid gray;
	}
	.box {
	border: 1px solid gray;
	}
	.bodySet {
	display: flex;
	}
	.menu {
	width: 160px;
	}
	.titleBox {
	background-color: #1e90ff;
	height: 70px;
	vertical-align: text-bottom;
	}
	.title {
	font-size: 30px;
	margin-left: 40px;
	text-decoration: none;
	color: black;
	}
	.user {
	font-size: 20px;
	float: right;
	vertical-align: text-bottom;
	}
	.menu ul{ 
    margin: 0; 
    padding: 0; 
    list-style: none; 
    }
    .menu li{ 
    display: inline; 
    padding: 0; 
    margin: 0; 
    }
    .menu li a{
    display: block; 
    border-top: 1px solid #9F99A3;
    border-left: 1px solid #9F99A3;
    border-right: 1px solid #9F99A3;
    background-color: #e0ffff;
    padding: 3px 10px;
    text-decoration: none;
    color: #333;
    width: 200px; 
    height: 40px;
    margin: 0px;
    text-align: left;
    font-size: 20px;
    }
    .menu li a:hover{
    border-top: 1px solid #8593A9;
    border-left: 1px solid #8593A9;
    border-right: 1px solid #8593A9;
    background-color: #9EB7DD;
    }
    .menu #shita li a{
    display: block; 
    border-left: 1px solid #9F99A3;
    border-right: 1px solid #9F99A3;
    border-bottom: 1px solid #9F99A3;
    background-color: #EEEEEE;
    padding:padding: 3px 10px;
    text-decoration: none;
    color: #333;
    width: 150px; 
    margin: 0px;
    text-align: left;
    font-size: 14px;
    }
    .menu #shita li a:hover{
    border-left: 1px solid #8593A9;
    border-right: 1px solid #8593A9;
    border-bottom: 1px solid #8593A9;
    background-color: #9EB7DD;
    }
    .box1 {
    height: 0px;
    width: 100%;
    }
    .surplus {
    height: 560px;
    }
    a {
    text-decoration: none;
    }
    td {
    height: 40px;
    width: 160px;
    }
    div > table {
    border-collapse: collapse;
    background-color: #e0ffff;
    }
    form > table {
    border-collapse: collapse;
    text-align: center;
    }
    form {
    text-align: center;
    }
    .empTitleBox {
    height: 30px;
    margin: 20px;
    }
    .empTitle {
    font-size: 23px;
    }
    /* index */
    .msg1-span {
    font-size: 40px;
    font-weight: bold; 
    }
    .message1 {
    width: 800px;
    }
    ul.all-menu li{
    font-size: 20px;
    margin: 20px 0px 20px 0px;
    }
    /* emp_registry */
    .emp-regi {
    margin-left: 100px;
    }
    table th {
    text-align: left;
    }
    table td {
    width: 250px;
    }
    .regi-table {
    width: 250px;
    height: 30px;
    }
    .emp-registry-button {
    width: 260px;
    height: 36px;
    font-weight: bold;
    }
    .empAllBox {
    height: 40px;
    margin: 60px 0 0 20px;
    }
    .empAll {
    font-size: 23px;
    }
    .employee-all {
    width: 80%;
    margin: 10px 0 0 100px;
    }
    .alldata {
    background-color: white;
    }
/*     出退勤登録入力フォーム：time/index.blade.php */
    .time-all {
    width: 80%
    }
    
    
    
/*     出退勤管理/照会メニュー：time/timeManageMenu.blade.php */
    





    </style>
</head>
<body>
	<div class="box">
        <div class="titleBox">
        	<a class="title" href="/">勤怠管理システム</a>
        	<span class="user">社員名：{{$user->name}}</span>
        </div>
        <div class="bodySet">
        	<div class="menu">
            	<table border="1" >
            		<tr><td><a href="/emp_registry_form">社員登録</a></td></tr>
            		<tr><td><a href="/time_registry">出退勤登録</a></td></tr>
            		<tr><td><a href="/time_manage">出退勤<br>管理/照会</a></td></tr>
            		<tr><td><a href="#">勤怠申請</a></td></tr>
            		<tr><td><a href="#">集計出力</a></td></tr>
            		<tr><td class="surplus"><a href="#"></a></td></tr>
            	</table>
        	</div>
        	<div>
        		@yield('content')
        	</div>
        </div>
	</div>
</body>
</html>
