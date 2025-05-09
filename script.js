function toggleView(viewId) {
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(viewId + 'View').classList.add('active');
}

let captchaCode = "";
function generateCaptcha() {
    captchaCode = Math.random().toString(36).substring(2, 8).toUpperCase();
    document.getElementById("captcha-text").innerText = captchaCode;
}

function validateCaptcha() {
    const userCaptcha = document.getElementById("captcha-input").value.toUpperCase();
    if (userCaptcha !== captchaCode) {
        alert("Invalid CAPTCHA. Please try again.");
        generateCaptcha();
        return false;
    }
    return true;
}

window.onload = generateCaptcha;


document.getElementById("registrationForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const sendBtn = document.getElementById('send_otp');
    const otpMsg = document.getElementById("otpMsg");
    const otpErr = document.getElementById("otpErr");

    otpMsg.textContent = "";
    otpErr.textContent = "";

    sendBtn.disabled = true;
    sendBtn.style.cursor = "not-allowed";

    const formData = new FormData(this);

    fetch("send_email.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                alert('✅ OTP sent Email in spam');
                document.getElementById("otpForm").style.display = "block";
            }

            else if (data.trim() === "already_registered") {
                alert('✅ already_registered');
                sendBtn.disabled = false;
                sendBtn.style.cursor = "pointer";
            }
            else if (data.trim() === "already_password") {
                alert('❌ Already password stored database');
                sendBtn.disabled = false;
                sendBtn.style.cursor = "pointer";
            }

            else if (data.trim() === "phone") {
                alert('❌ Invalid Phone Number');
                sendBtn.disabled = false;
                sendBtn.style.cursor = "pointer";
            }

            else if (data.trim() === "email") {
                alert('Already Email registered');
                sendBtn.disabled = false;
                sendBtn.style.cursor = "pointer";
            }
            else if (data.trim() === "password") {
                alert('❌ Password do not match');
                sendBtn.disabled = false;
                sendBtn.style.cursor = "pointer";
            }

            else {
                alert('❌ Failed to send OTP: ' + data);
                sendBtn.disabled = false;
                sendBtn.style.cursor = "pointer";
            }
        })
        .catch(error => {
            alert('❌ Error: ' + error);
            sendBtn.disabled = false;
            sendBtn.style.cursor = "pointer";
        });
});
function verifyOTP(event) {
    event.preventDefault();
    const otp = document.getElementById('otp_input').value;
    
    fetch("verify.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "otp=" + encodeURIComponent(otp)
    })
        .then(response => response.text())
        .then(data => {
            if (data.trim().toLowerCase() === "success") {
                alert('✅ Registration successfully!');
                window.location.reload();

            }

            else if (data.trim() === "Failed") {
                alert('❌ Something went wrong please try again');
            }

            else if (data.trim() === "invalid") {
                alert('❌ Invallid Otp');

            }
            else {
                alert('❌ Error: ' + data);
            }

        });
}


document.addEventListener("DOMContentLoaded", function () {
    const userForm = document.getElementById('user_id');
    const adminForm = document.getElementById('admin_id');
    document.getElementById('first_form').onclick = () => {
        userForm.style.display = 'none';
        adminForm.style.display = 'block';
    };
    document.getElementById('second_form').onclick = () => {
        userForm.style.display = 'block';
        adminForm.style.display = 'none';
    };
});
document.getElementById("uform_id").addEventListener("submit", function (e) {
    e.preventDefault();
    const sendBt = document.getElementById('login');
    sendBt.disabled=true;
    const formData = new FormData(this);

    fetch("user.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            const result = data.trim();
            if (result === "success") {
                window.location.href = "subjectchoose.php";
            } else if (result === "wrong") {
                alert('❌ Incorrect password.');
                sendBt.disabled=false;

            } else if (result === "username") {
                alert('❌ User not found.');
                sendBt.disabled=false;

            } else {
                alert('❌ Something went wrong: ' + result);
                sendBt.disabled=false;

            }
        })
});
document.getElementById("aform_id").addEventListener("submit", function (e) {
    e.preventDefault();
    const sendB = document.getElementById('adminid');
    sendB.disabled=true;
    const formData = new FormData(this);

    fetch("admin.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            const result = data.trim();
            if (result === "success") {
                window.location.href = "admin_dashboard.php";
            } else if (result === "wrong") {
                alert('❌ Incorrect password.');
                sendB.disabled=false;

            } else if (result === "username") {
                alert('❌ User not found.');
                sendB.disabled=false;

            } else {
                alert('❌ Something went wrong: ' + result);
                sendB.disabled=false;

            }
        })
});
