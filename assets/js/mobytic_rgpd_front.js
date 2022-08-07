document.addEventListener("DOMContentLoaded", function () {
    // localStorage.setItem('cookies_enabled', '0'); // No cookies

    document.getElementById('mobytic-rgpd').style.display = 'block';

    setTimeout(function() {
        if (localStorage.getItem('cookies_enabled') == null) {
            // display banner
            
            document.getElementById('checkbox_rgpd').checked = true;
            
            document.getElementById("checkbox_rgpd").addEventListener("click", function () {
                localStorage.setItem('cookies_enabled', '1'); // Yes cookies
            });
            
        }
    }, 1000);
});