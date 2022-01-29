<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaticDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('static_data')->delete();
        
        \DB::table('static_data')->insert(array (
            0 => 
            array (
                'created_at' => '2021-09-07 06:27:44',
                'id' => 1,
                'label' => 'Chinese',
                'type' => 'cuisine',
                'updated_at' => '2021-09-07 06:27:44',
                'value' => 'chinese',
            ),
            1 => 
            array (
                'created_at' => '2021-09-07 06:28:16',
                'id' => 2,
                'label' => 'Italian',
                'type' => 'cuisine',
                'updated_at' => '2021-09-07 06:28:16',
                'value' => 'italian',
            ),
            2 => 
            array (
                'created_at' => '2021-09-07 06:28:47',
                'id' => 3,
                'label' => 'European',
                'type' => 'cuisine',
                'updated_at' => '2021-09-07 06:28:47',
                'value' => 'european',
            ),
            3 => 
            array (
                'created_at' => '2021-09-07 06:29:01',
                'id' => 4,
                'label' => 'Asian',
                'type' => 'cuisine',
                'updated_at' => '2021-09-07 06:29:01',
                'value' => 'asian',
            ),
            4 => 
            array (
                'created_at' => '2021-09-07 06:29:31',
                'id' => 5,
                'label' => 'American',
                'type' => 'cuisine',
                'updated_at' => '2021-09-07 06:29:31',
                'value' => 'american',
            ),
            5 => 
            array (
                'created_at' => '2021-09-07 06:29:48',
                'id' => 6,
                'label' => 'Indian',
                'type' => 'cuisine',
                'updated_at' => '2021-09-07 06:29:48',
                'value' => 'indian',
            ),
            6 => 
            array (
                'created_at' => '2021-09-07 16:19:04',
                'id' => 7,
                'label' => 'flour',
                'type' => 'ingredients',
                'updated_at' => '2021-09-07 16:19:04',
                'value' => 'flour',
            ),
            7 => 
            array (
                'created_at' => '2021-09-08 12:36:47',
                'id' => 8,
                'label' => 'bread flour',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:36:47',
                'value' => 'bread_flour',
            ),
            8 => 
            array (
                'created_at' => '2021-09-08 12:38:54',
                'id' => 9,
                'label' => 'Pecorino cheese',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:38:54',
                'value' => 'pecorino_cheese',
            ),
            9 => 
            array (
                'created_at' => '2021-09-08 12:39:15',
                'id' => 10,
                'label' => 'pepper',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:39:15',
                'value' => 'pepper',
            ),
            10 => 
            array (
                'created_at' => '2021-09-08 12:39:31',
                'id' => 11,
                'label' => 'shredded mozzarella cheese',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:39:31',
                'value' => 'shredded_mozzarella_cheese',
            ),
            11 => 
            array (
                'created_at' => '2021-09-08 12:39:52',
                'id' => 12,
                'label' => 'active dry yeast',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:39:52',
                'value' => 'active_dry_yeast',
            ),
            12 => 
            array (
                'created_at' => '2021-09-08 12:40:13',
                'id' => 13,
            'label' => 'water (lukewarm)',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:40:13',
            'value' => 'water_(lukewarm)',
            ),
            13 => 
            array (
                'created_at' => '2021-09-08 12:40:31',
                'id' => 14,
                'label' => 'sugar',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:40:31',
                'value' => 'sugar',
            ),
            14 => 
            array (
                'created_at' => '2021-09-08 12:42:11',
                'id' => 15,
            'label' => 'water (hot)',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:42:11',
            'value' => 'water_(hot)',
            ),
            15 => 
            array (
                'created_at' => '2021-09-08 12:42:36',
                'id' => 16,
                'label' => 'white sesame seeds',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:42:36',
                'value' => 'white_sesame_seeds',
            ),
            16 => 
            array (
                'created_at' => '2021-09-08 12:43:16',
                'id' => 17,
                'label' => 'vegetable oil',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:43:16',
                'value' => 'vegetable_oil',
            ),
            17 => 
            array (
                'created_at' => '2021-09-08 12:45:08',
                'id' => 18,
                'label' => 'Chinese five-spice powder',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:45:08',
                'value' => 'chinese_five-spice_powder',
            ),
            18 => 
            array (
                'created_at' => '2021-09-08 12:45:21',
                'id' => 19,
                'label' => 'sweet soy sauce',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:45:21',
                'value' => 'sweet_soy_sauce',
            ),
            19 => 
            array (
                'created_at' => '2021-09-08 12:46:50',
                'id' => 20,
                'label' => 'egg noodles',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:46:50',
                'value' => 'egg_noodles',
            ),
            20 => 
            array (
                'created_at' => '2021-09-08 12:47:06',
                'id' => 21,
                'label' => 'carrot',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:47:06',
                'value' => 'carrot',
            ),
            21 => 
            array (
                'created_at' => '2021-09-08 12:47:22',
                'id' => 22,
                'label' => 'green beans',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:47:22',
                'value' => 'green_beans',
            ),
            22 => 
            array (
                'created_at' => '2021-09-08 12:47:35',
                'id' => 23,
                'label' => 'snow peas',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:47:35',
                'value' => 'snow_peas',
            ),
            23 => 
            array (
                'created_at' => '2021-09-08 12:49:49',
                'id' => 24,
                'label' => 'red bell pepper',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:49:49',
                'value' => 'red_bell_pepper',
            ),
            24 => 
            array (
                'created_at' => '2021-09-08 12:51:01',
                'id' => 25,
                'label' => 'scallions',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:51:01',
                'value' => 'scallions',
            ),
            25 => 
            array (
                'created_at' => '2021-09-08 12:51:23',
                'id' => 26,
                'label' => 'rice wine',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:51:23',
                'value' => 'rice_wine',
            ),
            26 => 
            array (
                'created_at' => '2021-09-08 12:52:13',
                'id' => 27,
                'label' => 'black sesame seeds',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:52:13',
                'value' => 'black_sesame_seeds',
            ),
            27 => 
            array (
                'created_at' => '2021-09-08 12:52:59',
                'id' => 28,
                'label' => 'chicken breasts',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:52:59',
                'value' => 'chicken_breasts',
            ),
            28 => 
            array (
                'created_at' => '2021-09-08 12:53:10',
                'id' => 29,
                'label' => 'tomato paste',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:53:10',
                'value' => 'tomato_paste',
            ),
            29 => 
            array (
                'created_at' => '2021-09-08 12:53:26',
                'id' => 30,
                'label' => 'carrots',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:53:26',
                'value' => 'carrots',
            ),
            30 => 
            array (
                'created_at' => '2021-09-08 12:53:45',
                'id' => 31,
                'label' => 'red curry paste',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:53:45',
                'value' => 'red_curry_paste',
            ),
            31 => 
            array (
                'created_at' => '2021-09-08 12:53:58',
                'id' => 32,
                'label' => 'coconut milk',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:53:58',
                'value' => 'coconut_milk',
            ),
            32 => 
            array (
                'created_at' => '2021-09-08 12:54:15',
                'id' => 33,
                'label' => 'yogurt',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:54:15',
                'value' => 'yogurt',
            ),
            33 => 
            array (
                'created_at' => '2021-09-08 12:54:49',
                'id' => 34,
                'label' => 'egg',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:54:49',
                'value' => 'egg',
            ),
            34 => 
            array (
                'created_at' => '2021-09-08 12:55:06',
                'id' => 35,
                'label' => 'maple syrup',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:55:06',
                'value' => 'maple_syrup',
            ),
            35 => 
            array (
                'created_at' => '2021-09-08 12:55:26',
                'id' => 36,
                'label' => 'buttermilk',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:55:26',
                'value' => 'buttermilk',
            ),
            36 => 
            array (
                'created_at' => '2021-09-08 12:55:40',
                'id' => 37,
            'label' => 'unsalted butter (for frying)',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:55:40',
            'value' => 'unsalted_butter_(for_frying)',
            ),
            37 => 
            array (
                'created_at' => '2021-09-08 12:56:47',
                'id' => 38,
                'label' => 'penne',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:56:47',
                'value' => 'penne',
            ),
            38 => 
            array (
                'created_at' => '2021-09-08 12:57:00',
                'id' => 39,
                'label' => 'cream',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:57:00',
                'value' => 'cream',
            ),
            39 => 
            array (
                'created_at' => '2021-09-08 12:57:12',
                'id' => 40,
                'label' => 'dried basil',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:57:12',
                'value' => 'dried_basil',
            ),
            40 => 
            array (
                'created_at' => '2021-09-08 12:57:21',
                'id' => 41,
                'label' => 'Parmesan cheese',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:57:21',
                'value' => 'parmesan_cheese',
            ),
            41 => 
            array (
                'created_at' => '2021-09-08 12:57:29',
                'id' => 42,
                'label' => 'mozzarella cheese',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:57:29',
                'value' => 'mozzarella_cheese',
            ),
            42 => 
            array (
                'created_at' => '2021-09-08 12:57:37',
                'id' => 43,
                'label' => 'parsley',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:57:37',
                'value' => 'parsley',
            ),
            43 => 
            array (
                'created_at' => '2021-09-08 12:57:52',
                'id' => 44,
                'label' => 'olive oil',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:57:52',
                'value' => 'olive_oil',
            ),
            44 => 
            array (
                'created_at' => '2021-09-08 12:58:35',
                'id' => 45,
                'label' => 'firm tofu',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:58:35',
                'value' => 'firm_tofu',
            ),
            45 => 
            array (
                'created_at' => '2021-09-08 12:58:47',
                'id' => 46,
                'label' => 'bell peppers',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:58:47',
                'value' => 'bell_peppers',
            ),
            46 => 
            array (
                'created_at' => '2021-09-08 12:59:02',
                'id' => 47,
                'label' => 'light soy sauce',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:59:02',
                'value' => 'light_soy_sauce',
            ),
            47 => 
            array (
                'created_at' => '2021-09-08 12:59:21',
                'id' => 48,
                'label' => 'vegetable broth',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 12:59:21',
                'value' => 'vegetable_broth',
            ),
            48 => 
            array (
                'created_at' => '2021-09-08 13:00:02',
                'id' => 49,
                'label' => 'potatoes',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:00:02',
                'value' => 'potatoes',
            ),
            49 => 
            array (
                'created_at' => '2021-09-08 13:00:19',
                'id' => 50,
                'label' => 'eggplant',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:00:19',
                'value' => 'eggplant',
            ),
            50 => 
            array (
                'created_at' => '2021-09-08 13:00:52',
                'id' => 51,
                'label' => 'soy cream',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:00:52',
                'value' => 'soy_cream',
            ),
            51 => 
            array (
                'created_at' => '2021-09-08 13:01:09',
                'id' => 52,
                'label' => 'bell pepper paste',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:01:09',
                'value' => 'bell_pepper_paste',
            ),
            52 => 
            array (
                'created_at' => '2021-09-08 13:04:35',
                'id' => 53,
                'label' => 'smoked salmon',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:04:35',
                'value' => 'smoked_salmon',
            ),
            53 => 
            array (
                'created_at' => '2021-09-08 13:04:49',
                'id' => 54,
                'label' => 'mini cucumbers',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:04:49',
                'value' => 'mini_cucumbers',
            ),
            54 => 
            array (
                'created_at' => '2021-09-08 13:05:09',
                'id' => 55,
                'label' => 'red wine vinegar',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:05:09',
                'value' => 'red_wine_vinegar',
            ),
            55 => 
            array (
                'created_at' => '2021-09-08 13:05:25',
                'id' => 56,
                'label' => 'grainy mustard',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:05:25',
                'value' => 'grainy_mustard',
            ),
            56 => 
            array (
                'created_at' => '2021-09-08 13:05:41',
                'id' => 57,
                'label' => 'lemon',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:05:41',
                'value' => 'lemon',
            ),
            57 => 
            array (
                'created_at' => '2021-09-08 13:06:02',
                'id' => 58,
                'label' => 'baguette',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:06:02',
                'value' => 'baguette',
            ),
            58 => 
            array (
                'created_at' => '2021-09-08 13:06:19',
                'id' => 59,
                'label' => 'canned tuna',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:06:19',
                'value' => 'canned_tuna',
            ),
            59 => 
            array (
                'created_at' => '2021-09-08 13:06:29',
                'id' => 60,
                'label' => 'jarred pitted Kalamata olives',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:06:29',
                'value' => 'jarred_pitted_kalamata_olives',
            ),
            60 => 
            array (
                'created_at' => '2021-09-08 13:06:48',
                'id' => 61,
                'label' => 'sherry vinegar',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:06:48',
                'value' => 'sherry_vinegar',
            ),
            61 => 
            array (
                'created_at' => '2021-09-08 13:06:56',
                'id' => 62,
                'label' => 'capers',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:06:56',
                'value' => 'capers',
            ),
            62 => 
            array (
                'created_at' => '2021-09-08 13:16:20',
                'id' => 63,
                'label' => 'full-fat Greek yogurt',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:16:20',
                'value' => 'full-fat_greek_yogurt',
            ),
            63 => 
            array (
                'created_at' => '2021-09-08 13:16:37',
                'id' => 64,
                'label' => 'creamy peanut butter',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:16:37',
                'value' => 'creamy_peanut_butter',
            ),
            64 => 
            array (
                'created_at' => '2021-09-08 13:16:50',
                'id' => 65,
                'label' => 'sesame seeds',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:16:50',
                'value' => 'sesame_seeds',
            ),
            65 => 
            array (
                'created_at' => '2021-09-08 13:17:06',
                'id' => 66,
            'label' => 'blueberries (frozen)',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:17:06',
            'value' => 'blueberries_(frozen)',
            ),
            66 => 
            array (
                'created_at' => '2021-09-08 13:17:17',
                'id' => 67,
                'label' => 'granola',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:17:17',
                'value' => 'granola',
            ),
            67 => 
            array (
                'created_at' => '2021-09-08 13:17:31',
                'id' => 68,
                'label' => 'honey',
                'type' => 'ingredients',
                'updated_at' => '2021-09-08 13:17:31',
                'value' => 'honey',
            ),
        ));
        
        
    }
}