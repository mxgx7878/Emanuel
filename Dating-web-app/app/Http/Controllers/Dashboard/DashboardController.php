<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\ContactUSModel;
use App\Models\Countries;
use App\Models\GiftModel;
use App\Models\GiftPurchaseModel;
use App\Models\States;
use App\Models\User;
use App\Models\UserDetailModel;
use App\Models\UserFavouriteModel;
use App\Models\UserMessageModel;
use App\Models\UserPersonalityQuestionModel;
use App\Models\UserPhotosModel;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function profile_setting()
    {
        return view('dashboard.profile_setting');
    }
    public function advanced_serach()
    {
        $country = Countries::all();
        $states = States::all();
        $cities = Cities::all();
        return view('dashboard.advanced_search', compact('country', 'states', 'cities'));
    }
    public function search_by_popular($name)
    {
        $currentDate = Carbon::now();
        $currentDate2 = Carbon::now();

        $tenDaysAgo = $currentDate2->subDays(10);
        $currentDate = $currentDate->format('Y-m-d H:i:s');
        // Subtract 10 days from the current date

        $tenDaysAgo = $tenDaysAgo->format('Y-m-d H:i:s');



        if ($name == 'my_matches') {
            $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
            $data = UserDetailModel::with(
                "countries",
                "states",
                "cities",
                'userimages',
                'user'
            )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')->get();


            $userModifiedData = [];

            foreach ($data->toArray() as $key => $user) {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }

            // dd($userModifiedData);
            $data = $userModifiedData;

            return view('dashboard.popular_searches', compact('data'));
        } else if ($name == 'new_members') {

            $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
            $data = UserDetailModel::with(
                "countries",
                "states",
                "cities",
                'userimages',
                'user'
            )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->whereBetween('created_at', [$tenDaysAgo, $currentDate])->orderBy('is_boost', 'desc')->get();


            $userModifiedData = [];

            foreach ($data->toArray() as $key => $user) {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }

            // dd($userModifiedData);
            $data = $userModifiedData;

            return view('dashboard.popular_searches', compact('data'));
        } else if ($name == 'latest_photos') {
            $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
            $data = UserDetailModel::with(
                "countries",
                "states",
                "cities",
                'userimages',
                'user'
            )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')->get();


            $userModifiedData = [];

            foreach ($data->toArray() as $key => $user) {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }

            // dd($userModifiedData);
            $data = $userModifiedData;



            $data = collect($data)->sortByDesc(function ($item) use ($currentDate) {
                $itemDate = data_get($item, 'userimages.created_at');


                $itemDate = $itemDate ? Carbon::parse($itemDate) : null;


                return optional($itemDate)->isSameDay($currentDate) ? 1 : -1;
            })->values()->toArray();


            return view('dashboard.popular_searches', compact('data'));
        } else if ($name == 'most_popular') {

            $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
            $data = UserDetailModel::with(
                "countries",
                "states",
                "cities",
                'userimages',
                'user',
                'usergift'
            )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')->get();


            $userModifiedData = [];

            foreach ($data->toArray() as $key => $user) {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();


                $sum = 0;

                if (count($userModifiedData[$key]['usergift']) > 0) {
                    foreach ($userModifiedData[$key]['usergift'] as $gift) {

                        $sum += $gift['count'];
                    }
                    $userModifiedData[$key]['count'] = $sum;
                } else {
                    $userModifiedData[$key]['count'] = 0;
                }



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }

            // dd($userModifiedData);
            $data = $userModifiedData;

            $data = collect($data)->sortByDesc(function ($item) {

                return data_get($item, 'count', 0);
            })->values()->toArray();




            return view('dashboard.popular_searches', compact('data'));
        } else if ($name == 'in_my_area') {
            $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();

            $data = UserDetailModel::with(
                "countries",
                "states",
                "cities",
                'userimages',
                'user',
                'usergift'
            )->where('user_id', '!=', auth()->user()->id)->where('country', $userData->country)->where('state', $userData->state)->where('city', $userData->city)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')->get();


            $userModifiedData = [];

            foreach ($data->toArray() as $key => $user) {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();


                $sum = 0;

                if (count($userModifiedData[$key]['usergift']) > 0) {
                    foreach ($userModifiedData[$key]['usergift'] as $gift) {

                        $sum += $gift['count'];
                    }
                    $userModifiedData[$key]['count'] = $sum;
                } else {
                    $userModifiedData[$key]['count'] = 0;
                }



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }

            // dd($userModifiedData);
            $data = $userModifiedData;






            return view('dashboard.popular_searches', compact('data'));
        }
    }
    public function search_by_unique_code(Request $req)
    {

        $unique_id = $req->unique_id;
        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $data = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')
            ->when($unique_id, function ($query, $unique_id) {
                return $query->where('unique_id', $unique_id);
            })->get();


        $userModifiedData = [];


        foreach ($data->toArray() as $key => $user) {
            $userModifiedData[$key] = $user;
            $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
            $chats = UserMessageModel::where(function ($query) use ($user) {
                $query
                    ->where('sender_id', $user['user_id'])
                    ->orWhere('sender_id',  $user['user_id'])
                    ->orWhere('is_read', 0);
            })->where(function ($query) use ($user) {
                $query
                    ->where('receiver_id', auth()->user()->id)
                    ->orWhere('receiver_id', auth()->user()->id)
                    ->where('is_read', 0);
            })->get();



            if ($datafavourite) {
                $userModifiedData[$key]['wish'] = true;
            } else {
                $userModifiedData[$key]['wish'] = false;
            }

            $count = 0;
            foreach ($chats as $chat) {

                if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                    $count++;
                }
            }
            //     echo $count;
            //   dd($user,$chats);
            if ($count > 0) {
                $userModifiedData[$key]['message'] = true;
            } else {
                $userModifiedData[$key]['message'] = false;
            }
        }

        $data = $userModifiedData;


        return view('dashboard.member_number', compact(
            'data',
            'unique_id'
        ));
    }
    public function first_name_search(Request $req)
    {

        $name = $req->name;
        $searching_for = $req->searching_for;
        $gender = $req->gender;
        $partner_gender = $req->partner_gender;
        $age = $req->age;
        $orderby = $req->orderby;
        $photo = $req->photo;
        $usercountry = $req->country;
        $state = $req->state;
        $city = $req->city;
        $currentDate = Carbon::now();

        // Subtract 10 days from the current date
        $tenDaysAgo = $currentDate->subDays(10);

        $country = Countries::all();
        $states = States::all();
        $cities = Cities::all();

        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $data = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')
            ->when($partner_gender, function ($query, $partner_gender) {
                return $query->where('gender_id', $partner_gender);
            })->when($gender, function ($query, $gender) {
                return $query->where('looking_for_id', $gender);
            })->when($usercountry, function ($query, $usercountry) {
                return $query->where('country', $usercountry);
            })->when($state, function ($query, $state) {
                return $query->where('state', $state);
            })->when($city, function ($query, $city) {
                return $query->where('city', $city);
            })->when($age, function ($query, $age) {
                return $query->where('age', $age);
            })->when($orderby, function ($query, $orderby) {
                if ($orderby == 'new_member') {
                    return $query->orderBy('created_at', 'desc');
                }
            })->when($searching_for, function ($query, $searching_for) {
                if ($searching_for == 'any') {
                    return $query;
                }
                return $query->where('relationship_looking_for', $searching_for);
            })->get();

        $userModifiedData = [];


        foreach ($data->toArray() as $key => $user) {
            if ($photo == 1) {

                if ($user['userimages']['image'] != null) {
                    $userModifiedData[$key] = $user;
                    $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                    $chats = UserMessageModel::where(function ($query) use ($user) {
                        $query
                            ->where('sender_id', $user['user_id'])
                            ->orWhere('sender_id',  $user['user_id'])
                            ->orWhere('is_read', 0);
                    })->where(function ($query) use ($user) {
                        $query
                            ->where('receiver_id', auth()->user()->id)
                            ->orWhere('receiver_id', auth()->user()->id)
                            ->where('is_read', 0);
                    })->get();



                    if ($datafavourite) {
                        $userModifiedData[$key]['wish'] = true;
                    } else {
                        $userModifiedData[$key]['wish'] = false;
                    }

                    $count = 0;
                    foreach ($chats as $chat) {

                        if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                            $count++;
                        }
                    }
                    //     echo $count;
                    //   dd($user,$chats);
                    if ($count > 0) {
                        $userModifiedData[$key]['message'] = true;
                    } else {
                        $userModifiedData[$key]['message'] = false;
                    }
                }
            } else {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }
        }

        $data = $userModifiedData;

        if ($orderby == 'photo_first') {
            $data = collect($data)->sortBy(function ($item) {
                // If 'image' is not null, sort by 'image'; otherwise, consider it as PHP's INF value
                return data_get($item, 'userimages.image') !== null ? data_get($item, 'userimages.image') : INF;
            })->values()->toArray();
        }
        if (isset($name)) {
            $filteredData = array_filter($data, function ($item) use ($name) {
                return $item['user']['name'] == $name;
            });

            // Reset array keys
            $filteredData = array_values($filteredData);

            $data = $filteredData;
        }


        return view('dashboard.first_name', compact(
            'data',
            'country',
            'states',
            'cities',
            "gender",
            "partner_gender",
            "age",
            "orderby",
            "photo",
            "usercountry",
            "state",
            "city",
            "name",
            "searching_for"
        ));
    }
    public function advanced_search_user(Request $req)
    {

        $gender = $req->gender;
        $partner_gender = $req->partner_gender;
        $age = $req->age;
        $orderby = $req->orderby;
        $photo = $req->photo;
        $usercountry = $req->country;
        $state = $req->state;
        $city = $req->city;
        $currentDate = Carbon::now();

        // Subtract 10 days from the current date
        $tenDaysAgo = $currentDate->subDays(10);

        $country = Countries::all();
        $states = States::all();
        $cities = Cities::all();

        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $data = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')
            ->when($partner_gender, function ($query, $partner_gender) {
                return $query->where('gender_id', $partner_gender);
            })->when($gender, function ($query, $gender) {
                return $query->where('looking_for_id', $gender);
            })->when($usercountry, function ($query, $usercountry) {
                return $query->where('country', $usercountry);
            })->when($state, function ($query, $state) {
                return $query->where('state', $state);
            })->when($city, function ($query, $city) {
                return $query->where('city', $city);
            })->when($age, function ($query, $age) {
                return $query->where('age', $age);
            })->when($orderby, function ($query, $orderby) {
                if ($orderby == 'new_member') {
                    return $query->orderBy('created_at', 'desc');
                }
            })->get();

        $userModifiedData = [];


        foreach ($data->toArray() as $key => $user) {
            if ($photo == 1) {

                if ($user['userimages']['image'] != null) {
                    $userModifiedData[$key] = $user;
                    $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                    $chats = UserMessageModel::where(function ($query) use ($user) {
                        $query
                            ->where('sender_id', $user['user_id'])
                            ->orWhere('sender_id',  $user['user_id'])
                            ->orWhere('is_read', 0);
                    })->where(function ($query) use ($user) {
                        $query
                            ->where('receiver_id', auth()->user()->id)
                            ->orWhere('receiver_id', auth()->user()->id)
                            ->where('is_read', 0);
                    })->get();



                    if ($datafavourite) {
                        $userModifiedData[$key]['wish'] = true;
                    } else {
                        $userModifiedData[$key]['wish'] = false;
                    }

                    $count = 0;
                    foreach ($chats as $chat) {

                        if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                            $count++;
                        }
                    }
                    //     echo $count;
                    //   dd($user,$chats);
                    if ($count > 0) {
                        $userModifiedData[$key]['message'] = true;
                    } else {
                        $userModifiedData[$key]['message'] = false;
                    }
                }
            } else {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }
        }

        $data = $userModifiedData;

        if ($orderby == 'photo_first') {
            $data = collect($data)->sortBy(function ($item) {
                // If 'image' is not null, sort by 'image'; otherwise, consider it as PHP's INF value
                return data_get($item, 'userimages.image') !== null ? data_get($item, 'userimages.image') : INF;
            })->values()->toArray();
        }

        return view('dashboard.advanced_search', compact(
            'data',
            'country',
            'states',
            'cities',
            "gender",
            "partner_gender",
            "age",
            "orderby",
            "photo",
            "usercountry",
            "state",
            "city",
        ));
    }
    public function first_name()
    {
        $country = Countries::all();
        $states = States::all();
        $cities = Cities::all();
        return view('dashboard.first_name', compact('country', 'states', 'cities'));
    }
    public function member_number()
    {
        return view('dashboard.member_number');
    }
    public function popular_searches()
    {
        return view('dashboard.popular_searches');
    }
    public function message_view($id)
    {

        $userslist = "";
        $userData = UserDetailModel::with(
            'userimages',
            'user',
            "countries",
            "states",
            "cities",
        )->where('user_id', $id)->first();


        $chats = UserMessageModel::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->user()->id)
                ->orWhere('sender_id', $id);
        })->where(function ($query) use ($id) {
            $query->where('receiver_id', auth()->user()->id)
                ->orWhere('receiver_id', $id);
        })->get();

        foreach ($chats as $chat) {
            $chatsave = UserMessageModel::where(['receiver_id' => auth()->user()->id, 'id' => $chat->id])->first();

            if ($chatsave) {
                $chatsave->is_read = 1;
                $chatsave->save();
            }
        }
        // $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $chatuser = UserMessageModel::select('receiver_id')
            ->where('sender_id', auth()->user()->id)
            ->groupBy('receiver_id')
            ->get()->toArray();



        $userslist = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->whereIn(
            'user_id',
            $chatuser
        )->get();





        return view('dashboard.message', compact('userData', 'chats', 'userslist'));
    }

    public function message_view_all()
    {

        $id = UserMessageModel::select('receiver_id')
            ->where('sender_id', auth()->user()->id)
            ->groupBy('receiver_id')
            ->first('receiver_id');


        $id = $id->receiver_id;



        $userslist = "";
        $userData = UserDetailModel::with(
            'userimages',
            'user',
            "countries",
            "states",
            "cities",
        )->where('user_id', $id)->first();


        $chats = UserMessageModel::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->user()->id)
                ->orWhere('sender_id', $id);
        })->where(function ($query) use ($id) {
            $query->where('receiver_id', auth()->user()->id)
                ->orWhere('receiver_id', $id);
        })->get();


        foreach ($chats as $chat) {
            $chatsave = UserMessageModel::where(['receiver_id' => auth()->user()->id, 'id' => $chat->id])->first();

            if ($chatsave) {
                $chatsave->is_read = 1;
                $chatsave->save();
            }
        }

        $chatuser = UserMessageModel::select('receiver_id')
            ->where('sender_id', auth()->user()->id)
            ->groupBy('receiver_id')
            ->get()->toArray();

        $userslist = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->whereIn(
            'user_id',
            $chatuser
        )->get();





        return view('dashboard.message', compact('userData', 'chats', 'userslist'));
    }
    public function index()
    {
        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $data = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')->get();
        // dd($data->toArray());

        $country = Countries::all();
        $userModifiedData = [];

        foreach ($data->toArray() as $key => $user) {
            $userModifiedData[$key] = $user;
            $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
            $chats = UserMessageModel::where(function ($query) use ($user) {
                $query
                    ->where('sender_id', $user['user_id'])
                    ->orWhere('sender_id',  $user['user_id'])
                    ->orWhere('is_read', 0);
            })->where(function ($query) use ($user) {
                $query
                    ->where('receiver_id', auth()->user()->id)
                    ->orWhere('receiver_id', auth()->user()->id)
                    ->where('is_read', 0);
            })->get();



            if ($datafavourite) {
                $userModifiedData[$key]['wish'] = true;
            } else {
                $userModifiedData[$key]['wish'] = false;
            }

            $count = 0;
            foreach ($chats as $chat) {

                if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                    $count++;
                }
            }
            //     echo $count;
            //   dd($user,$chats);
            if ($count > 0) {
                $userModifiedData[$key]['message'] = true;
            } else {
                $userModifiedData[$key]['message'] = false;
            }
        }

        // dd($userModifiedData);
        // $data = $userModifiedData;

        $data = collect($userModifiedData);


        // Define the number of items per page
        $perPage = 3; // You can adjust this according to your needs

        // Get the current page from the query string (e.g., ?page=2)
        $page = request()->get('page', 1);

        // Manually slice the array to get the items for the current page
        $currentPageItems = $data->slice(($page - 1) * $perPage, $perPage)->all();

        // Create a paginator instance
        $paginator = new LengthAwarePaginator(
            $currentPageItems,
            count($data), // Total number of items
            $perPage, // Items per page
            $page, // Current page
            ['path' => Paginator::resolveCurrentPath()] // URL path for generating links
        );






        return view('dashboard.index', compact('data', 'country', 'paginator'));
    }
    public function user_search(Request $req)
    {


        $gender = $req->gender;
        $partner_gender = $req->partner_gender;
        $usercountry = $req->country;
        $age = $req->age;
        $partner_age = $req->partner_age;
        $photo = $req->photo;
        $neworderby = $req->neworderby;
        // dd($gender,$partner_gender,$country,$age,$partner_age);
        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $data = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)
            ->when($neworderby, function ($query, $neworderby) {
                if ($neworderby == 'new_member') {
                    return $query->orderBy('created_at', 'desc');
                }
            })
            ->orderBy('is_boost', 'desc')
            ->when($partner_gender, function ($query, $partner_gender) {
                return $query->where('gender_id', $partner_gender);
            })->when($gender, function ($query, $gender) {
                return $query->where('looking_for_id', $gender);
            })->when($usercountry, function ($query, $usercountry) {
                return $query->where('country', $usercountry);
            })->when($age, function ($query, $age) {
                return $query->where('age', $age);
            })->when($age, function ($query, $partner_age) {
                return $query->where('age', $partner_age);
            })->get();

        $country = Countries::all();
        $userModifiedData = [];


        foreach ($data->toArray() as $key => $user) {
            if ($photo == 1) {

                if ($user['userimages']['image'] != null) {
                    $userModifiedData[$key] = $user;
                    $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                    $chats = UserMessageModel::where(function ($query) use ($user) {
                        $query
                            ->where('sender_id', $user['user_id'])
                            ->orWhere('sender_id',  $user['user_id'])
                            ->orWhere('is_read', 0);
                    })->where(function ($query) use ($user) {
                        $query
                            ->where('receiver_id', auth()->user()->id)
                            ->orWhere('receiver_id', auth()->user()->id)
                            ->where('is_read', 0);
                    })->get();



                    if ($datafavourite) {
                        $userModifiedData[$key]['wish'] = true;
                    } else {
                        $userModifiedData[$key]['wish'] = false;
                    }

                    $count = 0;
                    foreach ($chats as $chat) {

                        if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                            $count++;
                        }
                    }
                    //     echo $count;
                    //   dd($user,$chats);
                    if ($count > 0) {
                        $userModifiedData[$key]['message'] = true;
                    } else {
                        $userModifiedData[$key]['message'] = false;
                    }
                }
            } else {
                $userModifiedData[$key] = $user;
                $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
                $chats = UserMessageModel::where(function ($query) use ($user) {
                    $query
                        ->where('sender_id', $user['user_id'])
                        ->orWhere('sender_id',  $user['user_id'])
                        ->orWhere('is_read', 0);
                })->where(function ($query) use ($user) {
                    $query
                        ->where('receiver_id', auth()->user()->id)
                        ->orWhere('receiver_id', auth()->user()->id)
                        ->where('is_read', 0);
                })->get();



                if ($datafavourite) {
                    $userModifiedData[$key]['wish'] = true;
                } else {
                    $userModifiedData[$key]['wish'] = false;
                }

                $count = 0;
                foreach ($chats as $chat) {

                    if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                        $count++;
                    }
                }
                //     echo $count;
                //   dd($user,$chats);
                if ($count > 0) {
                    $userModifiedData[$key]['message'] = true;
                } else {
                    $userModifiedData[$key]['message'] = false;
                }
            }
        }

        $data = $userModifiedData;


        if ($neworderby == 'photo_first') {
            $data = collect($data)->sortBy(function ($item) {
                // If 'image' is not null, sort by 'image'; otherwise, consider it as PHP's INF value
                return data_get($item, 'userimages.image') !== null ? data_get($item, 'userimages.image') : INF;
            })->values()->toArray();
        }


        $data = collect($data);

        // Define the number of items per page
        $perPage = 3; // You can adjust this according to your needs

        // Get the current page from the query string (e.g., ?page=2)
        $page = request()->get('page', 1);

        // Manually slice the array to get the items for the current page
        $currentPageItems = $data->slice(($page - 1) * $perPage, $perPage)->all();

        // Create a paginator instance
        $paginator = new LengthAwarePaginator(
            $currentPageItems,
            count($data), // Total number of items
            $perPage, // Items per page
            $page, // Current page
            ['path' => Paginator::resolveCurrentPath()] // URL path for generating links
        );




        $back = true;
        return view('dashboard.index', compact(
            'data',
            'country',
            'gender',
            'partner_gender',
            'usercountry',
            'age',
            'partner_age',
            'photo',
            'back',
            'paginator'
        ));
    }
    public function admin_index()
    {
        $data = User::with('userdetails')->where('user_role', '!=', 1)->get();

        
        $totalearn = GiftPurchaseModel::join('gifts', 'gifts_purchase.gift_id', '=', 'gifts.id')
        ->selectRaw('SUM(gifts.price * gifts_purchase.count) as total_price')
        ->first()->total_price;  
        
        $totalgift = GiftModel::all();


        return view('admin.dashboard.dashboard', compact('data','totalearn','totalgift'));
    }

    public function user_contact_messages()
    {
        $data = ContactUSModel::all();
        return view('admin.dashboard.contactusmessagelist', compact('data'));
    }
    public function user_list()
    {
        $data =   $data = User::with('userdetails')->where('user_role', '!=', 1)->get();
        return view('admin.dashboard.userList', compact('data'));
    }
    public function billing_view()
    {
        return view('dashboard.billing');
    }
    public function matches_view()
    {
        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $data = UserDetailModel::with(
            "countries",
            "states",
            "cities",
            'userimages',
            'user'
        )->where('user_id', '!=', auth()->user()->id)->where('gender_id', '!=', $userData->gender_id)->orderBy('is_boost', 'desc')->get();

        $country = Countries::all();
        $userModifiedData = [];

        foreach ($data->toArray() as $key => $user) {
            $userModifiedData[$key] = $user;
            $datafavourite = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userModifiedData[$key]['user_id']])->first();
            $chats = UserMessageModel::where(function ($query) use ($user) {
                $query
                    ->where('sender_id', $user['user_id'])
                    ->orWhere('sender_id',  $user['user_id'])
                    ->orWhere('is_read', 0);
            })->where(function ($query) use ($user) {
                $query
                    ->where('receiver_id', auth()->user()->id)
                    ->orWhere('receiver_id', auth()->user()->id)
                    ->where('is_read', 0);
            })->get();



            if ($datafavourite) {
                $userModifiedData[$key]['wish'] = true;
            } else {
                $userModifiedData[$key]['wish'] = false;
            }

            $count = 0;
            foreach ($chats as $chat) {

                if ($chat->sender_id == $user['user_id'] && $chat->is_read == 0) {
                    $count++;
                }
            }
            //     echo $count;
            //   dd($user,$chats);
            if ($count > 0) {
                $userModifiedData[$key]['message'] = true;
            } else {
                $userModifiedData[$key]['message'] = false;
            }
        }

        // dd($userModifiedData);
        $data = $userModifiedData;


        return view('dashboard.meet_more_women', compact('data'));
    }
    public function partner_detail_view($id)
    {
        $userData = UserDetailModel::with(
            'userimages',
            'user',
            'countries',
            'states',
            'cities',
            "usernationality"
        )->where('user_id', $id)->first();

        $user = UserDetailModel::where('user_id',auth()->user()->id)->first();

        $match = UserDetailModel::Where('age',$user->age)->where('gender_id',$user->looking_for_id)->where('looking_for_id',$user->gender_id)->get('user_id');


        $userphotos = UserPhotosModel::where('user_id', $id)->where('image', '!=', 'null')->get();

        foreach($match as $mat)
        {
            
            if($mat->user_id == $id)
            {
                $userData->match = true;
                break;
            }
            else
            {
                $userData->match = false;
            }
           
        }

        $check = UserFavouriteModel::where(['user_id' => auth()->user()->id, 'favourite_user_id' => $userData->id])->first();

        if ($check) {
            $userData->wish = true;
        } else {
            $userData->wish = false;
        }



        $gifts = GiftModel::all();

        $getGifts = GiftPurchaseModel::with('gift')->where('partner_id', $id)->get();

        $giftcount = [];
        foreach ($getGifts as $value) {
            $giftcount[$value->gift->title] = GiftPurchaseModel::with('gift')->where('partner_id', $id)->where('gift_id', $value->gift_id)->sum('count');
        }

        // dd($userData->toArray());

        $getGifts = $giftcount;
        return view('dashboard.partner_detail_page', compact('userData', 'gifts', 'getGifts', 'userphotos'));
    }
    public function user_detail_view()
    {
        $userData = UserDetailModel::with(
            'userimages',
            'user',
            "countries",
            "states",
            'cities',
            "usernationality"
        )->where('user_id', auth()->user()->id)->first();

        $userphotos = UserPhotosModel::where('user_id', auth()->user()->id)->get();

        $gifts = GiftModel::all();
        $getGifts = GiftPurchaseModel::where('partner_id', auth()->user()->id)->get();
        $giftcount = [];
        foreach ($getGifts as $value) {
            $giftcount[$value->gift->title] = GiftPurchaseModel::with('gift')->where('partner_id', auth()->user()->id)->where('gift_id', $value->gift_id)->sum('count');
        }
        $getGifts = $giftcount;
        return view('dashboard.partner_detail_page', compact('userData', 'gifts', 'getGifts', 'userphotos'));
    }

    public function email_address_view()
    {
        return view('dashboard.email_address');
    }
    public function reset_password_view()
    {
        return view('dashboard.reset_password');
    }
    public function edit_profile_view()
    {
        $userData = UserDetailModel::where('user_id', auth()->user()->id)->first();
        $user = auth()->user();
        $country = Countries::all();
        $states = States::all();
        $cities = Cities::all();
        return view('dashboard.edit_profile', compact('userData', 'user', 'country', 'states', 'cities'));
    }
    public function user_photos_view()
    {
        $data = UserPhotosModel::where('user_id', auth()->user()->id)->get();
        return view('dashboard.photos', compact('data'));
    }
    public function match_user_view()
    {
        return view('dashboard.match');
    }

    public function interest_view()
    {
        $data = UserDetailModel::where('user_id', auth()->user()->id)->first('interests');
        $data = json_decode($data->interests);
        return view('dashboard.interest', compact('data'));
    }

    public function personality_view()
    {
         $userQuestions = UserPersonalityQuestionModel::where('user_id',auth()->user()->id)->first();
        return view('dashboard.personality',compact('userQuestions'));
    }

    public function notifications_view()
    {
        return view('dashboard.notifications');
    }
}
