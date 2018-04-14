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
                <img :src="shop.picture" 
                class="img-responsive" alt="Responsive image">
            </div>
            <div>
                <a v-on:click="dislike(shop.id)"
                class="btn btn-danger" href="#" role="button">Dislike</a>
                <a v-on:click="like(shop.id)"
                class="btn btn-success" href="#" role="button">Like</a>
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
        like(shopId){
            console.log('like', shopId)
            let that = this
            // Liking a shop
            axios({
                method: 'get',
                url: '/web_coding_challenge2/public/api/like/'+shopId,
                headers: {
                    Authorization: `${localStorage.getItem('token_type')} ${localStorage.getItem('access_token')}`
                }
            }).then(function (response) {
                console.log(response)
                that.$parent.$parent.nearByShops()
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        dislike(shopId){
            console.log('dislike', shopId)
            let that = this
            // Disliking a shop
            axios({
                method: 'get',
                url: '/web_coding_challenge2/public/api/dislike/'+shopId,
                headers: {
                    Authorization: `${localStorage.getItem('token_type')} ${localStorage.getItem('access_token')}`
                }
            }).then(function (response) {
                console.log(response)
                that.$parent.$parent.nearByShops()
            })
            .catch(function (error) {
                console.log(error)
            })
        }
    }
}
</script>
