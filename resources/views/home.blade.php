
@extends('base')

@section('title')
{{ $title }}
@endsection
 
@section('content')

{{ $content }}

<!-- データベースからデータを取得して中身を表示する -->
@foreach ($posts as $key => $value)
<article class="link">
    <div class="eyecatch">
    <img src="{{ $value['thumnail'] }}">
    </div>
    <h2><a href="{{ $value['link'] }}">{{ $value['postname'] }}</a></h2>
    <div class="data">{{ $value['date'] }}</div>
</article>
@endforeach


@endsection