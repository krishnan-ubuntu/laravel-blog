<h2 align="center">{{$post->title}}</h2>

<div class="container">
    <br>
    <div class="row">
    	<!-- <nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
		    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
		  </ol>
		</nav> -->
        <div class="col-md-1">
            @if($logged_in === 'yes')
            <p><a href="">Edit</a></p>
            <p><button class="btn btn-sm btn-danger">Delete</button></p>
            <p><button class="btn btn-sm btn-warning">Unpublish</button></p>
            @endif
        </div>
        <div class="col-md-10">
            <p><small><i>Published On: <font color="grey"><?php echo Date('M d Y', strtotime($post->created)); ?></font></i></small><br>
                <small><i>Written By: {{$post->users->user_fname}} {{$post->users->user_lname}}</i></small><br>
                <small><i>Category: <a href="/category/posts/{{$post->categories->slug}}">{{$post->categories->name}}</a></i></small>
            </p>
            <br>
            <div>
            	{!!$post->content!!}
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
