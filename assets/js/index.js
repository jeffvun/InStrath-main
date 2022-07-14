$(document).ready(function(){
    //toggle forms
    $('#show_login').click(function(){
        $('#login').show();
        $('#signup').hide();
        $('li:nth-child(2)').addClass('active');
        $('li:nth-child(1)').removeClass('active');
    });
    $('#show_signup').click(function(){
        $('#login').hide();
        $('#signup').show();
        $('li:nth-child(1)').addClass('active');
        $('li:nth-child(2)').removeClass('active');
    });
    //login process
    $("#login_btn").on("click", function () {
        var email = $("#email").val();
        var password = $("#password").val();
        if (email == "" || password == "") {
            alertify.set("notifier", "position", "bottom-right");
            alertify.error("Fill in all credentials.");
        } 
        else {
            $.ajax({
                method: "POST",
                data: {
                    email: email,
                    password: password,
                },
                url: "/controllers/login.php",
                dataType: "json",
                success: function (data) {
                    if (data.success === "success") {
                        window.location.replace("/views/home.html");
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.success("Login Successful.");
                    } 
                    else {
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.error("Login Failed. Incorrect email or password.");
                        alertify.error("If you don't have an account, Sign up");
                    }
                },
            });
        }
    });
    //sign up process
    $("#signup_btn").on("click", function(){
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#_email").val();
        var password = $("#_password").val();
        var country = $("select#country").children("option:selected").val();
        var phone = $("#phone").val();

        if (fname == "" || lname == "" || email == "" || password == "" || phone == "" ) {
            alertify.set("notifier", "position", "bottom-right");
            alertify.error("Fill in all required fields.");
        } 
        else {
            $.ajax({
                method: "POST",
                data: {
                    fname: fname,
                    lname: lname,
                    email: email,
                    password: password,
                    country: country,
                    phone: phone,
                },
                url: "/controllers/signup.php",
                dataType: "json",
                success: function (resp) {
                    if (resp.success === "success") {
                        $('#login').show();
                        $('#signup').hide();
                        $('li:nth-child(2)').addClass('active');
                        $('li:nth-child(1)').removeClass('active');
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.success("Registered !");
                    } 
                    else {
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.error("Registration Failed");
                    }
                },
            });
        }
    });
});