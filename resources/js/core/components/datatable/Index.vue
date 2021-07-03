<template>
    <div>
        <div v-if="options.showFilter || isUndefined(options.showFilter)"
             class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <div v-if="options.showFilter || isUndefined(options.showFilter)"
                     class="filters-wrapper d-flex justify-content-start flex-wrap">

                    <manage-columns
                        v-if="((options.showManageColumn || isUndefined(options.showManageColumn)) && !isCardView)"
                        :manage-option="columns"
                        :init-option="initColumns"
                        @get-columns-options="getColumnsOptions"
                    />

                    <div v-if="cardView" class="single-filter">
                        <button
                            v-if="!isCardView"
                            :key="'card-view'"
                            class="btn btn-filter btn-list-grid"
                            type="button"
                            @click.prevent="toggleDatatableView">
                            <app-icon :name="options.cardViewIcon ? options.cardViewIcon : 'grid'"/>
                        </button>
                        <button
                            v-else
                            :key="'list-view'"
                            class="btn btn-filter btn-list-grid"
                            type="button"
                            @click.prevent="toggleDatatableView">
                            <app-icon name="align-justify"/>
                        </button>
                    </div>

                    <!--Open Filters Button For Mobile-->
                    <button class="btn d-block d-sm-none btn-toggle-filters"
                            type="button"
                            @click.prevent="toggleFilters">
                        <app-icon :name="'filter'"/>
                        {{ $t('filters') }}
                    </button>

                    <span v-if="!isUndefined(options.filters) && options.filters.length > 0"
                          v-show="isFiltersOpen"
                          class="mobile-filters-wrapper">
                        <app-filter
                            :table-id="id"
                            :filters="options.filters"
                            :options="options"
                            @get-values="getFilterValues"
                        />

                        <button type="button"
                                class="btn btn-primary btn-with-shadow d-sm-none btn-close-filter-wrapper d-flex justify-content-center align-items-center"
                                @click="toggleFilters">
                            {{ $t('close') }}
                        </button>
                    </span>
                </div>
                <div class="ml-3 mb-2 d-flex align-items-center" v-if="options.bulkSelectCheckbox">
                    <div class="customized-checkbox checkbox-default">
                        <input type="checkbox"
                               :checked="selectedAllInclude"
                               @input="doSelectAllData($event)"
                               id="row-select-all-include"/>
                        <label for="row-select-all-include" class="text-muted mb-0">
                            {{ options.bulkSelectCheckboxLabel ? options.bulkSelectCheckboxLabel : $t('all') }}
                        </label>
                    </div>
                </div>
            </div>

            <div v-if="options.showSearch || isUndefined(options.showSearch)">
                <div class="mr-0 single-filter single-search-wrapper">
                    <app-search @input="getSearchValue"/>
                </div>
            </div>
        </div>

        <table-with-wrapper
            v-if="options.datatableWrapper || isUndefined(options.datatableWrapper)"
            :id="id"
            :options="options"
            :columns="columns"
            :card-view="isCardView"
            :filtered-data="filterForTable"
            :search-value="searchForTable"
            @unselectAllIncludeCheckbox="doUnselectAllIncludeCheckbox"
            @action="getAction"
            :key="'table-with-wrapper'+id"
        />

        <table-without-wrapper
            v-else
            :id="id"
            :options="options"
            :columns="columns"
            :card-view="isCardView"
            :filtered-data="filterForTable"
            :search-value="searchForTable"
            @unselectAllInclude="doUnselectAllIncludeCheckbox"
            @action="getAction"
            :key="'table-without-wrapper'+id"
        />
    </div>
</template>

<script>
import TableWithWrapper from "./TableWithWrapper";
import TableWithoutWrapper from "./TableWithoutWrapper";
import ManageColumns from "./ManageColumns";
import coreLibrary from '../../helpers/CoreLibrary';

