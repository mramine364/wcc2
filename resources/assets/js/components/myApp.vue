<template>
<div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="#">
                    ShopList
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li v-if="!isAuth">
                        <a href="#" v-on:click="showLoginForm">
                            Login
                        </a>
                    </li>
                    <li v-if="!isAuth">
                        <a href="#" v-on:click="showRegistrationForm">Register</a>
                    </li>

                    <li v-if="isAuth" v-bind:class="{active: iactive==0}">
                        <a href="#" v-on:click="nearByShops">Near by shops</a>
                    </li>
                    <li v-if="isAuth" v-bind:class="{active: iactive==1}">
                        <a href="#" v-on:click="preferredShops">Preferred shops</a>
                    </li>
                    <li class="dropdown" v-if="isAuth">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <span v-text="user.name"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>            
        </div>
    </nav>
    <login></login>
    <register></register>
    <div class="container">
        <shops v-if="shops" v-bind:shops="shops"></shops>
    </div>
</div>
</template>

<script>
    export default {
        
        /*
         * The component's data.
         */
        data() {
            return {
                isAuth: false,
                iactive: 0,
                user: {
                    id: null,
                    name: null,
                    email: null,
                    latitude: null,
                    longitude: null
                },
                shops: null
            }
        },
        created() {
            console.log('myapp created')
            // Authentication
            let tt = localStorage.getItem('token_type')
            let ei = localStorage.getItem('expires_in')
            let at = localStorage.getItem('access_token')
            let rt = localStorage.getItem('refresh_token')
            let un = localStorage.getItem('username')
            let si = localStorage.getItem('saved_in')
            if(tt && ei && at && rt && un && si){
                if((new Date).getTime()-si>ei*1000){
                    // token expired
                    console.log('token expired')
                }
                else{
                    this.isAuth = true
                    this.user.name = un
                }
            }
            this.nearByShops()
        },
        methods: {
            showLoginForm(){
                console.log('showLoginForm')
                $('#login-modal').modal('show')
            },
            showRegistrationForm(){
                console.log('showRegistrationForm')
                $('#register-modal').modal('show')
            },
            nearByShops(){
                console.log('nearByShops')
                let that = this
                // Get nearby shops
                axios({
                    method: 'get',
                    url: '/web_coding_challenge2/public/api/nearby',
                    headers: {
                        Authorization: `${localStorage.getItem('token_type')} ${localStorage.getItem('access_token')}`
                    }
                }).then(function (response) {
                    console.log(response)
                    that.shops = response.data.data
                })
                .catch(function (error) {
                    console.log(error)
                })
                this.iactive = 0
            },
            preferredShops(){
                console.log('preferredShops')
                let that = this
                // Get preferred shops
                axios({
                    method: 'get',
                    url: '/web_coding_challenge2/public/api/preferred',
                    headers: {
                        Authorization: `${localStorage.getItem('token_type')} ${localStorage.getItem('access_token')}`
                    }
                }).then(function (response) {
                    console.log(response)
                    that.shops = response.data.data
                })
                .catch(function (error) {
                    console.log(error)
                })
                this.iactive = 1
            }
        }
    }
</script>
