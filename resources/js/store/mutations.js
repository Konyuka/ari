const mutations = {
  setOnline(state, online) {
    state.online = online;
  },
  setChannelDetails(state, channelDetails) {
    state.channelDetails = channelDetails;
  },
  setChannels(state, channels) {
    state.channels = channels;
  },
  setEndpoints(state, endpoint) {
    state.endpoint = endpoint;
  },
};

export default mutations