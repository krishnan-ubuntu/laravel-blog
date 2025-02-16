<h2 align="center">Blog Category - {{$category->name}}</h2>

<div class="container">
    <br>
    <div class="row">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          </ol>
        </nav>
        <div class="col-md-8">
            <?php if (!empty($posts)) { ?>
                <table class="table">
                    <tbody>
                        <?php foreach ($posts as $value) { ?>
                            <tr>
                                <td class="w-40"><font color="grey"><?php echo Date('M d Y', strtotime($value->created)); ?></font></td>
                                <td>|</td>
                                <td><a href="/post/<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></td>
                                <td>|</td>
                                <td><b>Written By:</b> {{$value->users->user_fname}} {{$value->users->user_lname}}</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
