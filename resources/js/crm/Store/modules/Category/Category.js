    import {axiosGet} from "../../../helpers/axioshelper";

const state = {
    categoryList: [],
};

const getters = {
    getCategory: state => state.categoryList
};

const mutations = {
    SET_CATEGORY_INFO(state, data) {
        state.categoryList = data;
    }
};

const actions = {
    getCategory({commit}) {
        axiosGet(`crm/product/categories?all`)
            .then(({data}) => {
                commit('SET_CATEGORY_INFO', data);
            }).catch ((err) => console.log(err));
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}
