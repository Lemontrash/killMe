<template>
    <form id="upload_files" class="formBody" method="POST" action="/store" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf">


        <div class="theme-row" v-for="fileInput in fileInputs">
            <div class="inp-group text-inp-group">
              <label for="" class="inp-caption">{{fileInput.caption}}</label>
              <div class="inp-wrap">
                <input type="text" :name="fileInput.name+'_name'" id="" placeholder="File" v-model="fileInput.fileName" required>
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <label class="theme-btn upload-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                    <path d="M 6 3 C 4.895 3 4 3.895 4 5 L 4 22 C 4 23.105 4.895 24 6 24 L 14 24 L 14 11.414062 L 11.707031 13.707031 C 11.316031 14.098031 10.683969 14.098031 10.292969 13.707031 C 9.9019687 13.316031 9.9019687 12.683969 10.292969 12.292969 L 14.292969 8.2929688 C 14.487969 8.0979687 14.744 8 15 8 C 15.256 8 15.512031 8.0979688 15.707031 8.2929688 L 19.707031 12.292969 C 20.098031 12.683969 20.098031 13.316031 19.707031 13.707031 C 19.316031 14.098031 18.683969 14.098031 18.292969 13.707031 L 16 11.414062 L 16 24 L 24 24 C 25.105 24 26 23.105 26 22 L 26 5 C 26 3.895 25.105 3 24 3 L 6 3 z M 16 24 L 14 24 L 14 28 C 14 28.552 14.448 29 15 29 C 15.552 29 16 28.552 16 28 L 16 24 z"/>
                </svg>
                Upload
                <input type="file" accept="image/*" :name="fileInput.name" @change="processFile($event, fileInput)" required>
            </label>
        </div>

        

        <div class="theme-row all-file-upload drop-area">
            <input type="file" accept="image/*" multiple>
            <div class="text-col">
                <p>Drop files here, paste, or import from one of the locations above</p>
                <small>jpg, png,svg pull up to 1 MB</small>
            </div>
            <div class="img-col">
                <img src="/img/ico-files.png" alt="">
            </div>
        </div>

        <div class="theme-row">
            <button type="submit" class="theme-btn btn-blue w-100 ttu jc-center">Continue</button>
        </div>
    </form>
</template>

<script>
    export default {
        props: [
        ],
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            fileInputs: [
                {'caption' : 'ID picture', name: 'id_picture', file: null, fileName: ''},
                {'caption' : 'Selfie picture', name: 'selfie_picture', file: null, fileName: ''},
                {'caption' : 'Bank transfer', name: 'bank_transfer', file: null, fileName: ''},
                {'caption' : 'DOD', name: 'dod', file: null, fileName: ''},
            ]
        }),
        methods: {
            processFile: function(event, file){
                console.log(file);
                file.file = event.target.files[0];
                file.fileName = event.target.files[0].name;
            },
            submitForm: function(){
                var formData = new FormData();
                this.fileInputs.forEach(function(fileInput){
                    //var file = new File([fileInput.file], fileInput.fileName, {type: fileInput.file.type});
                    formData.append(fileInput.name, fileInput.file, fileInput.fileName);
                });
                axios({
                    url: '/api/verificateFiles',
                    method: 'post',
                    data: formData,
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then(function(resposnse){
                    console.log(response);
                });
            }
        },
        mounted() {
            console.log(this.csrf);
        }
    }
</script>
