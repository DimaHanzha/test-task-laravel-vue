<template>
    <div>
        <vuetable ref="vuetable"
                  :fields="['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages']"
                  data-path=""
                  pagination-path=""
        ></vuetable>
    </div>
</template>

<script>

import Vuetable from 'vuetable-2'

export default {
    name: "House",

    props: {
        result: {
            type: Object,
            required: true,
        },
    },

    components: {
        Vuetable
    }
}

</script>

<style scoped>

</style>
