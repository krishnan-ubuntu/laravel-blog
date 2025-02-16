
	<p align="right">
		<a href="{{ url('dashboard') }}">Dashboard</a> | 
		<a href="{{ url('categories/create') }}">Create Category</a> | <a href="{{ url('/') }}">View Blog</a> | 
		<a href="{{ url('logout') }}">Logout</a>
<h1 align="center">Blog Categories</h1>
<hr>
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Slug</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($categories as $category) { ?>
	      	<tr>
	      		<td>{{$category->name}}</td>
	      		<td>{{$category->slug}}</td>
		        <td>
		        	<a href="/posts/edit/<?php echo $category->slug;?>">
		        		<button class="btn btn-xs btn-primary">Edit</button>
		        	</a>
		        	<a href="/post/delete/<?php echo $category->post_id; ?>"><button class="btn btn-xs btn-danger">Delete</button></a>
		        </td>
	      	</tr>
	  	<?php }?>
    </tbody>
</table>