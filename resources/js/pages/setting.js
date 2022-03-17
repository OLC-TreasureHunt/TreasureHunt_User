Vue.component('date-input', require('../components/DateInput.vue').default);

new Vue({
    el: '#app',
    components: {
    },
    props: {

    },
    data: () => ({
        intervalfunction: null,
        birthday: birthday,
        hasBirthdayError: false
    }),
    created: function() {
    },
    mounted: function() {
        this.intervalfunction = setInterval(this.loadAlerts, 1000);
    },
    methods: {
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
    watch: {
        birthday: function(value){
            if (this.birthday == '') {
                this.hasBirthdayError = false;
                return;
            }

            let r = /^[+-]?\d{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])$/;
            this.hasBirthdayError = !r.test(value)
            console.log(this.hasBirthdayError);
        }
    }
});