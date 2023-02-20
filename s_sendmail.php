<?php 
/* Object Variable Declaration ----------- */

$err_resp = array();
$err_resp['error'] = false;
$err_resp['company_error'] = "";
$err_resp['position_error'] = "";
$err_resp['department_error'] = "";
$err_resp['name_error'] = "";
$err_resp['email_error'] = "";
$err_resp['phone_error'] = "";
$err_resp['message_error'] = "";


/* Form Validation ----------- */
if (!isset($_POST["company"]) || $_POST['company'] == "") {
    $err_resp['company_error'] = "<span>企業名は必須です。</span>";
    $err_resp['error'] = true;
}

if (!isset($_POST["position"]) || $_POST['position'] == "") {
    $err_resp['position_error'] = "<span>役職は必須です。</span>";
    $err_resp['error'] = true;
}

if (!isset($_POST["department"]) || $_POST['department'] == "") {
    $err_resp['department_error'] = "<span>部署名は必須です。</span>";
    $err_resp['error'] = true;
}

if (!isset($_POST["name"]) || $_POST['name'] == "") {
      $err_resp['name_error'] = "<span>は必須です。</span>";
      $err_resp['error'] = true;
}

if (!isset($_POST["email"]) || $_POST['email'] == "") {
      $err_resp['email_error'] = "<span>EMAILは必須です。</span>";
      $err_resp['error'] = true;
}

if (!isset($_POST["phone"]) || $_POST['phone'] == "") {
      $err_resp['phone_error'] = "<span>お電話番号は必須です。</span>";
      $err_resp['error'] = true;
}

if (!isset($_POST["message"]) || $_POST['message'] == "") {
      $err_resp['message_error'] = "<span>お問い合わせ内容は必須です。</span>";
      $err_resp['error'] = true;
}

/* Exit if error ----------- */

if ($err_resp['error']) {
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($err_resp);
}

/* Else send Email ----------- */

else {
      $from = "info@sarasaservices.com";
      $to_email = "info@questvision.jp";

      $subject="ホームページからのメッセージ。";

      $message = "<table>";
      $message .= "<tr><td>お名前</td><td>".$_POST["company"]."</td></tr>";
      $message .= "<tr><td>お名前</td><td>".$_POST["position"]."</td></tr>";
      $message .= "<tr><td>お名前</td><td>".$_POST["department"]."</td></tr>";
      $message .= "<tr><td>お名前</td><td>".$_POST["name"]."</td></tr>";
      $message .= "<tr><td>Email</td><td>".$_POST["email"]."</td></tr>";
      $message .= "<tr><td>お電話番号</td><td>".$_POST["phone"]."</td></tr>";
      $message .= "<tr><td>お問い合わせ内容</td><td>".$_POST["message"]."</td></tr>";
      $message .= "</table>";

      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=utf-8\r\n";
      $headers .= "From: $from\r\n";

      mail($to_email, $subject, $message, $headers);


      header('Content-Type: application/json; charset=utf-8');
      $suc_resp = array('success' => "お問い合わせありがとうございます。");
      echo json_encode($suc_resp);
}

