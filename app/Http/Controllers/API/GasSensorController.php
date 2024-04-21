<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GasSensorController extends Controller
{

    //store amount of gas sensor
    public function store(Request $request)
    {
        // Rget the gas reading
        $gasReading = $request->input('gas_reading');

        // perform watt prediction based on the gas reading
        $watts = $this->calculateWatts($gasReading);
        $stoveTime = $this->calculateTime($gasReading);

        return response([
            'status' => true,
            'Quantity of watts' => $watts,
            'Duration of turning on the stove' => $stoveTime
        ]);
    }


    // calculate time stove can work depending on the resulting gas
    public function calculateTime($gasReading)
    {
        return $gasReading * 2.5;
    }

    // calculate the amount of watts produced from the resulting gas
    public function calculateWatts($gasReading)
    {
        return $gasReading * 1.3;
    }

    
}
