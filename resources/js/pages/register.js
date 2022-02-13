import axios from 'axios';
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

new Vue({
    el: '#register_form',
    components: {
        'vuephonenumberinput': VuePhoneNumberInput
    },
    props: {

    },
    data: () => ({
        // canSearchProfile:0,
        mobile: mobile,
        mobile_number: '',
        country_code: '',
    }),
    created: function() {
        //User value is from blade output
    },
    methods: {
        update_phone_number: function(e) {
            this.country_code = e.countryCode
            this.mobile_number = e.formatInternational
        }
    }
});