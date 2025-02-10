	<p align="right"><a href="/dashboard">Dashboard</a> | 
		<a href="/categories">Blog Categories</a> | <a href="/logout">Logout</a></p>
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
			<form action="/categories/save" method="post">
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