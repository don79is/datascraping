<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Gidlov\Copycat\Copycat;
use Illuminate\Routing\Controller;

class DDGrabingController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /ddgrabing
     *
     * @return Response
     */
    public function index()
    {

        $file = new Copycat;
        $file->setCURL(array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_HTTPHEADER, "Content-Type: text/html; charset=iso-8859-1",
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17',
        ));

        for ($day = 1; $day < 15; $day++) {

            $file->match(array(
                'duration' => '!<td class="duration"><div class="content">Duration:(.*?)<\/div><\/td>!',
                'day' => '!<td nowrap="nowrap" class="layoutcell" align="right">&nbsp;Sunday&nbsp;(.*?)<\/td>!',
                'departure' => '!<td class="depdest" title="Flight DY1072"><div class="content emphasize">(.*?)<\/div><\/td>!',
                'arrival' => '!<td class="arrdest"><div class="content emphasize">(.*?)<\/div><\/td>!'
            ))->matchAll(array('price' => '/title="EUR">(.*?)</ms',))->URLs('https://www.norwegian.com/en/booking/flight-tickets/select-flight/?A_City=RIX&AdultCount=1&ChildCount=0&CurrencyCode=EUR&D_City=OSL&D_Day=' . $day . '&D_Month=201710&IncludeTransit=false&InfantCount=0&R_Day=&R_Month=201708&TripType=1');

            $info[] = $file->get();

        }
        $info['info'] = $info;


        dd($info);
        return view('info', $info);
    }

    /**
     * Show the form for creating a new resource.
     * GET /ddgrabing/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /ddgrabing
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /ddgrabing/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /ddgrabing/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /ddgrabing/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /ddgrabing/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}