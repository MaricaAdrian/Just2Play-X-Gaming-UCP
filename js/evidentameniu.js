console.log(window.location.pathname);
if(window.location.pathname == "/ucp/" || window.location.pathname== "/j2p/" ){
$("#navbar ul.navbar-right li a[href='index.php']").parents("li").addClass("active");
}
$("#navbar ul.navbar-right li a").each(function() {   
    if (this.href == window.location.href) {
        $(this).parents("li").addClass("active");
    }
});
$("#navbar ul li.dropdown ul.dropdown-menu li a").each(function() {   
    if (this.href == window.location.href) {
        $(this).parents("li").addClass("active");
    }
});