$(".delete-icon").on('click', function () {
    let parent = $(this).parents(".delete-form");
    console.log(parent);
    parent[0].submit();
});
