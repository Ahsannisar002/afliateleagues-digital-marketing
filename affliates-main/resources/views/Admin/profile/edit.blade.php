@extends ('layouts.app')
@section('style')
    <style type="text/css">
        .btn-primary {
            border-color: #FF9F43 !important;
            background-color: #FF9F43 !important;
            color: #FFF;
        }

        .btn-primary:hover {
            box-shadow: 0 0 15px #FF9F43;
            border-width: 0;
            transition: all 0.2s;
            color: #fff;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection
@section ('content')
    <div class="scrollbar-container">
    </div>
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div>
                        <!-- users edit media object start -->
                        <div class="media mb-4 d-flex align-items-center">
                            <a class="mr-3" href="#">
                                <img src="@if(current_user()->user_file){{ asset('storage/'.current_user()->user_file) }}@else{{ 'https://ui-avatars.com/api/?size=128&background=00a5d4&color=fff&name=' .  current_user()->name }}@endif"
                                     alt="users avatar"
                                     class="users-avatar-shadow rounded-circle" height="90" width="90">
                            </a>
                            <div class="media-body mt-50">
                                <h4 class="media-heading">{{ current_user()->name }}</h4>
                            </div>
                        </div>
                        <!-- users edit media object ends -->
                        <!-- users edit Info form start -->
                        <form method="POST" action="{{ '/profile/' . current_user()->id }}">
                            @csrf
                            @method('PATCH')
                           
                            <div class="row mt-1">
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        {{! toast($error, 'error') }}
                                    @endforeach
                                @endif
                                <div class="col-12 col-sm-6">
                                    <h3 class="mb-4"><i class="fal fa-address-card"></i>
                                        Personal Information</h3>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>CNIC/DR/Passport</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="cnic"
                                                   placeholder="33***-*******-*"
                                                   required
                                                   value="@if(current_user()->cnic !== null){{ current_user()->cnic }}@else{{ old('cnic') }}@endif"
                                            @if(current_user()->cnic !== null){{'disabled'}}@else @endif/>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>Birth date</label>
                                            <input type="date"
                                                   class="form-control"
                                                   name="date_of_birth"
                                                   placeholder="Birth date"
                                                   required
                                                   value="@if(current_user()->date_of_birth !== null){{ current_user()->date_of_birth }}@else{{ old('date_of_birth') }} @endif"
                                            @if(current_user()->date_of_birth){{'disabled'}}@else @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>Mobile</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="phone"
                                                   placeholder="Mobile number here..."
                                                   required
                                                   value="@if(current_user()->phone){{ 0 . current_user()->phone }}@else{{ old('phone') }} @endif"
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Gender</label>
                                        <ul class="list-unstyled mb-0 pt-3">
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-radio-con">
                                                        <input class="custom-checkbox"
                                                               type="radio"
                                                               name="gender"
                                                               @if(current_user()->gender !== null)
                                                               @if(current_user()->gender === 'male'){{'checked'}}@else @endif
                                                               @if(current_user()->gender === 'female') {{ 'disabled' }}
                                                               @elseif (current_user()->gender === 'other') {{ 'disabled' }}
                                                               @else
                                                               @endif
                                                               @endif

                                                               value="male">
                                                        Male
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-radio-con">
                                                        <input type="radio"
                                                               name="gender"
                                                               @if(current_user()->gender !== null)
                                                               @if(current_user()->gender === 'female'){{'checked'}}@else @endif
                                                               @if(current_user()->gender === 'male' ) {{ 'disabled' }}
                                                               @elseif (current_user()->gender === 'other' ) {{ 'disabled' }}
                                                               @else
                                                               @endif
                                                               @endif

                                                               value="female">
                                                        Female
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-radio-con">
                                                        <input type="radio"
                                                               name="gender"
                                                               @if(current_user()->gender !== null)
                                                               @if(current_user()->gender === 'other'){{'checked'}}@else @endif
                                                               @if(current_user()->gender === 'male') {{ 'disabled' }}
                                                               @elseif (current_user()->gender === 'female') {{ 'disabled' }}
                                                               @else
                                                               @endif
                                                               @endif

                                                               value="other">
                                                        Other
                                                    </div>
                                                </fieldset>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>Personal Pin</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="pl_pin"
                                                   placeholder="Personal Pin"
                                                   required
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <h3 class="mb-4 mt-2 mt-sm-0"><i class="fal fa-map-marker-alt mr-2"></i>Address
                                    </h3>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>Address</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="address"
                                                   placeholder="Address Line 1"
                                                   required
                                                   value="@if(current_user()->address !== null){{ current_user()->address }}@else{{ old('address') }} @endif"
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>City</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="city"
                                                   placeholder="City"
                                                   required
                                                   value="@if(current_user()->city !== null){{ current_user()->city }}@else{{ old('city') }} @endif"
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>Postal code</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="postalcode"
                                                   placeholder="Postal code"
                                                   required
                                                   value="@if(current_user()->postalcode !== null){{ current_user()->postalcode }}@else{{ old('postalcode') }} @endif"
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>State</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="state"
                                                   placeholder="State"
                                                   required
                                                   value="@if(current_user()->state !== null){{ current_user()->state }}@else{{ old('state') }} @endif"
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="forms-control">
                                            <label>Country</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="country"
                                                   placeholder="Country"
                                                   required
                                                   value="@if(current_user()->country !== null){{ current_user()->country }}@else{{ old('country') }} @endif"
                                            >
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary mr-sm-2 mb-2">Update
                                    </button>
                                    <a href="{{ route('profile') }}" class="btn btn-danger mb-2">Back
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- users edit Info form ends -->
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection