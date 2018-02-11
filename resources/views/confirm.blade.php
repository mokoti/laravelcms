@extends('base')

@section('title')
{{ \Config::get('global.title.confirmpost') }}
@endsection

@section('content')

<h1>内容表示</h1>

<form class="post-form" method="POST" action="{{{ route('post.dash-board') }}}">
	{{ csrf_field() }}
    <div class="row">
        <div class="col-sm-12">
            <a href="/post/new" class="btn btn-primary" style="margin:20px;">フォームに戻る</a>
        </div>
    </div>

    <!-- table -->
    <table class="table table-striped">
        <tr><td>記事のタイトル</td><td><input type="text" readonly="readonly" name="headline" value="{{ $headline }}"></tr>
        <tr><td>記事本文</td><td><input type="text" readonly="readonly" name="text" value="{{ $text }}"></tr>
    </table>
    <button type="submit">投稿する</button>
</form>
@endsection

<script type="text/javascript">
	
</script>