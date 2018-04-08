<style scoped>
.mygrids {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(182px, 1fr));
    grid-gap: 10px;
}
</style>

<template>
    <div class="mygrids">
        <shop v-for="shop in shops" v-bind:key="shop.id" v-bind:shop="shop"></shop>
    </div>
</template>
<script>
export default {
    props: ['shops'],
    data(){
        return {
            
        }
    },
    created(){
        console.log('shops created')
        console.log(this.shops)
    },
    methods: {
        
    }
}
</script>
