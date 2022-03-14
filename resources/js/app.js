require('./bootstrap');

window.Vue = require('vue').default;
require('./bootstrap');

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import moment from 'moment-timezone';

Vue.use(VueSweetalert2);

let environment = jQuery('input[name=environment]').val();
const url = environment == 'local'? 'http://localhost:8484' : 'https://cmm.eternal-dreams.net';
if (environment == 'production') {
    Vue.config.devtools = false;
    Vue.config.debug = false;
    Vue.config.silent = true; 
    Vue.config.productionTip = false;
}
 
 Vue.mixin({
     data() { 
        return{
            alerts: [],
            buttons: buttons
        }
    },
    mounted: function() {
        // this.intervalfunction = setInterval(this.loadAlerts, 1000);
    },
    methods: {
        moment(...params) {
            return moment(...params)
        },
        number_format: function (number, decimals, dec_point = '.', thousands_sep = ',') {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        },
        _number_format: function (src, decimals) {
            if (decimals == 0) {
                return this.number_format(src, 0);
            }
            return this.removeTrailingZero(this.number_format(src, decimals));
        },
        removeTrailingZero: function (src) {
            var i = src.length - 1;
            if (src.indexOf('.') < 0) return src;
            for (; i >= 0; i--) {
                if (src[i] == '.' || src[i] != 0) break;
            }
            if (src[i] == '.') {
                return src.substr(0, i);
            }
            return src.substr(0, i + 1);
        },
        callSweetAlert: function(title, text, icon, button) {
            this.$swal({
                title: title,
                text: text,
                type: "warning",
                icon: icon,
                iconColor: 'rgba(247,109,1,1)',
                allowOutsideClick: true,
                showCancelButton: false,
                confirmButtonText: button,
                customClass: {
                    actions: 'vertical-buttons',
                    container: 'swal-theme',
                    confirmButton: 'btn btn-block rounded-pill btn-gradient-theme home-button btn-round btn-w100',
                }
            }).then(function ( result ) {}.bind(this)).catch(errors => {});
        },
        callToastr: function(result, message) {
            if (result == 1) {
                toastr.success(message, '', {timeOut: 1000});
            } else if (result == 0) {
                toastr.warning(message, '', {timeOut: 1000});
            }
        },
        leftPadding: function(str, max) {
            str = str.toString();
            return str.length < max ? this.leftPadding("0" + str, max) : str;
        },
        serverTime2LocalTime: function(value, format = 'YYYY/MM/DD HH:mm:ss') {
            let toTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            let fromTimeZone = window.Laravel.serverTimeZone;

            return moment.tz(value, fromTimeZone).tz(toTimeZone).format(
                format);
        },
        async loadAlerts() {
            if (window.Laravel.user !== undefined && window.Laravel.user !== null) {
                let self = this;
                axios.get(window.Laravel.baseUrl + '/notice/alert')
                    .then( (response) => {
                        self.alerts = response.data;
                    })
                    .catch( (error) => {
                        console.log(error);
                    })
                    .then( (data) => {
                    });
            }
        },
        noticeClickHandler( notice ) {
            axios.get(window.Laravel.baseUrl + '/notice/read/' + notice.id)
            this.callSweetAlert(notice.notice.title, notice.notice.content, "", this.buttons.confirm)
        }
    },
    filters: {
        number2format: function(value, decimal) {
            return _number_format(value, decimal);
        },
        serverTime2LocalTime: function(value, format = 'YYYY/MM/DD HH:mm:ss') {
            let toTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            let fromTimeZone = window.Laravel.serverTimeZone;

            return moment.tz(value, fromTimeZone).tz(toTimeZone).format(
                format);
        },
        bytesToSize: function(bytes) {
            var sizes = ['Byte', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        },
        html2str: function(html) {
            return html.replace(/(<([^>]+)>)/gi, "");
        }
    },
    beforeDestroy: function(){
        clearInterval(this.intervalfunction);
    },
 })

