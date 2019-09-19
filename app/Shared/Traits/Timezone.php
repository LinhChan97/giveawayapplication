<?php

namespace App\Shared\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

trait Timezone
{

    /**
     * Get created_at value
     *
     * @param string $value Value
     *
     * @return mixed
     */
    public function getCreatedAtAttribute($value)
    {
        return $this->timezone($value);
    }

    /**
     * Get updated_at value
     *
     * @param string $value Value
     *
     * @return mixed
     */
    public function getUpdatedAtAttribute($value)
    {
        return $this->timezone($value);
    }

    /**
     * Get deleted_at value
     *
     * @param string $value Value
     *
     * @return mixed
     */
    public function getDeletedAtAttribute($value)
    {
        return $this->timezone($value);
    }

    /**
     * Get publised_at value
     *
     * @param string $value Value
     *
     * @return mixed
     */
    public function getPublishedAtAttribute($value)
    {
        return $this->timezone($value);
    }

    /**
     * Set user timezone value
     *
     * @param string $value Value
     *
     * @return mixed
     */
    public function timezone($value)
    {
        $request = app(Request::class);
        $timeZone = $request->header('TIMEZONE');
        $carbon = Carbon::parse($value);
        $carbon->tz($timeZone);
        return $carbon->toDateTimeString();
    }
}
