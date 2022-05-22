@extends('layouts.take')

@section('title', 'メニュー')

@section('content')
<div class="message1">
	<span class="msg1-span">【メニューのリンクを選択してください。】</span>
</div>
<ul class="all-menu">
	<li>社員登録：社員データ１件を新規登録します。</li>
	<li>出退勤登録：出勤・退勤（欠勤、遅刻、早退、有休を選択）を登録します。</li>
	<li>出退勤管理・照会：登録済の出退勤データを管理（更新・削除）、照会します。</li>
	<li>勤怠申請：各種の勤怠（欠勤、遅刻、早退、有休）を申請します。</li>
	<li>集計出力：登録済の勤怠データを集計し、帳票を出力します。</li>
</ul>
@endsection