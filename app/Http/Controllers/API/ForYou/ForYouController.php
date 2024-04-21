<?php

namespace App\Http\Controllers\API\ForYou;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceReuest;
use App\Models\Device;
use Illuminate\Http\Request;

class ForYouController extends Controller
{
    //display all devices
    public function index(){
        $devices = Device::all();
        return response([
            'status' => true,
            $devices
        ]);
    }

    //add new device
    public function store(DeviceReuest $request){
        $newDevice = Device::create([
            'device_name' => $request['device_name'],
            'device_brand' => $request['device_brand'],
            'device_consumption' => $request['device_consumption']
        ]);

        return response([
            'status' => true,
            $newDevice
        ]);
    }

    //update device data
    public function update (DeviceReuest $request){

        $updatedDevice = Device::findOrFail($request->id);
        $updatedDevice->device_name = $request->input('device_name');
        $updatedDevice->device_brand = $request->input('device_brand');
        $updatedDevice->device_consumption = $request->input('device_consumption');

        $updatedDevice->save();

        return response([
            'status' => true,
            'data' => $updatedDevice
        ]);
    }

}
