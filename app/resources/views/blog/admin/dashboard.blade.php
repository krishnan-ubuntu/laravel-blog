<p align="right"><b>Welcome</b> <?php echo $user_full_name; ?> | <a href="{{ url('/') }}">View Blog</a> | <a href="{{ url('logout') }}">Logout</a></p>
<h1>Dashboard</h1>
<hr>
<ul>
	<p><a href="{{ url('categories') }}">Categories</a></p>
	<p><a href="{{ url('posts') }}">Posts</a></p>
	<p><a href="{{ url('/') }}">View Blog</a></p>
</ul>
