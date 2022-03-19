import axios from "axios";

var base = new Vue({
    el: '#app',
    components: {
    },
    data() {
        return {
            intervalfunction: null,
        }
    },
    mounted: function () {
        console.log('mount');
        this.intervalfunction = setInterval(this.loadAlerts, 10000);
    },
    methods: {
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
})