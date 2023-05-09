<template>
<nav>
    
</nav>
</template>
<script>
export default {
  name: 'NavBar',
  data () {
    return {
    }
  },
  methods: {
   
  },
}
</script>
<style scoped>
nav {
    padding: 10px 0;
    min-height: 75px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #264653;
}
.nav-title {
    font-size: 24px;
    font-weight: 700;
    margin: 5px 0 7px 0;
}
.nav-search-input {
    min-width: 200px;
    height: 30px;
    border-radius: 5px;
    border: none;
}
.nav-search-btn {
    margin-left: 7px;
    border-radius: 5px;
    border: none;
    padding: 7px 11px;
}
.search-bar {
    /* padding-bottom: 10px; */
}
</style>
