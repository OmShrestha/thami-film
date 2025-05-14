<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezonesTableSeeder extends Seeder
{

    /**
     * Seeder for Easy Website Setup for News Portal
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('timezones')->delete();

        DB::table('timezones')->insert(array(
            0   =>
                array(
                    'id'           => 1,
                    'country_code' => 'AD',
                    'timezone'     => 'Europe/Andorra',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            1   =>
                array(
                    'id'           => 2,
                    'country_code' => 'AE',
                    'timezone'     => 'Asia/Dubai',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            2   =>
                array(
                    'id'           => 3,
                    'country_code' => 'AF',
                    'timezone'     => 'Asia/Kabul',
                    'gmt_offset'   => '4.50',
                    'dst_offset'   => '4.50',
                    'raw_offset'   => '4.50',
                ),
            3   =>
                array(
                    'id'           => 4,
                    'country_code' => 'AG',
                    'timezone'     => 'America/Antigua',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            4   =>
                array(
                    'id'           => 5,
                    'country_code' => 'AI',
                    'timezone'     => 'America/Anguilla',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            5   =>
                array(
                    'id'           => 6,
                    'country_code' => 'AL',
                    'timezone'     => 'Europe/Tirane',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            6   =>
                array(
                    'id'           => 7,
                    'country_code' => 'AM',
                    'timezone'     => 'Asia/Yerevan',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            7   =>
                array(
                    'id'           => 8,
                    'country_code' => 'AO',
                    'timezone'     => 'Africa/Luanda',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            8   =>
                array(
                    'id'           => 9,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Casey',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            9   =>
                array(
                    'id'           => 10,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Davis',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            10  =>
                array(
                    'id'           => 11,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/DumontDUrville',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            11  =>
                array(
                    'id'           => 12,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Mawson',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            12  =>
                array(
                    'id'           => 13,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/McMurdo',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            13  =>
                array(
                    'id'           => 14,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Palmer',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            14  =>
                array(
                    'id'           => 15,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Rothera',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            15  =>
                array(
                    'id'           => 16,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/South_Pole',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            16  =>
                array(
                    'id'           => 17,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Syowa',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            17  =>
                array(
                    'id'           => 18,
                    'country_code' => 'AQ',
                    'timezone'     => 'Antarctica/Vostok',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            18  =>
                array(
                    'id'           => 19,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Buenos_Aires',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            19  =>
                array(
                    'id'           => 20,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Catamarca',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            20  =>
                array(
                    'id'           => 21,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Cordoba',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            21  =>
                array(
                    'id'           => 22,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Jujuy',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            22  =>
                array(
                    'id'           => 23,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/La_Rioja',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            23  =>
                array(
                    'id'           => 24,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Mendoza',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            24  =>
                array(
                    'id'           => 25,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Rio_Gallegos',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            25  =>
                array(
                    'id'           => 26,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Salta',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            26  =>
                array(
                    'id'           => 27,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/San_Juan',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            27  =>
                array(
                    'id'           => 28,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/San_Luis',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            28  =>
                array(
                    'id'           => 29,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Tucuman',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            29  =>
                array(
                    'id'           => 30,
                    'country_code' => 'AR',
                    'timezone'     => 'America/Argentina/Ushuaia',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            30  =>
                array(
                    'id'           => 31,
                    'country_code' => 'AS',
                    'timezone'     => 'Pacific/Pago_Pago',
                    'gmt_offset'   => '-11.00',
                    'dst_offset'   => '-11.00',
                    'raw_offset'   => '-11.00',
                ),
            31  =>
                array(
                    'id'           => 32,
                    'country_code' => 'AT',
                    'timezone'     => 'Europe/Vienna',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            32  =>
                array(
                    'id'           => 33,
                    'country_code' => 'AU',
                    'timezone'     => 'Antarctica/Macquarie',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            33  =>
                array(
                    'id'           => 34,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Adelaide',
                    'gmt_offset'   => '10.50',
                    'dst_offset'   => '9.50',
                    'raw_offset'   => '9.50',
                ),
            34  =>
                array(
                    'id'           => 35,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Brisbane',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            35  =>
                array(
                    'id'           => 36,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Broken_Hill',
                    'gmt_offset'   => '10.50',
                    'dst_offset'   => '9.50',
                    'raw_offset'   => '9.50',
                ),
            36  =>
                array(
                    'id'           => 37,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Currie',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            37  =>
                array(
                    'id'           => 38,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Darwin',
                    'gmt_offset'   => '9.50',
                    'dst_offset'   => '9.50',
                    'raw_offset'   => '9.50',
                ),
            38  =>
                array(
                    'id'           => 39,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Eucla',
                    'gmt_offset'   => '8.75',
                    'dst_offset'   => '8.75',
                    'raw_offset'   => '8.75',
                ),
            39  =>
                array(
                    'id'           => 40,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Hobart',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            40  =>
                array(
                    'id'           => 41,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Lindeman',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            41  =>
                array(
                    'id'           => 42,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Lord_Howe',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '10.50',
                    'raw_offset'   => '10.50',
                ),
            42  =>
                array(
                    'id'           => 43,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Melbourne',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            43  =>
                array(
                    'id'           => 44,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Perth',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            44  =>
                array(
                    'id'           => 45,
                    'country_code' => 'AU',
                    'timezone'     => 'Australia/Sydney',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            45  =>
                array(
                    'id'           => 46,
                    'country_code' => 'AW',
                    'timezone'     => 'America/Aruba',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            46  =>
                array(
                    'id'           => 47,
                    'country_code' => 'AX',
                    'timezone'     => 'Europe/Mariehamn',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            47  =>
                array(
                    'id'           => 48,
                    'country_code' => 'AZ',
                    'timezone'     => 'Asia/Baku',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '4.00',
                ),
            48  =>
                array(
                    'id'           => 49,
                    'country_code' => 'BA',
                    'timezone'     => 'Europe/Sarajevo',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            49  =>
                array(
                    'id'           => 50,
                    'country_code' => 'BB',
                    'timezone'     => 'America/Barbados',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            50  =>
                array(
                    'id'           => 51,
                    'country_code' => 'BD',
                    'timezone'     => 'Asia/Dhaka',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            51  =>
                array(
                    'id'           => 52,
                    'country_code' => 'BE',
                    'timezone'     => 'Europe/Brussels',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            52  =>
                array(
                    'id'           => 53,
                    'country_code' => 'BF',
                    'timezone'     => 'Africa/Ouagadougou',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            53  =>
                array(
                    'id'           => 54,
                    'country_code' => 'BG',
                    'timezone'     => 'Europe/Sofia',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            54  =>
                array(
                    'id'           => 55,
                    'country_code' => 'BH',
                    'timezone'     => 'Asia/Bahrain',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            55  =>
                array(
                    'id'           => 56,
                    'country_code' => 'BI',
                    'timezone'     => 'Africa/Bujumbura',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            56  =>
                array(
                    'id'           => 57,
                    'country_code' => 'BJ',
                    'timezone'     => 'Africa/Porto-Novo',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            57  =>
                array(
                    'id'           => 58,
                    'country_code' => 'BL',
                    'timezone'     => 'America/St_Barthelemy',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            58  =>
                array(
                    'id'           => 59,
                    'country_code' => 'BM',
                    'timezone'     => 'Atlantic/Bermuda',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-4.00',
                ),
            59  =>
                array(
                    'id'           => 60,
                    'country_code' => 'BN',
                    'timezone'     => 'Asia/Brunei',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            60  =>
                array(
                    'id'           => 61,
                    'country_code' => 'BO',
                    'timezone'     => 'America/La_Paz',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            61  =>
                array(
                    'id'           => 62,
                    'country_code' => 'BQ',
                    'timezone'     => 'America/Kralendijk',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            62  =>
                array(
                    'id'           => 63,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Araguaina',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            63  =>
                array(
                    'id'           => 64,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Bahia',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            64  =>
                array(
                    'id'           => 65,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Belem',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            65  =>
                array(
                    'id'           => 66,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Boa_Vista',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            66  =>
                array(
                    'id'           => 67,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Campo_Grande',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            67  =>
                array(
                    'id'           => 68,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Cuiaba',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            68  =>
                array(
                    'id'           => 69,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Eirunepe',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            69  =>
                array(
                    'id'           => 70,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Fortaleza',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            70  =>
                array(
                    'id'           => 71,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Maceio',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            71  =>
                array(
                    'id'           => 72,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Manaus',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            72  =>
                array(
                    'id'           => 73,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Noronha',
                    'gmt_offset'   => '-2.00',
                    'dst_offset'   => '-2.00',
                    'raw_offset'   => '-2.00',
                ),
            73  =>
                array(
                    'id'           => 74,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Porto_Velho',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            74  =>
                array(
                    'id'           => 75,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Recife',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            75  =>
                array(
                    'id'           => 76,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Rio_Branco',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            76  =>
                array(
                    'id'           => 77,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Santarem',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            77  =>
                array(
                    'id'           => 78,
                    'country_code' => 'BR',
                    'timezone'     => 'America/Sao_Paulo',
                    'gmt_offset'   => '-2.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            78  =>
                array(
                    'id'           => 79,
                    'country_code' => 'BS',
                    'timezone'     => 'America/Nassau',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            79  =>
                array(
                    'id'           => 80,
                    'country_code' => 'BT',
                    'timezone'     => 'Asia/Thimphu',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            80  =>
                array(
                    'id'           => 81,
                    'country_code' => 'BW',
                    'timezone'     => 'Africa/Gaborone',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            81  =>
                array(
                    'id'           => 82,
                    'country_code' => 'BY',
                    'timezone'     => 'Europe/Minsk',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            82  =>
                array(
                    'id'           => 83,
                    'country_code' => 'BZ',
                    'timezone'     => 'America/Belize',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            83  =>
                array(
                    'id'           => 84,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Atikokan',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            84  =>
                array(
                    'id'           => 85,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Blanc-Sablon',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            85  =>
                array(
                    'id'           => 86,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Cambridge_Bay',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            86  =>
                array(
                    'id'           => 87,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Creston',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-7.00',
                ),
            87  =>
                array(
                    'id'           => 88,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Dawson',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-8.00',
                ),
            88  =>
                array(
                    'id'           => 89,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Dawson_Creek',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-7.00',
                ),
            89  =>
                array(
                    'id'           => 90,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Edmonton',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            90  =>
                array(
                    'id'           => 91,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Glace_Bay',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-4.00',
                ),
            91  =>
                array(
                    'id'           => 92,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Goose_Bay',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-4.00',
                ),
            92  =>
                array(
                    'id'           => 93,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Halifax',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-4.00',
                ),
            93  =>
                array(
                    'id'           => 94,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Inuvik',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            94  =>
                array(
                    'id'           => 95,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Iqaluit',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            95  =>
                array(
                    'id'           => 96,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Moncton',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-4.00',
                ),
            96  =>
                array(
                    'id'           => 97,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Montreal',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            97  =>
                array(
                    'id'           => 98,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Nipigon',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            98  =>
                array(
                    'id'           => 99,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Pangnirtung',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            99  =>
                array(
                    'id'           => 100,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Rainy_River',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            100 =>
                array(
                    'id'           => 101,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Rankin_Inlet',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            101 =>
                array(
                    'id'           => 102,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Regina',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            102 =>
                array(
                    'id'           => 103,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Resolute',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            103 =>
                array(
                    'id'           => 104,
                    'country_code' => 'CA',
                    'timezone'     => 'America/St_Johns',
                    'gmt_offset'   => '-3.50',
                    'dst_offset'   => '-2.50',
                    'raw_offset'   => '-3.50',
                ),
            104 =>
                array(
                    'id'           => 105,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Swift_Current',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            105 =>
                array(
                    'id'           => 106,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Thunder_Bay',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            106 =>
                array(
                    'id'           => 107,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Toronto',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            107 =>
                array(
                    'id'           => 108,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Vancouver',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-8.00',
                ),
            108 =>
                array(
                    'id'           => 109,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Whitehorse',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-8.00',
                ),
            109 =>
                array(
                    'id'           => 110,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Winnipeg',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            110 =>
                array(
                    'id'           => 111,
                    'country_code' => 'CA',
                    'timezone'     => 'America/Yellowknife',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            111 =>
                array(
                    'id'           => 112,
                    'country_code' => 'CC',
                    'timezone'     => 'Indian/Cocos',
                    'gmt_offset'   => '6.50',
                    'dst_offset'   => '6.50',
                    'raw_offset'   => '6.50',
                ),
            112 =>
                array(
                    'id'           => 113,
                    'country_code' => 'CD',
                    'timezone'     => 'Africa/Kinshasa',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            113 =>
                array(
                    'id'           => 114,
                    'country_code' => 'CD',
                    'timezone'     => 'Africa/Lubumbashi',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            114 =>
                array(
                    'id'           => 115,
                    'country_code' => 'CF',
                    'timezone'     => 'Africa/Bangui',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            115 =>
                array(
                    'id'           => 116,
                    'country_code' => 'CG',
                    'timezone'     => 'Africa/Brazzaville',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            116 =>
                array(
                    'id'           => 117,
                    'country_code' => 'CH',
                    'timezone'     => 'Europe/Zurich',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            117 =>
                array(
                    'id'           => 118,
                    'country_code' => 'CI',
                    'timezone'     => 'Africa/Abidjan',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            118 =>
                array(
                    'id'           => 119,
                    'country_code' => 'CK',
                    'timezone'     => 'Pacific/Rarotonga',
                    'gmt_offset'   => '-10.00',
                    'dst_offset'   => '-10.00',
                    'raw_offset'   => '-10.00',
                ),
            119 =>
                array(
                    'id'           => 120,
                    'country_code' => 'CL',
                    'timezone'     => 'America/Santiago',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            120 =>
                array(
                    'id'           => 121,
                    'country_code' => 'CL',
                    'timezone'     => 'Pacific/Easter',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            121 =>
                array(
                    'id'           => 122,
                    'country_code' => 'CM',
                    'timezone'     => 'Africa/Douala',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            122 =>
                array(
                    'id'           => 123,
                    'country_code' => 'CN',
                    'timezone'     => 'Asia/Chongqing',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            123 =>
                array(
                    'id'           => 124,
                    'country_code' => 'CN',
                    'timezone'     => 'Asia/Harbin',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            124 =>
                array(
                    'id'           => 125,
                    'country_code' => 'CN',
                    'timezone'     => 'Asia/Kashgar',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            125 =>
                array(
                    'id'           => 126,
                    'country_code' => 'CN',
                    'timezone'     => 'Asia/Shanghai',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            126 =>
                array(
                    'id'           => 127,
                    'country_code' => 'CN',
                    'timezone'     => 'Asia/Urumqi',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            127 =>
                array(
                    'id'           => 128,
                    'country_code' => 'CO',
                    'timezone'     => 'America/Bogota',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            128 =>
                array(
                    'id'           => 129,
                    'country_code' => 'CR',
                    'timezone'     => 'America/Costa_Rica',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            129 =>
                array(
                    'id'           => 130,
                    'country_code' => 'CU',
                    'timezone'     => 'America/Havana',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            130 =>
                array(
                    'id'           => 131,
                    'country_code' => 'CV',
                    'timezone'     => 'Atlantic/Cape_Verde',
                    'gmt_offset'   => '-1.00',
                    'dst_offset'   => '-1.00',
                    'raw_offset'   => '-1.00',
                ),
            131 =>
                array(
                    'id'           => 132,
                    'country_code' => 'CW',
                    'timezone'     => 'America/Curacao',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            132 =>
                array(
                    'id'           => 133,
                    'country_code' => 'CX',
                    'timezone'     => 'Indian/Christmas',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            133 =>
                array(
                    'id'           => 134,
                    'country_code' => 'CY',
                    'timezone'     => 'Asia/Nicosia',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            134 =>
                array(
                    'id'           => 135,
                    'country_code' => 'CZ',
                    'timezone'     => 'Europe/Prague',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            135 =>
                array(
                    'id'           => 136,
                    'country_code' => 'DE',
                    'timezone'     => 'Europe/Berlin',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            136 =>
                array(
                    'id'           => 137,
                    'country_code' => 'DE',
                    'timezone'     => 'Europe/Busingen',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            137 =>
                array(
                    'id'           => 138,
                    'country_code' => 'DJ',
                    'timezone'     => 'Africa/Djibouti',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            138 =>
                array(
                    'id'           => 139,
                    'country_code' => 'DK',
                    'timezone'     => 'Europe/Copenhagen',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            139 =>
                array(
                    'id'           => 140,
                    'country_code' => 'DM',
                    'timezone'     => 'America/Dominica',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            140 =>
                array(
                    'id'           => 141,
                    'country_code' => 'DO',
                    'timezone'     => 'America/Santo_Domingo',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            141 =>
                array(
                    'id'           => 142,
                    'country_code' => 'DZ',
                    'timezone'     => 'Africa/Algiers',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            142 =>
                array(
                    'id'           => 143,
                    'country_code' => 'EC',
                    'timezone'     => 'America/Guayaquil',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            143 =>
                array(
                    'id'           => 144,
                    'country_code' => 'EC',
                    'timezone'     => 'Pacific/Galapagos',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            144 =>
                array(
                    'id'           => 145,
                    'country_code' => 'EE',
                    'timezone'     => 'Europe/Tallinn',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            145 =>
                array(
                    'id'           => 146,
                    'country_code' => 'EG',
                    'timezone'     => 'Africa/Cairo',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            146 =>
                array(
                    'id'           => 147,
                    'country_code' => 'EH',
                    'timezone'     => 'Africa/El_Aaiun',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            147 =>
                array(
                    'id'           => 148,
                    'country_code' => 'ER',
                    'timezone'     => 'Africa/Asmara',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            148 =>
                array(
                    'id'           => 149,
                    'country_code' => 'ES',
                    'timezone'     => 'Africa/Ceuta',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            149 =>
                array(
                    'id'           => 150,
                    'country_code' => 'ES',
                    'timezone'     => 'Atlantic/Canary',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            150 =>
                array(
                    'id'           => 151,
                    'country_code' => 'ES',
                    'timezone'     => 'Europe/Madrid',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            151 =>
                array(
                    'id'           => 152,
                    'country_code' => 'ET',
                    'timezone'     => 'Africa/Addis_Ababa',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            152 =>
                array(
                    'id'           => 153,
                    'country_code' => 'FI',
                    'timezone'     => 'Europe/Helsinki',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            153 =>
                array(
                    'id'           => 154,
                    'country_code' => 'FJ',
                    'timezone'     => 'Pacific/Fiji',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            154 =>
                array(
                    'id'           => 155,
                    'country_code' => 'FK',
                    'timezone'     => 'Atlantic/Stanley',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            155 =>
                array(
                    'id'           => 156,
                    'country_code' => 'FM',
                    'timezone'     => 'Pacific/Chuuk',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            156 =>
                array(
                    'id'           => 157,
                    'country_code' => 'FM',
                    'timezone'     => 'Pacific/Kosrae',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            157 =>
                array(
                    'id'           => 158,
                    'country_code' => 'FM',
                    'timezone'     => 'Pacific/Pohnpei',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            158 =>
                array(
                    'id'           => 159,
                    'country_code' => 'FO',
                    'timezone'     => 'Atlantic/Faroe',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            159 =>
                array(
                    'id'           => 160,
                    'country_code' => 'FR',
                    'timezone'     => 'Europe/Paris',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            160 =>
                array(
                    'id'           => 161,
                    'country_code' => 'GA',
                    'timezone'     => 'Africa/Libreville',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            161 =>
                array(
                    'id'           => 162,
                    'country_code' => 'GB',
                    'timezone'     => 'Europe/London',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            162 =>
                array(
                    'id'           => 163,
                    'country_code' => 'GD',
                    'timezone'     => 'America/Grenada',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            163 =>
                array(
                    'id'           => 164,
                    'country_code' => 'GE',
                    'timezone'     => 'Asia/Tbilisi',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            164 =>
                array(
                    'id'           => 165,
                    'country_code' => 'GF',
                    'timezone'     => 'America/Cayenne',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            165 =>
                array(
                    'id'           => 166,
                    'country_code' => 'GG',
                    'timezone'     => 'Europe/Guernsey',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            166 =>
                array(
                    'id'           => 167,
                    'country_code' => 'GH',
                    'timezone'     => 'Africa/Accra',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            167 =>
                array(
                    'id'           => 168,
                    'country_code' => 'GI',
                    'timezone'     => 'Europe/Gibraltar',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            168 =>
                array(
                    'id'           => 169,
                    'country_code' => 'GL',
                    'timezone'     => 'America/Danmarkshavn',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            169 =>
                array(
                    'id'           => 170,
                    'country_code' => 'GL',
                    'timezone'     => 'America/Godthab',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-2.00',
                    'raw_offset'   => '-3.00',
                ),
            170 =>
                array(
                    'id'           => 171,
                    'country_code' => 'GL',
                    'timezone'     => 'America/Scoresbysund',
                    'gmt_offset'   => '-1.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '-1.00',
                ),
            171 =>
                array(
                    'id'           => 172,
                    'country_code' => 'GL',
                    'timezone'     => 'America/Thule',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-4.00',
                ),
            172 =>
                array(
                    'id'           => 173,
                    'country_code' => 'GM',
                    'timezone'     => 'Africa/Banjul',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            173 =>
                array(
                    'id'           => 174,
                    'country_code' => 'GN',
                    'timezone'     => 'Africa/Conakry',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            174 =>
                array(
                    'id'           => 175,
                    'country_code' => 'GP',
                    'timezone'     => 'America/Guadeloupe',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            175 =>
                array(
                    'id'           => 176,
                    'country_code' => 'GQ',
                    'timezone'     => 'Africa/Malabo',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            176 =>
                array(
                    'id'           => 177,
                    'country_code' => 'GR',
                    'timezone'     => 'Europe/Athens',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            177 =>
                array(
                    'id'           => 178,
                    'country_code' => 'GS',
                    'timezone'     => 'Atlantic/South_Georgia',
                    'gmt_offset'   => '-2.00',
                    'dst_offset'   => '-2.00',
                    'raw_offset'   => '-2.00',
                ),
            178 =>
                array(
                    'id'           => 179,
                    'country_code' => 'GT',
                    'timezone'     => 'America/Guatemala',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            179 =>
                array(
                    'id'           => 180,
                    'country_code' => 'GU',
                    'timezone'     => 'Pacific/Guam',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            180 =>
                array(
                    'id'           => 181,
                    'country_code' => 'GW',
                    'timezone'     => 'Africa/Bissau',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            181 =>
                array(
                    'id'           => 182,
                    'country_code' => 'GY',
                    'timezone'     => 'America/Guyana',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            182 =>
                array(
                    'id'           => 183,
                    'country_code' => 'HK',
                    'timezone'     => 'Asia/Hong_Kong',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            183 =>
                array(
                    'id'           => 184,
                    'country_code' => 'HN',
                    'timezone'     => 'America/Tegucigalpa',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            184 =>
                array(
                    'id'           => 185,
                    'country_code' => 'HR',
                    'timezone'     => 'Europe/Zagreb',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            185 =>
                array(
                    'id'           => 186,
                    'country_code' => 'HT',
                    'timezone'     => 'America/Port-au-Prince',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            186 =>
                array(
                    'id'           => 187,
                    'country_code' => 'HU',
                    'timezone'     => 'Europe/Budapest',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            187 =>
                array(
                    'id'           => 188,
                    'country_code' => 'ID',
                    'timezone'     => 'Asia/Jakarta',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            188 =>
                array(
                    'id'           => 189,
                    'country_code' => 'ID',
                    'timezone'     => 'Asia/Jayapura',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            189 =>
                array(
                    'id'           => 190,
                    'country_code' => 'ID',
                    'timezone'     => 'Asia/Makassar',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            190 =>
                array(
                    'id'           => 191,
                    'country_code' => 'ID',
                    'timezone'     => 'Asia/Pontianak',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            191 =>
                array(
                    'id'           => 192,
                    'country_code' => 'IE',
                    'timezone'     => 'Europe/Dublin',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            192 =>
                array(
                    'id'           => 193,
                    'country_code' => 'IL',
                    'timezone'     => 'Asia/Jerusalem',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            193 =>
                array(
                    'id'           => 194,
                    'country_code' => 'IM',
                    'timezone'     => 'Europe/Isle_of_Man',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            194 =>
                array(
                    'id'           => 195,
                    'country_code' => 'IN',
                    'timezone'     => 'Asia/Kolkata',
                    'gmt_offset'   => '5.50',
                    'dst_offset'   => '5.50',
                    'raw_offset'   => '5.50',
                ),
            195 =>
                array(
                    'id'           => 196,
                    'country_code' => 'IO',
                    'timezone'     => 'Indian/Chagos',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            196 =>
                array(
                    'id'           => 197,
                    'country_code' => 'IQ',
                    'timezone'     => 'Asia/Baghdad',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            197 =>
                array(
                    'id'           => 198,
                    'country_code' => 'IR',
                    'timezone'     => 'Asia/Tehran',
                    'gmt_offset'   => '3.50',
                    'dst_offset'   => '4.50',
                    'raw_offset'   => '3.50',
                ),
            198 =>
                array(
                    'id'           => 199,
                    'country_code' => 'IS',
                    'timezone'     => 'Atlantic/Reykjavik',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            199 =>
                array(
                    'id'           => 200,
                    'country_code' => 'IT',
                    'timezone'     => 'Europe/Rome',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            200 =>
                array(
                    'id'           => 201,
                    'country_code' => 'JE',
                    'timezone'     => 'Europe/Jersey',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            201 =>
                array(
                    'id'           => 202,
                    'country_code' => 'JM',
                    'timezone'     => 'America/Jamaica',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            202 =>
                array(
                    'id'           => 203,
                    'country_code' => 'JO',
                    'timezone'     => 'Asia/Amman',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            203 =>
                array(
                    'id'           => 204,
                    'country_code' => 'JP',
                    'timezone'     => 'Asia/Tokyo',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            204 =>
                array(
                    'id'           => 205,
                    'country_code' => 'KE',
                    'timezone'     => 'Africa/Nairobi',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            205 =>
                array(
                    'id'           => 206,
                    'country_code' => 'KG',
                    'timezone'     => 'Asia/Bishkek',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            206 =>
                array(
                    'id'           => 207,
                    'country_code' => 'KH',
                    'timezone'     => 'Asia/Phnom_Penh',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            207 =>
                array(
                    'id'           => 208,
                    'country_code' => 'KI',
                    'timezone'     => 'Pacific/Enderbury',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '13.00',
                    'raw_offset'   => '13.00',
                ),
            208 =>
                array(
                    'id'           => 209,
                    'country_code' => 'KI',
                    'timezone'     => 'Pacific/Kiritimati',
                    'gmt_offset'   => '14.00',
                    'dst_offset'   => '14.00',
                    'raw_offset'   => '14.00',
                ),
            209 =>
                array(
                    'id'           => 210,
                    'country_code' => 'KI',
                    'timezone'     => 'Pacific/Tarawa',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            210 =>
                array(
                    'id'           => 211,
                    'country_code' => 'KM',
                    'timezone'     => 'Indian/Comoro',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            211 =>
                array(
                    'id'           => 212,
                    'country_code' => 'KN',
                    'timezone'     => 'America/St_Kitts',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            212 =>
                array(
                    'id'           => 213,
                    'country_code' => 'KP',
                    'timezone'     => 'Asia/Pyongyang',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            213 =>
                array(
                    'id'           => 214,
                    'country_code' => 'KR',
                    'timezone'     => 'Asia/Seoul',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            214 =>
                array(
                    'id'           => 215,
                    'country_code' => 'KW',
                    'timezone'     => 'Asia/Kuwait',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            215 =>
                array(
                    'id'           => 216,
                    'country_code' => 'KY',
                    'timezone'     => 'America/Cayman',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            216 =>
                array(
                    'id'           => 217,
                    'country_code' => 'KZ',
                    'timezone'     => 'Asia/Almaty',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            217 =>
                array(
                    'id'           => 218,
                    'country_code' => 'KZ',
                    'timezone'     => 'Asia/Aqtau',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            218 =>
                array(
                    'id'           => 219,
                    'country_code' => 'KZ',
                    'timezone'     => 'Asia/Aqtobe',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            219 =>
                array(
                    'id'           => 220,
                    'country_code' => 'KZ',
                    'timezone'     => 'Asia/Oral',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            220 =>
                array(
                    'id'           => 221,
                    'country_code' => 'KZ',
                    'timezone'     => 'Asia/Qyzylorda',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            221 =>
                array(
                    'id'           => 222,
                    'country_code' => 'LA',
                    'timezone'     => 'Asia/Vientiane',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            222 =>
                array(
                    'id'           => 223,
                    'country_code' => 'LB',
                    'timezone'     => 'Asia/Beirut',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            223 =>
                array(
                    'id'           => 224,
                    'country_code' => 'LC',
                    'timezone'     => 'America/St_Lucia',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            224 =>
                array(
                    'id'           => 225,
                    'country_code' => 'LI',
                    'timezone'     => 'Europe/Vaduz',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            225 =>
                array(
                    'id'           => 226,
                    'country_code' => 'LK',
                    'timezone'     => 'Asia/Colombo',
                    'gmt_offset'   => '5.50',
                    'dst_offset'   => '5.50',
                    'raw_offset'   => '5.50',
                ),
            226 =>
                array(
                    'id'           => 227,
                    'country_code' => 'LR',
                    'timezone'     => 'Africa/Monrovia',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            227 =>
                array(
                    'id'           => 228,
                    'country_code' => 'LS',
                    'timezone'     => 'Africa/Maseru',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            228 =>
                array(
                    'id'           => 229,
                    'country_code' => 'LT',
                    'timezone'     => 'Europe/Vilnius',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            229 =>
                array(
                    'id'           => 230,
                    'country_code' => 'LU',
                    'timezone'     => 'Europe/Luxembourg',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            230 =>
                array(
                    'id'           => 231,
                    'country_code' => 'LV',
                    'timezone'     => 'Europe/Riga',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            231 =>
                array(
                    'id'           => 232,
                    'country_code' => 'LY',
                    'timezone'     => 'Africa/Tripoli',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            232 =>
                array(
                    'id'           => 233,
                    'country_code' => 'MA',
                    'timezone'     => 'Africa/Casablanca',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            233 =>
                array(
                    'id'           => 234,
                    'country_code' => 'MC',
                    'timezone'     => 'Europe/Monaco',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            234 =>
                array(
                    'id'           => 235,
                    'country_code' => 'MD',
                    'timezone'     => 'Europe/Chisinau',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            235 =>
                array(
                    'id'           => 236,
                    'country_code' => 'ME',
                    'timezone'     => 'Europe/Podgorica',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            236 =>
                array(
                    'id'           => 237,
                    'country_code' => 'MF',
                    'timezone'     => 'America/Marigot',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            237 =>
                array(
                    'id'           => 238,
                    'country_code' => 'MG',
                    'timezone'     => 'Indian/Antananarivo',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            238 =>
                array(
                    'id'           => 239,
                    'country_code' => 'MH',
                    'timezone'     => 'Pacific/Kwajalein',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            239 =>
                array(
                    'id'           => 240,
                    'country_code' => 'MH',
                    'timezone'     => 'Pacific/Majuro',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            240 =>
                array(
                    'id'           => 241,
                    'country_code' => 'MK',
                    'timezone'     => 'Europe/Skopje',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            241 =>
                array(
                    'id'           => 242,
                    'country_code' => 'ML',
                    'timezone'     => 'Africa/Bamako',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            242 =>
                array(
                    'id'           => 243,
                    'country_code' => 'MM',
                    'timezone'     => 'Asia/Rangoon',
                    'gmt_offset'   => '6.50',
                    'dst_offset'   => '6.50',
                    'raw_offset'   => '6.50',
                ),
            243 =>
                array(
                    'id'           => 244,
                    'country_code' => 'MN',
                    'timezone'     => 'Asia/Choibalsan',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            244 =>
                array(
                    'id'           => 245,
                    'country_code' => 'MN',
                    'timezone'     => 'Asia/Hovd',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            245 =>
                array(
                    'id'           => 246,
                    'country_code' => 'MN',
                    'timezone'     => 'Asia/Ulaanbaatar',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            246 =>
                array(
                    'id'           => 247,
                    'country_code' => 'MO',
                    'timezone'     => 'Asia/Macau',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            247 =>
                array(
                    'id'           => 248,
                    'country_code' => 'MP',
                    'timezone'     => 'Pacific/Saipan',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            248 =>
                array(
                    'id'           => 249,
                    'country_code' => 'MQ',
                    'timezone'     => 'America/Martinique',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            249 =>
                array(
                    'id'           => 250,
                    'country_code' => 'MR',
                    'timezone'     => 'Africa/Nouakchott',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            250 =>
                array(
                    'id'           => 251,
                    'country_code' => 'MS',
                    'timezone'     => 'America/Montserrat',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            251 =>
                array(
                    'id'           => 252,
                    'country_code' => 'MT',
                    'timezone'     => 'Europe/Malta',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            252 =>
                array(
                    'id'           => 253,
                    'country_code' => 'MU',
                    'timezone'     => 'Indian/Mauritius',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            253 =>
                array(
                    'id'           => 254,
                    'country_code' => 'MV',
                    'timezone'     => 'Indian/Maldives',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            254 =>
                array(
                    'id'           => 255,
                    'country_code' => 'MW',
                    'timezone'     => 'Africa/Blantyre',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            255 =>
                array(
                    'id'           => 256,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Bahia_Banderas',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            256 =>
                array(
                    'id'           => 257,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Cancun',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            257 =>
                array(
                    'id'           => 258,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Chihuahua',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            258 =>
                array(
                    'id'           => 259,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Hermosillo',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-7.00',
                ),
            259 =>
                array(
                    'id'           => 260,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Matamoros',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            260 =>
                array(
                    'id'           => 261,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Mazatlan',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            261 =>
                array(
                    'id'           => 262,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Merida',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            262 =>
                array(
                    'id'           => 263,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Mexico_City',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            263 =>
                array(
                    'id'           => 264,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Monterrey',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            264 =>
                array(
                    'id'           => 265,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Ojinaga',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            265 =>
                array(
                    'id'           => 266,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Santa_Isabel',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-8.00',
                ),
            266 =>
                array(
                    'id'           => 267,
                    'country_code' => 'MX',
                    'timezone'     => 'America/Tijuana',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-8.00',
                ),
            267 =>
                array(
                    'id'           => 268,
                    'country_code' => 'MY',
                    'timezone'     => 'Asia/Kuala_Lumpur',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            268 =>
                array(
                    'id'           => 269,
                    'country_code' => 'MY',
                    'timezone'     => 'Asia/Kuching',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            269 =>
                array(
                    'id'           => 270,
                    'country_code' => 'MZ',
                    'timezone'     => 'Africa/Maputo',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            270 =>
                array(
                    'id'           => 271,
                    'country_code' => 'NA',
                    'timezone'     => 'Africa/Windhoek',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            271 =>
                array(
                    'id'           => 272,
                    'country_code' => 'NC',
                    'timezone'     => 'Pacific/Noumea',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            272 =>
                array(
                    'id'           => 273,
                    'country_code' => 'NE',
                    'timezone'     => 'Africa/Niamey',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            273 =>
                array(
                    'id'           => 274,
                    'country_code' => 'NF',
                    'timezone'     => 'Pacific/Norfolk',
                    'gmt_offset'   => '11.50',
                    'dst_offset'   => '11.50',
                    'raw_offset'   => '11.50',
                ),
            274 =>
                array(
                    'id'           => 275,
                    'country_code' => 'NG',
                    'timezone'     => 'Africa/Lagos',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            275 =>
                array(
                    'id'           => 276,
                    'country_code' => 'NI',
                    'timezone'     => 'America/Managua',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            276 =>
                array(
                    'id'           => 277,
                    'country_code' => 'NL',
                    'timezone'     => 'Europe/Amsterdam',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            277 =>
                array(
                    'id'           => 278,
                    'country_code' => 'NO',
                    'timezone'     => 'Europe/Oslo',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            278 =>
                array(
                    'id'           => 279,
                    'country_code' => 'NP',
                    'timezone'     => 'Asia/Kathmandu',
                    'gmt_offset'   => '5.75',
                    'dst_offset'   => '5.75',
                    'raw_offset'   => '5.75',
                ),
            279 =>
                array(
                    'id'           => 280,
                    'country_code' => 'NR',
                    'timezone'     => 'Pacific/Nauru',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            280 =>
                array(
                    'id'           => 281,
                    'country_code' => 'NU',
                    'timezone'     => 'Pacific/Niue',
                    'gmt_offset'   => '-11.00',
                    'dst_offset'   => '-11.00',
                    'raw_offset'   => '-11.00',
                ),
            281 =>
                array(
                    'id'           => 282,
                    'country_code' => 'NZ',
                    'timezone'     => 'Pacific/Auckland',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            282 =>
                array(
                    'id'           => 283,
                    'country_code' => 'NZ',
                    'timezone'     => 'Pacific/Chatham',
                    'gmt_offset'   => '13.75',
                    'dst_offset'   => '12.75',
                    'raw_offset'   => '12.75',
                ),
            283 =>
                array(
                    'id'           => 284,
                    'country_code' => 'OM',
                    'timezone'     => 'Asia/Muscat',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            284 =>
                array(
                    'id'           => 285,
                    'country_code' => 'PA',
                    'timezone'     => 'America/Panama',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            285 =>
                array(
                    'id'           => 286,
                    'country_code' => 'PE',
                    'timezone'     => 'America/Lima',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-5.00',
                ),
            286 =>
                array(
                    'id'           => 287,
                    'country_code' => 'PF',
                    'timezone'     => 'Pacific/Gambier',
                    'gmt_offset'   => '-9.00',
                    'dst_offset'   => '-9.00',
                    'raw_offset'   => '-9.00',
                ),
            287 =>
                array(
                    'id'           => 288,
                    'country_code' => 'PF',
                    'timezone'     => 'Pacific/Marquesas',
                    'gmt_offset'   => '-9.50',
                    'dst_offset'   => '-9.50',
                    'raw_offset'   => '-9.50',
                ),
            288 =>
                array(
                    'id'           => 289,
                    'country_code' => 'PF',
                    'timezone'     => 'Pacific/Tahiti',
                    'gmt_offset'   => '-10.00',
                    'dst_offset'   => '-10.00',
                    'raw_offset'   => '-10.00',
                ),
            289 =>
                array(
                    'id'           => 290,
                    'country_code' => 'PG',
                    'timezone'     => 'Pacific/Port_Moresby',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            290 =>
                array(
                    'id'           => 291,
                    'country_code' => 'PH',
                    'timezone'     => 'Asia/Manila',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            291 =>
                array(
                    'id'           => 292,
                    'country_code' => 'PK',
                    'timezone'     => 'Asia/Karachi',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            292 =>
                array(
                    'id'           => 293,
                    'country_code' => 'PL',
                    'timezone'     => 'Europe/Warsaw',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            293 =>
                array(
                    'id'           => 294,
                    'country_code' => 'PM',
                    'timezone'     => 'America/Miquelon',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-2.00',
                    'raw_offset'   => '-3.00',
                ),
            294 =>
                array(
                    'id'           => 295,
                    'country_code' => 'PN',
                    'timezone'     => 'Pacific/Pitcairn',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-8.00',
                ),
            295 =>
                array(
                    'id'           => 296,
                    'country_code' => 'PR',
                    'timezone'     => 'America/Puerto_Rico',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            296 =>
                array(
                    'id'           => 297,
                    'country_code' => 'PS',
                    'timezone'     => 'Asia/Gaza',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            297 =>
                array(
                    'id'           => 298,
                    'country_code' => 'PS',
                    'timezone'     => 'Asia/Hebron',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            298 =>
                array(
                    'id'           => 299,
                    'country_code' => 'PT',
                    'timezone'     => 'Atlantic/Azores',
                    'gmt_offset'   => '-1.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '-1.00',
                ),
            299 =>
                array(
                    'id'           => 300,
                    'country_code' => 'PT',
                    'timezone'     => 'Atlantic/Madeira',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            300 =>
                array(
                    'id'           => 301,
                    'country_code' => 'PT',
                    'timezone'     => 'Europe/Lisbon',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '0.00',
                ),
            301 =>
                array(
                    'id'           => 302,
                    'country_code' => 'PW',
                    'timezone'     => 'Pacific/Palau',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            302 =>
                array(
                    'id'           => 303,
                    'country_code' => 'PY',
                    'timezone'     => 'America/Asuncion',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            303 =>
                array(
                    'id'           => 304,
                    'country_code' => 'QA',
                    'timezone'     => 'Asia/Qatar',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            304 =>
                array(
                    'id'           => 305,
                    'country_code' => 'RE',
                    'timezone'     => 'Indian/Reunion',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            305 =>
                array(
                    'id'           => 306,
                    'country_code' => 'RO',
                    'timezone'     => 'Europe/Bucharest',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            306 =>
                array(
                    'id'           => 307,
                    'country_code' => 'RS',
                    'timezone'     => 'Europe/Belgrade',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            307 =>
                array(
                    'id'           => 308,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Anadyr',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            308 =>
                array(
                    'id'           => 309,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Irkutsk',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            309 =>
                array(
                    'id'           => 310,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Kamchatka',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            310 =>
                array(
                    'id'           => 311,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Khandyga',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            311 =>
                array(
                    'id'           => 312,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Krasnoyarsk',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            312 =>
                array(
                    'id'           => 313,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Magadan',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            313 =>
                array(
                    'id'           => 314,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Novokuznetsk',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            314 =>
                array(
                    'id'           => 315,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Novosibirsk',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            315 =>
                array(
                    'id'           => 316,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Omsk',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            316 =>
                array(
                    'id'           => 317,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Sakhalin',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            317 =>
                array(
                    'id'           => 318,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Ust-Nera',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            318 =>
                array(
                    'id'           => 319,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Vladivostok',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            319 =>
                array(
                    'id'           => 320,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Yakutsk',
                    'gmt_offset'   => '10.00',
                    'dst_offset'   => '10.00',
                    'raw_offset'   => '10.00',
                ),
            320 =>
                array(
                    'id'           => 321,
                    'country_code' => 'RU',
                    'timezone'     => 'Asia/Yekaterinburg',
                    'gmt_offset'   => '6.00',
                    'dst_offset'   => '6.00',
                    'raw_offset'   => '6.00',
                ),
            321 =>
                array(
                    'id'           => 322,
                    'country_code' => 'RU',
                    'timezone'     => 'Europe/Kaliningrad',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            322 =>
                array(
                    'id'           => 323,
                    'country_code' => 'RU',
                    'timezone'     => 'Europe/Moscow',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            323 =>
                array(
                    'id'           => 324,
                    'country_code' => 'RU',
                    'timezone'     => 'Europe/Samara',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            324 =>
                array(
                    'id'           => 325,
                    'country_code' => 'RU',
                    'timezone'     => 'Europe/Volgograd',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            325 =>
                array(
                    'id'           => 326,
                    'country_code' => 'RW',
                    'timezone'     => 'Africa/Kigali',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            326 =>
                array(
                    'id'           => 327,
                    'country_code' => 'SA',
                    'timezone'     => 'Asia/Riyadh',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            327 =>
                array(
                    'id'           => 328,
                    'country_code' => 'SB',
                    'timezone'     => 'Pacific/Guadalcanal',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            328 =>
                array(
                    'id'           => 329,
                    'country_code' => 'SC',
                    'timezone'     => 'Indian/Mahe',
                    'gmt_offset'   => '4.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            329 =>
                array(
                    'id'           => 330,
                    'country_code' => 'SD',
                    'timezone'     => 'Africa/Khartoum',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            330 =>
                array(
                    'id'           => 331,
                    'country_code' => 'SE',
                    'timezone'     => 'Europe/Stockholm',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            331 =>
                array(
                    'id'           => 332,
                    'country_code' => 'SG',
                    'timezone'     => 'Asia/Singapore',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            332 =>
                array(
                    'id'           => 333,
                    'country_code' => 'SH',
                    'timezone'     => 'Atlantic/St_Helena',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            333 =>
                array(
                    'id'           => 334,
                    'country_code' => 'SI',
                    'timezone'     => 'Europe/Ljubljana',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            334 =>
                array(
                    'id'           => 335,
                    'country_code' => 'SJ',
                    'timezone'     => 'Arctic/Longyearbyen',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            335 =>
                array(
                    'id'           => 336,
                    'country_code' => 'SK',
                    'timezone'     => 'Europe/Bratislava',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            336 =>
                array(
                    'id'           => 337,
                    'country_code' => 'SL',
                    'timezone'     => 'Africa/Freetown',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            337 =>
                array(
                    'id'           => 338,
                    'country_code' => 'SM',
                    'timezone'     => 'Europe/San_Marino',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            338 =>
                array(
                    'id'           => 339,
                    'country_code' => 'SN',
                    'timezone'     => 'Africa/Dakar',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            339 =>
                array(
                    'id'           => 340,
                    'country_code' => 'SO',
                    'timezone'     => 'Africa/Mogadishu',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            340 =>
                array(
                    'id'           => 341,
                    'country_code' => 'SR',
                    'timezone'     => 'America/Paramaribo',
                    'gmt_offset'   => '-3.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            341 =>
                array(
                    'id'           => 342,
                    'country_code' => 'SS',
                    'timezone'     => 'Africa/Juba',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            342 =>
                array(
                    'id'           => 343,
                    'country_code' => 'ST',
                    'timezone'     => 'Africa/Sao_Tome',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            343 =>
                array(
                    'id'           => 344,
                    'country_code' => 'SV',
                    'timezone'     => 'America/El_Salvador',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-6.00',
                ),
            344 =>
                array(
                    'id'           => 345,
                    'country_code' => 'SX',
                    'timezone'     => 'America/Lower_Princes',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            345 =>
                array(
                    'id'           => 346,
                    'country_code' => 'SY',
                    'timezone'     => 'Asia/Damascus',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            346 =>
                array(
                    'id'           => 347,
                    'country_code' => 'SZ',
                    'timezone'     => 'Africa/Mbabane',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            347 =>
                array(
                    'id'           => 348,
                    'country_code' => 'TC',
                    'timezone'     => 'America/Grand_Turk',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            348 =>
                array(
                    'id'           => 349,
                    'country_code' => 'TD',
                    'timezone'     => 'Africa/Ndjamena',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            349 =>
                array(
                    'id'           => 350,
                    'country_code' => 'TF',
                    'timezone'     => 'Indian/Kerguelen',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            350 =>
                array(
                    'id'           => 351,
                    'country_code' => 'TG',
                    'timezone'     => 'Africa/Lome',
                    'gmt_offset'   => '0.00',
                    'dst_offset'   => '0.00',
                    'raw_offset'   => '0.00',
                ),
            351 =>
                array(
                    'id'           => 352,
                    'country_code' => 'TH',
                    'timezone'     => 'Asia/Bangkok',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            352 =>
                array(
                    'id'           => 353,
                    'country_code' => 'TJ',
                    'timezone'     => 'Asia/Dushanbe',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            353 =>
                array(
                    'id'           => 354,
                    'country_code' => 'TK',
                    'timezone'     => 'Pacific/Fakaofo',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '13.00',
                    'raw_offset'   => '13.00',
                ),
            354 =>
                array(
                    'id'           => 355,
                    'country_code' => 'TL',
                    'timezone'     => 'Asia/Dili',
                    'gmt_offset'   => '9.00',
                    'dst_offset'   => '9.00',
                    'raw_offset'   => '9.00',
                ),
            355 =>
                array(
                    'id'           => 356,
                    'country_code' => 'TM',
                    'timezone'     => 'Asia/Ashgabat',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            356 =>
                array(
                    'id'           => 357,
                    'country_code' => 'TN',
                    'timezone'     => 'Africa/Tunis',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '1.00',
                    'raw_offset'   => '1.00',
                ),
            357 =>
                array(
                    'id'           => 358,
                    'country_code' => 'TO',
                    'timezone'     => 'Pacific/Tongatapu',
                    'gmt_offset'   => '13.00',
                    'dst_offset'   => '13.00',
                    'raw_offset'   => '13.00',
                ),
            358 =>
                array(
                    'id'           => 359,
                    'country_code' => 'TR',
                    'timezone'     => 'Europe/Istanbul',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            359 =>
                array(
                    'id'           => 360,
                    'country_code' => 'TT',
                    'timezone'     => 'America/Port_of_Spain',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            360 =>
                array(
                    'id'           => 361,
                    'country_code' => 'TV',
                    'timezone'     => 'Pacific/Funafuti',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            361 =>
                array(
                    'id'           => 362,
                    'country_code' => 'TW',
                    'timezone'     => 'Asia/Taipei',
                    'gmt_offset'   => '8.00',
                    'dst_offset'   => '8.00',
                    'raw_offset'   => '8.00',
                ),
            362 =>
                array(
                    'id'           => 363,
                    'country_code' => 'TZ',
                    'timezone'     => 'Africa/Dar_es_Salaam',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            363 =>
                array(
                    'id'           => 364,
                    'country_code' => 'UA',
                    'timezone'     => 'Europe/Kiev',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            364 =>
                array(
                    'id'           => 365,
                    'country_code' => 'UA',
                    'timezone'     => 'Europe/Simferopol',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '4.00',
                    'raw_offset'   => '4.00',
                ),
            365 =>
                array(
                    'id'           => 366,
                    'country_code' => 'UA',
                    'timezone'     => 'Europe/Uzhgorod',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            366 =>
                array(
                    'id'           => 367,
                    'country_code' => 'UA',
                    'timezone'     => 'Europe/Zaporozhye',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '2.00',
                ),
            367 =>
                array(
                    'id'           => 368,
                    'country_code' => 'UG',
                    'timezone'     => 'Africa/Kampala',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            368 =>
                array(
                    'id'           => 369,
                    'country_code' => 'UM',
                    'timezone'     => 'Pacific/Johnston',
                    'gmt_offset'   => '-10.00',
                    'dst_offset'   => '-10.00',
                    'raw_offset'   => '-10.00',
                ),
            369 =>
                array(
                    'id'           => 370,
                    'country_code' => 'UM',
                    'timezone'     => 'Pacific/Midway',
                    'gmt_offset'   => '-11.00',
                    'dst_offset'   => '-11.00',
                    'raw_offset'   => '-11.00',
                ),
            370 =>
                array(
                    'id'           => 371,
                    'country_code' => 'UM',
                    'timezone'     => 'Pacific/Wake',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            371 =>
                array(
                    'id'           => 372,
                    'country_code' => 'US',
                    'timezone'     => 'America/Adak',
                    'gmt_offset'   => '-10.00',
                    'dst_offset'   => '-9.00',
                    'raw_offset'   => '-10.00',
                ),
            372 =>
                array(
                    'id'           => 373,
                    'country_code' => 'US',
                    'timezone'     => 'America/Anchorage',
                    'gmt_offset'   => '-9.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-9.00',
                ),
            373 =>
                array(
                    'id'           => 374,
                    'country_code' => 'US',
                    'timezone'     => 'America/Boise',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            374 =>
                array(
                    'id'           => 375,
                    'country_code' => 'US',
                    'timezone'     => 'America/Chicago',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            375 =>
                array(
                    'id'           => 376,
                    'country_code' => 'US',
                    'timezone'     => 'America/Denver',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            376 =>
                array(
                    'id'           => 377,
                    'country_code' => 'US',
                    'timezone'     => 'America/Detroit',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            377 =>
                array(
                    'id'           => 378,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Indianapolis',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            378 =>
                array(
                    'id'           => 379,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Knox',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            379 =>
                array(
                    'id'           => 380,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Marengo',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            380 =>
                array(
                    'id'           => 381,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Petersburg',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            381 =>
                array(
                    'id'           => 382,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Tell_City',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            382 =>
                array(
                    'id'           => 383,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Vevay',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            383 =>
                array(
                    'id'           => 384,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Vincennes',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            384 =>
                array(
                    'id'           => 385,
                    'country_code' => 'US',
                    'timezone'     => 'America/Indiana/Winamac',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            385 =>
                array(
                    'id'           => 386,
                    'country_code' => 'US',
                    'timezone'     => 'America/Juneau',
                    'gmt_offset'   => '-9.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-9.00',
                ),
            386 =>
                array(
                    'id'           => 387,
                    'country_code' => 'US',
                    'timezone'     => 'America/Kentucky/Louisville',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            387 =>
                array(
                    'id'           => 388,
                    'country_code' => 'US',
                    'timezone'     => 'America/Kentucky/Monticello',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            388 =>
                array(
                    'id'           => 389,
                    'country_code' => 'US',
                    'timezone'     => 'America/Los_Angeles',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-8.00',
                ),
            389 =>
                array(
                    'id'           => 390,
                    'country_code' => 'US',
                    'timezone'     => 'America/Menominee',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            390 =>
                array(
                    'id'           => 391,
                    'country_code' => 'US',
                    'timezone'     => 'America/Metlakatla',
                    'gmt_offset'   => '-8.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-8.00',
                ),
            391 =>
                array(
                    'id'           => 392,
                    'country_code' => 'US',
                    'timezone'     => 'America/New_York',
                    'gmt_offset'   => '-5.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-5.00',
                ),
            392 =>
                array(
                    'id'           => 393,
                    'country_code' => 'US',
                    'timezone'     => 'America/Nome',
                    'gmt_offset'   => '-9.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-9.00',
                ),
            393 =>
                array(
                    'id'           => 394,
                    'country_code' => 'US',
                    'timezone'     => 'America/North_Dakota/Beulah',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            394 =>
                array(
                    'id'           => 395,
                    'country_code' => 'US',
                    'timezone'     => 'America/North_Dakota/Center',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            395 =>
                array(
                    'id'           => 396,
                    'country_code' => 'US',
                    'timezone'     => 'America/North_Dakota/New_Salem',
                    'gmt_offset'   => '-6.00',
                    'dst_offset'   => '-5.00',
                    'raw_offset'   => '-6.00',
                ),
            396 =>
                array(
                    'id'           => 397,
                    'country_code' => 'US',
                    'timezone'     => 'America/Phoenix',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-7.00',
                    'raw_offset'   => '-7.00',
                ),
            397 =>
                array(
                    'id'           => 398,
                    'country_code' => 'US',
                    'timezone'     => 'America/Shiprock',
                    'gmt_offset'   => '-7.00',
                    'dst_offset'   => '-6.00',
                    'raw_offset'   => '-7.00',
                ),
            398 =>
                array(
                    'id'           => 399,
                    'country_code' => 'US',
                    'timezone'     => 'America/Sitka',
                    'gmt_offset'   => '-9.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-9.00',
                ),
            399 =>
                array(
                    'id'           => 400,
                    'country_code' => 'US',
                    'timezone'     => 'America/Yakutat',
                    'gmt_offset'   => '-9.00',
                    'dst_offset'   => '-8.00',
                    'raw_offset'   => '-9.00',
                ),
            400 =>
                array(
                    'id'           => 401,
                    'country_code' => 'US',
                    'timezone'     => 'Pacific/Honolulu',
                    'gmt_offset'   => '-10.00',
                    'dst_offset'   => '-10.00',
                    'raw_offset'   => '-10.00',
                ),
            401 =>
                array(
                    'id'           => 402,
                    'country_code' => 'UY',
                    'timezone'     => 'America/Montevideo',
                    'gmt_offset'   => '-2.00',
                    'dst_offset'   => '-3.00',
                    'raw_offset'   => '-3.00',
                ),
            402 =>
                array(
                    'id'           => 403,
                    'country_code' => 'UZ',
                    'timezone'     => 'Asia/Samarkand',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            403 =>
                array(
                    'id'           => 404,
                    'country_code' => 'UZ',
                    'timezone'     => 'Asia/Tashkent',
                    'gmt_offset'   => '5.00',
                    'dst_offset'   => '5.00',
                    'raw_offset'   => '5.00',
                ),
            404 =>
                array(
                    'id'           => 405,
                    'country_code' => 'VA',
                    'timezone'     => 'Europe/Vatican',
                    'gmt_offset'   => '1.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '1.00',
                ),
            405 =>
                array(
                    'id'           => 406,
                    'country_code' => 'VC',
                    'timezone'     => 'America/St_Vincent',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            406 =>
                array(
                    'id'           => 407,
                    'country_code' => 'VE',
                    'timezone'     => 'America/Caracas',
                    'gmt_offset'   => '-4.50',
                    'dst_offset'   => '-4.50',
                    'raw_offset'   => '-4.50',
                ),
            407 =>
                array(
                    'id'           => 408,
                    'country_code' => 'VG',
                    'timezone'     => 'America/Tortola',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            408 =>
                array(
                    'id'           => 409,
                    'country_code' => 'VI',
                    'timezone'     => 'America/St_Thomas',
                    'gmt_offset'   => '-4.00',
                    'dst_offset'   => '-4.00',
                    'raw_offset'   => '-4.00',
                ),
            409 =>
                array(
                    'id'           => 410,
                    'country_code' => 'VN',
                    'timezone'     => 'Asia/Ho_Chi_Minh',
                    'gmt_offset'   => '7.00',
                    'dst_offset'   => '7.00',
                    'raw_offset'   => '7.00',
                ),
            410 =>
                array(
                    'id'           => 411,
                    'country_code' => 'VU',
                    'timezone'     => 'Pacific/Efate',
                    'gmt_offset'   => '11.00',
                    'dst_offset'   => '11.00',
                    'raw_offset'   => '11.00',
                ),
            411 =>
                array(
                    'id'           => 412,
                    'country_code' => 'WF',
                    'timezone'     => 'Pacific/Wallis',
                    'gmt_offset'   => '12.00',
                    'dst_offset'   => '12.00',
                    'raw_offset'   => '12.00',
                ),
            412 =>
                array(
                    'id'           => 413,
                    'country_code' => 'WS',
                    'timezone'     => 'Pacific/Apia',
                    'gmt_offset'   => '14.00',
                    'dst_offset'   => '13.00',
                    'raw_offset'   => '13.00',
                ),
            413 =>
                array(
                    'id'           => 414,
                    'country_code' => 'YE',
                    'timezone'     => 'Asia/Aden',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            414 =>
                array(
                    'id'           => 415,
                    'country_code' => 'YT',
                    'timezone'     => 'Indian/Mayotte',
                    'gmt_offset'   => '3.00',
                    'dst_offset'   => '3.00',
                    'raw_offset'   => '3.00',
                ),
            415 =>
                array(
                    'id'           => 416,
                    'country_code' => 'ZA',
                    'timezone'     => 'Africa/Johannesburg',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            416 =>
                array(
                    'id'           => 417,
                    'country_code' => 'ZM',
                    'timezone'     => 'Africa/Lusaka',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
            417 =>
                array(
                    'id'           => 418,
                    'country_code' => 'ZW',
                    'timezone'     => 'Africa/Harare',
                    'gmt_offset'   => '2.00',
                    'dst_offset'   => '2.00',
                    'raw_offset'   => '2.00',
                ),
        ));
    }
}
