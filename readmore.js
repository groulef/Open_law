$(document).ready(function() {
    $(".message").hide();
    $("a#readmore").click(function(){
        $(".message").show("slow");
        $(this).hide();
    });
});

$(document).ready(function() {
    $(".message1").hide();
    $("a#readmore1").click(function(){
        $(".message1").show("slow");
        $(this).hide();
    });
});