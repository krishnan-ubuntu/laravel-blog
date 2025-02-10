<h2 align="center">Blog Posts - {{$category_name}}</h2>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-8">
            <?php if (!empty($posts)) { ?>
                <table class="table">
                    <tbody>
                        <?php foreach ($posts as $value) { ?>
                            <tr>
                                <td class="w-40"><font color="grey"><?php echo Date('M d Y', strtotime($value->created)); ?></font></td>
                                <td>|</td>
                                <td><a href="/post/<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
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