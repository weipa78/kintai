<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<style>
/* 	* {
	outline: 1px solid red;
	} */
	body {
	border: 1px solid gray;
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
    .box {
    height: 0px;
    }
    .surplus {
    height: 570px;
    }
    a {
    text-decoration: none;
    }
    td {
    height: 40px;
    width: 160px;
    }
    table {
    border-collapse: collapse;
    background-color: #e0ffff;
    }
	</style>
</head>
<body>
    <div class="titleBox">
    	<a class="title" href="/">勤怠管理システム</a>
    	<span class="user">社員名：{{$user->name}}</span>
    </div>
    <div class="menu">
    	<table border="1" >
    		<tr><td><a href="#">社員登録</a></td></tr>
    		<tr><td><a href="#">出退勤登録</a></td></tr>
    		<tr><td><a href="#">出退勤照会</a></td></tr>
    		<tr><td><a href="#">勤怠申請</a></td></tr>
    		<tr><td><a href="#">集計出力</a></td></tr>
    		<tr><td class="surplus"><a href="#"></a></td></tr>
    	</table>
    </div>
    @yield('content')
</body>
</html>
