import pagination from 'laravel-vue-pagination';
import axios from "axios";

var download = new Vue({
    name: 'Download',
    el: '#app',
    components: {
        'pagination': pagination,
    },
    data() {
        return {
            files: {},
            intervalfunction: null,
        }
    },
    mounted: function () {
        this.intervalfunction = setInterval(this.loadAlerts, 10000);
        this.loadFiles();
    },
    methods: {
        async loadFiles(page) {
            let self = this;
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get(window.Laravel.baseUrl + '/download/files?page=' + page)
                .then( (response) => {
                    self.files = response.data;
                })
                .catch( (error) => {
                    console.log(error);
                })
                .then( (data) => {
                });
        },
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
})