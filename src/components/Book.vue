<template>
    <div class="input">
                    <label for="Book">Weight (KG)</label>
                    <p v-if="this.error['weight']">{{this.error['weight'][0]}}</p>
                    <input type="number" @change="this.setWeight(this.weight)" v-model="weight" min="0" step="0.01" id="Book"> 
                    </div>
</template>

<script>
export default {
    props:['setWeight', 'error'],
    data () {
        return {
            weight: null
        }
    }
}
</script>