import axios from "axios";

Vue.component('binary-tree', require('../components/TreeComponent.vue').default);
Vue.component('tree-dialog', require('../components/TreeDialog.vue').default);

var tree = new Vue({
    name: 'BinaryTree',
    el: '#app',
    data() {
        return {
            landscape: [],
            data: {},
            trans: trans,
            intervalfunction: null,
        }
    },
    mounted: function () {
        this.intervalfunction = setInterval(this.loadAlerts, 1000);
        this.loadNodes();
    },
    methods: {
        async loadNodes() {
            let self = this;
            axios.get(window.Laravel.baseUrl + '/tree/binary')
                .then( (response) => {
                    self.data = response.data;
                })
                .catch( (error) => {
                    conosle.log(error);
                })
                .then( (data) => {
                });
        },
        clickNode: function(node){
            this.$swal({
                html: '<div id="VueSweetAlert2"></div>',
                allowOutsideClick: true,
                showCancelButton: false,
                confirmButtonText: this.trans.button.confirm,
                customClass: {
                    actions: 'horizontal-buttons',
                    container: 'swal-theme',
                    confirmButton: 'btn btn-outline btn-rounded btn-light',
                },
                willOpen: () => {
                    let ComponentClass = Vue.extend(Vue.component('tree-dialog'));
                    let instance = new ComponentClass({
                        propsData: {
                            treeData: node,
                            trans: this.trans
                        }
                    });
                    instance.$mount();
                    document.getElementById('VueSweetAlert2').appendChild(instance.$el);
                }
            }).then( function(result) {
                if ( result.isConfirmed ) {
                }
            }.bind(this)).catch(errors => {});
        }
    },
    beforeDestroy: function(){
        clearInterval(this.loadAlerts);
    },

})