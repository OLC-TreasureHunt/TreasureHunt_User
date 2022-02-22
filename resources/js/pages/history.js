
import DataTable from 'vue2-datatable-component';

var history = new Vue({
    name: 'History',
    el: '#history-page',
    components: {
        'datatable': DataTable,
    },
    data: () => ({
        columns: [
          { title: 'No', field: 'id' },
          { title: 'Date', field: 'created_at', sortable: true },
          { title: 'Amount', field: 'loss_jpy', sortable: true },
          { title: 'Status', field: 'status' },
        ],
        data: [],
        total: 0,
        query: {}
      }),
    mounted: function () {
    },
    methods: {
    },
    watch: {
        query: {
            handler (query) {
                let page = this.query.offset / this.query.limit + 1;
                this.query.page = page;
                axios.get(window.Laravel.baseUrl + '/history/game', {
                        params: this.query
                    })
                    .then( (data) => {
                        this.data = data.data.data
                        this.total = data.data.total;
                })
            },
            deep: true
        }
    }

})