export default {
    name: "AppTable",
    components: {
        TableWithWrapper,
        ManageColumns,
        TableWithoutWrapper
    },
    extends: coreLibrary,
    props: {
        id: {
            required: true,
            type: String,
        },
        options: {
            required: true,
            type: Object
        },
        filteredData: Object,
        search: String,

        // for card view
        cardView: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            filterValues: {},
            columns: [],
            isFiltersOpen: true,
            searchValue: '',
            columnModifier: '',
            isCardView: false,
            selectedAllInclude: false,
        }
    },
    watch: {
        initColumns: function (data) {
            this.columns = data;
        }
    },
    created() {
        this.columns = this.preparedColumn();
        this.isCardView = this.cardView;
    },
    beforeMount() {
        this.getCookies();
    },
    mounted() {
        this.isFiltersActive();
        window.onresize = () => {
            this.isFiltersActive();
        };
        this.setRows();
    },
    computed: {
        filterForTable() {
            let condition = this.options.datatableWrapper || this.isUndefined(this.options.datatableWrapper);
            return condition ? this.filterValues : this.filteredData;
        },
        searchForTable() {
            let condition = this.options.datatableWrapper || this.isUndefined(this.options.datatableWrapper);
            return condition ? this.searchValue : this.search;
        },
        initColumns() {
            return this.preparedColumn();
        }
    },
    methods: {
        /**
         * emit from manage-columns
         * */
        getColumnsOptions(value) {
            let data = _.cloneDeep(value);
            this.columns = data;
            this.setCookies(data);
        },

        /**
         * emit from filter
         * */
        getFilterValues(values) {
            this.filterValues = values;
            this.$emit('getFilteredValues', this.filterValues);
            setTimeout(() => {
                this.$hub.$emit('reload-' + this.id);
            });
        },

        getSearchValue(value) {
            this.searchValue = value;
            setTimeout(() => {
                this.$hub.$emit('reload-' + this.id);
            });
        },

        /**
         * for filter options
         * */
        isFiltersActive() {
            this.isFiltersOpen = window.innerWidth > 575;
        },
        toggleFilters() {
            this.isFiltersOpen = !this.isFiltersOpen;
        },

        /**
         * $emit for action
         * @param rowData
         * @param actionObj
         * @param active
         * */
        getAction(rowData, actionObj, active) {
            this.$emit("action", rowData, actionObj, active);
        },
        setRows() {
            this.$hub.$on('selectedRowsData-' + this.id, (rows) => {
                this.$emit('getRows', rows);
            });
        },

        /**
         * set value in cookies
         * */
        setCookies(values) {
            let name = this.id + '-columns',
                data = JSON.stringify(values);
            AppCookie.set(name, data);
        },

        /**
         * get value in cookies
         * */
        getCookies() {
            let name = this.id + '-columns',
                data = JSON.parse(AppCookie.get(name));
            if (data) {
                data.map((item) => {
                    if (!this.isUndefined(item.title)) {
                        item.modifier = this.getModifier(item.title);
                    }
                });
                this.columns = data;
            }
        },

        getModifier(title) {
            for (let index in this.initColumns) {
                if (this.initColumns[index].title === title && !this.isUndefined(this.initColumns[index].modifier)) {
                    this.columnModifier = this.initColumns[index].modifier;
                    break;
                }
            }
            return this.columnModifier;
        },

        preparedColumn() {
            let createdColumn = _.cloneDeep(this.options.columns);
            createdColumn.map((item) => {
                if (this.isUndefined(item.isVisible)) {
                    item.isVisible = true
                }
            });
            return createdColumn;
        },

        /**
         * Toggle Data List & Card View
         * */
        toggleDatatableView() {
            this.isCardView = !this.isCardView;
            this.$hub.$emit('reload-' + this.id, false);
        },
        doSelectAllData(e) {
            let value = e.target.checked;
            this.selectedAllInclude = value;
            this.$emit('bulkSelect', value);
            this.$hub.$emit('clickedAllIncluded', value);
        },
        doUnselectAllIncludeCheckbox() {
            this.selectedAllInclude = false;
            this.$emit('bulkSelect', false);
        }
    }
}
</script>
