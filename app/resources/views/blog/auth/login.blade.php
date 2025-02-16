<h2 align="center">Login</h2>

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <form class="form-control" method="post" action="{{ url('auth') }}">
                @csrf
                <input class="form-control" type="text" name="username" placeholder="Username"><br>
                <input class="form-control" type="password" name="password" placeholder="Password"><br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        <br><br>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        <br><br>
    @endif
</div>
