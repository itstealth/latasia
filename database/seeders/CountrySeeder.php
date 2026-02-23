<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [

            /* ================= EUROPE ================= */
            ['name'=>'Albania','iso2'=>'AL','iso3'=>'ALB'],
            ['name'=>'Andorra','iso2'=>'AD','iso3'=>'AND'],
            ['name'=>'Austria','iso2'=>'AT','iso3'=>'AUT'],
            ['name'=>'Belgium','iso2'=>'BE','iso3'=>'BEL'],
            ['name'=>'Bosnia and Herzegovina','iso2'=>'BA','iso3'=>'BIH'],
            ['name'=>'Bulgaria','iso2'=>'BG','iso3'=>'BGR'],
            ['name'=>'Croatia','iso2'=>'HR','iso3'=>'HRV'],
            ['name'=>'Cyprus','iso2'=>'CY','iso3'=>'CYP'],
            ['name'=>'Czech Republic','iso2'=>'CZ','iso3'=>'CZE'],
            ['name'=>'Denmark','iso2'=>'DK','iso3'=>'DNK'],
            ['name'=>'Estonia','iso2'=>'EE','iso3'=>'EST'],
            ['name'=>'Finland','iso2'=>'FI','iso3'=>'FIN'],
            ['name'=>'France','iso2'=>'FR','iso3'=>'FRA'],
            ['name'=>'Germany','iso2'=>'DE','iso3'=>'DEU'],
            ['name'=>'Greece','iso2'=>'GR','iso3'=>'GRC'],
            ['name'=>'Hungary','iso2'=>'HU','iso3'=>'HUN'],
            ['name'=>'Iceland','iso2'=>'IS','iso3'=>'ISL'],
            ['name'=>'Ireland','iso2'=>'IE','iso3'=>'IRL'],
            ['name'=>'Italy','iso2'=>'IT','iso3'=>'ITA'],
            ['name'=>'Latvia','iso2'=>'LV','iso3'=>'LVA'],
            ['name'=>'Liechtenstein','iso2'=>'LI','iso3'=>'LIE'],
            ['name'=>'Lithuania','iso2'=>'LT','iso3'=>'LTU'],
            ['name'=>'Luxembourg','iso2'=>'LU','iso3'=>'LUX'],
            ['name'=>'Malta','iso2'=>'MT','iso3'=>'MLT'],
            ['name'=>'Monaco','iso2'=>'MC','iso3'=>'MCO'],
            ['name'=>'Netherlands','iso2'=>'NL','iso3'=>'NLD'],
            ['name'=>'North Macedonia','iso2'=>'MK','iso3'=>'MKD'],
            ['name'=>'Norway','iso2'=>'NO','iso3'=>'NOR'],
            ['name'=>'Poland','iso2'=>'PL','iso3'=>'POL'],
            ['name'=>'Portugal','iso2'=>'PT','iso3'=>'PRT'],
            ['name'=>'Romania','iso2'=>'RO','iso3'=>'ROU'],
            ['name'=>'San Marino','iso2'=>'SM','iso3'=>'SMR'],
            ['name'=>'Serbia','iso2'=>'RS','iso3'=>'SRB'],
            ['name'=>'Slovakia','iso2'=>'SK','iso3'=>'SVK'],
            ['name'=>'Slovenia','iso2'=>'SI','iso3'=>'SVN'],
            ['name'=>'Spain','iso2'=>'ES','iso3'=>'ESP'],
            ['name'=>'Sweden','iso2'=>'SE','iso3'=>'SWE'],
            ['name'=>'Switzerland','iso2'=>'CH','iso3'=>'CHE'],
            ['name'=>'United Kingdom','iso2'=>'GB','iso3'=>'GBR'],
            ['name'=>'Vatican City','iso2'=>'VA','iso3'=>'VAT'],

            /* ================= ASIA ================= */
            ['name'=>'India','iso2'=>'IN','iso3'=>'IND'],
            ['name'=>'China','iso2'=>'CN','iso3'=>'CHN'],
            ['name'=>'Japan','iso2'=>'JP','iso3'=>'JPN'],
            ['name'=>'South Korea','iso2'=>'KR','iso3'=>'KOR'],
            ['name'=>'Singapore','iso2'=>'SG','iso3'=>'SGP'],
            ['name'=>'Malaysia','iso2'=>'MY','iso3'=>'MYS'],
            ['name'=>'Thailand','iso2'=>'TH','iso3'=>'THA'],
            ['name'=>'Indonesia','iso2'=>'ID','iso3'=>'IDN'],
            ['name'=>'Philippines','iso2'=>'PH','iso3'=>'PHL'],
            ['name'=>'Vietnam','iso2'=>'VN','iso3'=>'VNM'],
            ['name'=>'Sri Lanka','iso2'=>'LK','iso3'=>'LKA'],
            ['name'=>'Bangladesh','iso2'=>'BD','iso3'=>'BGD'],
            ['name'=>'Nepal','iso2'=>'NP','iso3'=>'NPL'],
            ['name'=>'Pakistan','iso2'=>'PK','iso3'=>'PAK'],

            /* ================= MIDDLE EAST ================= */
            ['name'=>'United Arab Emirates','iso2'=>'AE','iso3'=>'ARE'],
            ['name'=>'Saudi Arabia','iso2'=>'SA','iso3'=>'SAU'],
            ['name'=>'Qatar','iso2'=>'QA','iso3'=>'QAT'],
            ['name'=>'Kuwait','iso2'=>'KW','iso3'=>'KWT'],
            ['name'=>'Oman','iso2'=>'OM','iso3'=>'OMN'],
            ['name'=>'Bahrain','iso2'=>'BH','iso3'=>'BHR'],
            ['name'=>'Israel','iso2'=>'IL','iso3'=>'ISR'],
            ['name'=>'Turkey','iso2'=>'TR','iso3'=>'TUR'],

            /* ================= AMERICAS ================= */
            ['name'=>'United States','iso2'=>'US','iso3'=>'USA'],
            ['name'=>'Canada','iso2'=>'CA','iso3'=>'CAN'],
            ['name'=>'Mexico','iso2'=>'MX','iso3'=>'MEX'],
            ['name'=>'Brazil','iso2'=>'BR','iso3'=>'BRA'],
            ['name'=>'Argentina','iso2'=>'AR','iso3'=>'ARG'],
            ['name'=>'Chile','iso2'=>'CL','iso3'=>'CHL'],
            ['name'=>'Colombia','iso2'=>'CO','iso3'=>'COL'],

            /* ================= AFRICA ================= */
            ['name'=>'South Africa','iso2'=>'ZA','iso3'=>'ZAF'],
            ['name'=>'Nigeria','iso2'=>'NG','iso3'=>'NGA'],
            ['name'=>'Kenya','iso2'=>'KE','iso3'=>'KEN'],
            ['name'=>'Egypt','iso2'=>'EG','iso3'=>'EGY'],
            ['name'=>'Ghana','iso2'=>'GH','iso3'=>'GHA'],

            /* ================= OCEANIA ================= */
            ['name'=>'Australia','iso2'=>'AU','iso3'=>'AUS'],
            ['name'=>'New Zealand','iso2'=>'NZ','iso3'=>'NZL'],

        ];

        Country::insert($countries);
    }
}

