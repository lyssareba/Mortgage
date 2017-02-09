<?php

/**
 * Description: Mortgage class-completes basic mortgage processes. Calculates monthly payments, and amortization
 * schedule.
 * User: lyssa
 * Date: 2/1/2017
 * Time: 11:35 PM
 */
	class Mortgage {

        private $monthlyPayment=0;
        private $principal=0;
        private $interest=0;
        private $term=0;
        public function __construct($Principal, $Interest, $Term)
        {
            $this->principal = $Principal;
            $this->interest = $Interest;
            $this->term = $Term;
            
        }
        function convertToMonth(){

        }
        function get_principal(){
            return $this->principal;
        }
        function get_interest(){
            return $this->interest;
        }
        function get_term(){
            return $this->term;
        }
        //Determines the monthly payment
        function set_MonthlyPayment(){
            $this->monthlyPayment=$this->principal ( $this->interest(1 + $this->interest)**$this->term ) / ( (1 + $this->interest)**$this->term – 1);
		}
        //Determines the principal amount and interest amount paid each month and places them in arrays. These will be used to create the table
        function get_amortization(){
            $principlePay=array();
            $interestPay=array();
            for($i =0; $i<$this->term; $i++){
                $tempI=$this->principal*$i;
                $interestPay=array_push($tempI);
                $tempP=$this->monthlyPayment-$tempI;
                $principlePay=array_push($tempP);
            }
            return array($interestPay, $principlePay);
        }
    }
?>