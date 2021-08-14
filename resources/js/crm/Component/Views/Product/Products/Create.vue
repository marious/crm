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
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="product_name" class="mb-lg-0">{{ $t('name') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
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
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="product_type" class="mb-lg-0">{{ $t('product_type') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div>
                                        <app-input
                                            type="select"
                                            :list="productTypeList"
                                            list-value-field="name"
                                            id="product_type"
                                            v-model="formData.product_type"
                                            :placeholder="$t('choose_product_type')"
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
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="category" class="mb-lg-0">{{ $t('category') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
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


                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="brand" class="mb-lg-0">{{ $t('brand') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div>
                                        <app-input
                                            id="brand"
                                            type="search-select"
                                            :list="brandList"
                                            list-value-field="name"
                                            :placeholder="$t('choose_brand')"
                                            v-model="formData.brand"
                                        />
                                        <a href @click.prevent="openBrandModal">+{{ $t('create_new') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- ./ form-group -->

                    <div class="form-group row">

                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="unit" class="mb-lg-0">{{ $t('unit') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div>
                                        <app-input
                                            id="unit"
                                            type="search-select"
                                            :list="unitList"
                                            list-value-field="name"
                                            :placeholder="$t('choose_unit')"
                                            v-model="formData.unit"
                                        />
                                        <a href @click.prevent="openUnitModal">+{{ $t('create_new') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="product_image" class="mb-lg-0">{{ $t('product_image') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div>
                                        <app-input
                                            id="product_image"
                                            :label="$t('choose_image')"
                                           type="file" v-model="formData.image"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- ./ form-group -->

                    <div class="form-group row">

                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="unit" class="mb-lg-0">{{ $t('product_variant') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div>
                                        <app-input
                                            name="productVariant"
                                            v-model="formData.product_variant"
                                            :list="[{id: 1, value: $t('standard_product')}, {id: 2, value: $t('variant_product')}]"
                                            type="radio"
                                            required="true"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <div class="col-lg-6 col-xl-6 d-flex align-items center mt-2 mb-2">
                                    <label for="unit" class="mb-lg-0">{{ $t('add_initial_quantity') }}</label>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div>
                                        <app-input
                                            name="productQuantity"
                                            v-model="formData.product_quantity"
                                            :list="[{id: 1, value: $t('yes')}, {id: 2, value: $t('no')}]"
                                            type="radio"
                                            required="true"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div><!-- ./ form-group -->


                    <div v-if="!checkVariant">
                        <div class="form-group row">

                            <div class="col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <div class="col-lg-12 col-xl-12 d-flex align-items center mt-2 mb-2">
                                        <label for="purchasePrice" class="mb-lg-0">{{ $t('purchase_price') }}</label>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div>
                                            <app-input
                                                type="decimal"
                                                name="purchasePrice"
                                                v-model="formData.purchasePrice"
                                                id="purchasePrice"
                                                :required="true"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <div class="col-lg-12 col-xl-12 d-flex align-items center mt-2 mb-2">
                                        <label for="sellingPrice" class="mb-lg-0">{{ $t('selling_price') }}</label>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div>
                                            <app-input
                                                type="decimal"
                                                name="sellingPrice"
                                                v-model="formData.sellingPrice"
                                                id="sellingPrice"
                                                :required="true"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <div class="col-lg-12 col-xl-12 d-flex align-items center mt-2 mb-2">
                                        <label for="sku" class="mb-lg-0">{{ $t('sku') }}</label>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div>
                                            <app-input
                                                type="text"
                                                name="sku"
                                                v-model="formData.sku"
                                                id="sku"
                                                :required="true"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div><!-- ./ form-group -->


                        <div class="form-group row">

                            <div class="col-lg-4 col-xl-4" v-if="initialQuantity == 1">
                                <div class="form-group">
                                    <div class="col-lg-12 col-xl-12 d-flex align-items center mt-2 mb-2">
                                        <label for="quantity" class="mb-lg-0">{{ $t('quantity') }}</label>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div>
                                            <app-input
                                                type="number"
                                                name="quantity"
                                                v-model="formData.standardproductQuantity"
                                                id="quantity"
                                                :required="true"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div><!-- ./ form-group -->

                    </div>


                    <div v-else id="addVariantSection">
                        <div class="row">
                            <div class="col-5">
                                <h5>{{ $t('add_product_variants') }}</h5>
                            </div>
                            <div class="col-7">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <div class="text-right mr-2" v-if="!id">
                                            <a
                                                class="btn btn-primary app-color text-white"
                                                data-toggle="modal"
                                                data-target="#attributes-add-edit-modal"
                                                @click.prevent="openProductAttributeModal"
                                            >
                                                <i class="la la-plus-circle"></i>
                                                {{ $t('lang.add_new_variant') }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div v-if="!id">
                                            <select
                                                id="inputState"
                                                class="custom-select"
                                            >
                                                <option
                                                    selected
                                                    disabled
                                                >{{ $t('lang.add_another_variant') }}</option>
                                                <option
                                                    v-for="productAttribute in productVariantList"
                                                    :value="productAttribute.id"
                                                >{{ productAttribute.name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


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
            @close-modal="closeCategoryModal"/>

        <app-product-brand-modal
            v-if="isBrandModalActive"
            @close-modal="closeBrandModal"
        />

        <app-product-unit-modal
            v-if="isUnitModalActive"
            @close-modal="closeUnitModal"
        />

        <app-product-attribute-modal
            v-if="isProductAttributeModalActive"
            @close-modal="closeProductAttributeModal"
            />
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
            isBrandModalActive: false,
            isUnitModalActive: false,
            isProductAttributeModalActive: false,
            checkVariant: true,
            initialQuantity: 1,
        }
    },

    computed: {
        ...mapGetters({
            categoryList: "getCategory",
            brandList: "getBrand",
            unitList: "getUnit",
            productVariantList: "getProductVariant",
        })
    },


    methods: {

        openCategoryModal() {
            this.isCategoryModalActive = true;
            $('#product-category-modal').modal('show');
        },

        closeCategoryModal() {
            this.$store.dispatch("getCategory");
            $('#product-category-modal').modal('hide');
            this.isCategoryModalActive = false;
        },

        openBrandModal() {
            this.isBrandModalActive = true;
            $('#product-brand-modal').modal('show');
        },

        closeBrandModal() {
            this.$store.dispatch("getBrand");
            $('#product-brand-modal').modal('hide');
            this.isBrandModalActive = false;
        },

        openUnitModal() {
            this.isUnitModalActive = true;
            $('#product-unit-modal').modal('show');
        },

        closeUnitModal() {
            this.$store.dispatch("getUnit");
            $('#product-unit-modal').modal('hide');
            this.isUnitModalActive = false;
        },

        openProductAttributeModal() {
            this.isProductAttributeModalActive = true;
            $('#product-attribute-modal').modal('show');

        },

        closeProductAttributeModal() {
            this.$store.dispatch("getProductVariant");
            $('#product-attribute-modal').modal('hide');
            this.isProductAttributeModalActive = false;
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
        this.$store.dispatch("getBrand");
        this.$store.dispatch("getUnit");
        this.$store.dispatch("getProductVariant");
    }
}
</script>

<style scoped>

</style>
