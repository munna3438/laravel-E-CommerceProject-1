// dropdown

$(".dropdown_head").click(function (e) {
    $(".accordion").find(".dropdown_inner").slideUp();
    $(".accordion").find(".dropdown_head").removeClass("active");
    $(this).addClass("active");
    $(this).parent().find(".dropdown_inner").slideDown();
});
/**
 *     $(".qms_faq_head").click(function () {
        let $this = $(this);
        if ($this.hasClass("active")) {
            $this.removeClass("active");
        } else {
            $this.parent().parent().find("li div").removeClass("active");
            $this.toggleClass("active");
        }
        if ($this.next().hasClass("show")) {
            $this.next().removeClass("show");
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find("li .inner").removeClass("show");
            $this.parent().parent().find("li .inner").slideUp(350);
            $this.next().toggleClass("show");
            $this.next().slideToggle(350);
        }
    });
 */

// hide alert
$(".hide_area").click(function () {
    $(this).parent().hide();
});
