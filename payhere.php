<html>

<body>
    <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
        <input type="hidden" name="merchant_id" value="1213606"> <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="http://sample.com/return">
        <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
        <input type="hidden" name="notify_url" value="http://sample.com/notify">
        <br><br>Item Details<br>
        <input type="text" name="order_id" value="ItemNo12345">
        <input type="text" name="items" value="Door bell wireless"><br>
        <input type="text" name="currency" value="LKR">
        <input type="text" name="amount" value="165000">
        <br><br>Customer Details<br>
        <input type="text" name="first_name" value="sachith">
        <input type="text" name="last_name" value="siriwardana"><br>
        <input type="text" name="email" value="1997sachith@gmail.com">
        <input type="text" name="phone" value="0771234567"><br>
        <input type="text" name="address" value="No.1, Galle Road">
        <input type="text" name="city" value="Colombo">
        <input type="hidden" name="country" value="Sri Lanka"><br><br>
        <input type="submit" value="Buy Now">
    </form>
</body>

</html>