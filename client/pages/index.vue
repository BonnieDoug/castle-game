<template>
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
                    <v-btn @click="createGame">Create Game</v-btn>
                    <pre>{{ games }}</pre>
                </v-card-text>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
  import {mapState, mapGetters} from 'vuex'

  export default {
    fetch: ({store, params}) => {
      store.dispatch('play/FETCH_GAMES')
    },
    computed: {
      ...mapState({
        games: 'play/games'
      }),
      ...mapGetters({
        games: 'play/GET_GAMES'
      })
    },
    methods: {
      createGame () {
        this.$store.dispatch('play/create')
      }
    }
  }
</script>
