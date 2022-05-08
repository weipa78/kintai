@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
<!--     <div class="row justify-content-center"> -->
<!--         <div class="col-md-8"> -->
<!--             <div class="card"> -->
<!--                 <div class="card-header">{{ __('Dashboard') }}</div> -->

<!--                 <div class="card-body"> -->
<!--                     @if (session('status')) -->
<!--                         <div class="alert alert-success" role="alert"> -->
<!--                             {{ session('status') }} -->
<!--                         </div> -->
<!--                     @endif -->

<!--                     {{ __('ログイン中') }} -->
<!--                 </div> -->
<!--             </div> -->
<!--         </div> -->
<!--     </div> -->
<!-- </div> -->
    @if (Auth::check())
    <p class="user">ユーザー：{{$user->name}}
    @endif
    <form action="/menu" method="get">
    	<button type="button" class="btn btn-success border m-5">勤怠管理メニューへ</button>
    </form>
@endsection
