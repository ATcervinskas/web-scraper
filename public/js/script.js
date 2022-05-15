$(document).ready(function () {
    var currentURL = (document.URL);
    var part = currentURL.split("/")[3];

    $('.nav-item').each(function () {
        if ($(this).text().toLowerCase() === part) {
            $(this).addClass('active')
        }else
        {
            $(this).removeClass('active')
        }
    })

});
