<?php

/**
 * Description: Mortgage class-completes basic mortgage processes. Calculates monthly payments, and amortization
 * schedule.
 * User: lyssa
 * Date: 2/1/2017
 * Time: 11:35 PM
 */

//I was going to write some tests for this class, but to use it in a modern way I need you to namespace it.
//lookup namespaces and add namespacing to the class

	class Mortgage {

        private $monthlyPayment=0; //it is ok to set this variable.
        private $principal=0;//these three variables should probably be set in the constructor
        private $interest=0;
        private $term=0;
        //You can set default values for variables in the constructor function i.e. __(construct($Principal = 0....
        //YOu can (and should) also type hint inside of classes. Don't try this on external functions, but inside classes it's ok)
        //also, variables should be snake case.  $principal, not $Principal - learning and following a standard will help you know what your variables are named
        //and keep bugs out of your code.
        public function __construct($Principal, $Interest, $Term)
        {
            $this->principal = $Principal;
            $this->interest = $Interest;
            //if you want to convert the term to months you can call $this->convertToMonth($this->term)
            //but, this is a better place for a setter
            //ie. $this->term = $this->setTerm($term);
            $this->term = $Term;
            
        }
        //TODO: fill in the setTerm() code
        //could be private or public.  I'm not sure how I feel about it yet.  Once we create a mortgage object, would we ever need to change the initial paramaters? I can't decide.
        public setTerm($term){
            //check if it is over or under 30 and then manipulate accordingly
            //you'll call $this->convertToMonths() in here somewhere.
        }
        //I'd probably name this convertTermToMonths() to be more explicit about what it does
        //this function should be private - private convertToMonth($term)
        //look at the rest of the member functions and decide if they should be public or private
        //the "function" keyword is not required in current PHP versions.  You can just say public myFunction() or private _myFunction (notice the _ on private functions.
        //it is a coding standard for differentiating public and private functions.

        function convertToMonth(){//make sure to include a parameter in the function convertToMonth($term)
            //but, I would not call this function from the constructor.  I would call it from setTerm();
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
        //how do I get the monthly payment if I use your class in my application?
        //should this really be a setter?
        //nameing conventions setMonthlyPayment();
        function set_MonthlyPayment(){
            //check this code. Your equation is missing some operators, so it won't work correctly
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