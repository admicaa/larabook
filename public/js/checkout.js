Stripe.setPublishableKey('pk_test_DD5jiizBMhGJTwFAuPT3KUiu');
$('#check-out').submit(function(){
    $('#errory').addClass('hidden');
    Stripe.card.createToken({
        number: $('#card').val(),
        cvc: $('#cvc').val(),
        exp_month: 12,
        exp_year: 2017,
        name:$('#name').val()
    }, function(status,response){
        if(response.error){
            console.log(response.error);
            $('#errory').removeClass('hidden');
            $('#errory').text(response.error.message);
        }
        else{
            console.log(response.id);
                var token = response.id;
                $('#check-out').append($('<input type="hidden" name="stripeToken" />').val(token));
                $('#check-out').get(0).submit();
        }
    });
return false;

});
