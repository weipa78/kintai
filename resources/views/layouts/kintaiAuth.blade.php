<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<style>
	.header {
	display: flex;
	}
	.touroku {
	display: flex;
	margin: 30px 0px 0px auto;
	}
	a {
	text-decoration: none;
	}
	h1 {
	margin-left: 30px; 
	}
	.loginBox {
	margin-right: 50px; 
	}
	.logoutBox {
	margin-right: 50px; 
	}
	.registerBox {
	margin-right: 20px; 
	}
	p {
	font-size: 30px;
	text-align:center
	}
	table {
	text-align:center
	}
	.box {
	text-align: center;
	border: 2px solid gray;
	width: 550px;
	height: 300px;
	}
	.passSet, .mailSet {
	display: flex;
	}
	
	</style>
</head>
<body>
    <div class="header">
    <h1>勤怠管理</h1>
    	<div class="touroku">
    	@if (Auth::check())
          	<div class="logoutBox">
   				<a href="/logout">ログアウト</a>
   			</div>
       @else
        	<div class="loginBox">
        		<a href="/login">ログイン</a>
        	</div>     
       @endif
        	<div class="registerBox">
        		<a href="/register">登録</a>
        	</div>
        </div>
    </div>
    <hr size="1">
    @if (Auth::check())
    	<p>ユーザー認証　{{$user->name . '(' . $user->email . ')'}}<p>
    @else
    	<p>ユーザー認証<p>
    @endif
    @yield('content')
</body>
</html>