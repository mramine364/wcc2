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
                                <input id="name" type="text" class="form-control" v-model="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password2" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password2" type="password" class="form-control" v-model="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required>
                            </div>
                        </div>

                        <!-- User location to retreive shops and Order them by distance -->
                        <div class="form-group">
                            <label for="latitude" class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input id="latitude" type="latitude" class="form-control" v-model="latitude" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="longitude" class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input id="longitude" type="longitude" class="form-control" v-model="longitude" required>
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
