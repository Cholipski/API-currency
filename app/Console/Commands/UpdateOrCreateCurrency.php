<?php

namespace App\Console\Commands;

use App\Services\CurrencyService;
use Illuminate\Console\Command;

class UpdateOrCreateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateOrCreateCurrency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create or update currency from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CurrencyService $currencyService)
    {
        $currencyService->UpdateOrCreate();
    }
}
