export const state = () => ({
  games: [],
  game: {},
  loading: false
})

export const mutations = {
  SET_GAMES (state, payload) {
    state.games = payload
  },
  SET_GAME (state, payload) {
    state.game = payload
  },
  SET_LOADING (state, payload) {
    state.loading = payload
  }
}
export const getters = {
  GET_GAMES: (state) => {
    return state.games
  },
  GET_GAME: (state) => {
    return state.game
  },
  GET_LOADING: (state) => {
    return state.loading
  }
}
export const actions = {
  async FETCH_GAMES ({commit}) {
    state.loading = true
    let {data} = await this.$axios.get(`/game`)
    commit('SET_GAMES', data)
    state.loading = false
  },
  async create () {
    let {data} = await this.$axios.get(`/game/new`)
    commit('SET_GAME', data)
  }
}


