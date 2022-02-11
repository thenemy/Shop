var Alpine = window.Alpine;

// document.addEventListener("DOMContentLoaded", () => {
//     Livewire.hook('element.updated', (el, component) => {
//
//     })
// });
document.addEventListener('alpine:init', () => {
    Alpine.data('initSchemaSMS', function (comment) {
        return {
            show: false,
            type: 1,
            loading: false,
            comment: comment,
            setComponent(type, comment) {
                this.type = type;
                this.comment = comment;
            },
            setComment(comment) {
                this.comment = comment
            },
            setToComment(add) {
                this.comment = this.comment + add;
            },
            close(wire) {
                wire.save(this.type);
            }
        };
    })
    Alpine.data('initDynamic', function (id) {
        return {
            show: false,
            id: id,
            showInput(event) {
                if (event.detail.id.toString() === this.$el.dataset.id) {
                    this.show = event.detail.show;
                    console.log(this.show);
                }
            },
        }
    })
    Alpine.data("dataMoney", function () {
        return {
            // text: textInput,
            isEditing: false,
            toggleEditingState() {
                this.isEditing = !this.isEditing;
                if (this.isEditing) {
                    this.$nextTick(() => {
                        this.$refs.input.focus();
                    });
                }
            },
            disableEditing() {
                this.isEditing = false;
            },
            enableEditing() {
                this.isEditing = true;
            }
        };
    })
    Alpine.data("modalWindow", function () {
        return {
            show: false,
            open() {
                this.show = true;
                console.log("opening");
            },
        }
    })
    Alpine.data('initBaseDropDown', (name) => (
        {
            isOpen: false,
            name: name,
            initial_name: name,
            value: undefined,
            uniqueId: undefined,
            initId() {
                this.uniqueId = this.$wire.get('uniqueId');
            },
            closeDrop(value, name) {
                this.isOpen = false;
                this.name = name;
                this.value = value;
            },
            closeDropLivewire(value, name) {
                this.closeDrop(value, name);
                const emiting = this.$wire.get("emiting");
                console.log(emiting);
                if (emiting) {
                    this.$wire.emit(emiting, value);
                }
            },
            loadingDropDown(name) {
                console.log(this.initial_name);
                // this.$dispatch("loading-dropdown", {
                //     name: this.initial_name
                // });
            },
            setDropName(name) {
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
