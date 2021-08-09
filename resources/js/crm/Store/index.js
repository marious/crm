import Vue from "vue";
import Vuex from "vuex";
import {formatted_date, formatted_time} from "../Helpers/helpers";
import ProductTypeList from "./modules/Product/Product";
import CategoryList from "./modules/Category/Category";
import BrandsList from "./modules/Brand/Brand";
import UnitList from "./modules/Unit/Unit";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loading: false,
        settings: {
            dateFormat: formatted_date(),
            timeFormat: parseInt(formatted_time()),
        },
        theme: {
            darkMode: false,
        }
    },
    mutations: {

    },
    modules: {
        ProductTypeList,
        CategoryList,
        BrandsList,
        UnitList
    }
});
