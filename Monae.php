<?php
/**
 * Author: Harkhenon
 * Date: 28/01/2019
 */

namespace App\Service;


class Monae {

    protected $firmId = "";
    protected $apiKey = "";
    protected $appEmail = "";
    protected $apiUser = "";

    const API_ENDPOINT = "https://www.facturation.pro/firms/";

    public function __construct() {

    }

    private function monaeCurl(string $link, string $type, string $jsonData = NULL){
        $ch = curl_init();
        $headers = array();

        curl_setopt($ch, CURLOPT_URL, self::API_ENDPOINT.$this->firmId.$link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        switch($type){
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, 1);
                $headers[] = "Content-Type: application/json; charset=utf-8";
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                break;
            case 'GET':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case 'PATCH':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
                $headers[] = "Content-Type: application/json; charset=utf-8";
                (isset($jsonData) && !empty($jsonData)) ? curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData) : NULL;
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
        }

        curl_setopt($ch, CURLOPT_USERPWD, $this->apiUser . ":" . $this->apiKey);

        $headers[] = "User-Agent: MonApp (".$this->appEmail.")";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        curl_close ($ch);

        return $result;
    }

    // Customer side

    public function getListCustomer(){
        return $this->monaeCurl("/customers.json", "GET");
    }

    public function getUniqueCustomer($id){
        return $this->monaeCurl("/customers/".$id.".json", "GET");
    }

    public function createCustomer($jsonData){
        return $this->monaeCurl("/customers.json", "POST", json_encode($jsonData));
    }

    public function updateCustomer($jsonData, $clientId){
        return $this->monaeCurl("/customers/".$clientId.".json", "PATCH", json_encode($jsonData));
    }

    public function deleteCustomer($clientId){
        return $this->monaeCurl("/customers/".$clientId.".json", "DELETE");
    }

    public function getCustomerInvoices($clientId) {
        return $this->monaeCurl("/invoices.json?customer_id=".$clientId, "GET");
    }

    // Quote side

    public function getQuoteByCustomer($clientId){
        return $this->monaeCurl("/customers/".$clientId."/quotes.json", "GET");
    }

    public function getPdfQuote($quoteId){
        return $this->monaeCurl("/quotes/".$quoteId.".pdf", "GET");
    }

    public function getDetailedQuote($quoteId){
        return $this->monaeCurl("/quotes/".$quoteId.".json", "GET");
    }

    public function createQuote($jsonData){
        return $this->monaeCurl("/quotes.json", "POST", $jsonData);
    }

    public function updateQuote($jsonData, $quoteId){
        return $this->monaeCurl("/quotes/".$quoteId.".json", "PATCH", $jsonData);
    }

    public function deleteQuote($quoteId){
        return $this->monaeCurl("/quotes/".$quoteId.".json", "DELETE");
    }

    public function convertQuoteToInvoice($quoteId){
        return $this->monaeCurl("/quotes/".$quoteId."/invoice.json", "POST");
    }

    // Invoice side

    public function getAllInvoices(){
        return $this->monaeCurl('/invoices.json', 'GET');
    }

    public function getInvoiceById($InvoiceId){
        return $this->monaeCurl('/invoices/'.$InvoiceId.'.json', 'GET');
    }

    public function createInvoice(array $invoiceData){
        return $this->monaeCurl("/invoices.json", "POST", json_encode($invoiceData));
    }

    public function updateInvoice(int $invoiceId, array $invoiceData){
        return $this->monaeCurl('/invoices/'.$invoiceId.'.json', 'PATCH', json_encode($invoiceData));
    }

    public function deleteInvoice(int $invoiceId){
        return $this->monaeCurl('/invoices/'.$invoiceId.'.json', 'DELETE');
    }

    public function invoiceInPdf(int $invoiceId){
        return $this->monaeCurl('/invoices/'.$invoiceId.'.pdf', 'GET');
    }

    public function refundInvoice(int $invoiceId){
        return $this->monaeCurl('/invoices/'.$invoiceId.'/refund.json', "POST");
    }

    // Products side

    public function getAllProducts(){
        return $this->monaeCurl('/products.json', 'GET');
    }

    public function getProductById($productId){
        return $this->monaeCurl('/products/'.$ProductId.'.json', 'GET');
    }

    public function createProduct(array $productData){
        return $this->monaeCurl("/products.json", "POST", json_encode($productData));
    }

    public function updateProduct(int $productId, array $productData){
        return $this->monaeCurl('/invoices/'.$productId.'.json', 'PATCH', json_encode($productData));
    }

    public function deleteProduct(int $productId){
        return $this->monaeCurl('/invoices/'.$productId.'.json', 'DELETE');
    }
}
