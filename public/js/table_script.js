function table_init() {
    let pressTimer;

    $(".longpress").mouseup(function () {
        clearTimeout(pressTimer);
        return false;
    }).mousedown(function () {
        // Set timeout
        let current = this;
        pressTimer = window.setTimeout(function () {
            showing(current)
        }, 600);
        return false;
    });


    window.addEventListener('table_check', function (e) {
        let pressTimer;
        $(".longpress").mouseup(function () {
            clearTimeout(pressTimer);
            return false;
        }).mousedown(function () {
            // Set timeout
            let current = this;
            pressTimer = window.setTimeout(function () {
                showing(current)
            }, 600);
            return false;
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook("element.updated", function (e) {
                $(".table_checker").each(function () {
                    let checkBox = $(this).find(".checkbox-show input[type=checkbox]:checked")
                    if (checkBox.length > 0) {
                        $(this).find(".checkbox-show").removeClass("hidden");
                    }
                });
            }
        )
    });

    return {}
}

function findParent(current) {
    return $(current).parents(".table_checker");
}

function showing(current) {
    findParent(current).find('.checkbox-show').removeClass('hidden')
}

function hideCheck(current) {

    findParent(current).find('.checkbox-show').addClass('hidden')
}

function removeChecker(current) {
    findParent(current).find('.checkbox-show input[type=checkbox]').prop('checked', false);
}

function selectAll(current) {
    findParent(current).find('.checkbox-show input[type=checkbox]').prop('checked', true);
}


function initSchemaSMS(comment) {
    let object = {
        show: false,
        type: 1,
        loading: false,
        comment: comment,
        setComponent(type, comment) {
            this.type = type;
            if (this.comment !== comment) {
                this.loading = true;
            }
            this.comment = comment;

        },
        setComment(comment) {
            this.comment = comment
        },
        setToComment(add) {
            this.comment = this.comment + add;
        },
        close(wire) {
            wire.save(this.type)
        }
    }

    Livewire.hook("element.updated", function (e) {
        if (object.loading === true) {
            console.log("UPDATED");
            object.loading = false;
        }
    });

    return object;
}

function setInitWidth() {
    return {
        width: 30,
        getStyle() {
            return `width:${this.width}%`;
        },
        setWidth(event) {
            console.log(event.target.offsetWidth);
        }
    }
}
