@extends('layouts.take')

@section('title', '社員登録入力フォーム')

@section('content')
<div class="empTitleBox">
	<span class="empTitle">社員登録</span>
</div>

<form action="/emp_registry" method="post">
@csrf
<div class="emp-regi">
	<table border="1">
		<tr><th>社員名（漢字）</th><td><input class="regi-table" type="text" name="name" value="{{old('name')}}"></td></tr>
		<tr><th>社員名（フリガナ）</th><td><input class="regi-table" type="text" name="hurigana" value="{{old('hurigana')}}"></td></tr>
		<tr><th>性別</th><td><input class="regi-table" type="text" name="gender" value="{{old('gender')}}"></td></tr>
		<tr><th>生年月日</th><td><input class="regi-table" type="date" name="birth" value="{{old('birth')}}"></td></tr>
		<tr><th>年齢</th><td><input class="regi-table" type="text" name="age" value="{{old('age')}}"></td></tr>
		<tr><th>郵便番号</th><td><input class="regi-table" type="text" name="postNo" value="{{old('postNo')}}"></td></tr>
		<tr><th>住所</th><td><input class="regi-table" type="text" name="address" value="{{old('address')}}"></td></tr>
		<tr><th>電話番号</th><td><input class="regi-table" type="text" name="tel" value="{{old('tel')}}"></td></tr>
		<tr><th>メールアドレス</th><td><input class="regi-table" type="email" name="mail" value="{{old('mail')}}"></td></tr>
		<tr><th></th><td><button class="emp-registry-button"type="submit">登録</button></td></tr>
	</table>
</div>
</form>

<div class="empAllBox">
	<span class="empAll">社員一覧</span>
</div>
<table border="1" class="employee-all">
	<tr>
		<th>社員番号</th>
		<th>社員名</th>
		<th>社員名(フリガナ)</th>
		<th>性別</th>
	</tr>
	@foreach($employees as $employee)
		<tr>
			<td class="alldata">{{$employee->employeeId}}</td>
			<td class="alldata">{{$employee->employeeName}}</td>
			<td class="alldata">{{$employee->employeeFurigana}}</td>
			<td class="alldata">{{$employee->employeeGender}}</td>
		</tr>
	@endforeach
</table>
@endsection