<?php
declare(strict_types=1);

namespace HomeT5;
require_once __DIR__ . '../vendor/composer/autoload_real.php';

class Money
    {
        private int|float $amount;
        private Currency $currency;

        public function __construct($amount, $currency)
        {
            $this->setAmount($amount);
            $this->setCurrency($currency);
        }

//  Amount_Starts
        private function setAmount(int|float $amount){
            if (!is_numeric($amount)||$amount<0){
                exit('Значение денежных единиц должно быть положительным числом');  //Почему-то валидация не работает
            }
            $this->amount = $amount;

        }

        public function getAmount():int|float {
            return $this->amount;
        }
//  Amount_Ends

//  Currency_Starts
        private function setCurrency(Currency $currency){
            if (!is_object($currency)){
                exit('Тип валюты должен являться объектом класса Currency');    //Почему-то валидация не работает
            }
            $this->currency = $currency;
        }

        public function getCurrency(): Currency{
            return $this->currency;
        }
 //  Currency_Ends

 //  Equals_Function_Starts
        public function equals (Money $second): bool {
            return $this->getAmount() === $second->getAmount()&&
                $this->getCurrency() === $second->getCurrency();
        }
 //  Equals_Function_Ends

//  Add_Function_Starts
        public function add (Money $second): Money {
            if ($this->getCurrency() !== $second->getCurrency()){
                exit('Типы валют не совпадают');
            }
            return new Money($this->getAmount() + $second->getAmount(),
                $this->getCurrency()
            );

        }
 //  Add_Function_Starts

    }