<?php
namespace App\Services;


/**
 * Class OpenBook
 */
 class OpenLibrary {
    /**
     * @var
     */
    protected $serviceURL;

    public function __construct()
    {
      $this->serviceURL = env('OPEN_BOOKS_URL');
    }

    private function sendGetRequest(array $params){
      $query = http_build_query($params);

      $curl = curl_init();

      curl_setopt_array($curl, [
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $this->serviceURL.'?'.$query,
      ]);
      $response = curl_exec($curl);

      curl_close($curl);

      return $response;
    }
    public function search(string $bookTitle) {
        return $this->sendGetRequest(array("q" => $bookTitle));
    }

}
