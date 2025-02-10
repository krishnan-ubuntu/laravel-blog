<div class="col-md-3">
            <p>
                <input type="text"  class="form-control" name="" id="searchBox" placeholder="Search this blog">
            </p>
            <br>
            <h5>Categories</h5>
            <ul>
                <?php foreach ($categories as $value) { ?>
                    <li><a href="/category/posts/{{$value->slug}}">{{$value->name}}</a></li>
                <?php } ?>
            </ul>
            <hr>
            <h6>Meta Links</h6>
            @if($logged_in === 'yes')
            <p><a href="/dashboard">Dashboard</a></p>
            <p><a href="/logout">Logout</a></p>
            @else
            <p><a href="/login">Login</a></p>
            @endif
        </div>