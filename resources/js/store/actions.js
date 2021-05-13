const actions = {
    setChannels({commit}, channels) {
        commit("setChannels", channels);
    },
    setEndpoints({ commit }, endpoints) {
        commit("setEndpoints", endpoints);
    },
};

export default actions
