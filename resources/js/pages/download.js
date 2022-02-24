import pagination from 'laravel-vue-pagination';
import axios from "axios";

var download = new Vue({
    name: 'Download',
    el: '#download-page',
    components: {
        'pagination': pagination,
    },
    data() {
        return {
            files: {
            },
        }
    },
    mounted: function () {
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
                    conosle.log(error);
                })
                .then( (data) => {
                });
        },
    }
})