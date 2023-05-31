var recaptchaRes = grecaptcha.getResponse();
var message = "";
print(recaptchaRes);
if(recaptchaRes.length == 0) {
    // You can return the message to user
    message = "Please complete the reCAPTCHA challenge!";
    return false;
} else {
   // Add reCAPTCHA response to the POST
   form.recaptchaRes = recaptchaRes;
}