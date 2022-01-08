// function init(unique_id, object) {
//     window.livewire.on("file-dropped", (event) => {
//         let files = event.dataTransfer.files;
//         downloadFile(event.target, files)
//     });
//     $('#' + unique_id).on("change", function (e) {
//         let main = e.target;
//         let id_some = $(main).parents(".file_upload").attr("uniqueId");
//         console.log(id_some);
//         let files = main.files;
//         downloadFile(main, files)
//     });
//
//     function downloadFile(main, files) {
//         let id_some = $(main).parents(".file_upload").attr("uniqueId");
//         $dispatch("change-progress-start", {
//             data: {
//                 id: id_some
//             }
//         });
//         object.uploadMultiple('fileCustom', files,
//             (uploadedFilename) => {
//                 $dispatch("change-progress-finish", {
//                     data: {
//                         id: id_some
//                     }
//                 });
//             }, () => {
//                 $dispatch("change-progress-error", {
//                     data: {
//                         id: id_some
//                     }
//                 });
//             }, (event) => {
//                 $dispatch("change-progress", {
//                     data: {
//                         progress: event.detail.progress,
//                         id: id_some
//                     }
//                 });
//             })
//     }
//
//     return {
//         unique_id: unique_id,
//         progress: 0,
//         isUploading: false,
//         setUploading(e) {
//             if (e.data.id === unique_id) {
//                 this.isUploading = true;
//             }
//         },
//         stopUploading(event) {
//             if (event.data.id === unique_id) {
//                 this.isUploading = false;
//             }
//         },
//         setProgress(event) {
//             if (event.data.id === unique_id) {
//                 this.progress = event.data.progress;
//             }
//         }
//     }
// }
//
// $('.upload_file_button').click(function () {
//     $(this).parents(".file_upload").find(".hidden-input").click();
// })
//

//
//
// // reset counter and append file to gallery when file is dropped
// function dropHandler(ev) {
//     ev.preventDefault();
// }
//
// // only react to actual files being dragged
// function dragEnterHandler(e) {
//     e.preventDefault();
//     // let overlay = $(e.target).parents(".file_upload").find(".overlay");
//     // ++counter && overlay.addClass("draggedover");
// }
//
// function dragLeaveHandler(e) {
//     // let overlay = $(e.target).parents(".file_upload").find(".overlay");
//     // 1 > --counter && overlay.removeClass("draggedover");
// }
//
// function dragOverHandler(e) {
//     e.preventDefault();
// }
//


