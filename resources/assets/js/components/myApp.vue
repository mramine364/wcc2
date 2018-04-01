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
                user: {
                    id: null,
                    name: null,
                    email: null,
                    latitude: null,
                    longitude: null
                }
            }
        },
        methods: {
            showLoginForm(){
                console.log('showLoginForm')
                $('#login-modal').modal('show')
            },
            showRegistrationForm(){
                console.log('showRegistrationForm')
                $('#register-modal').modal('show')
            }
        }
    }
</script>
