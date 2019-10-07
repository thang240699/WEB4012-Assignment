//config message

messUpdate = "Đang cập nhật";
//htmlUpdate = html(messUpdate);

//customer

$(document).ready(function () {
    $("#form-customer").submit(function (e) {
        e.preventDefault();
        form_data_customer = $(this).serialize();
        btn_customer_submit = $("button#btn_customer_submit").htmlUpdate;
        
        $.ajax({
            url: 'main.php',
            type: 'POST',
            data: btn_customer_submit,
            dataType: 'json'            
        }).done(function (data) {
            
        })
    })
});

