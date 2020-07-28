<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録</div>

                <div class="card-body">
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control" 
                                    name="name" 
                                    v-model="name" 
                                    v-bind:class="{ 'is-invalid' : error.name }"
                                    required autocomplete="name" 
                                    autofocus>


                                <span class="invalid-feedback" role="alert" v-if="error.name">
                                    <strong>{{ error.message }}</strong>
                                </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス </label>

                        <div class="col-md-6">
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                v-model="email"
                                v-bind:class="{ 'is-invalid' : error.email }"
                                required autocomplete="email">

                                <span class="invalid-feedback" role="alert" v-if="error.email">
                                    <strong>{{ error.message }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                        <div class="col-md-6">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control" 
                                v-model="password"
                                v-bind:class="{'is-invalid' : error.password }"
                                name="password" 
                                required autocomplete="new-password">

                                <span class="invalid-feedback" role="alert" v-if="error.password">
                                    <strong>{{ error.message }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワードの確認</label>

                        <div class="col-md-6">
                            <input id="password-confirm" 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation"
                                v-model="password_confirmation" 
                                required autocomplete="new-password">

                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" @click="register()">
                                登録
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>

import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            name: '',
            password: '',
            password_confirmation: '',
            error: {}
        }
    },

    methods: {
        register: function(){
            let email = this.email;
            let name = this.name;
            let password = this.password;
            let password_conf = this.password_confirmation;

            let params = new URLSearchParams();
            params.append('email', email);
            params.append('name', name);
            params.append('password', password);
            params.append('password_confirmation', password_conf);

            axios.post('/register', params)
                .then((res)=>{
                    this.$store.dispatch("loadUser");
                    this.$store.commit("needLogin", false);
                    this.$router.replace("/");
                    
                })
                .catch((error)=>{
                    if(error.response.data){
                        let errorBody = error.response.data;
                        let errorObj = {};
                        if(errorBody.errors.email){
                            errorObj.email = errorBody.errors.email[0];
                        }
                        if(errorBody.errors.name){
                            errorObj.name = errorBody.errors.name[0];
                        }
                        if(errorBody.errors.password){
                            errorObj.password = errorBody.errors.password[0];
                        }
                        if(errorBody.errors.password_confirmation){
                            errorObj.password_confirmation = errorBody.errors.password_confirmation[0];
                        }
                        if(errorBody.message){
                            errorObj.message = errorBody.message;
                        }
                        this.error = errorObj;

                    }

                })
        }
    }
}
</script>