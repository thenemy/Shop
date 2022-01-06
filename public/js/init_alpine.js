document.addEventListener('alpine:init', () => {
    Alpine.data('initBaseDropDown', (name) => ({
        isOpen: false,
        name: name,
        value: undefined,
        closeDrop(value, name) {
            this.isOpen = false;
            this.name = name;
            this.value = value;
        }
    }))
    Alpine.data('initDropDown', (name, model_name) => ({
        isOpen: false,
        name: name,
        value: undefined,
        closeDrop(value, name) {
            this.isOpen = false;
            this.name = name;
            this.value = value;
            this.$wire.set(model_name, value, true);
        }
    }))
    Alpine.data('initUploadFile', () => ({
        progress: 0,
        isUploading: false,
        uploadDropFile(event) {
            event.preventDefault();
            this.upload(event.dataTransfer.files);
        },
        setUploading(e) {
            this.isUploading = true;
        },
        stopUploading(event) {
            this.isUploading = false;
        },
        setProgress(event) {
            this.progress = event.detail.progress;
        },
        upload(files) {
            this.$dispatch("change-progress-start", {});
            this.$wire.uploadMultiple("fileCustom", files, (uploadedFilename) => {
                this.$dispatch("change-progress-finish", {});
            }, () => {
                this.$dispatch("change-progress-error");
            }, (event) => {
                this.$dispatch("change-progress", {
                    progress: event.detail.progress,
                });
            })
        },
        uploadFiles(event) {
            this.upload(event.target.files);
        }
    }))
})
