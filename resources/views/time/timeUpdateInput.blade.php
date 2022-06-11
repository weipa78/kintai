@extends('layouts.take')

@section('title', '出退勤記録更新フォーム')

@section('content')
<div class="timeTitleBox">
	<span class="timeTitle">出退勤記録更新フォーム</span>
</div>
<form name="form" class="time-index">
@csrf
    <table border="1" class="time-all">
    	<tr>
    		<th>年月</th>
    		<td class="alldata"><input type="text" name="yearMonth" value="{{$time->yearMonth}}" readonly></td>
    	</tr>
    	<tr>
    		<th>日</th>
    		<td class="alldata"><input type="text" name="day" value="{{$time->day}}" readonly></td>
    	<tr>
    		<th>開始時間</th>
    		<td class="alldata"><input type="text" name="start" value="{{$time->start}}"></td>
    	</tr>	
    	
    	<tr>	
    		<th>終了時間</th>
    		<td class="alldata"><input type="text" name="end" value="{{$time->end}}"></td>
    	</tr>	
    	
    	<tr>	
    		<th>休憩時間</th>
    		<td class="alldata"><input type="text" name="rest" value="{{$time->rest}}"></td>
    	</tr>	
    	
    	<tr>	
    		<th>実働時間</th>
    		<td class="alldata"><input type="text" name="total" value="{{$time->total}}"></td>
    	</tr>	
    	
    	<tr>	
    		<th>出勤区分</th>
    		<td class="alldata"><input type="text" name="divide" value="{{$time->divide}}"></td>
    	</tr>	
    	
    	<tr>	
    		<th>備考</th>
    		<td class="alldata"><input type="text" name="remarks" value="{{$time->remarks}}"></td>
    	</tr>

    </table>
<div class="updateBox">
	<button class="manageButton" name="update" value="" formaction="/timeUpdateConfirm" formmethod="post">確認</button>
</div>
</form>
@endsection