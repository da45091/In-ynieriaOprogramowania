function funkcja()
{
    $.ajax({
        url:"zaloguj.php",
        method:"POST",
        data:{
            log:"TRUE",
            login:$("input[name='login']").val(),
            haslo:$("input[name='haslo']").val()
        }
    }).done(function (data) {

        var zwrot = $.parseJSON(data);
        console.log(zwrot);
        if (zwrot.error)
        {
            if (zwrot.connect_error)
            {
                alert("Przepraszamy. Nastąpił problem z połączeniem. Proszę spróbować później.")
            }
            else
            {
                if (zwrot.login_error)
                {
                    $("input[name='login']").addClass("blad");
                }
                else
                {
                    $("input[name='login']").removeClass("blad");
                }

                if (zwrot.haslo_error)
                {
                    $("input[name='haslo']").addClass("blad");
                }
                else
                {
                    $("input[name='haslo']").removeClass("blad");
                }

            }
        }
        else
        {
            window.location = "glowny.php"
        }
    })
};


