<template>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
</template>


<script>
    import axios from 'axios';
    import 'vuejs-datatable/dist/themes/bootstrap-4.esm';
    import { VuejsDatatableFactory } from 'vuejs-datatable';
    Vue.use( VuejsDatatableFactory );

    export default {
        name: 'GameHistoryTable',
        data() {
            return {
                columns: [{
                        label: 'id',
                        field: 'id'
                    },
                    {
                        label: 'loss',
                        field: 'loss_jpy'
                    },
                    {
                        label: 'status',
                        field: 'settle_status'
                    },
                    {
                        label: 'date',
                        field: 'created_at'
                    }
                ],
                rows: [],
                page: 1,
                filter:  '',
                perPage: 10,
            }
        },
        methods: {
            showBlogs: function () {
                // axios.get(window.Laravel.baseUrl + '/history/game')
                //     .then(function (res) {
                //     this.rows = res.data;
                // }.bind(this));
            }
        },
    }
</script>