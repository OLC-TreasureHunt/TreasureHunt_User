<template>
    <div v-html="current" id="test"></div>
</template>

<script>
    export default{
        props: ['target'],
        data() {
            return {
                current: ''
            }
        },
        mounted: function () {
            this.current = this.target;
        },
        methods: {
        },
        beforeDestroy: function(){
        },
        watch: {
            current: {
                handler() {
                    this.$emit('update-value', {'account_id': this.current});
                },
                deep: true
            },
            target: {
                handler() {
                    console.log('test component', this.target);
                    this.current = this.target;
                    
                }
            }
        }
    }
</script>