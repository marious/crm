<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <app-breadcrumb
                    :page-title="$t('product_categories')"
                    :directory="[$t('contact'), $t('contact_type')]"
                    :icon="'clipboard'"/>
            </div>
        </div><!-- ./row -->
        <app-table id="product-categories-table"
                   :options="options"
                   @action="getAction"
        />
    </div>
</template>

<script>
import {FormMixin} from "../../../../../core/mixins/form/FormMixin";

export default {
    name: "CategoriesList",
    mixins: [FormMixin],
    data() {
        return {
            confirmationModalActive: false,
            isModalActive: false,
            tableId:"product-categories-table",
            selectedUrlCategory: "",
            options: {
                name: this.$t('pipeline_table'),
                url: 'crm/product/categories',
                showHeader: true,
                columns: [
                    {
                        title: this.$t('name'),
                        type: 'text',
                        key: 'name',
                    },
                    {
                        title: 'Action',
                        type: 'action',
                        key: 'invoice',
                        isVisible: true,
                    }
                ],
            },
            showSearch: true,
            showFilter: false,
            paginationType: "pagination",
            responsive: true,
            rowLimit: 10,
            showAction: true,
            orderBy: 'desc',
            actionType: "default",
            actions: [],
        }
    },
    methods: {
        getAction(row, action, active) {

        },
        openModal() {

        },
        closeModal() {

        }
    }
}
</script>
