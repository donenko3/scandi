<template>
  <NavBar :GetSearchedMovies="GetSearchedMovies"/>
  <router-view :searchMovies="searchMovies"/>
</template>
<script>
import NavBar from './components/Navbar.vue'
export default {
  components: {
    NavBar
  },
  methods: {
    
  },
  data () {
    return {
    }
  }
}
</script>
<style scoped>
body {
  background: #264653;
}
</style>
