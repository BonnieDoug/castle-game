<template>
  <v-app>
    <v-navigation-drawer app permanent>
      <v-toolbar dark flat color="red darken-2">
        <v-list>
          <v-list-tile>
            <v-list-tile-title class="title">
              My Games
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-toolbar>

      <v-divider></v-divider>

      <v-list dense class="pt-0">
        <v-list-tile @click="createGame()">
          <v-list-tile-action>
            <v-icon>add</v-icon>
          </v-list-tile-action>
          <v-list-tile-title>
            Start New Game
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-for="(game, key, index) in games"
                     :key="key"
                     @click="getGame(key)">
          <v-list-tile-action>
            <v-icon>play_circle_filled</v-icon>
          </v-list-tile-action>
          <v-list-tile-title>
            Play Game #{{ index + 1 }}
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-if="games && games.length > 0" @click="resetGames()">
          <v-list-tile-action>
            <v-icon>refresh</v-icon>
          </v-list-tile-action>
          <v-list-tile-title>
            Reset Games
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar dark app color="red darken-3">
      <v-toolbar-title class="headline text-uppercase">
        <span>sport:</span>
        <span class="font-weight-light">80</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn
        flat
        href="https://github.com/vuetifyjs/vuetify/releases/latest"
        target="_blank"
      >
        <span class="mr-2">Castle Game</span>
      </v-btn>
    </v-toolbar>

    <v-content>
      <Game/>
    </v-content>
  </v-app>
</template>

<script>
import Game from './components/Game'
import {mapState, mapGetters} from 'vuex'
export default {
  name: 'App',
  mounted: function () {
    this.$store.dispatch('Game/fetchGames')
  },
  computed: {
    ...mapState({
      games: 'Game/games'
    }),
    ...mapGetters({
      games: 'Game/GET_GAMES'
    })
  },
  methods: {
    createGame () {
      this.$store.dispatch('Game/create')
    },
    getGames () {
      this.$store.dispatch('Game/fetchGames')
    },
    getGame (id) {
      this.$store.dispatch('Game/fetchGame', id)
    },
    resetGames () {
      this.$store.dispatch('Game/resetGames')
    }
  },
  components: {
    Game
  },
  data () {
    return {
      //
    }
  }
}
</script>
