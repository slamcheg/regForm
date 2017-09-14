var notificationTimer = null;

$('#sendPhone').on('click', function () {
    if (phoneValidation($('#phone').val())) {
        showNotification('Code was sent on your phone');
        getCode();
    } else {
        showNotification('Phone is not valid');
    }

});

$('#sendCode').on('click', function () {
    var authId = getCookie('authId');
    document.cookie = "codeConfirmed=0";
    if (authId == $('#authCode').val()) {
        location.href = '/?r=registration';
        document.cookie = "codeConfirmed=1";
    } else {
        showNotification('Error : Code is not correct');
    }
});

$('.repeatCode').on('click', function () {
    toggleCodeBox(false);
    togglePhoneBox(true);
});

$('.notification').on('click', function () {
    hideNotification();
});

function showNotification(text) {
    var notificationBox = $('.notification');
    notificationBox.find('.text').html(text);
    notificationBox.show();
    notificationTimer = setInterval(hideNotification, 15000);
}

function hideNotification() {
    var notificationBox = $('.notification');
    notificationBox.hide();
    notificationBox.find('.text').html('');
    if (notificationTimer !== null)
        clearInterval(notificationTimer);
}

function getCode() {
    $.ajax({
        url: "/?r=code",
        type: "JSON",
        method: "POST",
        data: {
            phone: $('#phone').val()
        },
        success: function (response) {
            if (!response.error) {
                togglePhoneBox(false);
                toggleCodeBox(true);
                showNotification('Your code: ' + response.code);
                document.cookie = "authId=" + response.code;
                document.cookie = "phone=" + $('#phone').val();
            } else {
                showNotification('Error');
            }
        }
    })
}

function togglePhoneBox(show) {
    if (show)
        $('.box.phone').show();
    else
        $('.box.phone').hide()
}

function toggleCodeBox(show) {
    if (show)
        $('.box.code').show();
    else
        $('.box.code').hide()
}

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function phoneValidation(phone) {
    var regExp = new RegExp("^((\\+38|)+([0-9]){10})$");
    return regExp.test(phone);

}