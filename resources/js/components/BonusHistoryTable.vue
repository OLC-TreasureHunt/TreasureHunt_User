<template>
    <datatable v-bind="$data" id="bonus-history"/>
</template>


<script>
    import DataTable from 'vue2-datatable-component';

    export default {
        name: 'History',
        props: ['trans'],
        components: {
            'datatable': DataTable,
        },
        data: () => ({
            columns: [],
            data: [],
            total: 0,
            query: {},
            lang: {},
            currencies: [],
          }),
        created: function() {
            this.lang = JSON.parse(this.trans);
            this.columns = [
                { title: this.lang.table.date, field: 'created_at', sortable: true, thClass:'text-center word-keep', tdClass: 'text-center' },
                { title: this.lang.table.amount, field: 'total_bet', sortable: true, thClass:'text-center word-keep', tdClass: 'text-end' },
                { title: this.lang.table.binaryl, field: 'left_bonus', thClass:'text-center word-keep', tdClass: 'text-end' },
                { title: this.lang.table.binaryr, field: 'right_bonus', thClass:'text-center word-keep', tdClass: 'text-end' },
                { title: this.lang.table.level, field: 'level', thClass:'text-center word-keep', tdClass: 'text-center word-keep' },
                { title: this.lang.table.rate, field: 'bonus_rate', thClass:'text-center word-keep', tdClass: 'text-end' },
                { title: this.lang.table.bonus, field: 'bonus', thClass:'text-center word-keep', tdClass: 'text-end' },
            ];
            this.loadCurrencies();
        },
        mounted: function () {
        },
        methods: {
            async loadCurrencies() {
                let self = this;
                axios.get(window.Laravel.baseUrl + '/currency')
                    .then( (response) => {
                        self.currencies = response.data;
                    })
                    .catch( (error) => {
                        console.log(error);
                    })
                    .then( (data) => {
                    })
            }
        },
        watch: {
            query: {
                handler (query) {
                    let page = this.query.offset / this.query.limit + 1;
                    this.query.page = page;
                    axios.get(window.Laravel.baseUrl + '/history/list/bonus', {
                            params: this.query
                        })
                        .then( (data) => {
                            this.data = data.data.data.map( obj => {
                                let direct = parseInt(obj['left_bonus']) <= parseInt(obj['right_bonus'])? 1 : 2;
                                return {
                                    ...obj, 
                                    created_at: obj['settle_info']['settle_month'].replace('-', '/'),
                                    total_bet: this.lang.table.jpy + this.$options.filters.number2format(obj['total_bet'], 0),
                                    left_bonus: (direct == 1 ? '★' : '') + this.lang.table.jpy + this.$options.filters.number2format(obj['left_bonus'], 0),
                                    right_bonus: (direct == 2 ? '★' : '') + this.lang.table.jpy + this.$options.filters.number2format(obj['right_bonus'], 0),
                                    bonus: this.lang.table.jpy + this.$options.filters.number2format(obj['bonus'], 0),
                                    level: obj['level_info']['name']['level'], 
                                    bonus_rate: this.$options.filters.number2format(obj['bonus_rate'], 0) + '%',
                                }
                            })
                            this.total = data.data.total;
                    })
                },
                deep: true
            }
        }
    }
</script>

<style scoped>
    #bonus-history div[name="SimpleTable"] {
        overflow-x: auto;
    }
</style>