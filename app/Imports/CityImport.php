<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Notifications\ImportHasFailedNotification;
use Maatwebsite\Excel\Concerns\WithEvents;

class CityImport implements ToModel,WithBatchInserts, WithChunkReading, ShouldQueue, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        if($row[0] != null || $row[0] != "" ){
            return new City([
                'city' => $row[0],
                'city_ascii' => $row[1],
                'state_id' => $row[2],
                'state_name' => $row[3],
                'county_fips' => $row[4],
                'county_name' => $row[5],
                'lat' => $row[6],
                'lng' => $row[7],
                'population' => $row[8],
                'density' => $row[9],
                'source' => $row[10],
                'military' => $row[11],
                'incorporated' => $row[12],
                'timezone' => $row[13],
                'ranking' => $row[14],
                'zips' => $row[15],
            ]);
        }

    }

    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 2000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    
}
