import {axiosGet} from "../../../helpers/axioshelper";

const state = {
    brandList: [],
};

const getters = {
    getBrand: state => state.brandList
};

const mutations = {
    SET_BRAND_INFO(state, data) {
        state.brandList = data;
    }
};

const actions = {
    getBrand({commit}) {
        axiosGet(`crm/product/brands?all`)
            .then(({data}) => {
                commit("SET_BRAND_INFO", data);
            }).catch (err => console.log(err));
    }
};

export default {
    state,
    getters,
    mutations,
    actions
};
