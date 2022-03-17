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
        this.intervalfunction = setInterval(this.loadAlerts, 1000);
    },
    methods: {
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
})