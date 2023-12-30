<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('gender_id')->nullable();
            $table->integer('looking_for_id')->nullable();
            $table->string('date_of_birth',255)->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('age')->nullable();
            $table->enum('hair_color', ["Bald / Shaved", "Black", "Blonde", "Brown", "Grey / White", "Light Brown", "Red", "Changes frequently", "Other", "Prefer not to say"])->nullable();
            $table->enum('eye_color', ["Black", "Blue", "Brown", "Green", "Grey", "Other"])->nullable();
            $table->string('height',50)->nullable();
            $table->string('weight',50)->nullable();
            $table->enum('body_type', ["Petite", "Slim", "Athletic", "Average", "Few Extra Pounds", "Full Figured", "Large and Lovely"])->nullable();
            $table->enum('ethnicity', ["Arab (Middle Eastern)", "Asian", "Black", "Caucasian (White)", "Hispanic / Latino", "Indian", "Mixed", "Pacific Islander", "Others", "Prefer not to say"])->nullable();
            $table->enum('drink', ["Do drink", "Occasionally drink", "Do not drink", "Prefer not to say"])->nullable();
            $table->enum('marital_status', ["Single", "Separated", "Widowed", "Divorced", "Other", "Prefer not to say"])->nullable();
            $table->enum('eating_habits', ["Halal foods always", "Halal foods when I can", "No special restrictions"])->nullable();
            $table->enum('smoke', ["Do smoke", "Occasionally Smoke", "Do not Smoke", "Prefer not to say"])->nullable();
            $table->enum('Occupation', ['Administrative / Secretarial / Clerical', 'Advertising / Media', 'Artistic / Creative / Performance', 'Construction / Trades', 'Domestic Helper', 'Education / Academic', 'Entertainment / Media', 'Executive / Management / HR', 'Farming / Agriculture', 'Finance / Banking / Real Estate', 'Fire / law enforcement / security', 'Hair Dresser / Personal Grooming', 'IT / Communications', 'Laborer / Manufacturing', 'Legal', 'Medical / Dental / Veterinary', 'Military', 'Nanny / Child care', 'No occupation / Stay at home', 'Non-profit / clergy / social services', 'Political / Govt / Civil Service', 'Retail / Food services', 'Retired', 'Sales / Marketing', 'Self Employed', 'Sports / recreation', 'Student', 'Technical / Science / Engineering', 'Transportation', 'Travel / Hospitality', 'Unemployed', 'Other'])->nullable();
            $table->enum('employment_status', [ "Student","Part Time","Full Time","Homemaker","Retired","Not Employed","Other", "Prefer not to say"])->nullable();
            $table->string('annual_income',255)->nullable();
            $table->enum('living_situation',["Live Alone","Live with friends","Live with family","Live with kids","Live with spouse","Other","Prefer not to say"])->nullable();
            $table->enum('willing_to_relocate',["Willing to relocate within my country","Willing to relocate to another country","Not willing to relocate","Not sure about relocating"])->nullable();
            $table->enum('relationship_looking_for',["Marriage","Friendship"])->nullable();
            $table->string('nationality',255)->nullable();
            $table->enum('education',["Primary (Elementary) School","Middle School / Junior High","High School","Vocational College","Bachelors Degree","Masters Degree","PhD or Doctorate"])->nullable();
            $table->longText('languages_spoken')->nullable();
            $table->string('religion',50)->nullable();
            $table->enum('born_reverted',["Born a muslim","Reverted to Islam","Plan to revert to Islam"])->nullable();
            $table->enum('religious_values',["Very Religious","Religious","Not Religious"])->nullable();
            $table->enum('attend_religious_services',["Daily","Only on Jummah / Fridays","Sometimes","Only During Ramadan","Never"])->nullable();
            $table->enum("read_quran",["Daily","Ocassionally","Only During Ramadan","Only on Jummah / Fridays","Read translated version","Never Read","Prefer not to say"])->nullable();
            $table->enum("polygamy",["Accept polygamy","Maybe accept polygamy","Do not accept polygamy"])->nullable();
            $table->enum('family_values',["Conservative","Moderate","Liberal","Prefer not to say"])->nullable();
            $table->enum('profile_creator',["Self","Parent","Friend","Brother / Sister","Relative"])->nullable();
            $table->string('Profile_heading',255)->nullable();
            $table->longText('about_yourself')->nullable();
            $table->longText('looking_partner_info')->nullable();
            $table->integer('status')->comment("1: Active,2: InActive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
