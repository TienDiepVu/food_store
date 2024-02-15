
document.addEventListener('DOMContentLoaded', function () {
    
    document.querySelector('#phone_number').onchange = function () {
        var phone = document.querySelector('#phone_number').value.trim();
        if (!/^\d+$/.test(phone) || phone.length !== 10) {
            document.getElementById('phone-warning').innerText = "Số điện thoại gồm 10 số và không chưa kí tự đặc biệt!";
            
        } else {
            document.getElementById('phone-warning').innerText = '';
        }
    };

    document.querySelector('#password').onkeyup = function () {
        var pass = document.querySelector('#password').value.trim();
        if (pass.length < 6) {
            document.getElementById('pass-warning').innerText = "Mật khẩu phải có tối thiểu 6 kí tự!";
        } else {
            document.getElementById('pass-warning').innerText = '';
        }
    };


});