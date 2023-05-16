<template>
                    <p class="error" v-if="this.error['weight']">{{this.error['weight'][0]}}</p>
    <div class="input-type">
                    <label for="Book">Weight (KG)</label>
                    <input type="number" @change="this.setWeight(this.weight)" 
                    v-model="weight" min="0" step="0.01" id="Book" placeholder="Please enter weight"> 
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


