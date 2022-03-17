import pagination from 'laravel-vue-pagination';
import axios from "axios";

var download = new Vue({
    name: 'Notice',
    el: '#app',
    components: {
        'pagination': pagination,
    },
    data() {
        return {
            notices: {},
            trans: trans,
            intervalfunction: null,
        }
    },
    mounted: function () {
        this.intervalfunction = setInterval(this.loadAlerts, 1000);
        this.loadNotices();
    },
    methods: {
        async loadNotices(page) {
            let self = this;
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get(window.Laravel.baseUrl + '/notice/list?page=' + page)
                .then( (response) => {
                    self.notices = response.data;
                })
                .catch( (error) => {
                    console.log(error);
                })
                .then( (data) => {
                });
        },
        notice_link: function (id) {
            return window.Laravel.baseUrl + '/news/' + id;
        },
        noticeClickHandler( notice ) {
            axios.get(window.Laravel.baseUrl + '/notice/read/' + notice.id)
            this.callSweetAlert(notice.notice.title, notice.notice.content, "", this.trans.button.confirm)
            this.notices.data.forEach( (value) => {
                if (value.id == notice.id) value.status = 1;
            })
        }
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
})