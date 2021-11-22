// let pressTimer;
// $(".longpress").mouseup(function () {
//     clearTimeout(pressTimer);
//     return false;
// }).mousedown(function () {
//     // Set timeout
//     let current = this;
//     pressTimer = window.setTimeout(function () {
//         showing(current)
//     }, 600);
//     return false;
// });
// Array.from(document.getElementsByClassName("longpress")).forEach(function (e) {
//     e.addEventListener('mouseup', function () {
//         console.log('ASD');
//     }, false);
// });
// document.addEventListener('long-press-event', function (e) {
//     console.log("SHOW");
// });
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
function findParent(current) {
    return $(current).parents(".table_checker");
}
Livewire.hook('element.updated', (el, component) => {
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
})
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
