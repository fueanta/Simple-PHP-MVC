// config for js
const URLROOT = 'http://localhost/office_mvc/';

// highlight current page on navbar
$(function () {
    // this will get the full URL at the address bar
    var url = window.location.href;

    // passes on every "a" tag
    $("#nav-tool ul li a").each(function () {
        // checks if its the same on the address bar
        if (url == (this.href)) {
            $(this).closest("li").addClass("active");
            //for making parent of submenu active
            $(this).closest("li").parent().parent().addClass("active");
        }
        else if (url == URLROOT) {
            $("#nav-home").closest("li").addClass("active");
        }
    });
});