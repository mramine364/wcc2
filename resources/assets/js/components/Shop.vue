<style scoped>
.mygrid{
    margin: 0;
}
.mypanel-img-container {
    margin-bottom: 10px;
    margin-top: 10px;
}
.mypanel-img-container img{
    width: 100%;
}
.mypanel-title{
    font-weight: bold;
}
</style>

<template>
    <div class="panel panel-default mygrid">
        <div class="panel-body">
            <div class="mypanel-header-container">
                <div class="mypanel-title" v-text="shop.name"></div>
                <small class="mypanel-subtitle" v-text="shop.city"></small>
            </div>
            <div class="mypanel-img-container">
                <img src="http://placehold.it/150x150" 
                class="img-responsive" alt="Responsive image">
            </div>
            <div>
                <a class="btn btn-danger" href="#" role="button">Dislike</a>
                <a class="btn btn-success" href="#" role="button">Like</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['shop'],
    data(){
        return {
            
        }
    },
    created(){
        console.log('shop created')
        console.log(this.shop)
    },
    methods: {
        
    }
}
</script>
