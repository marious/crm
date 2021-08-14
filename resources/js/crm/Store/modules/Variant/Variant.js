import {axiosGet} from "../../../helpers/axioshelper";

const state = {
    productVariantList: []
};

const getters = {
    getProductVariant: state => state.productVariantList
};

const mutations = {
    SET_PRODUCT_VARIANT_INFO(state, data) {
        state.productVariantList = data;
    }
};

const actions = {
    getProductVariant({commit}) {
        axiosGet('crm/product/attributes?all').then(response => {
            commit('SET_PRODUCT_VARIANT_INFO', response.data);
        }).catch (error => console.log(error));
    }
};

export default {
    state,
    getters,
    mutations,
    actions
};
