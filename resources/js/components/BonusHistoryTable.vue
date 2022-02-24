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
                { title: this.lang.table.no, field: 'id', thClass:'text-center', tdClass: 'text-center' },
                { title: this.lang.table.date, field: 'created_at', sortable: true, thClass:'text-center', tdClass: 'text-center' },
                { title: this.lang.table.amount, field: 'total_bet', sortable: true, thClass:'text-center', tdClass: 'text-end' },
                { title: this.lang.table.bonus, field: 'real_bonus', sortable: true, thClass:'text-center', tdClass: 'text-end' },
                { title: this.lang.table.currency, field: 'currency', sortable: true, thClass:'text-center', tdClass: 'text-center' },
                { title: this.lang.table.status, field: 'apply_status', thClass:'text-center', tdClass: 'text-center' },
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
                    axios.get(window.Laravel.baseUrl + '/history/bonus', {
                            params: this.query
                        })
                        .then( (data) => {
                            this.data = data.data.data.map( obj => {
                                return {
                                    ...obj, 
                                    created_at: this.serverTime2LocalTime(obj['created_at']),
                                    total_bet: this.$options.filters.number2format(obj['total_bet'], 0) + this.lang.table.jpy,
                                    real_bonus: this.$options.filters.number2format(obj['real_bonus'], this.currencies[obj['currency']]['rate_decimals'])
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