import axios from "axios";

var download = new Vue({
    name: 'News',
    el: '#app',
    components: {
    },
    data() {
        return {
            popular: [],
            news: news,
            intervalfunction: null,
        }
    },
    mounted: function () {
        this.intervalfunction = setInterval(this.loadAlerts, 1000);
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
                    console.log(error);
                })
                .then( (data) => {
                    console.log(data);
                });
        },
        news_link: function (id) {
            return window.Laravel.baseUrl + '/news/' + id;
        }
    },
    beforeDestroy: function(){
        clearInterval(this.loadAlerts);
    },
})