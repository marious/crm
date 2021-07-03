import coreLibrary from '../../../helpers/CoreLibrary';

export const TableMixin = {
    extends: coreLibrary,
    props: {
        id: {
            type: String,
            required: true
        },
        options: {
            required: true,
            type: Object
        },
        columns: {
            required: true,
            type: Array
        },
        cardView: {
            type: Boolean,
            default: false
        },
        filteredData: {
            type: Object,
            default: function () {
                return {};
            }
        },
        searchValue: String
    },
    computed: {
        allColumnDisable() {
            let disabledColumns = this.columns.filter(column => column.isVisible !== false);
            return disabledColumns.length <= 0;
        },
        expandableColumn() {
            return this.columns.find(element => element.type === 'expandable-column');
        },
        visibleColumnCount() {
            return this.columns.filter(element => element.isVisible).length + (this.options.enableRowSelect ? 1 : 0)
        }
    },
    methods: {
        getAction(rowData, actionObj, active) {
            this.actionTriggered = true;
            this.$emit("action", rowData, actionObj, active);
        },
        expandableColumnClassName(row,column){
            return this.expandableColumn.modifier(row[this.expandableColumn.key],row).className
                ? this.expandableColumn.modifier(row[this.expandableColumn.key],row).className
                : (column.className?column.className : 'warning');
        }
    }
};
