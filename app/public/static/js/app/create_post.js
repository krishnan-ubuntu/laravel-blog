var app = new Vue({
    el: '#create-post', 
    data: {
        blogTitle: '', 
        blogSlug: '', 
        blogSnippet: ''
    }, 
    mounted: function() {
        this.whenPageLoads()
    }, 
    methods: {
        whenPageLoads: function(event) {
            document.getElementById("blogSlug").readOnly = true;
        }, 
        updateBlogSlug: function() {
            var self = this

            var blogTitleLC     = self.blogTitle.toLowerCase();
            blogTitleLC         = blogTitleLC.replace(/[^a-zA-Z0-9 ]/g, "") //remove any special characters like ? ! etc
            var postTitleArr    = blogTitleLC.split(' ')
            self.blogSlug       = ''

            for (var i = 0; i < postTitleArr.length; i++) 
            {
                if (self.blogSlug === '') {
                    self.blogSlug = postTitleArr[i]
                }
                else {
                    self.blogSlug = self.blogSlug + '-' + postTitleArr[i]
                }
            }

            document.getElementById("blogSlug").readOnly = true;
             
        }

    } //methods end

})