<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Currency;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

final class CurrencyService
{
    public function UpdateOrCreate():void
    {
        try{
            $collection = $this->getDataFromAPI();
            DB::transaction(function() use ($collection){
                foreach ($collection->first()->rates as $key => $item) {
                    $currency = Currency::where("name","=",$item->currency)->first();
                    if($currency === null){
                        Currency::create([
                            'name' => $item->currency,
                            'currency_code' => $item->code,
                            'exchange_rate' => (float)$item->mid
                        ]);
                    }
                    else{
                        Currency::where("name","=",$item->currency)
                            ->update([
                                'exchange_rate' => (float)$item->mid
                            ]);
                    }

                }
            });
            print("Currency created/updated successfully \n");

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


}
