@extends('base')

@section('title')
{{ $title }}
@endsection

@section('content')

<form class="post-form" method="POST" action="{{{ route('post.confirm') }}}">
	{{ csrf_field() }}
	{{-- 記事タイトルフィールド --}}
	<div class="form-group">
		@if ($errors->has('title'))
		<div class="errors"><p>{{ $errors->first('title') }}</p></div>
		@endif	
		<label for="headline">記事タイトル</label>
		<input type="text" name="headline" value="{{ old('headline') }}">
	</div>
<!-- 	<div class="form-group">
		<label for="title">タグ</label>
		<input type="text" name="title" value="{{ old('name', 'test') }}">
	</div> -->
	<div class="form-group">
		<label for="text">内容</label>
		<textarea type="textarea" name="text" value="{{ old('text') }}"></textarea>
	</div>
	<div>
		<button type="submit">投稿する</button>
	</div>
</form>
@endsection

<script type="text/javascript">
	
</script>