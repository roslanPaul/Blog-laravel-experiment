<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <title>Box Press</title>
    </head>
    <!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
		<header>
			<h1><a href="index.html">Box Press</a><span id="version">v1</span></h1>
			<nav>
				<ul>
					<li><a href="index.html" class="current">Home</a></li>
					<li><a href="#">News</a></li>
					<li><a href="#">Gallery</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</header>
		<div id="adbanner">
			<div id="ad">
				<a href="#"><p>Advertise Here</p></a>
			</div>
		</div>
		<div id="secwrapper">
			<section>
				foreach(categories as category)
					<table class="responsive">
						<tr>
							<h1>{!! $category->name !!}</h1>
						</tr>
						<tr>
							foreach($articles as $article)
							<article id="{{ $articles->id }}">
								<a href="#"><img src="{{ asset('$article->normal_img') }}" alt=""/></a>
								<img src="" alt="" id="featuredico"/>
								<h1>{!! $article->title !!}</h1>
								<p>{!! $article->content !!}</p>
								<p class="keywords">
									foreach(keywords as keyword)
										{!! $keywor
											d->word !!}
									endforeach
								</p>
								<a href="#" class="readmore">Read more</a>
							</article>
							endforeach
						</tr>
					</table>
				endforeach
			</section>
		</div>
		<footer>
			<p>Copyright &copy 2012 </p>
		</footer>
	</body>
</html>
    
    