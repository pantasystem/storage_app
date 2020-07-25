<template>
<div class="card">
    <div class="card-header">
        ファイルのアップロード
                        
    </div>
    
    <div class="card-body">
        <input type="file" name="file" class="form-control-file">
        <button type="submit" class="btn btn-primary" id="upload-button" @click="upload()">アップロード</button>
    </div>
</div>
</template>
<script>
export default {
    data: function(){
        return {
            file: ''
        }
    },

    methods :{
        upload: function(){
            console.log(file);
        }
    }
}
</script>