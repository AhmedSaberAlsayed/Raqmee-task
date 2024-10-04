<!DOCTYPE HTML>

<html>
	<head>
		<title>Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset("ss/assets/css/main.css") }}" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                        <li><a href="{{route("dashboard.posts.index")}}">Home page</a></li>
						<nav class="links">
							<ul>
								<li><a href="{{ route("dashboard.posts.show") }}">my posts page</a></li>
								<li><a href="{{ url("/profile") }}">Profile page</a></li>
								<li><a href="{{ route("post.create") }}">create post page</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="{{ route('posts.search') }}">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
                <section id="menu">

                    <!-- Search -->
                        <section>
                            <form class="search" method="get" action="{{ route('posts.search') }}">
                                <input type="text" name="query" placeholder="Search" />
                            </form>
                        </section>

                    <!-- Links -->
                        <section>
                            <ul class="links">

                                <li>
                                    <a href="{{route("dashboard.posts.index")}}">
                                        <h3>Home page</h3>
                                        {{-- <p>Sed vitae justo condimentum</p> --}}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url("/profile") }}">
                                        <h3>Profile page</h3>
                                        {{-- <p>Feugiat tempus veroeros dolor</p> --}}
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="{{ route("dashboard.posts.show") }}">
                                        <h3>my posts page</h3>
                                        {{-- <p>Phasellus sed ultricies mi congue</p> --}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route("post.create") }}">
                                        <h3>create post page</h3>
                                        {{-- <p>Porta lectus amet ultricies</p> --}}
                                    </a>
                                </li>
                            </ul>
                        </section>

                    <!-- Actions -->
                        <section>
                            <ul class="actions stacked">
                            </ul>
                        </section>

                </section>

                