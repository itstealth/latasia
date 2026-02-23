<?php

namespace App\Imports;

use App\Models\SocialMediaLeads;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SocialMediaLeadsImport implements ToModel, WithHeadingRow, WithValidation
{
    protected string $uploadedFileName;

    public function __construct(string $uploadedFileName)
    {
        $this->uploadedFileName = $uploadedFileName;
    }

    public function model(array $row)
    {
        return new SocialMediaLeads([
            'name'                => $row['name'] ?? null,
            'email'               => $row['email'] ?? null,
            'phone'               => $row['phone'] ?? null,
            'job_title'           => $row['job_title'] ?? null,
            'country'             => $row['country'] ?? null,
            'city'                => $row['city'] ?? null,
            'experience'          => $row['experience'] ?? null,
            'current_location'    => $row['current_location'] ?? null,
            'passport_number'     => $row['passport_number'] ?? null,
            'passport_type'       => $row['passport_type'] ?? null,
            'education'           => $row['education'] ?? null,
            'overseas_experience' => $row['overseas_experience'] ?? null,

            // FIXED SYSTEM VALUES
            'source_type'         => 'online',
            'source_name'         => 'facebook',
            'filename'            => $this->uploadedFileName,

            // PARTNER INFO
            'latasia_code'        => $row['latasia_code'] ?? null,
            'partner_name'        => $row['partner_name'] ?? null,

            // DEFAULTS
            'recruiter'           => $row['recruiter'] ?? 0,
            'status'              => 0,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.email' => ['nullable','email'],
            '*.phone' => ['nullable'],
        ];
    }
}
