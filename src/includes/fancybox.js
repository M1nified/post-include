(function(jQuery){
    jQuery(function() {
        jQuery("a[rel=group]").fancybox({
            transitionIn: "none",
            transitionOut: "none",
            titlePosition: "over",
            titleFormat: function(n, t, o) {
                return '<span id="fancybox-title-over">Zdjęcie ' + (o + 1) + " / " + t.length + (n.length ? " &nbsp; " + n : "") + "</span>"
            }
        })
    });
})(jQuery);
