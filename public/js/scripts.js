pushContentBelowNavbar();
keepFooterWhereItShouldBe();

function pushContentBelowNavbar() {
    if (document.getElementById('below-navbar')) {
        var navHeight = document.getElementById('navbar').clientHeight;
        document.getElementById('below-navbar').style.top = navHeight + "px";
    }
}

function keepFooterWhereItShouldBe() {
    if (document.getElementById('copyright-footer')) {
        var rect = document.getElementById('copyright-footer').getBoundingClientRect();
        var footerY = rect.top;
        var footerHeight = document.getElementById('copyright-footer').clientHeight;
        var viewportHeight = window.innerHeight;
        if (footerY < viewportHeight - footerHeight) {
            var navHeight = document.getElementById('navbar').clientHeight;
            var narrowHeight = viewportHeight - navHeight - footerHeight;
            document.getElementById('narrow').style.height = narrowHeight + "px";
        }
    }
}

window.onresize = function() {
    pushContentBelowNavbar();
    keepFooterWhereItShouldBe();
}