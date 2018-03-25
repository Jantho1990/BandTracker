<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'band_id' => 1,
            'name' => 'Bloodgood',
            'recorded_date' => '1986',
            'release_date' => '1986',
            'number_of_tracks' => 10,
            'label' => 'Frontline Records',
            'producer' => 'Darryl Mansfield',
            'genre' => 'Heavy Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 1,
            'name' => 'Detonation',
            'recorded_date' => '1987',
            'release_date' => '1987',
            'number_of_tracks' => 10,
            'label' => 'Frontline Records',
            'producer' => '',
            'genre' => 'Heavy Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 1,
            'name' => 'Rock In A Hard Place',
            'recorded_date' => '1988',
            'release_date' => '1988',
            'number_of_tracks' => 9,
            'label' => 'Frontline Records',
            'producer' => '',
            'genre' => 'Heavy Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 1,
            'name' => 'Out of the Darkness',
            'recorded_date' => '1989',
            'release_date' => '1989',
            'number_of_tracks' => 9,
            'label' => 'Intense Records',
            'producer' => '',
            'genre' => 'Heavy Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 1,
            'name' => 'All Stand Together',
            'recorded_date' => '1991',
            'release_date' => '1991',
            'number_of_tracks' => 12,
            'label' => 'Broken Records',
            'producer' => '',
            'genre' => 'Heavy Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 1,
            'name' => 'Dangerously Close',
            'recorded_date' => '2013',
            'release_date' => '2013',
            'number_of_tracks' => 12,
            'label' => 'B. Goode Records',
            'producer' => '',
            'genre' => 'Heavy Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 2,
            'name' => 'Theocracy',
            'recorded_date' => '2003',
            'release_date' => '2003',
            'number_of_tracks' => 11,
            'label' => '',
            'producer' => 'Matt Smith',
            'genre' => 'Power Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 2,
            'name' => 'Mirror of Souls',
            'recorded_date' => '2008',
            'release_date' => '2008',
            'number_of_tracks' => 8,
            'label' => 'Ulterium Records',
            'producer' => '',
            'genre' => 'Power Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 2,
            'name' => 'As the World Bleeds',
            'recorded_date' => '2011',
            'release_date' => '2011',
            'number_of_tracks' => 10,
            'label' => 'Ulterium Records',
            'producer' => '',
            'genre' => 'Power Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 2,
            'name' => 'Ghost Ship',
            'recorded_date' => '2016',
            'release_date' => '2016',
            'number_of_tracks' => 10,
            'label' => 'Ulterium Records',
            'producer' => '',
            'genre' => 'Power Metal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Petra',
            'recorded_date' => '',
            'release_date' => '1974',
            'number_of_tracks' => 10,
            'label' => 'Myrrh Records',
            'producer' => 'Billy Ray Hearn',
            'genre' => 'Christian Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Come and Join Us',
            'recorded_date' => '',
            'release_date' => '1977',
            'number_of_tracks' => 9,
            'label' => 'Myrrh Records',
            'producer' => 'Austin Roberts',
            'genre' => 'Christian Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Washes Whiter Than',
            'recorded_date' => '',
            'release_date' => '1979',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'George Atwell',
            'genre' => 'CCM',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Never Say Die',
            'recorded_date' => '',
            'release_date' => '1981',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'Jonathan David Brown',
            'genre' => 'Christain Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'More Power To Ya',
            'recorded_date' => 'June 1982',
            'release_date' => '1982',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'Jonathan David Brown',
            'genre' => 'Christain Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Not of this World',
            'recorded_date' => 'August 1983',
            'release_date' => '1983',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'Jonathan David Brown',
            'genre' => 'Christain Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Beat the System',
            'recorded_date' => '',
            'release_date' => '1985',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'Jonathan David Brown',
            'genre' => 'Christain Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Back to the Street',
            'recorded_date' => '',
            'release_date' => '1986',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christain Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'This Means War!',
            'recorded_date' => '',
            'release_date' => '1987',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christain Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'On Fire!',
            'recorded_date' => '',
            'release_date' => '1988',
            'number_of_tracks' => 10,
            'label' => 'StarSong Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock, Hard Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Petra Praise: The Rock Cries Out',
            'recorded_date' => '',
            'release_date' => 'October 3, 1989',
            'number_of_tracks' => 14,
            'label' => 'DaySpring, Word, A&M, Epic',
            'producer' => 'Bob Hartman & John Lawry',
            'genre' => 'Christain Rock, Praise',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Beyond Belief',
            'recorded_date' => '',
            'release_date' => 'June 20, 1990',
            'number_of_tracks' => 10,
            'label' => 'DaySpring, Word, A&M, Epic',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock, Hard Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Unseen Power',
            'recorded_date' => '',
            'release_date' => 'November 1991',
            'number_of_tracks' => 10,
            'label' => 'DaySpring, Word, Epic',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock, Heavy Metal, Blues-Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Wake-Up Call',
            'recorded_date' => '',
            'release_date' => 'November 9, 1993',
            'number_of_tracks' => 10,
            'label' => 'DaySpring, Word, Epic',
            'producer' => 'Brown Bannister',
            'genre' => 'Christian Rock, Hard Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'No Doubt',
            'recorded_date' => '',
            'release_date' => 'August 26, 1995',
            'number_of_tracks' => 11,
            'label' => 'Word Records, Epic Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Petra Praise 2: We Need Jesus',
            'recorded_date' => '',
            'release_date' => 'February 18, 1997',
            'number_of_tracks' => 12,
            'label' => 'Word Records, Epic Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock, Praise',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'God Fixation',
            'recorded_date' => '',
            'release_date' => 'April 21, 1998',
            'number_of_tracks' => 11,
            'label' => 'Word Records, Epic Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Double Take',
            'recorded_date' => '',
            'release_date' => 'February 29, 2000',
            'number_of_tracks' => 12,
            'label' => 'Word Records, Epic Records',
            'producer' => 'John & Dino Elefante',
            'genre' => 'Christian Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Revival',
            'recorded_date' => '',
            'release_date' => 'November 20, 2001',
            'number_of_tracks' => 11,
            'label' => 'Inpop',
            'producer' => 'Jason Halbert, Dwayne Larring',
            'genre' => 'Christian Rock, Praise',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Jekyll & Hyde',
            'recorded_date' => '',
            'release_date' => 'August 19, 2003',
            'number_of_tracks' => 10,
            'label' => 'Inpop',
            'producer' => 'Peter Furler',
            'genre' => 'Christian Rock, Progressive Metal, Heavy Metal, Hard Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('albums')->insert([
            'band_id' => 3,
            'name' => 'Farewell',
            'recorded_date' => '',
            'release_date' => '2005',
            'number_of_tracks' => 14,
            'label' => 'Inpop',
            'producer' => 'Petra, Wes Campbell, Peter Furler, Rob Poznanski',
            'genre' => 'Christian Rock',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
