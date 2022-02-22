<template>
    <div class="mfp-content w-100">
        <div class="ajax-quick-view">
            <div class="quick-view-content">
                <div class="product buy-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center" data-items="1">
                                <img :src="treeData.image_url" class="img-fluid rounded" alt="Shop product image!">
                                <div class="genre-title">
                                    <h3 class="text-light">{{ treeData.name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-product-description">
                                <div class="icon-preview d-flex w-100 justify-content-between">
                                    <div class="icon-holder">
                                        <i class="fa fa-gamepad text-light"></i>
                                    </div>
                                    <div class="icon-class text-light">{{ treeData.own_loss | number2format(0) }} {{ trans.field.jpy }}</div>
                                </div>
                                <div class="icon-preview d-flex w-100 justify-content-between">
                                    <div class="icon-holder text-light">
                                        <i class="fa fa-gamepad text-light"></i> {{ trans.field.left }}
                                    </div>
                                    <div class="icon-class text-light">{{ treeData.left_loss | number2format(0) }} {{ trans.field.jpy }}</div>
                                </div>
                                <div class="icon-preview d-flex w-100 justify-content-between">
                                    <div class="icon-holder text-light">
                                        <i class="fa fa-gamepad text-light"></i> {{ trans.field.right }}
                                    </div>
                                    <div class="icon-class text-light">{{ treeData.right_loss | number2format(0) }} {{ trans.field.jpy }}</div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-6">
                                        <div class="text-center border border-white rounded">
                                            <div class="icon mt-2 mb-2"><i class="fa fa-male text-light"></i></div>
                                            <div class="text-light"> <span data-speed="3000" data-refresh-interval="12" data-to="114" data-from="50" data-seperator="true">{{ treeData.left_count }}</span> </div>
                                            <p class="m-0 text-light">{{ trans.field.left }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center border border-white rounded">
                                            <div class="icon mt-2 mb-2"><i class="fa fa-male text-light"></i></div>
                                            <div class="text-light"> <span data-speed="3000" data-refresh-interval="12" data-to="114" data-from="50" data-seperator="true">{{ treeData.right_count }}</span> </div>
                                            <p class="m-0 text-light">{{ trans.field.right }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default ({
    name: "TreeDailog",
    props: ["treeData", "trans"],
    data() {
        return {
        }
    },
    created: function() {
    }
})
</script>
