<script>
    function init(unique_id) {
        return {
            unique_id: unique_id,
            progress: 0,
            isUploading: false,
            setUploading(e) {
                console.log(e);
                if (e.data.id === unique_id) {
                    this.isUploading = true;
                }
            },
            stopUploading(event) {
                if (event.data.id === unique_id) {
                    this.isUploading = false;
                }
            },
            setProgress(event) {
                if (event.data.id === unique_id) {
                    this.progress = event.data.progress;
                }
            }
        }
    }

    $('.upload_file_button').click(function () {
        $(this).parents(".file_upload").find(".hidden-input").click();
    })

    function $dispatch(eventName, {target, cancelable, data} = {}) {
        const event = document.createEvent("Events")
        event.initEvent(eventName, true, cancelable == true)
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



    // reset counter and append file to gallery when file is dropped
    function dropHandler(ev) {
        ev.preventDefault();
    }

    // only react to actual files being dragged
    function dragEnterHandler(e) {
        e.preventDefault();
        // let overlay = $(e.target).parents(".file_upload").find(".overlay");
        // ++counter && overlay.addClass("draggedover");
    }

    function dragLeaveHandler(e) {
        // let overlay = $(e.target).parents(".file_upload").find(".overlay");
        // 1 > --counter && overlay.removeClass("draggedover");
    }

    function dragOverHandler(e) {
        e.preventDefault();
    }

</script>
