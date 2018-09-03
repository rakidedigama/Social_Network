<?php

use App\subCategory;
use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Initializing 
        $subcategories = [
        	
        	// Biographies
        	array('name'=>'Arts & Literature','id'=>'1'),
        	array('name'=>'Cultural','id'=>'1'),
        	array('name'=>'European','id'=>'1'),
        	array('name'=>'Historical','id'=>'1'),
        	array('name'=>'Leaders & Notble People','id'=>'1'),
        	array('name'=>'Military','id'=>'1'),
        	array('name'=>'Modern','id'=>'1'),
        	array('name'=>'Sports','id'=>'1'),
        	array('name'=>'Women','id'=>'1'),

        	// Business
        	array('name'=>'Careers','id'=>'2'),
        	array('name'=>'Economics','id'=>'2'),
        	array('name'=>'Finance','id'=>'2'),
        	array('name'=>'Industries','id'=>'2'),
        	array('name'=>'International','id'=>'2'),
        	array('name'=>'Management','id'=>'2'),
        	array('name'=>'Marketing','id'=>'2'),

    		// Children's
        	array('name'=>'Action & Adventure','id'=>'3'),
        	array('name'=>'Activity Books','id'=>'3'),
        	array('name'=>'Animals','id'=>'3'),
        	array('name'=>'Cars & Trucks','id'=>'3'),
        	array('name'=>'Classics','id'=>'3'),
        	array('name'=>'Comedy','id'=>'3'),
        	array('name'=>'Cookbooks','id'=>'3'),
        	array('name'=>'Education & Reference','id'=>'3'),
        	array('name'=>'Fairy Tales','id'=>'3'),
        	array('name'=>'Geography & Cultures','id'=>'3'),
        	array('name'=>'Growing Up','id'=>'3'),
        	array('name'=>'History','id'=>'3'),
        	array('name'=>'Mystery & Suspense','id'=>'3'),
        	array('name'=>'Sci-Fi & Fantasy','id'=>'3'),
        	array('name'=>'Science & Nature','id'=>'3'),

        	// History
        	array('name'=>'Ancient','id'=>'4'),
        	array('name'=>'Asian','id'=>'4'),
        	array('name'=>'Caribbean','id'=>'4'),
        	array('name'=>'European','id'=>'4'),
        	array('name'=>'Exploration','id'=>'4'),
        	array('name'=>'Medieval','id'=>'4'),
        	array('name'=>'Modern','id'=>'4'),
        	array('name'=>'Native','id'=>'4'),
        	array('name'=>'Religious','id'=>'4'),
        	array('name'=>'Renaissance','id'=>'4'),

        	// Religion & Spirituality
        	array('name'=>'Agnosticism','id'=>'5'),
        	array('name'=>'Astrology','id'=>'5'),
        	array('name'=>'Atheism','id'=>'5'),
        	array('name'=>'Buddhism','id'=>'5'),
        	array('name'=>'Christian','id'=>'5'),
        	array('name'=>'Christian Living','id'=>'5'),
        	array('name'=>'Comparative Religion','id'=>'5'),
        	array('name'=>'Earth-Based Religions','id'=>'5'),
        	array('name'=>'Hinduism','id'=>'5'),
        	array('name'=>'History of Religion','id'=>'5'),
        	array('name'=>'Inspirational','id'=>'5'),
        	array('name'=>'Islam','id'=>'5'),
        	array('name'=>'Judaism','id'=>'5'),
        	array('name'=>'New Age','id'=>'5'),
        	array('name'=>'Occult','id'=>'5'),

        	// Self-Help
        	array('name'=>'Abuse','id'=>'6'),
        	array('name'=>'Addictions','id'=>'6'),
        	array('name'=>'Anger Management','id'=>'6'),
        	array('name'=>'Death & Grief','id'=>'6'),
        	array('name'=>'Depression','id'=>'6'),
        	array('name'=>'Meditation','id'=>'6'),
        	array('name'=>'Mid-Life','id'=>'6'),
        	array('name'=>'Motivational','id'=>'6'),
        	array('name'=>'Personal Transformation','id'=>'6'),
        	array('name'=>'Psychology','id'=>'6'),
        	array('name'=>'Relationships','id'=>'6'),
        	array('name'=>'Self-Esteem','id'=>'6'),
        	array('name'=>'Sex','id'=>'6'),
        	array('name'=>'Social Skills','id'=>'6'),
        	array('name'=>'Stress','id'=>'6'),
        	array('name'=>'Success','id'=>'6'),

        	// Literature & Fiction
        	array('name'=>'Anthologies','id'=>'7'),
        	array('name'=>'Classics','id'=>'7'),
        	array('name'=>'Contemporary','id'=>'7'),
        	array('name'=>'Foreign Language','id'=>'7'),
        	array('name'=>'History & Criticism','id'=>'7'),
        	array('name'=>'Poetry','id'=>'7'),
        	array('name'=>'World Literature','id'=>'7'),
        	array('name'=>'Crime & Detective','id'=>'7'),
        	array('name'=>'Mysteries & Conspiracy','id'=>'7'),
        	array('name'=>'Suspense & Thrillers','id'=>'7'),
        	array('name'=>'Sci-Fi & Fantasy','id'=>'7'),
        	array('name'=>'Horror','id'=>'7'),
        	array('name'=>'Romance','id'=>'7'),
        	array('name'=>'Superhero','id'=>'7'),
        	array('name'=>'Erotica','id'=>'7'),
        	array('name'=>'Fantasy','id'=>'7'),
        	array('name'=>'Comedy','id'=>'7'),

			// Educational Textbooks
			array('name'=>'Arts','id'=>'8'),
			array('name'=>'Architecture & Design','id'=>'8'),
			array('name'=>'Business & Finance','id'=>'8'),
			array('name'=>'Business & Investing','id'=>'8'),
			array('name'=>'Computer Science','id'=>'8'),
			array('name'=>'Computers & Technology','id'=>'8'),
			array('name'=>'Education','id'=>'8'),
			array('name'=>'Economics','id'=>'8'),
			array('name'=>'History','id'=>'8'),
			array('name'=>'Humanities','id'=>'8'),
			array('name'=>'Languages','id'=>'8'),
			array('name'=>'Law','id'=>'8'),
			array('name'=>'Literature & Fiction','id'=>'8'),
			array('name'=>'Mathematics','id'=>'8'),
			array('name'=>'Medicine & Health Sciences','id'=>'8'),
			array('name'=>'Politics & Government','id'=>'8'),
			array('name'=>'Social Sciences','id'=>'8'),
			array('name'=>'Schools & Teaching','id'=>'8'),
			array('name'=>'Science & Math','id'=>'8'),
			array('name'=>'Social Sciences','id'=>'8'),

    	];

    	// Adding Sub Categories
        foreach ( $subcategories as $value ) { 
            $subcategory = new subCategory();
            $subcategory->name = $value['name'];
            $subcategory->category_id = $value['id'];
            $subcategory->save();
    	}
    }
}
