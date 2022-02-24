import axios from "axios";

var download = new Vue({
    name: 'News',
    el: '#news-detail',
    components: {
    },
    data() {
        return {
            popular: [],
            news: news
        }
    },
    mounted: function () {
        this.loadPopular();
    },
    methods: {
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
        news_link: function (id) {
            return window.Laravel.baseUrl + '/news/' + id;
        }
    }
})