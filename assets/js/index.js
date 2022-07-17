$(document).ready(function(){
    //toggle forms
    $('#show_login').click(function(){
        $('#login').show();
        $('#signup').hide();
        $('li:nth-child(2)').addClass('active');
        $('li:nth-child(1)').removeClass('active');
    });
    $('#show_signup').click(function(){
        window.scrollTo(0, 0);
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
            alertify.error("Fill in required fields.");
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
                    var result = JSON.parse(data);
                    if (result.statusCode === 200) {
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.success("Login Successful.");
                        window.location.href= "/views/home.php";
                    } 
                    else if(result.statusCode==201){
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
                success: function (dataResult) {
                    var result = JSON.parse(dataResult);
				    if(result.statusCode==200){
                        $('#login').show();
                        $('#signup').hide();
                        $('li:nth-child(2)').addClass('active');
                        $('li:nth-child(1)').removeClass('active');
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.success("Registered !");
                    } 
                    else if(result.statusCode==201){
                        alertify.set("notifier", "position", "bottom-right");
                        alertify.error("Registration Failed");
                    }
                },
            });
        }
    });
});