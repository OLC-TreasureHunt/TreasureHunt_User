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
            lang: {}
          }),
        created: function() {
            this.lang = JSON.parse(this.trans);
            this.columns = [
                { title: this.lang.table.no, field: 'id', thClass:'text-center', tdClass: 'text-center' },
                { title: this.lang.table.date, field: 'created_at', sortable: true, thClass:'text-center', tdClass: 'text-center' },
                { title: this.lang.table.amount, field: 'total_bet', sortable: true, thClass:'text-center', tdClass: 'text-end' },
                { title: this.lang.table.bonus, field: 'real_bonus', sortable: true, thClass:'text-center', tdClass: 'text-end' },
                { title: this.lang.table.currency, field: 'currency', sortable: true, thClass:'text-center', tdClass: 'text-center' },
                { title: this.lang.table.status, field: 'status', thClass:'text-center', tdClass: 'text-center' },
            ]
        },
        mounted: function () {
        },
        methods: {
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
                                    total_bet: this.$options.filters.number2format(obj['total_bet'], 0)
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