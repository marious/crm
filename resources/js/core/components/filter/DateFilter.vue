<template>
    <div class="single-filter date-filter">
        <v-date-picker color="blue"
                       v-model="value"
                       @input="input"
                       mode="date"
                       :isDark="$store.state.theme.darkMode"
                       :masks="{
                       input:[dateFormat],
                       inputDateTime:[dateFormat+' h:mm A'],
                       inputDateTime24hr:[dateFormat+' HH:mm'],
                       inputTime:['h:mm A'],
                       inputTime24hr:['HH:mm']
                       }"
                       :popover="{visibility: 'click', placement: 'bottom-start'}">
            <template v-slot="{ inputValue, inputEvents }">
                <button class="btn btn-filter"
                        :class="{'applied': isApply}"
                        :id="filterId"
                        data-toggle="dropdown"
                        v-on="inputEvents"
                        aria-haspopup="true" aria-expanded="false">
                    {{ inputValue && isApply ? inputValue : $t('today') }}
                    <span class="clear-icon" v-if="isApply" @click.prevent="clear($event)">
                        <app-icon :name="'x'"/>
                    </span>
                </button>
            </template>
        </v-date-picker>
    </div>
</template>

<script>
import {FilterMixin} from './mixins/FilterMixin';
import CoreLibrary from "../../helpers/CoreLibrary";
import moment from 'moment/moment'

export default {
    name: "DateFilter",
    extends: CoreLibrary,
    mixins: [FilterMixin],
    data() {
        return {
            isApply: false,
            value: new Date(),
        }
    },
    mounted() {
        this.sendValue(this.value)
    },
    methods: {
        clear(e) {
            e.stopPropagation();
            this.isApply = false;
            this.value = new Date();
            this.sendValue(this.value);
        },
        input(value) {
            this.isApply = true;
            this.sendValue(value);
        },
        sendValue(value) {
            this.returnValue(moment(value).format('YYYY-MM-DD').toString());
        }
    }
}
</script>

