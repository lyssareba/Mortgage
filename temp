<?php

/**
 * Description: Mortgage class-completes basic mortgage processes. Calculates monthly payments, and amortization
 * schedule.
 * User: lyssa
 * Date: 2/1/2017
 * Time: 11:35 PM
 */
namespace mortgage {
    class Mortgage {

        private $monthlyPayment=0;
        private $principal;
        private $interest;
        private $term;
        public function __construct($principal, $interest, $term)
        {
            $this->principal = $principal;
            $this->interest = $interest;
            $this->term = $this->setTerm($term);

        }
        function setTerm($term){
            if($term>30){
                $term=$term;
            }
            elseif($term<=30){
                $term=$this->convertTermToMonth($term);

            }
            return $term;
        }
        function convertTermToMonth($term){
            return $term*12;

        }
        function getPrincipal(){
            return $this->principal;
        }
        function getInterest(){
            return $this->interest;
        }
        function getTerm(){
            return $this->term;
        }
        //Determines the monthly payment
        function setMonthlyPayment(){
            $this->monthlyPayment=calculateMonthlyPayment();
        }
        function calculateMonthlyPayment(){
            $this->principal(($this->interest(1 + $this->interest)**$this->term)/((1+$this->interest)**$this->term-1));
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
}?>