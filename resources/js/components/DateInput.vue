<template>
    <input type="text" v-model="displayValue" @blur="isInputActive = false" @focus="isInputActive = true"/>
</template>

<script>

export default ({
    name: 'DateInput',
    props: ['value'],
    data: function() {
        return {
            isInputActive: false
        }
    },
    computed: {
        displayValue: {
            get: function() {
                if (this.isInputActive) {
                    if(this.value == null)
                        return '';

                    return this.value == '' ? '' : this.formatDate(this.value);
                } else {
                    if(this.value == '' || this.value == undefined || this.value == null)
                        return '';
                    
                    return this.formatDate(this.value);
                }
            },
            set: function(modifiedValue) {
                if (modifiedValue == '' || modifiedValue == undefined ) {
                    modifiedValue = ''
                }

                this.$emit('input', this.formatDate(modifiedValue));
            },
        },
    },
    methods: {
        formatDate: function(str) {
            let temp = str.toString();
            if (temp.length == 4) {
                temp = temp.slice(0, 4) + '/' + temp.slice(4);
            } 
            if (temp.length == 7) {
                temp = temp.slice(0, 7) + '/' + temp.slice(7);
            }
            return temp;
        },
        keymonitor: function(e) {
            if(e.keyCode == 9 || e.keyCode == 13)
                $(e.target).select()
        },
        setValue: function() {

        }
    },
    watch: {
        setFocus: function(e) {
            $(e.target).select();
        }
    }
})
</script>

