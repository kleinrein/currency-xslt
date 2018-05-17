$(document).ready(function () {
    //Select plugin
    $(".chosen").data("placeholder", "Select Frameworks...").chosen();
    
    //iOS Switch
    var elem = document.querySelector('.js-switch');
    var init = new Switchery(elem, {size: 'small'});
    
    $("#verdi").change(function () {
        valuta = $("#valuta").val();
        verdi = $(this).val() + ";" + valuta;
        ajaxKall(verdi);
    });

    $("#verdi").keyup(function () {
        valuta = $("#valuta").val();
        verdi = $(this).val() + ";" + valuta;
        ajaxKall(verdi);
    });

    $("#valuta").change(function () {
        valuta = $(this).val();
        verdi = $("#verdi").val() + ";" + valuta;
        ajaxKall(verdi);
    });
    
    $("#tableSwitch").change(function(){
        if($(this).is(':checked')){
            $("table").css("display", "table");
            $("#valutaliste").animate({opacity: 1});
        }else{
            $("table").fadeOut();
            $("#valutaliste").animate({opacity: .3});
        }
    });


    //AJAX kall
    function ajaxKall(verdi) {
        $.ajax({
            type: "POST",
            url: "control.php",
            data: 'verdi=' + verdi,
            beforeSend: function () {},
            success: function (data) {
                $("#konvertering").html(data);
            }
        });
    }
});