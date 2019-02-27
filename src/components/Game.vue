<template>
    <v-container>
        <v-layout
                column
                justify-center
                align-center
        >
            <v-flex
                    xs12
                    sm8
                    md6
            >
                <v-card>
                    <v-card-text>
                        <h1>The Game</h1>
                        <p>There are three types of buildings in this game:</p>
                        <ul>
                            <li>Castle
                                <ul>
                                    <li>The Castle has a lifespan of 100 Hit Points.</li>
                                    <li>When the Castle is hit, 10 Hit Points are deducted from it's lifespan.</li>
                                    <li>If/When the Castle has run out of Hit Points, the city is taken regardless
                                        of the state of the other buildings
                                    </li>
                                    <li>There is only 1 Castle.</li>
                                </ul>
                            </li>
                            <li>House
                                <ul>
                                    <li>Houses have a lifespan of 75 Hit Points.</li>
                                    <li>When a House is hit, 20 Hit Points are deducted from it's lifespan.</li>
                                    <li>There are 4 Houses.</li>
                                </ul>
                            </li>
                            <li>Farm
                                <ul>
                                    <li>Farms have a lifespan of 50 Hit Points.</li>
                                    <li>When a Farm is hit, 25 Hit Points are deducted from it's lifespan.</li>
                                    <li>There are 4 Farms.</li>
                                </ul>
                            </li>
                        </ul>
                        <h2>How to Play:</h2>
                        <ul>
                            <li>To play, either click 'Start New Game', or select a previously started game.</li>
                            <li>The selection of a building is random.</li>
                            <li>Trebuchets are old and not too accurate tools therefore leave 10% chance for
                                missing the target in any given attack.</li>
                            <li>The result of each attack will be displayed.</li>
                            <li>When all the buildings are destroyed, a success message will be shown.</li>
                        </ul>

                    </v-card-text>
                    <v-toolbar v-if="game">
                        <v-spacer/>
                        <v-btn @click="attack(game.key)">Attack</v-btn>
                    </v-toolbar>
                    <v-card-text>
                        <v-container v-if="game" grid-list-md text-xs-center>
                            <v-layout row wrap>
                                <v-flex xs3 :xs12="building.name === 'Castle'" v-for="(building, key) in game.buildings"
                                        :key="key">
                                    <v-card :color="!building.target ? 'white' : building.hit ? 'green' : 'red'">
                                        <h3>{{ building.name }}</h3>
                                        <p v-if="building.target">Shot {{ building.hit ? 'Hit!' : 'Missed!' }}</p>
                                        <v-progress-circular
                                                size="70" width="5"
                                                :value="((building.health / building.maxHealth) * 100)"
                                                :color="((building.health / building.maxHealth) * 100) < 40 ? 'red' : 'green darken-4'"
                                        >
                                            {{building.health }} {{building.maxhealth}} / {{ building.health }} hp
                                        </v-progress-circular>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
  import {mapState, mapGetters} from 'vuex'
  export default {
    name: 'Game',
    mounted: function () {
      this.$store.dispatch('Game/fetchGames')
    },
    computed: {
      ...mapState({
        games: 'Game/games',
        game: 'Game/game'
      }),
      ...mapGetters({
        games: 'Game/GET_GAMES',
        game: 'Game/GET_GAME'
      })
    },
    methods: {
      createGame () {
        this.$store.dispatch('Game/create')
      },
      getGame (id) {
        this.$store.dispatch('Game/fetchGame', id)
      },
      attack (id) {
        this.$store.dispatch('Game/attack', id)
      }
    },
    data: () => {
      return {
        inGame: false
      }
    }
  }
</script>

<style>

</style>
