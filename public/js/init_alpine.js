document.addEventListener('alpine:init', () => {
    Alpine.data('initBaseDropDown', (name) => (
        {
            isOpen: false,
            name: name,
            initial_name: name,
            value: undefined,
            uniqueId: undefined,
            initId() {
                console.log("ASDS");
                this.uniqueId = this.$wire.get('uniqueId');
                console.log(this.uniqueId);
            },
            closeDrop(value, name) {
                this.isOpen = false;
                this.name = name;
                this.value = value;
            },
            loadingDropDown(id, name) {
                this.$dispatch("loading-dropdown", {
                    name: name
                });
            },
            setDropName(name) {
                console.log(name);
                this.name = name;
            },
            sendValues(value, name) {
                this.$dispatch("change-state-dropdown", {
                    value: value,
                    name: name
                });
            },
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
// document.addEventListener('search_event', () => {
//     Alpine.data('initBaseDropDown', (name) => ({
//         isOpen: false,
//         name: name,
//         value: undefined,
//         closeDrop(value, name) {
//             this.isOpen = false;
//             console.log("clicked");
//             console.log(name);
//             console.log(value);
//             this.name = name;
//             this.value = value;
//         }
//     }))
// });

function $dispatch(eventName, {target, cancelable, data} = {}) {
    const event = document.createEvent("Events")
    event.initEvent(eventName, true, cancelable === true)
    event.data = data || {}
    if (event.cancelable && !preventDefaultSupported) {
        const {preventDefault} = event
        event.preventDefault = function () {
            if (!this.defaultPrevented) {
                Object.defineProperty(this, "defaultPrevented", {get: () => true})
            }
            preventDefault.call(this)
        }
    }
    (target || document).dispatchEvent(event);
    return event
}
