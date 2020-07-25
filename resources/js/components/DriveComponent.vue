<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <file-upload-component></file-upload-component>
            <files-component></files-component>
            
        </div>
        
        
    </div>
</div>
</template>
<script>
import FileUploadComponent from './FileUploaderComponent';
import FilesComponent from './FilesComponent';
export default {
    components: {
        'file-upload-component': FileUploadComponent,
        'files-component': FilesComponent
    }
}
</script>