
	<p align="right">
		<a href="/dashboard">Dashboard</a> | 
		<a href="/posts/create">Create Post</a> | 
		<a href="/logout">Logout</a></p>
<h1 align="center">Blog Posts</h1>
<hr>
<table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Written By</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($posts as $post) { ?>
	      	<tr>
	      		<td><a href="/post/<?php echo $post->slug;?>"><?php echo $post->title;?></a></td>
		        <td>
		        	<?php echo $post->user_fname.' '.$post->user_lname;?>
		        </td>
		        <td>
		        	<a href="/posts/edit/<?php echo $post->slug;?>">
		        		<button class="btn btn-xs btn-primary">Edit</button>
		        	</a>
		        	<a href="/post/delete/<?php echo $post->post_id; ?>"><button class="btn btn-xs btn-danger">Delete</button></a>
		        </td>
	      	</tr>
	  	<?php }?>
    </tbody>
</table>