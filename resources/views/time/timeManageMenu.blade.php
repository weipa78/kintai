@extends('layouts.take')

@section('title', '出退勤登録入力フォーム')

@section('content')
<div class="timeTitleBox">
	<span class="timeTitle">出退勤登録</span>
</div>
<table border="1" class="time-all">
	<tr>
		<th>日</th>
		<th>開始時間</th>
		<th>終了時間</th>
		<th>休憩時間</th>
		<th>実働時間</th>
		<th>出勤区分</th>
		<th>備考</th>
	</tr>
	@foreach($times as $time)
		<tr>
			<td class="alldata">{{$time->day}}</td>
			<td class="alldata">{{$time->start}}</td>
			<td class="alldata">{{$time->end}}</td>
			<td class="alldata">{{$time->rest}}</td>
			<td class="alldata">{{$time->total}}</td>
			<td class="alldata">{{$time->divide}}</td>
			<td class="alldata">{{$time->remarks}}</td>
		</tr>
	@endforeach
</table>
@endsection
