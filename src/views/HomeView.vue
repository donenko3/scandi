<template>

  <div class="container">
  <div class="home_header">
    <h3>Product List</h3>
    <div class="buttons">
    <RouterLink to="/add-product"><button>ADD</button></RouterLink>
   <button id="delete-product-btn" @click="deleteProducts">DELETE</button>
  </div>
  </div>
  <hr class="hr">
  
 <div class="products">
  <Product v-for="product in products" 
  :key="product.id" 
  :product="product"
  :addCheckedProduct="addCheckedProduct"/>
 </div>
</div>
</template>

<script>
import Product from '../components/Product.vue'
import axios from "axios"

export default {
  components: {
    Product
  },
  async created () {
    const response = await axios.get('https://scandiwebtaskenko.000webhostapp.com/')
    this.products = response.data;
    console.log(response.data);
  },
  data () {
    return {
      products: [],
      productsToDelete:[]
    }
  },
  methods: {
    addCheckedProduct(id, checked) {
      if(checked && !this.productsToDelete.includes(id)) {
        this.productsToDelete.push(id);
        
      } else  {
        this.productsToDelete = this.productsToDelete.filter(prod => prod !== id)
      }
        console.log(this.productsToDelete);
    },
    async deleteProducts() {

      try {
      if(this.productsToDelete.length > 0) {
        const response = fetch("https://scandiwebtaskenko.000webhostapp.com/", {
      method: "POST", // or 'PUT'
      
      body: JSON.stringify({ids: this.productsToDelete}),
    })
    .then(res => res.json())
    .then(data => {
      this.products = this.products.filter(prod => !this.productsToDelete.includes(prod.id));
    })

      }
    } catch (err) {
      console.log(err);
    }
        }

  }
}
</script>
<style scoped>
.home_header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.buttons button{
  margin-right: 5px;
  padding: 7px 15px;
    border-radius: 5px;
    border: none;
    color: white;
    background-color: #264653;
}
.products {
  width: 100%;
  height: 320px;
  display: flex;
  flex-wrap: wrap;
  /* overflow-x: scroll; */
  align-items: center;
  gap: 40px;
  /* scroll-snap-type: x mandatory; */
  /* border: 1px solid black; */
}
::-webkit-scrollbar {
    height: 10px;
}
::-webkit-scrollbar-thumb {
    background-color: #264653;
    border-radius: 5px;
}
::-webkit-scrollbar-track {
    background: transparent;
  }
</style>
