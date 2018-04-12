<template>
  <div id="app">
    <v-app>
      <v-navigation-drawer app>
        <div id="nav">
          <router-link to="/">List</router-link> |
          <router-link to="/add">Add</router-link> |
          <router-link to="/popular">Popular</router-link>
        </div>
      </v-navigation-drawer>
      <v-toolbar app></v-toolbar>
      <v-content>
        <v-container fluid>
          <router-view></router-view>
        </v-container>
      </v-content>
      <v-footer app></v-footer>

    </v-app>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import { actions } from '@/store'

  export default {
    mounted() {
      this.load()
    },
    methods: {
        ...mapActions({
            load: actions.LOAD_ITEMS
        })
    }
  }
</script>

<style lang="scss">
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
  a {
    font-weight: bold;
    color: #2c3e50;
    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
