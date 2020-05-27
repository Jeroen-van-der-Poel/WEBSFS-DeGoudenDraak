<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new \App\Category();
        $c1->name = "Soep";
        $c1->save();

        $c2 = new \App\Category();
        $c2->name = "Voorgerecht";
        $c2->save();

        $c3 = new \App\Category();
        $c3->name = "Bami en Nasi Gerechten";
        $c3->save();

        $c4 = new \App\Category();
        $c4->name = "Combinatie Gerechten (met witte rijst)";
        $c4->save();

        $c5 = new \App\Category();
        $c5->name = "Mihoen Gerechten";
        $c5->save();

        $c6 = new \App\Category();
        $c6->name = "Chinese Bami Gerechten";
        $c6->save();

        $c7 = new \App\Category();
        $c7->name = "Indische Gerechten";
        $c7->save();

        $c8 = new \App\Category();
        $c8->name = "Eier Gerechten (met witte rijst)";
        $c8->save();

        $c9 = new \App\Category();
        $c9->name = "Groente Gerechten (met witte rijst)";
        $c9->save();

        $c10 = new \App\Category();
        $c10->name = "Vlees Gerechten (met witte rijst)";
        $c10->save();

        $c11 = new \App\Category();
        $c11->name = "Kip Gerechten (met witte rijst)";
        $c11->save();

        $c12 = new \App\Category();
        $c12->name = "Garnalen Gerechten (met witte rijst)";
        $c12->save();

        $c13 = new \App\Category();
        $c13->name = "Ossenhaas Gerechten (met witte rijst)";
        $c13->save();

        $c14 = new \App\Category();
        $c14->name = "Vissen Gerechten (met witte rijst)";
        $c14->save();

        $c15 = new \App\Category();
        $c15->name = "Pekingeend Gerechten (met witte rijst)";
        $c15->save();

        $c16 = new \App\Category();
        $c16->name = "Tiepan Gerechten (met witte rijst)";
        $c16->save();

        $c17 = new \App\Category();
        $c17->name = "Kindermenus";
        $c17->save();

        $c18 = new \App\Category();
        $c18->name = "Rijsttafels";
        $c18->save();

        $c19 = new \App\Category();
        $c19->name = "Buffet";
        $c19->save();

        $c20 = new \App\Category();
        $c20->name = "Diversen";
        $c20->save();
    }
}
