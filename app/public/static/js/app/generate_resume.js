var app = new Vue({
    el: '#gen-resume',
    data: {
        userEmail: '',
        jobDesc: '',
        showLoadbackend: 'no',
        // Store it in a table
        // Make an entry in queue jobs table
        // A worker job will fetch it and send it to OpenAI and get the result and store it in a bucket and share link.
        // Notify er: 'no'
    },
    mounted: function() {

    },
    methods: {
        genResume: function() {
            var self = this
            Swal.fire("Info",'This feature is not yet ready. You can <a href="/connect-with-me">connect with me</a> by clicking on this link.','info')
            return false;
            if (self.userEmail === '' || self.userEmail === null) {
                Swal.fire("Error",'Please provide your email address','error')
                return false
            }
            var emailAddr  = self.userEmail.toLowerCase();
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (emailPattern.test(emailAddr) === false) {
                Swal.fire("Error",'You have entered an invalid email address, please provide a valid one','error')
                return false
            }
            else if(self.jobDesc === '' || self.jobDesc === null) {
                Swal.fire("Error",'Please provide the job description to generate resume','error')
                return false
            }
            Swal.fire("Error",'The resume generation feature is in progress. Please come back later.','error')
            return false
            /*
            Make an ajax call to send the JD to backend.
            Store it in a table
            Make an entry in queue jobs table
            A worker job will fetch it and send it to OpenAI and get the result and store it in a table and post to queue again
            Another worker will fetch it and build a pdf document and put the doc in a location and post to queue
            Another worker will fetch this pdf and upload to a bucket and delete file on disk and send the reply to the frontend. 
            */
        },
        xxx: function() {
            //delete below
        },
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
