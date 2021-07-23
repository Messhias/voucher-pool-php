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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecipientsController extends Controller
{

    /**
     * Retrieve all data.
     *
     * @return JsonResponse
     */
     public function get(): JsonResponse
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
      * @param int $id
      * @return JsonResponse
      */
      public function find(int $id): JsonResponse
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
      * @param  Request  $request
      * @return JsonResponse
       */
      public function create(Request $request): JsonResponse
      {
          return DB::transaction(function () use ($request) {
               try {
                    return response()->json([
                         'code' => 200,
                         'payload' => Recipient::create($request->input('data')),
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
          });
      }

    /**
     * Update data.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
      public function update(Request $request, $id): JsonResponse
      {
          return DB::transaction(function() use($request, $id) {
               try {
                    return response()->json([
                         'code' => 200,
                         'payload' => Recipient::where('id', $id)
                             ->update($request->input('data')),
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
          });
      }

    /**
     * Delete data.
     *
     * @param int $id
     * @return JsonResponse
     */
      public function delete(int $id): JsonResponse
      {
          return DB::transaction(function () use ($id) {
               try {
                    return response()->json([
                         'code' => 200,
                         'payload' => Recipient::where('id', $id)
                             ->delete(),
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
          });
      }
}
