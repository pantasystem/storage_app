<template>
<div class="card">
    <div class="card-header">
        ファイルのアップロード
                        
    </div>
    
    <div class="card-body">
        <input type="file" name="file" class="form-control-file" @change="selectedFile">
        <button type="submit" class="btn btn-primary" id="upload-button" @click="upload()">アップロード</button>
    </div>
</div>
</template>
<script>
import axios from 'axios';

export default {
    
    data: function(){
        return {
            file: null
        }
    },

    methods :{
        selectedFile: function(event){
            let files = event.target.files;
            console.log(files[0]);
            this.file = files[0];

        },
        
        uploadFile: function(){
            let self = this;
            let form = new FormData();
            form.append("file", this.file);
            axios.post("/files", form)
                .then((res)=>{
                    this.$store.dispatch("loadFiles");
                    console.log(res);
                }).catch(function(error){
                    console.log("uploadError:" + error);
                });
        },
        upload: function(){
            console.log(this.file);
            this.uploadFile();
        },
    }
}
</script>