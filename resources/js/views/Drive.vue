<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" v-if="user">
            <file-upload-component></file-upload-component>
            <files-component></files-component>
            
        </div>
        
        
    </div>
</div>
</template>
<script>
import FileUploadComponent from './../components/FileUploaderComponent';
import FilesComponent from './../components/FilesComponent';
export default {
    components: {
        'file-upload-component': FileUploadComponent,
        'files-component': FilesComponent
    },

    created: function(){
        let need = this.$store.getters.getNeedLogin;

        console.log("Drive created need:" + need);
    },
    computed:{
        isNeedLogin(){
            return this.$store.getters.getNeedLogin;
        },
        user(){
            return this.$store.getters.getUser;
        }
    },
    watch: {
        isNeedLogin(value, old){
            if(value == true){
                console.log("Drive: ログインが必要です");
                this.$router.replace("/login");
            }
        }
    }
}
</script>