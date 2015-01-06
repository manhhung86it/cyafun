<?php

$alternate_passphrase = strtoupper(md5($options['pm_alternate_passphrase']));

$string = $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' .
        $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' .
        $_POST['PAYMENT_BATCH_NUM'] . ':' .
        $_POST['PAYER_ACCOUNT'] . ':' . $alternate_passphrase . ':' .
        $_POST['TIMESTAMPGMT'];

$hash = strtoupper(md5($string));

$user_ID = $_POST['cyagame_user_id'];
$amount = $_POST['PAYMENT_AMOUNT'];
$amount_text = $_POST['amount_text'];
$deposit_currency = $_POST['PAYMENT_UNITS'];


$verify_batch_number = $_POST['PAYMENT_BATCH_NUM'];
$verified_information = " Paid By: PM Transaction ID:" . $_POST['PAYMENT_BATCH_NUM'] . "\r\n Amount:" . number_format($_POST['PAYMENT_AMOUNT'], 2) . "\r\n Currency: USD \r\n PAYMENT_ID: " . $_POST['PAYMENT_ID'] . "\r\n PAYEE_ACCOUNT: " . $_POST['PAYEE_ACCOUNT'] . "\r\n PAYMENT_BATCH_NUM: " . $_POST['PAYMENT_BATCH_NUM'] . "\r\n PAYER_ACCOUNT: " . $_POST['PAYER_ACCOUNT'] . "\r\n User ID: " . $user_ID . "\r\n Coins: " . $coins . "\r\n hash: " . $hash . "\r\n V2_HASH: " . $_POST['V2_HASH'] . "\r\n string: " . $string . "\r\n BAGGAGE_FIELDS: " . $_POST['BAGGAGE_FIELDS'];

if ($hash == $_POST['V2_HASH']) {
    $this->load->model('deposit_logs_model');
    $dataInsert = array();
    $dataInsert = array(
        'user_id' => $user_ID,
        'payment' => 'pm',
        'rate' => '0.5',
        'amount' => $_POST['PAYMENT_AMOUNT'],
        'coins' => $_POST['PAYMENT_AMOUNT'],
        'transaction_id' => '0036820141229091226', //25 ky tu
        'currency' => $deposit_currency,
    );
    $this->deposit_logs_model->insert($dataInsert);
}
?>