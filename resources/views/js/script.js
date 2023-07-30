$(document).ready(function(){
    $(card_number).inputmask("9999-9999-9999-9999");
    Inputmask({regex:"0[1-9]|1[0-2]"}).mask($(expiry_month));
    Inputmask({regex:"20\\d{2}"}).mask($(expiry_year));
    $(cvv).inputmask("999");
});
