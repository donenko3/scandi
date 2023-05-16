<template>
    <div class="product">
        <input type="checkbox" class="delete-checkbox" :checked="this.checked" @click="toggleChecked">
        <p class="product-sku">SKU: {{product.sku}}</p>
        <p class="product-name">Name: {{product.name}}</p>
        <p class="product-price">Price: ${{product.price}}</p>
        <p class="product-type">Type: {{product.type}}</p>
        <p v-if="product.size" class="product-size">Size: {{product.size}} MB</p>
        <p v-if="product.weight" class="product-weight">Weight: {{product.weight}} KG</p>
        <p v-if="this.renderDimensions(product.length, product.height, product.width)" 
        class="product-dimension">Dimension: {{product.length}}cm
         x {{ product.height }}cm x {{ product.width }}cm</p>
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

<style scoped>

    .product {
        padding: 10px 15px;
        width: 250px;
        height: 200px;
        border: 1px solid black;
    }
    .product input {
        margin: 5px 0 0 5px;
        }
    .product p {
        margin: 5px 0 0 5px;
    }
</style>