<template>
  <div>
      <form class="search">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="fields.name" placeholder="Name">
            </div>
            <div class="col-md-4 mb-3">
                <label for="bedrooms">Bedrooms</label>
                <input type="text" class="form-control" id="bedrooms" v-model="fields.bedrooms" placeholder="Bedrooms">
            </div>
            <div class="col-md-4 mb-3">
                <label for="bathrooms">Bathrooms</label>
                <input type="text" class="form-control" id="bathrooms" v-model="fields.bathrooms" placeholder="Bathrooms">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="storeys">Storeys</label>
                <input type="text" class="form-control" id="storeys" v-model="fields.storeys" placeholder="Storeys">
            </div>
            <div class="col-md-3 mb-3">
                <label for="garages">Garages</label>
                <input type="text" class="form-control" id="garages" v-model="fields.garages" placeholder="Garages">
            </div>
            <div class="col-md-3 mb-3">
                <label for="min-price">Min Price</label>
                <input type="text" class="form-control" id="min-price" v-model="fields.minPrice" placeholder="Min Price">
            </div>
            <div class="col-md-3 mb-3">
                <label for="max-price">Max Price</label>
                <input type="text" class="form-control" id="max-price" v-model="fields.maxPrice" placeholder="Max Price">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" type="button" @click="search">Search</button>
                </div>
            </div>
        </div>
      </form>
      <house v-if="result" :result="result"></house>
  </div>
</template>

<script>

import House from "../components/House";

export default {
    name: "Index",

    components: {
        House
    },

    data() {
        return {
            fields: {
                name: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
                minPrice: '',
                maxPrice: ''
            },
            result: null,
        }
    },
    methods: {
        search() {
            axios.get('/api/v1/search', {
                params: this.params
            })
            .then(response => {
                Vue.set(this, 'result', response.data)
            })
            .catch(error => {});
        }
    },
    computed: {
        params() {
            const params = new URLSearchParams();

            params.append('name', this.fields.name);
            params.append('bedrooms', this.fields.bedrooms);
            params.append('bathrooms', this.fields.bathrooms);
            params.append('storeys', this.fields.storeys);
            params.append('garages', this.fields.garages);
            params.append('min_price', this.fields.minPrice);
            params.append('max_price', this.fields.maxPrice);

            return params;
        }
    }
}
</script>

<style scoped>
</style>
