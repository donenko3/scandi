<?php

?>

<style>
    [v-cloak] {
        display: none
    }
</style>

<div id="app" v-cloak>
<p>{{test}}</p>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/vue-router"></script>
    <script>
        const App = Vue.createApp({
            data () {
                return {
                    test: 'test',
                    products: []
                }
            },
           async created () {
            const response = await axios.get('http://localhost:3000/home')
            this.products = response.data;
            console.log(response);
            }
        });


        App.mount('#app')

    </script>



