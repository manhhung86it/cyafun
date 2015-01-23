<div class="row" id="tabs-form-payment">
    <?php
    $pm_url = 'https://perfectmoney.is/api/step1.asp';
//            $pm_account = $options['pm_account'];
//            $pm_name = $options['pm_name'];
    $pm_account = '192.168.0.1';
    $pm_name = 'cya_soft';
    $pm_currency = 'VND';
    $pm_return_url = base_url() . 'index.php/payment/success';
    $pm_cancel_url = base_url() . 'index.php/payment/createPayment';
    $pm_status_url = base_url() . 'index.php/cyagame_pm_ipn.php';
    ?>

    <form method="post" action="<?php echo $pm_url; ?>">
        <input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $pm_account; ?>">
        <input type="hidden" name="PAYEE_NAME" value="<?php echo $pm_name; ?>">
        <input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $data['coin_amount']; ?>">
        <input type="hidden" name="PAYMENT_UNITS" value="<?php echo $pm_currency; ?>">
        <input type="hidden" name="STATUS_URL" value="<?php echo $pm_status_url; ?>">
        <input type="hidden" name="PAYMENT_URL" value="<?php echo $pm_return_url; ?>">
        <input type="hidden" name="NOPAYMENT_URL" value="<?php echo $pm_cancel_url; ?>">                    <input type="hidden" name="BAGGAGE_FIELDS" value="cyagame_user_id cyagame_coin amount_text deposit_rate deposit_fee deposit_fee_text">
        <input type="hidden" name="cyagame_user_id" value="<?php echo $us_id; ?>"/>    


        <table width="50%" align="center" border="0">
            <tr>
                <td width="50%">Amount</td>
                <td class="payment-data"><?php echo $data['coin_amount']; ?></td>
            </tr>
            <tr>
                <td width="50%">Fee</td>
                <td class="payment-data">$4</td>
            </tr>
            <tr>
                <td width="50%">You have to pay:</td>
                <td class="payment-data">$100</td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <div class="register-submit">
                        <input class="btn btn-success" type="submit" value="Confirm"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <div class="register-submit">
                        <a href="<?php echo $pm_cancel_url; ?>">Cancel</a>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
