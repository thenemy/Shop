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


