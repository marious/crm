<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <app-breadcrumb
                    :page-title="$t('product_units')"
                    :directory="[$t('contact'), $t('contact_type')]"
                    :icon="'clipboard'"/>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="float-md-right mb-3 mb-sm-3 mb-md-0">
                    <button
                        type="button"
                        class="btn btn-primary btn-with-shadow"
                        @click.prevent="openModal">
                        {{ $t('add_product_unit') }}
                    </button>
                </div>
            </div>
        </div><!-- ./row -->
        <app-table id="product-units-table"
                   :options="options"
                   @action="getAction"
        />

        <app-product-unit-modal v-if="isModalActive"
                                 :table-id="tableId"
                                 :selected-url="selectedUrlUnit"
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

export default {
    name: "UnitsList",
    mixins: [FormMixin, DeleteMixin],
    data() {
        return {
            confirmationModalActive: false,
            isModalActive: false,
            tableId:"product-units-table",
            selectedUrlUnit: "",
            options: {
                name: this.$t('pipeline_table'),
                url: 'crm/product/units',
                showHeader: true,
                columns: [
                    {
                        title: this.$t('name'),
                        type: 'text',
                        key: 'name',
                    },
                    {
                        title: this.$t('short_name'),
                        type: 'text',
                        key: 'short_name',
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
                        component: 'app-product-unit-modal',
                        modalId: 'product-unit-modal',
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
                this.selectedUrlUnit = `crm/product/units/${row.id}`;
                this.isModalActive = true;
            } else if (action.title === this.$t('delete')) {
                this.deleteUrl = `crm/product/units/${row.id}`;
                this.confirmationModalActive = true;
            }
        },
        openModal() {
            this.isModalActive = true;
            $('#product-unit-modal').modal('show');
        },
        closeModal() {
            this.isModalActive = false;
            this.selectedUrlUnit = '';
            $('#product-unit-modal').modal('hide');
        }
    }
}
</script>
<style>
.badge-link {
    color: #0f37da;
}
</style>
