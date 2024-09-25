$(document).ready(function (e) {

    tgl_last_update = $("#last_update").attr('data-tgl_last_update');
    console.log("last update =" + tgl_last_update);
    tgl_wingi = $("#last_update").attr('data-tgl_wingi');

    $("#loginForm").submit(function (e) {
        e.preventDefault();
        console.log("masuk sini lhoooo");
        user = $(this).find("input[name='email']").val();
        pass = $(this).find("input[name='password']").val();
        p = $(this).find("button").attr("value");

        if (user != '' && pass != '') {
            $.ajax({
                    method: "POST",
                    url: "inc/olah.php",
                    data: "p=" + p + "&" + $("#loginForm").serialize(),
                    dataType: "json"
                })
                .done(function (d) {
                    if (d == "bener") {
                        console.log('masuk kan');
                        window.location.replace("login/index.php");
                    } else {
                        console.log('masuk');
                        notifikasi = "<div class=\"alert alert-danger alert-dismissible fade show\">";
                        notifikasi += "Incorrect username or password</div>";
                        $("#masuk").hide();
                        $(notifikasi).insertBefore("#loginForm").delay(1000).fadeOut('fast');

                        $("#masuk").text("Sign In to your account")
                        $("p").delay(1060).fadeIn('slow');
                    }
                })
                .fail(function (d) {
                    console.log("form login problem");
                })
        }
    });
    $("#daftar").submit(function (e) {
        e.preventDefault();

        nama = $("#daftar input[name='nama']").val();
        telp = $("#daftar input[name='telp']").val();
        email = $("#daftar input[name='email']").val();
        password = $("#daftar input[name='password']").val();
        // namaCaptcha = $("#daftar input[name='nilaiCaptcha']").val();

        console.log("nama: " + nama + " tlp: " + telp);

        $.ajax({
                method: "POST",
                url: "inc/olah.php", //URL tujuan
                data: {
                    p: "signup",
                    'nama': nama,
                    'telp': telp,
                    'email': email,
                    'password': password,
                    // 'namaCaptcha': namaCaptcha
                },
                dataType: "json" //digunakan ketika url tujuan tidak dalam satu domain
            })

            .done(function (data) {
                console.log("tes: " + data);
                //modal saat sign up
                if (data == "sudah_ada") {
                    $("#myModal").modal();
                    $("#modal_body").text("Email Sudah Digunakan Atau Captcha Salah!");
                    window.setTimeout(function () {
                        location.replace("index.php?p=reg");
                    }, 1200);
                } else {
                    $("#myModal").modal();
                    $("#modal_body").text("Registrasi Berhasil!");
                    window.setTimeout(function () {
                        location.replace("index.php");
                    }, 1200);
                }
            })
            .fail(function (msg) {
                console.log("Data gagal dikirim: " + msg); //jika gagal maka akan muncul notifikasi
            });
    });

    $("#userform").submit(function (e) {
        e.preventDefault();
        var fd = new FormData();
        var files = $("#file")[0].files[0];
        fd.append("file", files);
        var fileName = $("#file")[0].files[0].name;
        console.log('masuk');
        $.ajax({
            url: "../inc/upload.php",
            type: "post",
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response !== 0) {
                    $("#img").attr("src", response);
                    $(".preview img").show(); // Display image element
                } else {
                    alert('file not uploaded');
                }
            },
        })

        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: "p=manageuser&foto_profil=" + fileName + "&" + $("#userform").serialize(),
                dataType: "json",
            })
            .done(function (d) {
                if (d == "gagal") {
                    $("#MyModal").modal();
                    $(".modal-body").text("Username sudah digunakan!");
                    window.setTimeout(function () {
                        location.replace("index.php?p=manageuser");
                    }, 1000);
                } else {
                    $("#MyModal").modal();
                    $(".modal-body").text("Pengguna berhasil ditambahkan!");
                    window.setTimeout(function () {
                        location.replace("index.php?p=manageuser");
                    }, 1000);
                }
            })
            .fail(function (d) {
                console.log("fail");
            })
    });

    $("#editpengguna").submit(function (e) {
        e.preventDefault();
        console.log("submit form edit");
        var fd = new FormData();
        var files = $("#file")[0].files[0];
        fd.append("file", files);
        //	var fileName = $("#file")[0].files[0].name;
        var fileName = $('input[type=file]').val().split('\\').pop();
        $.ajax({
            url: "../inc/upload.php",
            type: "post",
            data: fd,
            contentType: false,
            processData: false,

        })
        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: "p=update&foto_profil=" + fileName + "&" + $("#editpengguna").serialize(),
                dataType: "json"
            })
            .done(function (d) {
                console.log("terkirim");
                $("#modal_edit").hide();
                if (d == "fail") {
                    $("#MyModal").modal();
                    $(".modal-body").text("Gagal!");
                    $(".modal-footer").hide($("#btn-no"));
                    window.setTimeout(function () {
                        location.replace("index.php?p=manageuser");
                    }, 1200);
                } else {
                    $("#MyModal").modal();
                    $(".modal-body").text("Pengguna berhasil diedit!");
                    $(".modal-footer").hide();
                    window.setTimeout(function () {
                        location.replace("index.php?p=manageuser");
                    }, 1200);

                }
            })
            .fail(function (d) {
                console.log("fail");
            })
    });

    $("#add_user").click(function () {
        console.log("OK");
        //			$(".container").remove();
        $("#2").remove();
        $("#form_add").show();
    });
    $("#profile").submit(function (e) {
        username = $("#profile input[name='username']").attr('placeholder');
        e.preventDefault();
        console.log("submit form edit");
        var fd = new FormData();
        var files = $("#file")[0].files[0];
        fd.append("file", files);
        //	var fileName = $("#file")[0].files[0].name;
        var fileName = $('input[type=file]').val().split('\\').pop();

        $.ajax({
            url: "../inc/upload.php",
            type: "post",
            data: fd,
            contentType: false,
            processData: false

        })
        $.ajax({
                method: "POST",
                url: "../inc/olah.php",
                data: "p=update&email=" + username + "&foto_profil=" + fileName + "&" + $("#profile").serialize(),
                dataType: "json"
            })
            .done(function (d) {
                console.log("terkirim");
                $("#modal_edit").hide();
                if (d == "fail") {
                    $("#MyModal").modal();
                    $(".modal-body").text("Gagal!");
                    $(".modal-footer").hide($("#btn-no"));
                    window.setTimeout(function () {
                        location.replace("index.php?p=userprofile");
                    }, 800);
                } else {
                    $("#MyModal").modal();
                    $(".modal-body").text("Pengguna berhasil diedit!");
                    $(".modal-footer").hide();
                    window.setTimeout(function () {
                        location.replace("index.php?p=userprofile");
                    }, 800);

                }
            })
            .fail(function (d) {
                console.log("fail");
            })
    });
    // $('#dataTable').DataTable();
  
})