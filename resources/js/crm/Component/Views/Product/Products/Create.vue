<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <app-breadcrumb :page-title="$t('add_product')"
                                :button="{label: $t('back')}"/>
            </div>
        </div>
        <form ref="form">
            <div class="card border-0 card-with-shadow">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group row">
                                <div class="col-lg-2 col-xl-2 d-flex align-items center mt-2">
                                    <label for="product_name" class="mb-lg-0">{{ $t('name') }}</label>
                                </div>
                                <div class="col-lg-10 col-xl-10">
                                    <div>
                                        <app-input
                                            id="product_name"
                                            :placeholder="$t('enter_name')"
                                            name="name"
                                            v-model="formData.title"
                                            :required="true"
                                            :error-message="$errorMessage(errors, 'name')"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group row">
                                <div class="col-lg-2 col-xl-2 d-flex align-items center mt-2">
                                    <label for="product_type" class="mb-lg-0">{{ $t('product_type') }}</label>
                                </div>
                                <div class="col-lg-10 col-xl-10">
                                    <div>
                                        <app-input
                                            type="select"
                                            :list="productTypeList"
                                            list-value-field="name"
                                            id="product_type"
                                            v-model="formData.product_type"
                                            :placeholder="$t('choos_product_type')"
                                            :required="true"
                                            :error-message="$errorMessage(errors, 'product_type')"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- ./form-group -->


                    <div class="form-group row">

                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group row">
                                <div class="col-lg-2 col-xl-2 d-flex align-items center mt-2">
                                    <label for="category" class="mb-lg-0">{{ $t('category') }}</label>
                                </div>
                                <div class="col-lg-10 col-xl-10">
                                    <div>
                                       <app-input
                                           id="category"
                                           type="search-select"
                                           :list="categoryList"
                                           list-value-field="name"
                                           :placeholder="$t('choose_category')"
                                           v-model="formData.category"
                                       />
                                        <a href @click.prevent="openCategoryModal">+{{ $t('create_new') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- ./ form-group -->

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-12"></div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <app-product-category-modal
            v-if="isCategoryModalActive"
            :table-id="tableId"
            :selected-url="selectedUrlCategory"
            @close-modal="closeModal"/>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import {FormSubmitMixin} from "../../../../Mixins/Global/FormSubmitMixin";

export default {
    name: "create",
    mixins: [FormSubmitMixin],
    data() {
        return {
            formData: {},
            productTypeList: [],
            isCategoryModalActive: false,
        }
    },

    computed: {
        ...mapGetters({
            categoryList: "getCategory"
        })
    },


    methods: {

        openCategoryModal() {
            this.isCategoryModalActive = true;
            $('#product-category-modal').show();
        },

        closeModal() {
            this.isCategoryModalActive = false;
            $('#product-category-modal').hide();
        },

        getProductTypeList() {
            this.axiosGet('crm/products/product_type_list').then( ({data}) => {
                this.productTypeList = data;
            } );
        },
    },

    mounted() {
        this.getProductTypeList();
        this.$store.dispatch("getCategory");
    }
}
</script>

<style scoped>

</style>
