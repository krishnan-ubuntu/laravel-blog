<style>
	textarea {
    	resize: none;
	}
</style>
<script src="{{ asset('static/js/lib/tinymce/tinymce.min.js') }}"></script>
<script>
	tinymce.init({
	    selector: 'textarea#blogContent',
	    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
	    imagetools_cors_hosts: ['picsum.photos'],
	    menubar: 'file edit view insert format tools table help',
	    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
	    toolbar_sticky: true,
	    autosave_ask_before_unload: true,
	    autosave_interval: "30s",
	    autosave_prefix: "{path}{query}-{id}-",
	    autosave_restore_when_empty: false,
	    autosave_retention: "2m",
	    image_advtab: true,
	    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
	    link_list: [
	        { title: 'My page 1', value: 'https://www.codexworld.com' },
	        { title: 'My page 2', value: 'https://www.xwebtools.com' }
	    ],
	    image_list: [
	        { title: 'My page 1', value: 'https://www.codexworld.com' },
	        { title: 'My page 2', value: 'https://www.xwebtools.com' }
	    ],
	    image_class_list: [
	        { title: 'None', value: '' },
	        { title: 'Responsive image', value: 'img-fluid' }
	    ],
	    importcss_append: true,
	    file_picker_callback: function (callback, value, meta) {
	        /* Provide file and text for the link dialog */
	        if (meta.filetype === 'file') {
	            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
	        }
	    
	        /* Provide image and alt text for the image dialog */
	        if (meta.filetype === 'image') {
	            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
	        }
	    
	        /* Provide alternative source and posted for the media dialog */
	        if (meta.filetype === 'media') {
	            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
	        }
	    },
	    templates: [
	        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
	        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
	        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
	    ],
	    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
	    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
	    height: 600,
	    image_caption: true,
	    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
	    noneditable_noneditable_class: "mceNonEditable",
	    toolbar_mode: 'sliding',
	    contextmenu: "link image imagetools table",
	});
</script>
	<p align="right"><a href="{{ url('dashboard') }}">Dashboard</a> | 
	<a href="{{ url('posts') }}">Blog Posts</a> | <a href="{{ url('/') }}">View Blog</a> | <a href="{{ url('logout') }}">Logout</a></p>
<h1 align="center">Create Blog Posts</h1>
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
			<form class="form-control" method="post" action="{{ url('posts/save') }}">
				@csrf
				<b>Title: </b><br>
				<input class="form-control" type="text" name="blogTitle" placeholder="Blog title" v-model="blogTitle" @change="updateBlogSlug">
				<br>
				<input class="form-control" type="text" id="blogSlug" name="blogSlug" v-model="blogSlug">
				<br>
				<b>Snippet: </b><br>
				<textarea class="form-control" rows="5" cols="10" name="blogSnippet" v-model="blogSnippet"></textarea>
				<br>
				<b>Post: </b><br>
				<textarea class="form-control" rows="15" cols="30" id="blogContent" name="blogContent"></textarea>
				<br>
				<select class="form-control" name="blogCat">
					<option value="">Select Category</option>
					<?php foreach ($categories as $value) { ?>
						<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
					<?php } ?>
				</select>
				<br>
				<button type="submit" class="btn btn-primary">Publish</button>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<script src="{{ asset('static/js/app/create_post.js') }}"></script>