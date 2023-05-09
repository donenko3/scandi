<template>
    <div class="container">

        <h3>Select a product to add :</h3>


        <form @submit.prevent="handleSubmit($event)"  id="product_form">
            <div class="input">
                <p v-if="this.errors['sku']">{{this.errors['sku'][0]}}</p>
                <label for="sku">SKU</label>
                <input type="text" id="sku" name="sku" v-model="sku">
            </div>
            <div class="input">
                <p v-if="this.errors['name']">{{this.errors['name'][0]}}</p>
                <label for="name">Name</label>
                <input type="text" id="name" v-model="name" name="name">
            </div>
            <div class="input">
                <p v-if="this.errors['price']">{{this.errors['price'][0]}}</p>
                <label for="price">Price</label>
                <input type="number" id="price" v-model="price" name="price">
            </div>
            <div class="input">
                <p v-if="this.errors['type']">{{this.errors['type'][0]}}</p>
                <select @change="displayType" name="type" id="productType" v-model="type">
                    <option value="" disabled>Select Type</option>
                    <option value="dvd" id="DVD">DVD</option>
                    <option value="furniture" id="Furniture">Furniture</option>
                    <option value="book" id="Book">Book</option>
                </select>
            </div>
                <!-- <div class="product-select"></div> -->
                <Furniture 
                :errors="this.errors"
                :setHeight="(height) => this.height = height"
                :setWidth="(width) => this.width = width"
                :setLength="(length) => this.length = length"
                v-if="this.type === 'furniture'"/>
                <Book 
                :error="this.errors"
                :setWeight="(weight) => this.weight = weight"
                v-if="this.type === 'book'"/>
                <DVD 
                :error="this.errors"
                :setSize="(size) => this.size = size"
                v-if="this.type === 'dvd'"/>

                <div class="input">
                    <input type="submit" value="Save" />
                </div>
        </form>
        <div v-if="this.products.length !== 0" v-for="product in products">
       {{ product }}
        </div>
    </div>
</template>
<script>
import axios from "axios"
import Furniture from '../components/Furniture.vue'
import Book from '../components/Book.vue'
import DVD from '../components/DVD.vue'


export default {
    
    data (){
        return {
            type:"",
            sku:"",
            name:"",
            price:"",
            weight:"",
            height: null,
            length:"",
            width:"",
            size:"",
            products: [],
            errors: []
        }
    },
    components: {
        Furniture,
        Book,
        DVD
    },
    name: 'AddProduct',
    methods: {

       async handleSubmit(event) {
            const data = {
                sku: this.sku,
                name: this.name,
                type: this.type.trim().toLowerCase(),
                price:this.price ? Number(this.price): null,
                weight: this.weight? Number(this.weight) : null,
                height: this.height? Number(this.height) : null,
                length: this.length?  Number(this.length) : null,
                size: this.size ?  Number(this.size) : null,
                width: this.width? Number(this.width) : null
            }
            try {
        //    const response = await axios.post('https://scandiwebtaskenko.000webhostapp.com/', data)
        //    console.log(response);

        const response = fetch("https://scandiwebtaskenko.000webhostapp.com/", {
        // const response = fetch("https://scandiwebtaskenko.000webhostapp.com/", {
      method: "POST", // or 'PUT'
      
      body: JSON.stringify(data),
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        const errors = data.errors;
            if(data !== 'success'){
                this.errors = errors
                // console.log(data);
            } else {
                this.$router.push('/');
                console.log("success");
            }
    })





        //    const errors = response.data.errors;
        //    const result = response.data;
        //     if(result !== 'success'){
        //         this.errors = errors
        //         console.log(this.errors);
        //     } else {
        //         this.$router.push('/');
        //         console.log("success");
        //     }
           
        } catch (error){
            console.log(error);
        }
        }
    }
}
</script>

<style scoped>
p {
    color: red;
}
</style>