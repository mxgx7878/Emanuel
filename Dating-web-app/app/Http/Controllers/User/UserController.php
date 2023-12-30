<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\ContactUSModel;
use App\Models\GiftModel;
use App\Models\GiftPurchaseModel;
use App\Models\States;
use App\Models\User;
use App\Models\UserDetailModel;
use App\Models\UserFavouriteModel;
use App\Models\UserMessageModel;
use App\Models\UserPersonalityQuestionModel;
use App\Models\UserPhotosModel;
use GuzzleHttp\Psr7\Response;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function user_message_send(Request $req)
    {
        $contectus = new ContactUSModel();
        $name = $req->name;
        $email = $req->email;
        $message = $req->message;

        $contectus->name = $name;
        $contectus->email = $email;
        $contectus->message = $message;

        $contectus->save();
        return redirect()->route('home');
    }

    public function user_personality_question_add_update(Request $req)
    {

        $userQuestion = UserPersonalityQuestionModel::where('user_id', auth()->user()->id)->first();

        if ($userQuestion) {

            $userQuestion->q1 = isset($req->q1) ? $req->q1 : $userQuestion->q1;
            $userQuestion->q2 = isset($req->q2) ? $req->q2 : $userQuestion->q2;
            $userQuestion->q3 = isset($req->q3) ? $req->q3 : $userQuestion->q3;
            $userQuestion->q4 = isset($req->q4) ? $req->q4 : $userQuestion->q4;
            $userQuestion->q5 = isset($req->q5) ? $req->q5 : $userQuestion->q5;
            $userQuestion->q6 = isset($req->q6) ? $req->q6 : $userQuestion->q6;
            $userQuestion->q7 = isset($req->q7) ? $req->q7 : $userQuestion->q7;
            $userQuestion->q8 = isset($req->q8) ? $req->q8 : $userQuestion->q8;
            $userQuestion->q9 = isset($req->q9) ? $req->q9 : $userQuestion->q9;
            $userQuestion->q10 = isset($req->q10) ? $req->q10 : $userQuestion->q10;
            $userQuestion->q11 = isset($req->q11) ? $req->q11 : $userQuestion->q11;
            $userQuestion->q12 = isset($req->q12) ? $req->q12 : $userQuestion->q12;

            $userQuestion->save();

            return redirect()->route('dashbaord.user-personality.view');
        } else {
            $newuserQuestion = new UserPersonalityQuestionModel();

            $newuserQuestion->user_id = auth()->user()->id;
            $newuserQuestion->q1 = $req->q1;
            $newuserQuestion->q2 = $req->q2;
            $newuserQuestion->q3 = $req->q3;
            $newuserQuestion->q4 = $req->q4;
            $newuserQuestion->q5 = $req->q5;
            $newuserQuestion->q6 = $req->q6;
            $newuserQuestion->q7 = $req->q7;
            $newuserQuestion->q8 = $req->q8;
            $newuserQuestion->q9 = $req->q9;
            $newuserQuestion->q10 = $req->q10;
            $newuserQuestion->q11 = $req->q11;
            $newuserQuestion->q12 = $req->q12;


            $newuserQuestion->save();
            dd($newuserQuestion);

            return redirect()->route('dashbaord.user-personality.view');
        }
    }

    public function send_message(Request $req)
    {
        $message = new UserMessageModel();
        $message->sender_id = $req->sender_id;
        $message->receiver_id = $req->receiver_id;
        $message->message = $req->message;
        $message->is_read = $req->is_read;
        $message->save();

        return response()->json(['status' => true, 'data' => $message]);
    }

    public function user_boost_profie(Request $req)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $customer = Stripe\Customer::create(array(
            "email" => auth()->user()->email,
            "name" => auth()->user()->name,
            "source" => $req->stripeToken
        ));

        Stripe\Charge::create([

            "amount" => 3 * 100,

            "currency" => "usd",

            "customer" => $customer->id,
        ]);

        $user->is_boost = 1;
        $user->save();


        return redirect()->route('dashborad.partner.detail.view', auth()->user()->id)->with('success', 'gift send success');
    }

    public function user_gift_purchase(Request $req)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        $partner_id = $req->partner_id;
        $data = json_decode($req->data);



        $customer = Stripe\Customer::create(array(
            "email" => auth()->user()->email,
            "name" => auth()->user()->name,
            "source" => $req->stripeToken
        ));

        $total = 0;

        foreach ($data as $key => $gift) {
            $giftDatapurcahse = new  GiftPurchaseModel();
            $giftdetail = GiftModel::where('id', $key)->first();
            $giftDatapurcahse->user_id = auth()->user()->id;
            $giftDatapurcahse->partner_id = $partner_id;
            $giftDatapurcahse->gift_id = $key;
            $giftDatapurcahse->payment_id = $customer->id;
            $giftDatapurcahse->count = $gift;
            $total += ($giftdetail->price * $gift);
            $giftDatapurcahse->save();
        }

        Stripe\Charge::create([

            "amount" => $total * 100,

            "currency" => "usd",

            "customer" => $customer->id,
        ]);


        return redirect()->route('dashborad.partner.detail.view', $partner_id)->with('success', 'gift send success');
    }
    public function user_favourite(Request $req)
    {


        $favourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $req->favourite_id])->first();


        if (isset($favourite)) {
            $favourite->delete();
            return response()->json(['status' => true, 'user remove from favourite']);
        } else {
            $userfavourite = new UserFavouriteModel();
            $userfavourite->user_id = auth()->user()->id;
            $userfavourite->favourite_user_id = $req->favourite_id;
            $userfavourite->save();
            return response()->json(['status' => true, 'user add to favourite']);
        }
    }
    public function user_interest(Request $req)
    {
        $userDetails = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $interest = json_encode($req->interest);
        $userDetails->interests = $interest;
        $userDetails->save();

        return redirect()->route('dashboard')->with('success', 'Interest Add Success');
    }
    public function change_email_address(Request $req)
    {
        $user = User::where('id', auth()->user()->id)->first();

        $user->email = $req->email;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Email Change Success');
    }

    public function change_password(Request $req)
    {
        $user = User::where('id', auth()->user()->id)->first();


        $check =  Hash::check($req->password, $user->password);

        $this->validate($req, [
            "password" => 'required',
            "new_password" => 'required',
            "change_password" => 'required'
        ]);


        if ($check) {


            if ($req->change_password == $req->new_password) {

                $user->password = $req->new_password;
                $user->save();

                return redirect()->route('dashboard.user-reset-password.view')->with('success', 'Password Change Success');
            } else {
                return redirect()->route('dashboard.user-reset-password.view')->with('error', "New Password and Again Password didn't Match ");
            }
        } else {
            return redirect()->route('dashboard.user-reset-password.view')->with('error', "Current Password didn't Match ");
        }
    }
    public function user_photos_add(Request $req)
    {

        $images = UserPhotosModel::where('user_id', auth()->user()->id)->get();

        foreach ($images as $key => $imagevalue) {

            if ($req->hasFile('image' . $key + 1)) {
                $image = $req->file('image' . $key + 1);
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('dashboard/assets/images/user_images'), $imageName);
                $imagevalue->image = $imageName;
                $imagevalue->save();
            }
        }



        return redirect()->route('dashborad.user-photos.view')->with('success', 'Images Added Success');
    }

    public function get_states(Request $request)
    {
        if ($request->country == "country") {
            $data = States::where('country_id', $request->country_id)->get();

            return Response()->json(
                [
                    "status" => true,
                    'data' => $data
                ]
            );
        } elseif ($request->state == "state") {
            $data = Cities::where('state_id', $request->state_id)->get();

            return Response()->json(["status" => true, 'data' => $data]);
        }
    }

    public function get_cities($state_id)
    {
        $data = Cities::where('state_id', $state_id)->get();

        return Response()->json(["status" => true, 'data' => $data]);
    }

    public function add_update_user_details(Request $req)
    {
        $userDetails = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $user = User::where('id', auth()->user()->id)->first();




        $user->name = isset($req->name) ? $req->name : $user->name;
        $userDetails->gender_id = isset($req->gender) ? $req->gender : $userDetails->gender_id;
        $userDetails->date_of_birth = isset($req->date_of_birth) ? $req->date_of_birth : $userDetails->date_of_birth;
        $userDetails->country = isset($req->country) ? $req->country : $userDetails->country;
        $userDetails->state = isset($req->state) ? $req->state : $userDetails->state;
        $userDetails->city = isset($req->city) ? $req->city : $userDetails->city;
        $userDetails->hair_color = isset($req->hair) ? $req->hair : $userDetails->hair_color;
        $userDetails->eye_color = isset($req->eye_color) ? $req->eye_color : $userDetails->eye_color;
        $userDetails->height = isset($req->height) ? $req->height : $userDetails->height;
        $userDetails->weight = isset($req->weight) ? $req->weight : $userDetails->weight;
        $userDetails->body_type = isset($req->body_type) ? $req->body_type : $userDetails->body_type;
        $userDetails->ethnicity = isset($req->ethnicity) ? $req->ethnicity : $userDetails->ethnicity;
        $userDetails->drink = isset($req->drink) ? $req->drink : $userDetails->drink;
        $userDetails->marital_status = isset($req->marital_status) ? $req->marital_status : $userDetails->marital_status;
        $userDetails->eating_habits = isset($req->habits) ? $req->habits : $userDetails->eating_habits;
        $userDetails->smoke = isset($req->smoke) ? $req->smoke : $userDetails->smoke;
        $userDetails->Occupation = isset($req->occupation) ? $req->occupation : $userDetails->Occupation;
        $userDetails->employment_status = isset($req->employment_status) ? $req->employment_status : $userDetails->employment_status;
        $userDetails->annual_income = isset($req->annual_income) ? $req->annual_income : $userDetails->annual_income;
        $userDetails->living_situation = isset($req->situation) ? $req->situation : $userDetails->living_situation;
        $userDetails->willing_to_relocate = isset($req->relocate) ? $req->relocate : $userDetails->willing_to_relocate;
        $userDetails->relationship_looking_for = isset($req->relationship) ? $req->relationship : $userDetails->relationship_looking_for;
        $userDetails->nationality = isset($req->nationality) ? $req->nationality : $userDetails->nationality;
        $userDetails->education = isset($req->education) ? $req->education : $userDetails->education;
        $userDetails->languages_spoken = isset($req->language) ? $req->language : $userDetails->languages_spoken;
        $userDetails->religion = isset($req->religion) ? $req->religion : $userDetails->religion;
        $userDetails->born_reverted = isset($req->born_reverted) ? $req->born_reverted : $userDetails->born_reverted;
        $userDetails->religious_values = isset($req->religious_value) ? $req->religious_value : $userDetails->religious_values;
        $userDetails->attend_religious_services = isset($req->attend_religious_service) ? $req->attend_religious_service : $userDetails->attend_religious_services;
        $userDetails->read_quran = isset($req->read_quran) ? $req->read_quran : $userDetails->read_quran;
        $userDetails->polygamy = isset($req->polygamy) ? $req->polygamy : $userDetails->polygamy;
        $userDetails->family_values = isset($req->family_value) ? $req->family_value : $userDetails->family_values;
        $userDetails->profile_creator = isset($req->profile_creator) ? $req->profile_creator : $userDetails->profile_creator;
        $userDetails->Profile_heading = isset($req->profile_heading) ? $req->profile_heading : $userDetails->Profile_heading;
        $userDetails->about_yourself = isset($req->about) ? $req->about : $userDetails->about_yourself;
        $userDetails->looking_partner_info = isset($req->looking_for_info) ? $req->looking_for_info : $userDetails->looking_partner_info;


        if ($userDetails->save() && $user->save()) {
            return redirect()->route('dashboard')->with('success', 'Profile Edit Success');
        }
    }
}
