import pagination from 'laravel-vue-pagination';
import axios from "axios";

var download = new Vue({
    name: 'News',
    el: '#news-page',
    components: {
        'pagination': pagination,
    },
    data() {
        return {
            news: {},
            popular: [],
            top: {}
        }
    },
    mounted: function () {
        this.loadNews();
        this.loadPopular();
        this.loadTopNews();
    },
    methods: {
        async loadNews(page) {
            let self = this;
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get(window.Laravel.baseUrl + '/news/list?page=' + page)
                .then( (response) => {
                    self.news = response.data;
                })
                .catch( (error) => {
                    conosle.log(error);
                })
                .then( (data) => {
                });
        },
        async loadPopular() {
            let self = this;
            axios.get(window.Laravel.baseUrl + '/news/popular')
                .then( (response) => {
                    self.popular = response.data;
                })
                .catch( (error) => {
                    conosle.log(error);
                })
                .then( (data) => {
                    console.log(data);
                });
        },
        async loadTopNews() {
            let self = this;
            axios.get(window.Laravel.baseUrl + '/news/top')
                .then( (response) => {
                    self.top = response.data;
                })
                .catch( (error) => {
                    conosle.log(error);
                })
                .then( (data) => {
                    console.log(data);
                });
        },
        news_link: function (id) {
            return window.Laravel.baseUrl + '/news/' + id;
        }
    }
})