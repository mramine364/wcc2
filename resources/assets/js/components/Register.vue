<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" id="register-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Register</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form class="form-horizontal" method="POST" action="#" @submit.prevent="onSubmit">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password2" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password2" type="password" class="form-control" v-model="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation">
                            </div>
                        </div>

                        <!-- User location to retreive shops and Order them by distance -->
                        <div class="form-group">
                            <label for="latitude" class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input id="latitude" type="latitude" class="form-control" v-model="latitude">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="longitude" class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input id="longitude" type="longitude" class="form-control" v-model="longitude">
                            </div>                           
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-default" @click="getLocation">
                                    Get Location
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            latitude: null,
            longitude: null
        }
    },
    methods: {
        onSubmit(){
            console.log('onsubmit\n', this.name, this.email, this.password, this.password_confirmation, this.latitude, this.longitude)
            let that = this
            axios({
                method: 'post',
                url: '/web_coding_challenge2/public/api-register',
                data: {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    latitude: this.latitude,
                    longitude: this.longitude
                }
            }).then(function (response) {
                console.log(response);
                if(response.data.access_token){
                    localStorage.setItem('token_type', response.data.token_type)
                    localStorage.setItem('expires_in', response.data.expires_in)
                    localStorage.setItem('access_token', response.data.access_token)
                    localStorage.setItem('refresh_token', response.data.refresh_token)
                    localStorage.setItem('username', that.username)
                    localStorage.setItem('saved_in', new Date().getTime())
                    that.$parent.isAuth = true
                    that.$parent.user.name = that.name

                    that.name = that.email = that.password = that.password_confirmation = ""
                    that.latitude = that.longitude = ""
                    // $('#createLabelModal .modal-backdrop').trigger('click')
                    $('#register-modal').modal('hide')
                }
                else{
                    // show errors
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        getLocation(){
            console.log('getLocation.')
            if (navigator.geolocation)
                navigator.geolocation.getCurrentPosition(this.showPosition)
            else      
                console.log("Geolocation is not supported by this browser.")
        },
        showPosition(position){
            console.log('showPosition.')
            this.latitude = position.coords.latitude
            this.longitude = position.coords.longitude
        }
    }
}
</script>
