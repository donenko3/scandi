<template>
    <div class="input">
        <p v-if="this.errors['height']">{{this.errors['height'][0]}}</p>
                    <label for="height">Height (CM)</label>
                    <input type="number" @change="this.setHeight(this.height)" id="height" v-model="height" name="height">
                    </div>
                    <div class="input">
                        <p v-if="this.errors['width']">{{this.errors['width'][0]}}</p>
                    <label for="weight">Width (CM)</label>
                    <input type="number" @change="this.setWidth(this.width)" min="0" step="0.01" id="weight" v-model="width" name="width">
                    </div>
                    <div class="input">
                        <p v-if="this.errors['length']">{{this.errors['length'][0]}}</p>
                    <label for="length">Length (CM)</label>
                    <input type="number" @change="this.setLength(this.length)" min="0" step="0.01" id="length" v-model="length" name="length">
                    </div>
</template>

<script>
export default {
    props: ['setHeight', 'setWidth', 'setLength', 'errors'],
    data () {
        return {
            height: null,
            width: null,
            length: null
        }
    }
}
</script>