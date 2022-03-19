Vue.component('game-history', require('../components/GameHistoryTable.vue').default);
Vue.component('bonus-history', require('../components/BonusHistoryTable.vue').default);

Vue.prototype.$i18nForDatatable = (function () {
    var locale = {
        'Apply': historyTrans.template.apply,
        'Apply and backup settings to local': historyTrans.template.apply_and_backup_settings_to_local,
        'Clear local settings backup and restore': historyTrans.template.clear_local_settings_backup_and_restore,
        'Using local settings': historyTrans.template.using_local_settings,
        'No Data': historyTrans.template.no_data,
        'Total': historyTrans.template.total,
        ',': historyTrans.template.comma,
        'items / page': historyTrans.template.items_page
    };
  
    return function (srcTxt) {
        return locale[srcTxt];
    };
})();

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
        this.intervalfunction = setInterval(this.loadAlerts, 10000);
    },
    components: {
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
})
