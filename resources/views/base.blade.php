<!DOCTYPE html>

<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width">

<title>@yield('title')</title>
<!-- <meta name="description" content="IT系デザイナーのスズキアユミによるメモ的なブログの第2章。デザイン歴6年目ならではの等身大のメモをお届けします。"> -->

<!-- <link rel="shortcut icon" type="image/x-icon" href="https://designmemo.jp/images/favicon.ico"> -->
<!-- <link rel="apple-touch-icon" sizes="180x180" href="https://designmemo.jp/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://designmemo.jp/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://designmemo.jp/images/favicon-16x16.png"> -->

<!-- <meta property="og:title" content="デザインメモ 2.0 | デザインの未来を、もっと楽しく。">
<meta property="og:type" content="website">
<meta property="og:url" content="https://designmemo.jp/">
<meta property="og:image" content="https://designmemo.jp/images/ogpimage.jpg">
<meta property="og:site_name" content="デザインメモ 2.0">
<meta property="og:description" content="デザインの制作から働き方まで。現役Webデザイナーのスズキアユミならではの等身大の視点から、デザインやデザインに関わる人々の未来をもっと楽しくする、最新トレンドを踏まえたお役立ち情報やコラムをお届けしています。">
<meta property="fb:app_id" content="1402594716491461"> -->

<!-- <meta name="twitter:card" content="summary_large_image"> -->

<link rel="stylesheet" href="css">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/index.css">
<!-- <link rel="stylesheet" href="css/animsition.min.css"> -->

<script async="" src="analytics.js"></script><script src="jquery.min.js"></script>
<script>
window.jQuery || document.write(‘<script src="js/jquery.min.js"><\/script>’)
</script>
<!-- <script src="animsition.min.js"></script> -->

<!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98476770-1', 'auto');
  ga('send', 'pageview');

</script> -->
<!-- <link rel="stylesheet" href="messenger.css"></head> -->

<body>

<header>
    <h1><a href="https://designmemo.jp/"><img src="logo.svg" width="180" height="22" alt="test"></a></h1>
    <nav class="clearfix">
    <a href="https://designmemo.jp/archive.html" class="nav-left"><img src=".//icon_archive_white.svg" width="20" height="20" alt="Archive"></a>
    <a href="https://designmemo.jp/about.html" class="nav-right"><img src=".//icon_user.svg" width="20" height="20" alt="About"></a>
    </nav>
</header>

<div class="animsition" style="animation-duration: 1500ms; opacity: 1;">

<main>

<div class="container">
    @yield('content')
</div>

</main>

</div>

<footer>
<ul class="pagenation">
    <li><a href="https://designmemo.jp/page2.html">← Prev</a></li>
    <li class="number">PAGE 1</li>
    <li><a href="/">Next →</a></li>
  </ul>
</footer>

<script>
$('article.link').click(function() {
location.href = $(this).find('a').attr('href');
});
</script>

<script>
$(document).ready(function() {
  $(".animsition").animsition({
    inClass: 'fade-in',
    outClass: 'fade-out',
  });
});
</script>

<!-- <script src="T58LCCX5JG58LDD5RS.js" async=""></script> -->



<!-- <script async="" src="messenger.js"></script><div id="Smallchat"><iframe data-reactroot="" style="width: 100px; height: 94px; z-index: 999999999; position: fixed; top: auto; left: auto; right: 0px; bottom: 0px; border: 0px; margin: 0px; padding: 0px; background: none; transition: width 200ms cubic-bezier(0.25, 0.25, 0.5, 1), height 200ms cubic-bezier(0.25, 0.25, 0.5, 1);" src=".//saved_resource.html"></iframe></div></body></html> -->