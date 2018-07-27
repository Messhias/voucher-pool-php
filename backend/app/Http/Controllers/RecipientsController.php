<?php

namespace App\Http\Controllers;

class RecipientsController extends Controller
{
    /**
     * Retrieve all data.
     *
     * @param  int  $id
     * @return Response
     */
     public function get()
     {
         return response()->json([
             'code' => 200
         ]);
     }
}
