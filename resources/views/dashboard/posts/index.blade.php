

@include("dashboard.posts.nav")
				<!-- Main -->
					<div id="main">

						<!-- Post -->
                        @foreach ($posts as $post)

                        <article class="post">
                            <header>
									<div class="title">
                                        <h2>{{ $post->title }}</h2>
										{{-- <p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p> --}}
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">{{ $post->created_at->format('F j, Y') }}</time>
										<a href="#" class="author"><span class="name">{{ $post->user->name }}</span></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src=" {{ asset("$post->image") }}" width="200px" height="400px" alt="" /></a>
								<p>{{ $post->content }}</p>
								<footer>
									
									<ul class="stats">
										<li><a href="#" class="icon solid fa-heart">28</a></li>
										<li><a href="{{ route("comment.show",$post->id) }}" class="icon solid fa-comment"></a></li>
									</ul>
								</footer>
							</article>
                            @endforeach
</pre>
								</section>
							</article>
					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
										</article>
								</div>
							</section>
					</section>
			</div>
		@include('dashboard.posts.footer')