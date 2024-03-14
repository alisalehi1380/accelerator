<?php

namespace App\Http\Controllers\API\V1\StepOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\StepOne\SubStepOne\StoreSubStepOneRequest;
use App\Http\Requests\API\V1\StepOne\SubStepOne\UpdateSubStepOneRequest;
use App\Services\V1\StepOne\SubStepOneService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{
    public function storeStepOne(StoreSubStepOneRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $trackingCode = SubStepOneService::save($request)::getTrackingCode();
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'code'=>Response::HTTP_CREATED,
                    'message'=>'company information stored successfully',
                    'tracking_code'=>$trackingCode,
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=>'failed to store information!',
                ]);
        }
    }

    public function updateStepOne(UpdateSubStepOneRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            SubStepOneService::update($request);
            DB::commit();
            return response()
                ->json([
                    'status'=>true,
                    'code'=>Response::HTTP_OK,
                    'message'=>'company information updated successfully',
                ]);
        }catch (\Throwable $throwable){
            DB::rollBack();
            return response()
                ->json([
                    'status'=>false,
                    'code'=>Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=>'failed to update information!',
                    'reason'=>$throwable->getMessage(),
                ]);
        }
    }
    public function storeStepTwo()
    {

    }

    public function updateStepTwo()
    {

    }
    public function storeStepThree()
    {

    }
    public function updateStepThree()
    {

    }
    public function storeStepFour()
    {

    }
    public function updateStepFour()
    {

    }
}
