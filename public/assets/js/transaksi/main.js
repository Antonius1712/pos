function countTotalQtyAndPay(){
    let totalRow = $('.qty').length;

    let totalQty = 0;
    let totalBayar = 0;

    for( let loop = 0; loop < totalRow; loop++ ){
        totalQty += parseInt($('.qty').eq(loop).val());
        totalBayar += parseInt(removeComma($('.sub_total').eq(loop).val()));
    }

    totalBayar = number_format(totalBayar);
    totalQty = number_format(totalQty);

    $('#totalQty').html(totalQty);
    $('#totalBayar').html(totalBayar);

    countGrandTotalWithDiscountNominal(totalBayar);
}

function countGrandTotalWithDiscountPercent(data){
    let grandTotal = parseInt(removeComma(data));
    let discount = parseInt($('#discount').val());
    
    if( !isNaN(discount) ){
        discount = discount / 100;
        grandTotal = grandTotal - ( grandTotal * discount );
    }

    grandTotal = number_format(grandTotal);

    $('#grandTotal').html(grandTotal);

    $('#inputGrandTotal').html(`<input type="hidden" name="grand_total" value="${grandTotal}" />`);
}

function countGrandTotalWithDiscountNominal(data){
    let grandTotal = parseInt(removeComma(data));
    let discount = parseInt($('#discount').val());
    
    if( !isNaN(discount) ){
        grandTotal = grandTotal - discount;
    }

    grandTotal = number_format(grandTotal);

    $('#grandTotal').html(grandTotal);

    $('#inputGrandTotal').html(`<input type="hidden" name="grand_total" value="${grandTotal}" />`);
}