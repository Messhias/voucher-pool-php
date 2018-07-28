<?php
/**
* CONTROLLER CLASS
*
* @author 	Fabio William Conceição
* @copyright	Fabio William 2017-07-27
* @version	1
* @since  	2017-07-27
* @package	Voucher Pool
*/

namespace App\Http\Controllers;

use App\Models\Recipient;
use Illuminate\Http\Request;

use DB;
use Log;

class RecipientsController extends Controller
{

    /**
     * Retrieve all data.
     *
     * @return Response
     */
     public function get()
     {
          try {
               return response()->json([
                    'code' => 200,
                    'payload' => Recipient::get(),
                    'completed_at' => date('Y-m-d H:m:s'),
                    'status_text' => 'OK',
                    'status' => true
               ]);
          } catch (\Exception $e) {
               Log::info('error:');
               Log::error($e);

               return response()->json([
                    'code' => 500,
                    'payload' => $e->getMessage(),
                    'completed_at' => date('Y-m-d H:m:s'),
                    'status_text' => 'Fail',
                    'status' => true
               ]);
          }
     }

     /**
      * Retrieve single data.
      *
      * @param  int  $id
      * @return Response
      */
      public function find($id)
      {
           try {
                return response()->json([
                     'code' => 200,
                     'payload' => Recipient::find($id),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'OK',
                     'status' => true
                ]);
           } catch (\Exception $e) {
                Log::info('error:');
                Log::error($e);

                return response()->json([
                     'code' => 500,
                     'payload' => $e->getMessage(),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'Fail',
                     'status' => true
                ]);
           }
      }

      /**
      * Add data.
      *
      * @param  array  $request
      * @return Response
      */
      public function create(Request $request)
      {
           try {
                DB::beginTransaction();
                return response()->json([
                     'code' => 200,
                     'payload' => Recipient::create($request->input('data')),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'OK',
                     'status' => true
                ]);
                DB::commit();
           } catch (\Exception $e) {
                DB::rollBack();
                Log::info('error:');
                Log::error($e);

                return response()->json([
                     'code' => 500,
                     'payload' => $e->getMessage(),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'Fail',
                     'status' => true
                ]);
           }
      }

      /**
      * Update data.
      *
      * @param  array  $request
      * @param  int  $int
      * @return Response
      */
      public function update(Request $request, $id)
      {
           try {
                DB::beginTransaction();
                return response()->json([
                     'code' => 200,
                     'payload' => Recipient::where('id', $id)
                         ->update($request->input('data')),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'OK',
                     'status' => true
                ]);
                DB::commit();
           } catch (\Exception $e) {
                DB::rollBack();
                Log::info('error:');
                Log::error($e);

                return response()->json([
                     'code' => 500,
                     'payload' => $e->getMessage(),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'Fail',
                     'status' => true
                ]);
           }
      }

      /**
      * Delete data.
      *
      * @param  array  $request
      * @param  int  $int
      * @return Response
      */
      public function delete($id)
      {
           try {
                DB::beginTransaction();
                return response()->json([
                     'code' => 200,
                     'payload' => Recipient::where('id', $id)
                         ->delete(),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'OK',
                     'status' => true
                ]);
                DB::commit();
           } catch (\Exception $e) {
                DB::rollBack();
                Log::info('error:');
                Log::error($e);

                return response()->json([
                     'code' => 500,
                     'payload' => $e->getMessage(),
                     'completed_at' => date('Y-m-d H:m:s'),
                     'status_text' => 'Fail',
                     'status' => true
                ]);
           }
      }
}
