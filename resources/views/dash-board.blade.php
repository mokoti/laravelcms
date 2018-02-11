
@extends('base')

@section('title')
{{ \Config::get('global.title.completepost') }}
@endsection
 
@section('content')

@if($success==='true')
投稿が保存されました	
@else
投稿に失敗しました
@endif

@endsection

