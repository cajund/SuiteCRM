
function sendToWave(id, session) {

    console.log(session);

    $.ajax({
        method: "POST",
        url: "custom/service/v4_1_custom/rest.php",
        data: {
            method: 'sendInvoice',
            input_type: 'JSON',
            response_type: 'JSON',
            rest_data: JSON.stringify({
                session: session,
                record: id
            })
        }
    })
    .done(function(msg) {
        alert( msg );
    });

}
