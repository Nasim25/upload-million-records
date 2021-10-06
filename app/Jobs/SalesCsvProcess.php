<?php

namespace App\Jobs;

use App\Models\Sales;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SalesCsvProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $chunk_data;
    public $header;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($chunk_data, $header)
    {
        $this->chunk_data   = $chunk_data;
        $this->header       = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->chunk_data as $sale) {
            $saleData = array_combine($this->header, $sale);
            Sales::create($saleData);
        }
    }
}
