<template>
    <datatable v-bind="$data" id="real-map" />
</template>


<script>
    import DataTable from 'vue2-datatable-component';
    import CustomCell from './Advance/td-CustomCell.vue';
    import AffiliateCell from './Advance/td-AffiliateCell.vue';

    export default {
        name: 'History',
        props: ['trans', 'target'],
        components: {
            'datatable': DataTable,
            CustomCell,
            AffiliateCell
        },
        data: () => ({
            columns: [],
            data: [],
            total: 0,
            query: {},
            lang: {},
            currencies: [],
            current: '',
            xprops: {
                eventbus: new Vue()
            }
          }),
        created: function() {
            this.lang = JSON.parse(this.trans);
            this.columns = [
                { title: this.lang.field.id, field: 'affiliate_id', thClass:'text-center word-keep', tdClass: 'text-center', tdComp: 'AffiliateCell' },
                { title: this.lang.field.agent_bets, field: 'below_bet', thClass:'text-center word-keep', tdClass: 'text-end', tdComp: 'CustomCell' },
                { title: this.lang.field.agent_loss, field: 'below_loss', thClass:'text-center word-keep', tdClass: 'text-end', tdComp: 'CustomCell' },
                { title: this.lang.field.agent_count, field: 'children_count', thClass:'text-center word-keep', tdClass: 'text-end', tdComp: 'CustomCell' },
            ];
            this.xprops.eventbus.$on('RELOAD_CURRENT', (val) => {
                debugger;
                this.current = val;
            })
        },
        mounted: function () {
            this.current = this.target;
            this.query.current = this.current;
        },
        methods: {
            async loadData() {
                let page = this.query.offset / this.query.limit + 1;
                this.query.page = page;
                axios.get(window.Laravel.baseUrl + '/tree/real', {
                        params: this.query
                    })
                    .then( (data) => {
                        this.data = data.data.list.data.map( obj => {
                            return {
                                ...obj, 
                                affiliate_id: obj['affiliate_id'].replace('-', '/'),
                                below_bet: this.$options.filters.number2format(obj['below_bet'], 0) + this.lang.field.jpy,
                                below_loss: this.$options.filters.number2format(obj['below_loss'], 0) + this.lang.field.jpy,
                                children_count: this.$options.filters.number2format(obj['children_count'], 0) + this.lang.field.peoples,
                            }
                        })
                        this.total = data.data.list.total;
                        this.$emit('update-steps', data.data.currentUser);
                })
            }
        },
        watch: {
            query: {
                handler (val) {
                    this.current = this.query.current;
                    this.loadData();
                },
                deep: true
            },
            current: {
                handler(newValue, oldValue) {
                    this.query.current = newValue;
                    this.query.offset = 0;
                    this.query.page = 1;
                    this.loadData();
                },
                deep: true
            },
            target: function(newValue, oldValue) {
                this.current = newValue;
            }
        }
    }
</script>

<style scoped>
    #bonus-history div[name="SimpleTable"] {
        overflow-x: auto;
    }
</style>