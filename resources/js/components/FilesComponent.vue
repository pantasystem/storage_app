<template>
    <div class="card">
                <div class="card-header">{{ name }}のファイル一覧</div>

                <div class="card-body">
                    <div v-for="file in files" :key="file.id">
                        <div class="file_item">
                            <a :href='"storage/" + file.path'>
                                {{ file.name }}
                            </a>
                            
                        <button class="delete_file" @click="deleteFile(file.id)">削除</button>
                        
                        </div>
                    </div>        
                    
                </div>
            </div>
</template>

<script>

export default {
    data: function (){
        return {
            files: [],
            user: {
                name: ''
            }
        }
    },

    methods(){
        function deleteFile(fileId){
            
        }
    }
}
</script>