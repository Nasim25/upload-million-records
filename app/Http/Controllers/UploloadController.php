<?php

namespace App\Http\Controllers;

use App\Jobs\SalesCsvProcess;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UploloadController extends Controller
{
    public function uploadFrom()
    {
        return view('welcome');
    }
    public function uploadCsv()
    {
        if(request()->has('csv'))
        {
            $data = file(request()->csv);
            $chunk_data = array_chunk($data,10000);
            $header =[];
            foreach($chunk_data as $key=> $chunk)
            {
                $data = array_map('str_getcsv', $chunk);
                if($key === 0)
                {
                    $header = $data[0];
                    unset($data[0]);
                }
                SalesCsvProcess::dispatch($data,$header);
            }
        }


        return "ok";
    }
}
