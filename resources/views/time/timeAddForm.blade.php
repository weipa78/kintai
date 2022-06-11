@extends('layouts.take')

@section('title', '出退勤登録入力フォーム')

@section('content')
<div class="timeTitleBox">
	<span class="timeTitle">出退勤登録</span>
</div>

<form action="/time_registry_create" method="post">
@csrf
<div class="emp-regi">
	<table border="1">
		<tr><th>社員番号</th><td><input class="regi-table" type="text" name="id" value="{{$user->id}}" readonly></td></tr>
		<tr><th>入力年月</th><td><input class="regi-table" type="text" name="yearMonth" value="{{old('yearMonth')}}"></td></tr>
		<tr><th>日</th><td><input class="regi-table" type="text" name="day" value="{{old('day')}}"></td></tr>
		<tr><th>開始時間</th><td><input class="regi-table" type="text" name="start" value="{{old('start')}}"></td></tr>
		<tr><th>終了時間</th><td><input class="regi-table" type="text" name="end" value="{{old('end')}}"></td></tr>
		<tr><th>休憩</th><td><input class="regi-table" type="text" name="rest" value="{{old('rest')}}"></td></tr>
		<tr><th>実働時間</th><td><input class="regi-table" type="text" name="total" value="{{old('total')}}"></td></tr>
		<tr><th>区分</th><td><input class="regi-table" type="text" name="divide" value="{{old('divide')}}"></td></tr>
		<tr><th>備考</th><td><input class="regi-table" type="text" name="remarks" value="{{old('remarks')}}"></td></tr>
		<tr><th></th><td><button class="emp-registry-button"type="submit">登録</button></td></tr>
	</table>
</div>
</form>
<div class="divideMsgBox">
	<span class="divideMsg">※区分は数字で記載：1:出勤, 2:欠勤, 3:遅刻, 4:早退, 5:有休	</span>
</div>

<div class="timeRegistryMsgBox">
	<span class="timeRegistryMsg">{{$msg}}</span>
</div>

@endsection
