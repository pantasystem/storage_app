<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body">
                    
                     <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-6">
                            <input 
                                id="email" 
                                type="email" 
                                v-bind:class="{'is-invalid' : error.email}"
                                class="form-control" 
                                name="email" 
                                v-model="email" 
                                required autocomplete="email" autofocus
                                >

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
                                v-bind:class="{ 'is-invalid' : error.password }" 
                                name="password" 
                                required autocomplete="current-password"
                                v-model="password">

                            <span class="invalid-feedback" role="alert" v-if="error.password">
                                    <strong>{{ error.message }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="isRemember">

                                <label class="form-check-label" for="remember">
                                        ログインを保持する
                                </label>
                            </div>
                        </div>
                    </div>
                     <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" @click="login()">
                                    ログイン
                                </button>

                                <!--
                                <router-link to="/reset_password" class="btn btn-link">パスワードリセット</router-link>
                                -->   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    
    data: function(){
        return {
            email: 'hogehoge@panta.jp',
            password: 'hogehogemover',
            isRemember: true,
            error: {
                email: '',
                password: '',
                message: 'error test'
            }
        }
    },

    methods: {
        login: function(){

        }
    }
}
</script>