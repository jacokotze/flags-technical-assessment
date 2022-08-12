<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FlagsController extends Controller
{
    static $countries_per_row = 5;
    static $regions = ['Africa', 'Americas', 'Asia', 'Europe', 'Oceania'];

    private function ProcessCountryResponse($response){
        $data = $response;
     	$collected = collect();
        foreach ($data as $key => $country_data) {
            // echo($country_data["name"]["common"] . "<br>\n");
            $country = [];
            $country['name'] = $country_data['name']['common'];
            $country['region'] = $country_data['region'];
            $country['flagUrl'] = $country_data['flags']['svg'];
            $country['pop'] = $country_data['population'];
            $country['currencies'] = array_key_exists('currencies',$country_data) ? $country_data['currencies'] : [];
            $country['languages'] = array_key_exists('languages',$country_data) ? $country_data['languages'] : [];
            // echo(json_encode($country_data) . "<br><br>\n\n");
            $country['capital'] = count($country_data['capital']) > 0 ? $country_data['capital'][0] : "Does not have a capital.";
            $country['iso'] = $country_data['cca3'];

            $collected->push($country);
        }
        return $collected;
    }

    function index(Request $request) {
        $name = $request->input('name', "*");
        $region = $request->input('region', ["*"]);
        $regions = FlagsController::$regions;

        $response = collect(Http::get('https://restcountries.com/v3.1/all?fields=name,region,flags,population,currencies,languages,capital,cca3')->json());

        $countries = $this->ProcessCountryResponse($response);

        if($name && $name !== "*")
            $countries = $countries->filter(function ($country) use ($name) {
                return false !== stristr($country['name'], $name);
            });

        if($region && $region[0] !== "*")
            $countries = $countries->filter(function ($country) use ($region) {
                return $country['region'] === $region;
            });

        $countries = $countries->chunk(FlagsController::$countries_per_row);

        return view("Flags", compact('countries', 'regions', 'name', 'region'));
    }

}
