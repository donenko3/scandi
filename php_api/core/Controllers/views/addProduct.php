<?php

?>

<form  id="product_form">
            <div class="input">
                <label for="sku">SKU</label>
                <input type="text" id="sku" name="sku" >
            </div>
            <div class="input">
                <label for="name">Name</label>
                <input type="text" id="name"  name="name">
            </div>
            <div class="input">
                <label for="price">Price</label>
                <input type="number" id="price"  name="price">
            </div>
            <div class="input">
                <select  name="type" id="productType" >
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
                :error="this.errors['weight']"
                :setWeight="(weight) => this.weight = weight"
                v-if="this.type === 'book'"/>
                <DVD 
                :error="this.errors['size']"
                :setSize="(size) => this.size = size"
                v-if="this.type === 'dvd'"/>

                <div class="input">
                    <input type="submit" value="Save" />
                </div>
        </form>