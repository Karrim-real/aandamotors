$(function () {
    $("#registerForm").on("submit", function (e) {
        e.preventDefault();
        let name = $("#name").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let address = $("#address").val();
        let password = $("#password").val();
        let password_confirm = $("#passwordConfirm").val();
        console.log(name, email, phone, address, password, password_confirm);
        if (
            name === "" ||
            email === "" ||
            phone === "" ||
            address === "" ||
            password === "" ||
            password_confirm === ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Please check required field",
                showConfirmButton: true,
                timer: 5000,
            });
        } else if (password !== password_confirm) {
            Swal.fire({
                icon: "warning",
                title: "Password Not match",
                text: "Your password and confirm password not match please check and try again.",
                showConfirmButton: true,
                timer: 5000,
            });
        } else {
            let userDatas = { name, email, phone, address, password };
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "/register",
                data: userDatas,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        icon: response.status,
                        title: response.status,
                        text: response.message,
                    }).then((result) => {
                        if (response.status == "success") {
                            window.location = response.url;
                        } else {
                            return false;
                        }
                    });
                },
            });
        }
    });

    //Login Form Process
    $("#loginForm").on("submit", function (e) {
        e.preventDefault();

        let email = $("#email").val();
        let password = $("#password").val();

        console.log(email, password);
        if (email === "" || password === "") {
            Swal.fire({
                icon: "error",
                title: "Required Fields can not be empty",
                text: "Please enter your username or password",
                showConfirmButton: true,
                timer: 5000,
            });
        } else {
            let userDatas = { email, password };
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "/login",
                data: userDatas,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        icon: response.status,
                        title: response.status,
                        text: response.message,
                    }).then((result) => {
                        if (response.status == "success") {
                            window.location = response.url;
                        } else {
                            return false;
                        }
                    });
                },
            });
        }
    });
    $("#logout").on("click", function () {
        console.log("logout click");
    });
});
