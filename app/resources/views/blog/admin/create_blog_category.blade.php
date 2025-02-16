	<p align="right">
			<a href="{{ url('dashboard') }}">Dashboard</a> | 
		<a href="{{ url('categories') }}">Categories</a> | <a href="{{ url('/') }}">View Blog</a> | 
		<a href="{{ url('logout') }}">Logout</a>
<h1 align="center">Create Category</h1>
<hr>
<div id="create-post">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			@if(session('success'))
			<div class="alert alert-success" role="alert">
				{{session('success')}}
			</div>
			@elseif(session()->has('error'))
	        <div class="alert alert-danger">
	            {{session('error')}}
	        </div>
			@endif
			<form class="form-control" method="post" action="{{ url('categories/save') }}">
				@csrf
				<b>Name: </b><br>
				<input class="form-control" type="text" name="catName" placeholder="Category Name" v-model="blogTitle" @change="updateBlogSlug">
				<br>
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>