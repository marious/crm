<template>
    <div class="dropdown-search-select">
        <div class="search-filter-dropdown" :class="{'disabled': data.disabled}">
            <div class="dropdown dropdown-with-animation" :class="{'chips-dropdown': data.isAnimatedDropdown}">
                <div class="p-2 chips-container custom-scrollbar"
                     id="dropdownMenuLink"
                     data-toggle="dropdown"
                     @click="startNavigation">
                    <span class="chips d-inline-block mr-2 mb-2" v-for="(chip, index) in selectedOptions" :key="index">
                        <span class="mx-3">{{ chip }}</span>
                        <span class="delete-chips" @click.prevent="deleteChips($event, index)">
                            <app-icon :name="'x'"/>
                        </span>
                    </span>
                    <span class="add">+ {{ $t("add") }}</span>
                </div>
                <div class="dropdown-menu chips-dropdown-menu py-0" :class="data.listClass"
                     aria-labelledby="dropdownMenuLink">

                    <div class="form-group form-group-with-search">
                        <span class="form-control-feedback">
                            <app-icon name="search"/>
                        </span>

                        <input type="text"
                               ref="searchInput"
                               :class="'form-control '+data.listItemInputClass"
                               v-bind:value="searchValue"
                               @input="getSearchValue($event)"
                               :placeholder="data.placeholder"
                               @keydown.down="navigateDown"
                               @keydown.up="navigateUp"
                               @keydown.enter.prevent="enterSelectedValue"
                               :autofocus="startNavigation">
                    </div>

                    <div class="dropdown-divider my-0"/>
                    <div class="dropdown-search-result-wrapper custom-scrollbar" ref="optionList">
                        <a v-for="(option, index) in options"
                           :key="index"
                           class="dropdown-item"
                           :class="{'active':index==activeIndex, 'disabled selected': isChipSelected(option.id), 'disabled':option.disabled}"
                           href="#" @click.prevent="addChips(option)">
                            {{ option[data.listValueField] }}
                            <span class="check-sign float-right">
                                <app-icon :name="'check'" class="menu-icon"/>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {InputMixin} from './mixin/InputMixin.js';
import {NavigationMixin} from "./mixin/NavigationMixin";

export default {
    name: "MultiSelect",
    mixins: [InputMixin, NavigationMixin],
    data() {
        return {
            searchValue: ""
        }
    },
    computed: {
        options() {
            this.activeIndex = -1;
            let instance = this;
            if (!_.isEmpty(instance.searchValue)) {
                return instance.data.list.filter(option => {
                    return option[this.data.listValueField].toLowerCase().includes(instance.searchValue.toLowerCase());
                });
            } else return instance.data.list;
        },
        selectedOptions() {
            let arr = [],
                instance = this;
            for (let item of instance.value) {
                for (let smItem of instance.data.list) {
                    if (item === smItem.id && !arr.includes(smItem[instance.data.listValueField])) {
                        arr.push(smItem[instance.data.listValueField])
                    }
                }
            }
            return arr;
        }
    },
    methods: {
        getSearchValue($event) {
            this.searchValue = $event.target.value;
        },
        enterSelectedValue() {
            this.options.filter((option, index) => {
                if (index == this.activeIndex) {
                    this.addChips(option)
                }
            });
            this.endNavigation();
        },
        isChipSelected(value) {
            return this.value.includes(value);
        },
        addChips(chip) {
            this.value.push(chip.id);
            this.changed();
            this.searchValue = "";
        },
        deleteChips(event, index) {
            event.stopPropagation();
            this.value.splice(index, 1);
            this.changed();
        },
        changed() {
            this.$emit('input', this.value);
        }
    }
}
</script>

