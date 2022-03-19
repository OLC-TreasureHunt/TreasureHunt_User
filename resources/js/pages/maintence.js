import axios from "axios";

var base = new Vue({
    el: '#app',
    components: {
    },
    data() {
        return {
            nockMaintence: null,
        }
    },
    mounted: function () {
        this.nockMaintence = setInterval(this.nockServer, 3000);
    },
    methods: {
        nockServer: function() {
            let self = this;
            axios.get(window.Laravel.baseUrl + '/nock')
                .then( (response) => {
                    let mode = response.mode;
                    if (mode == 0) {
                        window.location.href = window.Laravel.baseUrl + '/login';
                    }
                })
                .catch( (error) => {
                })
                .then( (data) => {
                });
        }
    },
    beforeDestroy: function(){
        clearInterval(this.nockMaintence);
    },
})