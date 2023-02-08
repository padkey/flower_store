var shippingPage = document.getElementById("shipping-page");
shippingPage.style.display = "block";
var paymentPage = document.getElementById("payment-page");
paymentPage.style.display = "none";


document.getElementById("step-shipping").onclick = function(evt) {
    //chặn submit form
    evt.preventDefault();
    var firstName = document.getElementsByName('shipping-firstname')[0].value;
    var lastName = document.getElementsByName('shipping-lastname')[0].value;
    var phoneNumber = document.getElementsByName('phone-number')[0].value;
    var address = document.getElementsByName('shipping-address')[0].value;

    //trả giá trị true khi mình đã check , false khi chưa check
    var shippingMethod = document.getElementsByName('shipping-method');
    var isCheckedShippingMethod = false;
    var shippingCost = 0; // Phí vẫn chuyển
    for(i = 0 ;i < shippingMethod.length;i++)
    {
        if(shippingMethod[i].checked)
        {
            isCheckedShippingMethod = true;

            //lấy Tiền của phương thức vận chuyển
            shippingCost = shippingMethod[i].dataset.cost;

        }
    }

    console.log(isCheckedShippingMethod);
    console.log(shippingCost);
    //thông báo
    var notification = document.getElementById('notification');

    notification.innerHTML = '';
    var passPage = 1; // Điều kiện để qua trang
    //nếu các ô trống thì thông báo lỗi
    if(firstName == '')
    {

        notification.innerHTML += '<div>Vui lòng nhập tên.</div>';
        passPage = 0;
    }
    if(lastName == '')
    {
        notification.innerHTML += '<div>Vui lòng nhập họ.</div>';
        passPage = 0;
    }
    if(phoneNumber ==''){
        notification.innerHTML += '<div>Vui Lòng Nhập Số Điện thoại </div>';
        passPage = 0;
    }
    if(address ==''){
        notification.innerHTML += '<div>Vui lòng Nhập Địa chỉ</div>';
        passPage = 0;
    }
    if(isCheckedShippingMethod == false){
        notification.innerHTML += '<div>Vui lòng chọn phương thức vận chuyển</div>'
        passPage == 0;
    }

    //passpage bằng 1 mới được chuyển trang
   if(passPage == 1){
        shippingPage.style.display = "none";
        paymentPage.style.display = "block";
       var fullName = document.getElementById('shipping-fullname')  ;
       var phone = document.getElementById('phone-number') ;
       var aaddress = document.getElementById('shipping-fulladdress');

       fullName.innerHTML = '<div>'+lastName +' ' + firstName +'</div>';
       phone.innerHTML = '<div>'+phoneNumber+ '</div>';
       aaddress.innerHTML = '<div>'+address+'</div>';

       //Lấy tổng giá
       var basePrice = document.getElementsByName('base-price')[0].value;
       // hiển thị giá trị  Tổng tiền hàng
       var sumPrice = document.getElementById('base-price');
       sumPrice.innerHTML = '<div>'+ basePrice +' đ</div>';
        // hiển thị giá tiền vận chuyển
       var moneyShipping = document.getElementById('money-shipping');
       moneyShipping.innerHTML = '<div>'+ shippingCost + ' đ</div>';
       //lưu giá tiền vận chuyển vào dataBase
       document.getElementsByName('money_shipping')[0].value = shippingCost;

       //hiển thị tổng thanh toán
       var sumPayment = document.getElementById('sum-payment');
       var sum = parseInt(basePrice) + parseInt(shippingCost);
        sumPayment.innerHTML = '<div>'+ sum +' đ</div>';
        //lấy tổng giá vào database 
        document.getElementsByName('sum_payment')[0].value = sum;

       //kiểm tra đã check phương thức thanh toán chưa
       var paymentMethod = document.getElementsByName('payment-method');
       var isCheckedPaymentMethod = false;
       for(i=0;i<paymentMethod.length;i++){
           if(paymentMethod[i].checked == true){
               isCheckedPaymentMethod = true;
           }
       }

       //nếu check rồi thì mới cho submit
       if(isCheckedPaymentMethod != false){
           document.getElementById("myForm").submit();

       }
    }
    // Kiểm tra tất cả field đã được chưa.
};

