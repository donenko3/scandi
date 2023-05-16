<template>
    <p class="error" v-if="this.error['size']">{{this.error['size'][0]}}</p>
<div class="input-type">
                    <label for="size">Size (MB)</label>
                    <input type="number" @change="this.setSize(this.size)"
                     min="0" v-model="size" id="size" placeholder="Please enter size">
                    </div>
</template>

<script>
export default {
    props:['setSize', 'error'],
    data () {
        return {
            size: null
        }
    }
}
</script>


