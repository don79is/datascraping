<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Gidlov\Copycat\Copycat;
use Illuminate\Routing\Controller;

class DDGrabingController extends Controller
{
    public function index()
    {
        $info = json_decode(file_get_contents(storage_path('data.json')), true);
        dd($info);
    }
    public function alldata()
    {

        $calendor = new Copycat;
        $calendor->setCURL(array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_HTTPHEADER, "Content-Type: text/html; charset=iso-8859-1",
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17',
        ));

        $calendor->matchAll([
            'price' => '!<div class="fareCalPrice">(.*?)<\/div>!',
        ])->URLs('https://www.norwegian.com/uk/booking/flight-tickets/farecalendar/?D_City=OSL&A_City=RIX&TripType=1&D_SelectedDay=29&D_Day=29&D_Month=201710&R_SelectedDay=01&R_Day=01&R_Month=201710&dFare=38&IncludeTransit=false&AgreementCodeFK=-1&CurrencyCode=EUR');
        $prices = $calendor->get();

//        dd($prices);



        for ($day = 1; $day < 31; $day++) {
            dd($day);

        }
    }
}


