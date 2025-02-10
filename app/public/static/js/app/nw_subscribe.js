var app = new Vue({
    el: '#nwSub',
    data: {
        emailAddr   : ''
    },
    mounted: function() {

    },
    methods: {
        subscribe: function() {
            var self = this

            var emailAddr  = self.emailAddr.toLowerCase();
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (emailAddr === '' || emailAddr === null) {
                Swal.fire("Error",'You have not entered any email address :-(','error')
                return false
            }
            if (emailPattern.test(emailAddr) === false) {
                Swal.fire("Error",'You have entered an invalid email address :-(','error')
                return false
            }
            else {
                var url = '/api/newsletter/subscribe'
                axios.post(url, {
                    email : self.emailAddr
                })
                .then(function (response) {
                    if (response.data.success === true) {
                        self.emailAddr       = ''
                        Swal.fire('Success!',response.data.message,'success')
                    }
                    else {
                        Swal.fire('Error!',response.data.message,'error')
                    }
                })
                .catch(function (error) {
                    Swal.fire(
                        'Error!','There was an error, please try again', 'error')
                    return false
                })
            }
        }

    } //methods end

})
