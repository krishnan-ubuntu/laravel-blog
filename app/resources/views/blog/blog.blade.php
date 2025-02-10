<h2 align="center">Blog</h2>

<div class="container">
    <br>
    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-8">
            <?php if (!empty($posts)) { ?>
                    <?php foreach ($posts as $value) { ?>
                        <h5><a href="/post/<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></h5>
                        <p><small><?php echo Date('M d Y', strtotime($value->created)); ?></small></p>
                        <p></p>
                        <p><?php echo $value->snipet; ?></p>
                        <p align="right"><a href="/post/<?php echo $value->slug; ?>">Read more</a></p>
                        <br><br>
                    <?php } ?>
                <?php } ?>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        @include('blog.side_bar')
    </div>
</div>
<script>
    var input = document.getElementById("searchBox");

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function(event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    // Cancel the default action, if needed
    //event.preventDefault();
    alert('Working on search engine as we speak')
    // Trigger the button element with a click
    //document.getElementById("myBtn").click();
  }
});
</script>
