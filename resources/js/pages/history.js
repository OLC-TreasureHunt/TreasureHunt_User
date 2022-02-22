Vue.component('game-history', require('../components/GameHistoryTable.vue').default);
Vue.component('bonus-history', require('../components/BonusHistoryTable.vue').default);

var history = new Vue({
    name: 'History',
    el: '#history-page',
    date() {
        return {
            trans: trans,
            temp: ''
        }
    },
    mounted() {
        this.temp = 'dafafd';
    },
    components: {
    },
})
