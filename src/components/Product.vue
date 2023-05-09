<template>
    <div class="product">
        <input type="checkbox" :checked="this.checked" @click="toggleChecked">
        <p class="product-sku">SKU: {{product.sku}}</p>
        <p class="product-name">Name: {{product.name}}</p>
        <p class="product-price">Price: ${{product.price}}</p>
        <p class="product-type">Type: {{product.type}}</p>
        <p v-if="product.size" class="product-size">Size: {{product.size}}</p>
        <p v-if="product.weight" class="product-weight">Weight: {{product.weight}}</p>
        <p v-if="this.renderDimensions(product.length, product.height, product.width)" 
        class="product-dimension">Dimension: {{product.length}}
         x {{ product.height }} x {{ product.width }}</p>
    </div>

</template>

<script>

export default {
props:['product', 'addCheckedProduct'],
methods: {
    renderDimensions(length, height, width){
        if(!length || !height || !width){
            return false;
        }
        return true;
    },
    toggleChecked() {
        this.checked = !this.checked;
        this.addCheckedProduct(this.product.id, this.checked);
        // console.log(this.checked);
    }
},
data () {
    return {
        checked: false
    }
}
}
</script>