<?php
declare(strict_types=1);

namespace HomeT5;

require_once __DIR__ . '../vendor/composer/autoload_real.php';


class Currency
    {
        private string $isoCode;


        public function __construct ($isoCode)
        {
            $this->setIsoCode($isoCode);
        }


 //  IsoCode_Starts
        private function setIsoCode (string $isoCode){
            $this ->isoCode = $isoCode;

            $ISO_4217 = ['UAH', 'USD', 'EUR', 'GBP', 'JPY', 'CHF', 'CNY', 'RUB', 'AED', 'AFN', 'ALL', 'AMD', 'AOA', 'ARS', 'AUD',
                'AZN', 'BDT', 'BGN', 'BHD', 'BIF', 'BND', 'BOB', 'BRL', 'BWP', 'BYN', 'CAD', 'CDF', 'CLP', 'COP', 'CRC',
                'CUP', 'CZK', 'DJF', 'DKK', 'DZD', 'EGP', 'ETB', 'GEL', 'GHS', 'GMD', 'GNF', 'HKD', 'HRK', 'HUF', 'IDR',
                'ILS', 'INR', 'IQD', 'IRR', 'ISK', 'JOD', 'KES', 'KGS', 'KHR', 'KPW', 'KRW', 'KWD', 'KZT', 'LAK', 'LBP',
                'LKR', 'LYD', 'MAD', 'MDL', 'MGA', 'MKD', 'MNT', 'MRO', 'MUR', 'MVR', 'MWK', 'MXN', 'MYR', 'MZN', 'NAD',
                'NGN', 'NIO', 'NOK', 'NPR', 'NZD', 'OMR', 'PEN', 'PHP', 'PKR', 'PLN', 'PYG', 'QAR', 'RON', 'RSD', 'SAR',
                'SCR', 'SDG', 'SEK', 'SGD', 'SLL', 'SOS', 'SRD', 'SYP', 'SZL', 'THB', 'TJS', 'TMT', 'TND', 'TRY', 'TWD',
                'TZS', 'UGX', 'UYU', 'UZS', 'VEF', 'VND', 'XAF', 'XDR', 'XOF', 'YER', 'ZAR', 'ZMK'
            ];


            if (!ctype_upper($isoCode)){
                exit('Символы должны быть в верхнем регистре');
            }
            if (!is_string($isoCode)||iconv_strlen($isoCode) > 3){
                exit('Тип валюты должке передаваться в виде строки с не более чем 3-я символами');
            }
            if (!in_array($isoCode, $ISO_4217)){
                exit('Тип валюты не соответствует формату ISO 4217');
            }
        }

        private function getIsoCode (): string {
            return $this->isoCode;
        }
//  IsoCode_Ends

//  Equals_Function_Starts
        public function equals(Currency $second): bool {
            return $this->getIsoCode() === $second ->getIsoCode();
        }
//  Equals_Function_Ends
    }
