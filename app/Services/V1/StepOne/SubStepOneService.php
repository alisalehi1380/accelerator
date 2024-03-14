<?php

namespace App\Services\V1\StepOne;

use App\Enums\Action;
use App\Enums\RegistrationStatus;
use App\Http\Requests\API\V1\StepOne\SubStepOne\StoreSubStepOneRequest;
use App\Http\Requests\API\V1\StepOne\SubStepOne\UpdateSubStepOneRequest;
use App\Models\RegistrationField;
use App\Models\Step;
use App\Models\TrackingCode;
use Jenssegers\Agent\Agent;

class SubStepOneService
{
    public static int $trackingCode;
    private static $instance = null;

    public static function getInstance(): ?self
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public static function save(StoreSubStepOneRequest $request): ?self
    {
        $newInformation = [
            'offices_title'=>$request->offices_title,
            'ownership'=>$request->ownership,
            'city'=>$request->city,
            'county'=>$request->county,
            'address'=>$request->address,
            'postal_code'=>$request->postal_code,
            'area'=>$request->area,
            'office_type'=>$request->office_type,
            'phone_numbers'=>json_encode($request->phone_numbers),
            'fax_numbers'=>json_encode($request->fax_numbers),
            'foundation_administrative_management'=>$request->foundation_administrative_management,
            'foundation_research_engineering'=>$request->foundation_research_engineering,
            'foundation_laboratory'=>$request->foundation_laboratory,
            'foundation_welfare_service'=>$request->foundation_welfare_service,
            'foundation_workshop'=>$request->foundation_workshop,
        ];
        $registrationField = RegistrationField::query()->create($newInformation);
        $trackingCode = $registrationField->trackingCode()->create(['code'=>rand(100000000, 1000000000)]);
        self::setTrackingCode($trackingCode->code);
        $agent = new Agent();
        $progressLog = [
            'status'=>RegistrationStatus::NOT_COMPLETED,
            'action'=>Action::CREATED,
            'step_id'=>Step::query()->where('step_id', 1)->where('order', 1)->first()->id,
            'ip'=>$request->ip(),
            'browser'=>$agent->browser(),
            'platform'=>$agent->platform(),
        ];
        $trackingCode->progressLog()->create($progressLog);
        return self::getInstance();
    }
    public static function getTrackingCode(): int
    {
        return self::$trackingCode;
    }

    public static function setTrackingCode(int $trackingCode): void
    {
        self::$trackingCode = $trackingCode;
    }

    public static function update(UpdateSubStepOneRequest $request)
    {
        $trackingCode = $request->tracking_code;
        $trackingCode = TrackingCode::query()->where('code', $trackingCode)->first();

        $updatedInformation = [
            'offices_title'=>$request->offices_title,
            'ownership'=>$request->ownership,
            'city'=>$request->city,
            'county'=>$request->county,
            'address'=>$request->address,
            'postal_code'=>$request->postal_code,
            'area'=>$request->area,
            'office_type'=>$request->office_type,
            'phone_numbers'=>json_encode($request->phone_numbers),
            'fax_numbers'=>json_encode($request->fax_numbers),
            'foundation_administrative_management'=>$request->foundation_administrative_management,
            'foundation_research_engineering'=>$request->foundation_research_engineering,
            'foundation_laboratory'=>$request->foundation_laboratory,
            'foundation_welfare_service'=>$request->foundation_welfare_service,
            'foundation_workshop'=>$request->foundation_workshop,
        ];
        $trackingCode->companyField->update($updatedInformation);
        $agent = new Agent();
        $progressLog = [
            'status'=>RegistrationStatus::NOT_COMPLETED,
            'action'=>Action::UPDATED,
            'step_id'=>Step::query()->where('step_id', 1)->where('order', 1)->first()->id,
            'ip'=>$request->ip(),
            'browser'=>$agent->browser(),
            'platform'=>$agent->platform(),
        ];
        $trackingCode->progressLog()->create($progressLog);
    }

}
