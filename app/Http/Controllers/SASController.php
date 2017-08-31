<?php namespace App\Http\Controllers;

use Gidlov\Copycat\Copycat;
use Illuminate\Routing\Controller;

class SASController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /sas
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

        $file->matchALL(array(
            'price' => '!<span class="price">     <span class="currency">(.*?.*?)<\/span>   <\/span>!',
        ))->URLs('https://book.flysas.com/pl/SAS/wds/Override.action?SO_SITE_EXT_PSPURL=https://classic.sas.dk/SASCredits/SASCreditsPaymentMaster.aspx&SO_SITE_TP_TPC_POST_EOT_WT=50000&SO_SITE_USE_ACK_URL_SERVICE=TRUE&WDS_URL_JSON_POINTS=ebwsprod.flysas.com%2FEAJI%2FEAJIService.aspx&SO_SITE_EBMS_API_SERVERURL=https%3A%2F%2F1aebwsprod.flysas.com%2FEBMSPointsInternal%2FEBMSPoints.asmx&WDS_SERVICING_FLOW_TE_SEATMAP=TRUE&WDS_SERVICING_FLOW_TE_XBAG=TRUE&WDS_SERVICING_FLOW_TE_MEAL=TRUE');

        $info[] = $file->get();
        dd($info);
    }

    /**
     * Show the form for creating a new resource.
     * GET /sas/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /sas
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /sas/{id}
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
     * GET /sas/{id}/edit
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
     * PUT /sas/{id}
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
     * DELETE /sas/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}