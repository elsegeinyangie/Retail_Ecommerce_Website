<?php
  require_once(__ROOT__ . "model/model.php");
  include "enums.php";

?>

<?php
class Payment extends Model
{
  private $payment_id;
  private $order_id;
  private $amount;
  private PaymentMethod $payment_method;
  private $payment_date;


  
  function __construct($payment_id, $order_id, $amount = "", $payment_method = "cash")
  {
    $this->payment_id = $payment_id;
    $this->order_id = $order_id;
    $this->db = $this->connect();

    if ("" === $amount) {
      $this->readPayment($payment_id);
    } else {
      $this->amount = $amount;
      $this->payment_method = $payment_method;
    }
  }

  public function getPayment_id(){
    return $this->payment_id;
}


public function getOrder_id(){
    return $this->order_id;
}

public function getAmount(){
    return $this->amount;
}

public function setAmount($amount){
    $this->amount = $amount;
}

public function getPayment_date(){
    return $this->payment_date;
}

public function setPayment_date($payment_date){
    $this->payment_date = $payment_date;
}


function readPayment($id)
{
    // Correct the SQL query to select from the payment table.
    $sql = "SELECT * FROM payment WHERE payment_id = " . $id;
    $db = $this->connect();
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the row as an associative array
        $row = $result->fetch_assoc();

        // Assign the payment data to the class properties
        $this->payment_id = $row["payment_id"];
        $this->order_id = $row["order_id"];
        $this->amount = $row["amount"];
        $this->payment_method = $row["payment_method"];
        $this->payment_date = $row["payment_date"];


        // Optionally, you could store this in a session if needed
        $_SESSION["amount"] = $row["amount"];
    } else {
        // Set attributes to empty values if no payment is found
        $this->amount = "";
        $this->payment_method = "";
        $this->payment_date = "";
    }
}

}