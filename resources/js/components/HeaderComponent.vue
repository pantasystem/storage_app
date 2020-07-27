<template>
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <!--{{ config('app.name', 'Laravel') }}-->
                    ふぁいるさーばー
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!--@guest-->
                            <li class="nav-item" v-if="!user">
                                <router-link to="/login">ログイン</router-link>
                                <!--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>-->
                            </li>
                            <!--@if (Route::has('register'))-->
                                <li class="nav-item" v-if="!user">
                                    <router-link to="/register">登録</router-link>
                                    <!--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
                                </li>
                            <!--@endif-->
                            <!--@else-->
                            <li class="nav-item dropdown" v-if="user">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!--{{ Auth::user()->name }} <span class="caret"></span>-->
                                    {{ user.name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" @click="logout()" >ログアウト</a>
                                    
                                </div>
                            </li>
                        <!--@endguest-->
                    </ul>
                </div>
            </div>
        </nav>
</template>
<script>
export default {

    data() {
        return {
            //user: null

        }
    },
    
    methods: {
        logout : function(){

        }
    },
    computed: {
        user() {
            let u = this.$store.getters.getUser;
            console.log("on header user:" + JSON.stringify(u));
            return u;

        }
    }
    
}
</script>