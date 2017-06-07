<?php

use App\Models\VRPagesTranslations;
use Illuminate\Database\Seeder;

class PagesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["id" => "aboutpage_lt", "page_id" => "aboutpage", "language_id" => "lt", "title" => "Apie", "description_short" => "no video", "description_long" => "Virtuali realybė vis labiau skverbiasi į mūsų kasdienybę ir visas sritis nuo pramogų iki mokslo. Todėl pristatome unikalią galimybę rytojų pamatyti jau dabar! Jaudinanti ir įtraukianti patirtis garantuota visiems - ir pirmą kartą išmėginsiantiems virtualią realybę, ir tiems, kurie jau žino, kas tai yra. 10 skirtingų patirčių ir net 60 minučių įspūdžių, adrenalino ir atradimų laukia kiekvieno apsilankusiojo. Paruošėme trijų skirtingų sudėtingumo lygių patirtis - nuo irklavimo Galvės ežere ar leidimosi parašiutu iki Mini golfo žaidimo ant pilies sienų ar stebuklingo gėrimo gamybos. Tačiau neabejojame, jog norėsi išbandyti visas! Virtuali realybė suteikia progą pažvelgti į pasaulį kitomis akimis ir iš paprasto stebėtojo virsti veiksmo dalyviu. Aukštos kokybės grafika, realūs vaizdai ir galimybė interaktyviai dalyvauti patirtyje tiesiog įtraukia! Tad ateik, užsidėk VR akinius ir atsidurk kitame pasaulyje, kur pojūčiai yra visai ne virtualūs! Pasiimk ir draugą, kad palaikytų už rankos, nes įspūdžių netrūks.", "slug" => "apie"],
            ["id" => "aboutpage_en", "page_id" => "aboutpage", "language_id" => "en", "title" => "About", "description_short" => "no video", "description_long" => "[ENGLISH]Virtuali realybė vis labiau skverbiasi į mūsų kasdienybę ir visas sritis nuo pramogų iki mokslo. Todėl pristatome unikalią galimybę rytojų pamatyti jau dabar! Jaudinanti ir įtraukianti patirtis garantuota visiems - ir pirmą kartą išmėginsiantiems virtualią realybę, ir tiems, kurie jau žino, kas tai yra. 10 skirtingų patirčių ir net 60 minučių įspūdžių, adrenalino ir atradimų laukia kiekvieno apsilankusiojo. Paruošėme trijų skirtingų sudėtingumo lygių patirtis - nuo irklavimo Galvės ežere ar leidimosi parašiutu iki Mini golfo žaidimo ant pilies sienų ar stebuklingo gėrimo gamybos. Tačiau neabejojame, jog norėsi išbandyti visas! Virtuali realybė suteikia progą pažvelgti į pasaulį kitomis akimis ir iš paprasto stebėtojo virsti veiksmo dalyviu. Aukštos kokybės grafika, realūs vaizdai ir galimybė interaktyviai dalyvauti patirtyje tiesiog įtraukia! Tad ateik, užsidėk VR akinius ir atsidurk kitame pasaulyje, kur pojūčiai yra visai ne virtualūs! Pasiimk ir draugą, kad palaikytų už rankos, nes įspūdžių netrūks.", "slug" => "about"],

        ];

        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRPagesTranslations::find($single['id']);
                if(!$record) {
                    VRPagesTranslations::create($single);
                }
            }
        } catch(Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}
