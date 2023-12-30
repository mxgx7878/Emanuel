@extends('dashboard.layouts.main')
@section('content')
<section class="inner_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <ul class="inner_header_links">
              <li><a href="{{route('dashborad.user-photos.view')}}">Photos</a></li>
              <li><a href="{{route('dashborad.user-edit-profile.view')}}">Profile</a></li>
              <li><a href="{{route('dashbaord.user-match.view')}}">Match</a></li>
              <li><a href="{{route('dashbaord.user-interest.view')}}">Interest</a></li>
              <li><a href="{{route('dashbaord.user-personality.view')}}">Personality</a></li>
						<!-- <li><a href="#">Verify Profile</a></li> -->
					</ul>
            </div>
        </div>
    </div>
</section>
	<section class="innerPagesFirst">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
				<div class="top_header_content row">
              <div class="col-md-8">
              <h1>Edit Match Criteria</h1>
              <p>Help us find you the perfect match by telling us what is important to you in a partner.
                 Answer the questions below and tell us what you’re looking for.</p>
              </div>
              <div class="col-md-4 ">
              <div class="actionBtn" >
                <a href="{{route('dashborad.user.details.view')}}">View My Profile</a>
              </div>
              </div>
                </div>
			</div>
		</div>
	</div>
	</section>

    <section class="edit_match_form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="">
                        <p for="" class="vraiant_heading">Answer at least 3 questions below to complete this step.</p>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputCity">Seeking</label>
                        <select name="" id="" class="form-control">
                            <option value="">Female</option>
                            <option value="">Men</option>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputState">Age</label>
                       <div class="d-flex">
                       <select id="inputState" class="form-control">
                            <!-- <option selected>select</option> -->
                            <option>18</option>
                            <option>21</option>
                            <option>22</option>
                        </select>
                        <select id="inputState" class="form-control">
                            <!-- <option selected>select</option> -->
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                        </select>
                       </div>
                        </div>
                    </div>
                    <div class="form_heading">
                        <h2>Living in</h2>
                    </div>
                    <div class="form-row pt-3 pb-3">
                        <div class="form-group col-md-3">
                        <label for="inputCity">Country</label>
                        <select name="" id="" class="form-control">
                            <option value="">Female</option>
                            <option value="">Men</option>
                        </select>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="inputState">State/Province</label>
                       
                       <select id="inputState" class="form-control">
                            <!-- <option selected>select</option> -->
                            <option>18</option>
                            <option>21</option>
                            <option>22</option>
                        </select>
                       </div>
                        <div class="form-group col-md-2">
                        <label for="inputState">City</label>
                       
                       <select id="inputState" class="form-control">
                            <!-- <option selected>select</option> -->
                            <option>18</option>
                            <option>21</option>
                            <option>22</option>
                        </select>
                       </div>
                        <div class="form-group col-md-2">
                        <label for="inputState">Within</label>
                      <input type="text" disabled class="form-control">
                     
                       </div>
                       <div class="form-group col-md-2 align-self-end">
                       <label>Kms</label>
                       </div>
                    </div>
                    {{-- <div class="card card-body match_variant_heading" data-toggle="collapse" href="#appearance_head" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Their Appearance
                    </div>
                    <div class="collapse mt-3 mb-3" id="appearance_head">
                    <div class="card card-body match_variant">
                        <ul class="match_variant">
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant11" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Height</p> <span class="col-md-4">Between Any and Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant11">
                            <div class="card card-body inner_math_variant">
                              <div class="row">
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control">
                                        <option value="">7'8''</option>
                                        <option value="">5'8''</option>
                                        <option value="">4'8''</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <select name="" id="" class="form-control">
                                        <option value="">7'8''</option>
                                        <option value="">5'8''</option>
                                        <option value="">4'8''</option>
                                    </select>
                                </div>

                              </div>
                            </div>
                        </div>
                            </li>
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant12" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Weight</p> <span class="col-md-4">Between Any and Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant12">
                            <div class="card card-body inner_math_variant">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control">
                                        <option value="">40kg</option>
                                        <option value="">50kg</option>
                                        <option value="">60kg</option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <select name="" id="" class="form-control">
                                <option value="">40kg</option>
                                        <option value="">50kg</option>
                                        <option value="">60kg</option>
                                    </select>
                                </div>

                              </div>
                            </div>
                        </div>
                            </li>
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant13" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Body type</p> <span class="col-md-4">Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant13">
                            <div class="card card-body inner_math_variant">
                            <div class="all_checkboxes_options">
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="any">
                                      <label class="form-check-label" for="any">
                                        Any
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="patite">
                                      <label class="form-check-label" for="patite">
                                      Patite
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Slim">
                                      <label class="form-check-label" for="Slim">
                                      Slim
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            </div>
                        </div>
                            </li>
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant14" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Their ethnicity is mostly:</p> <span class="col-md-4">Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant14">
                            <div class="card card-body inner_math_variant">
                            <div class="all_checkboxes_options">
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="any1">
                                      <label class="form-check-label" for="any1">
                                        Any
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Asian">
                                      <label class="form-check-label" for="Asian">
                                      Asian
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Black">
                                      <label class="form-check-label" for="Black">
                                      Black
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            </div>
                        </div>
                            </li>
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant15" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Hair Color:</p> <span class="col-md-4">Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant15">
                            <div class="card card-body inner_math_variant">
                            <div class="all_checkboxes_options">
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="any2">
                                      <label class="form-check-label" for="any2">
                                        Any
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Black1">
                                      <label class="form-check-label" for="Black1">
                                     Black
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Brown1">
                                      <label class="form-check-label" for="Brown1">
                                       Brown
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            </div>
                        </div>
                            </li>
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant17" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Eye Color:</p> <span class="col-md-4">Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant17">
                            <div class="card card-body inner_math_variant">
                            <div class="all_checkboxes_options">
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Black2">
                                      <label class="form-check-label" for="Black2">
                                        Black
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Blue">
                                      <label class="form-check-label" for="Blue">
                                      Blue
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Brown2">
                                      <label class="form-check-label" for="Brown2">
                                       Brown
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            </div>
                        </div>
                            </li>
                            <li>
                            <div class="card card-body" data-toggle="collapse" href="#match_variant16" role="button" aria-expanded="false" aria-controls="collapseExample">
                           <div class="row inner_variant_heading">
                           <p class="col-md-4">Consider their appearance as:</p> <span class="col-md-4">Any</span>
                           </div>
                            </div>
                            <div class="collapse mb-3" id="match_variant16">
                            <div class="card card-body inner_math_variant">
                            <div class="all_checkboxes_options">
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="any2">
                                      <label class="form-check-label" for="any2">
                                        Any
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="BelowAverage">
                                      <label class="form-check-label" for="BelowAverage">
                                      Below Average
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            <div class="single_checkbox_option">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="Black">
                                      <label class="form-check-label" for="Black">
                                       Average
                                      </label>
                                    </div>
                                  </div> 
                            </div>
                            </div>
                        </div>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="actionBtn text-center mt-3">
                        <button >Submit</button>
                    </div>
                </div> 
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
    