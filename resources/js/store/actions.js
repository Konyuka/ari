const actions = {
    setOnline({ commit }, online) {
        commit("setOnline", online);
    },
    setChannelDetails({ commit }, channelDetails) {
        commit("setChannelDetails", channelDetails);
    },
    setChannels({commit}, channels) {
        commit("setChannels", channels);
    },
    setEndpoints({ commit }, endpoints) {
        commit("setEndpoints", endpoints);
    },
};

export default actions
