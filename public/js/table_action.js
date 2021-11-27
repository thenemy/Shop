$(".delete-icon").on('click', function () {
    let parent = $(this).parents(".delete-form");
    parent[0].submit();
});
