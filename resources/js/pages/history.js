Vue.component('game-history', require('../components/GameHistoryTable.vue').default);
Vue.component('bonus-history', require('../components/BonusHistoryTable.vue').default);

var history = new Vue({
    name: 'History',
    el: '#app',
    date() {
        return {
            trans: trans,
            intervalfunction: null,
        }
    },
    mounted() {
        this.intervalfunction = setInterval(this.loadAlerts, 1000);
    },
    components: {
    },
    beforeDestroy: function(){
        clearInterval(this.loadAlerts);
    },
})
