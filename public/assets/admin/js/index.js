// dropdown

$(".dropdown_head").click(function (e) {
    $(this).addClass("active");
    // $(this).parent().find(".dropdown_inner").addClass("show");
    $(this).parent().find(".dropdown_inner").slideDown();
});
