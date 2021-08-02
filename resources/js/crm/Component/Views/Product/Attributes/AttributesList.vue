<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <app-breadcrumb
                    :page-title="$t('product_attributes')"
                    :directory="[$t('contact'), $t('contact_type')]"
                    :icon="'clipboard'"/>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="float-md-right mb-3 mb-sm-3 mb-md-0">
                    <button
                        type="button"
                        class="btn btn-primary btn-with-shadow"
                        @click.prevent="openModal">
                        {{ $t('add_product_attribute') }}
                    </button>
                </div>
            </div>
        </div><!-- ./row -->

        <app-table id="product-attributes-table"
                   :options="options"
                   @action="getAction"
        />

        <app-product-brand-modal v-if="isModalActive"
                                 :table-id="tableId"
                                 :selected-url="selectedUrlBrand"
                                 @close-modal="closeModal"/>

        <app-confirmation-modal v-if="confirmationModalActive"
                                modal-id="delete-modal"
                                @confirmed="confirmed"
                                @cancelled="cancelled"/>


    </div>
</template>

<script>

import {FormMixin} from "../../../../../core/mixins/form/FormMixin";
import {DeleteMixin} from "../../../../../core/mixins/global/DeleteMixin";

export default  {
    name: "AttributesList",
    mixins: [FormMixin, DeleteMixin],
    data() {
        return {
            confirmationModalActive: false,
            isModalActive: false,
            tableId:"product-attributes-table",
            selectedUrlBrand: "",
            options: {
                name: this.$t('pipeline_table'),
                url: 'crm/product/attributes',
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
                showSearch: true,
                showFilter: true,
                paginationType: "pagination",
                responsive: true,
                rowLimit: 10,
                showAction: true,
                orderBy: 'desc',
                actionType: "default",
                actions: [
                    {
                        title: this.$t('edit'),
                        icon: 'edit',
                        type: 'modal',
                        component: 'app-product-attribute-modal',
                        modalId: 'product-attribute-modal',
                    },
                    {
                        title: this.$t('delete'),
                        icon: 'trash',
                        type: 'modal',
                        component: 'app-confirmation-modal',
                        modalId: 'delete-modal',
                        url: '',
                    }
                ],
            },
        }
    },
    methods: {
        getAction(row, action, active) {
            if (action.title === this.$t('edit')) {
                this.selectedUrlBrand = `crm/product/attributes/${row.id}`;
                this.isModalActive = true;
            } else if (action.title === this.$t('delete')) {
                this.deleteUrl = `crm/product/attributes/${row.id}`;
                this.confirmationModalActive = true;
            }
        },

        openModal() {
            this.isModalActive = true;
            $('#product-attribute-modal').modal('show');
        },
        closeModal() {
            this.isModalActive = false;
            this.selectedUrlBrand = '';
            $('#product-attribute-modal').modal('hide');
        }

    }
}
</script>
