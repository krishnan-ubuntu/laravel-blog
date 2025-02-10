var app = new Vue({
    el: '#edit-post', 
    data: {
        blogTitle   : '', 
        blogSlug    : ''
    }, 
    mounted: function() {
        this.whenPageLoads()
    }, 
    methods: {
        whenPageLoads: function(event) {
            var self = this
            document.getElementById("blogSlug").readOnly = true;
            self.blogSlug = ''
            self.getBlogPostDetails()
        }, 
        updateBlogSlug: function() {
            var self = this

            var blogTitleLC     = self.blogTitle.toLowerCase();
            blogTitleLC         = blogTitleLC.replace(/[^a-zA-Z ]/g, "") //remove any special characters like ? ! etc
            var postTitleArr    = blogTitleLC.split(' ')
            self.blogSlug       = ''

            for (var i = 0; i < postTitleArr.length; i++) 
            {
                if (self.blogSlug === '') 
                {
                    self.blogSlug = postTitleArr[i]
                }
                else 
                {
                    self.blogSlug = self.blogSlug + '-' + postTitleArr[i]
                }
            }

            document.getElementById("blogSlug").readOnly = true;
             
        }

    } //methods end

})