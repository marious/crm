import {axiosGet} from "../../../helpers/axioshelper";

const state = {
    ProductTypeList: [],
};

const getters = {
    getProductTypeList: state => state.ProductTypeList
};

const mutations = {
    TYPES_LIST(state, data) {
        state.ProductTypeList = data;
    }
};

const actions = {
    getProductTypeList({commit}) {
        axiosGet('crm/products/product_type_list').then(response => {
            commit('TYPES_LIST', response.data);
        }).catch (error => console.log(error));
    }
};

export default {
    state,
    getters,
    mutations,
    actions
};
