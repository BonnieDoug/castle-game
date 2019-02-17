import  axios  from  'axios'

const game = {
  namespaced: true,
  state: {
    games: null,
    game: null,
    loading: false
  },
  mutations: {
    SET_GAMES (state, payload) {
      state.games = payload
    },
    SET_GAME (state, payload) {
      state.game = payload
    },
    SET_LOADING (state, payload) {
      state.loading = payload
    }
  },
  getters: {
    GET_GAMES: (state) => {
      return state.games
    },
    GET_GAME: (state) => {
      return state.game
    },
    GET_LOADING: (state) => {
      return state.loading
    }
  },
  actions: {
    async fetchGames ({commit}) {
      let {data} = await axios.get(`http://localhost/game`, {
        withCredentials: true
      })
      commit('SET_GAMES', data)
    },
    async fetchGame ({commit}, id) {
      let {data} = await axios.get(`http://localhost/game/${id}`, {
        withCredentials: true
      })
      commit('SET_GAME', data)
    },
    async create ({commit, dispatch}) {
      let {data} = await axios.get(`http://localhost/game/new`, {
        withCredentials: true
      })
      dispatch('fetchGames')
      commit('SET_GAME', data)
    },
    async attack ({commit}, id) {
      // Really should be PUT, not GET, but hitting some CORS issue with _SESSION so using GET for now.
      let {data} = await axios.get(`http://localhost/game/${id}/hit`, {
        withCredentials: true
      })
      commit('SET_GAME', data)
    },
    async resetGames ({commit}) {
      axios.delete(`http://localhost/game/reset`, {
        withCredentials: true
      })
      commit('SET_GAME', null)
    }
  }
}

export default game
