import axios from "axios";

Vue.component('home-tree', require('../components/HomeTreeComponent.vue').default);

var tree = new Vue({
    name: 'HomeTree',
    el: '#app',
    data() {
        return {
            landscape: [],
            data: {},
            trans: trans,
            intervalfunction: null,
        }
    },
    mounted: function () {
        this.intervalfunction = setInterval(this.loadAlerts, 10000);
        this.loadNodes();
    },
    methods: {
        async loadNodes() {
            let self = this;
            axios.get(window.Laravel.baseUrl + '/home/tree')
                .then( (response) => {
                    self.data = response.data;
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