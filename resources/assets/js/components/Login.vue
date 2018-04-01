<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" id="login-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        
                        <form class="form-horizontal" method="POST" action="#" @submit.prevent="onSubmit">

                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">E-Mail Or Username</label>

                                <div class="col-md-6">
                                    <input id="username" class="form-control" v-model="username">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
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
            username: null,
            password: null
        }
    },
    methods: {
        onSubmit(){
            console.log('onsubmit', this.username, this.password)
        }
    }
}
</script>
