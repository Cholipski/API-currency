<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

final class CurrencyService
{
    public function init(): void
    {
        try{
            $collection = $this->getDataFromAPI();
            $this->UpdateOrCreate($collection->first()->rates);
        }catch(\Exception $e) {
            error_log($e->getMessage());
        }
    }

    private function getDataFromAPI(): Collection
    {
        $endpoint = "http://api.nbp.pl/api/exchangerates/tables/A";
        $response = Http::get($endpoint);

        if($response->failed()){
            throw new \Exception("Problem with getting data from API, try again later", 500);
        }

        return collect(json_decode($response->body()));

    }

    private function UpdateOrCreate(Collection $rates)
    {
        // code
    }
}
