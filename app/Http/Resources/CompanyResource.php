<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'company_name' => config('company.site_name'),
            'company_tagline' => config('company.site_title'),
            'attributes' => [
                'email' => config('company.default_email_address'),
                'logo' => config('company.site_logo'),
                'facebook' => config('company.social_facebook'),
                'instagram' => config('company.social_instagram'),
                'twitter' => config('company.social_twitter'),
                'linkedIn' => config('company.social_linkedin'),
                'website' => config('company.website'),
                'about' => config('company.about'),

            ]

        ];
    }
}
