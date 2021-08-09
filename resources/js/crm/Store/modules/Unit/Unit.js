import {axiosGet} from "../../../helpers/axioshelper";

const state = {
    unitList: [],
};

const getters = {
    getUnit: state => state.unitList
};

const mutations = {
    SET_UNIT_INFO(state, data) {
        state.unitList = data;
    }
};

const actions = {
    getUnit({commit}) {
        axiosGet(`crm/product/units?all`)
            .then(({data}) => {
                commit('SET_UNIT_INFO', data);
            }).catch ((err) => console.log(err));
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}
