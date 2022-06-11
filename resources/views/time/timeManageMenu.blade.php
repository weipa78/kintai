@extends('layouts.take')

@section('title', '出退勤登録入力フォーム')

@section('content')
<div class="timeTitleBox">
	<span class="timeTitle">出退勤登録</span>
</div>
<form name="form" class="time-index">
@csrf
    <table border="1" class="time-all">
    	<tr>
    		<th>選択</th>
    		<th>年月</th>
    		<th>日</th>
    		<th>開始時間</th>
    		<th>終了時間</th>
    		<th>休憩時間</th>
    		<th>実働時間</th>
    		<th>出勤区分</th>
    		<th>備考</th>
    	</tr>
    	@foreach($times as $time)
    		<input type="hidden" name="yearMonth" value="{{$time->yearMonth}}">
    		<tr>
    			<td class="alldata"><input type="radio" name="day" value="{{$time->day}}"></td>
    			<td class="alldata">{{$time->yearMonth}}</td>
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
<div class="updateBox">
	<button class="manageButton" name="update" value="" formaction="/timeUpdateInput" formmethod="post">更新</button>
	<button class="manageButton" name="delete" value="" formaction="/timeDeleteConfirm" formmethod="post">削除</button>
</div>
</form>
@endsection
