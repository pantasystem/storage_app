<template>
    <div class="card">
                <div class="card-header">{{ user.name }}のファイル一覧</div>

                <div class="card-body">
                    <div v-for="file in files" :key="file.id">
                        <div class="file_item">
                            <a :href='"storage/" + file.path'>
                                {{ file.name }}
                            </a>
                            
                        <button class="delete_file" @click="deleteFile(file)">削除</button>
                        
                        </div>
                    </div>        
                    
                </div>
            </div>
</template>

<script>

export default {
    data: function (){
        return {
            
        }
    },

    methods: {
        deleteFile: function(file){
            console.log("削除します");
            this.$store.dispatch("deleteFile", file);
        }
    },
    mounted: function(){
        this.$store.dispatch("loadFiles");
    },

    computed: {
        /*...mapGetters({
            user: 'getUser',
            files: 'getFiles'
        })*/
        user() {
            let u = this.$store.getters.getUser;
        
            //console.log("FilesComponent user:" + JSON.stringify(u));
            return u;
        },
        files() {
            return this.$store.getters.getFiles;
        }
    }
    
}
</script>