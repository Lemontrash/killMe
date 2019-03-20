<html>
<head>
    <title>Profile</title>
    @include('headAssets')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

</head>

<body>



@include('profileParts/sidebar')

<div class="profile-content">
    <div class="page-title">Settings</div>
    <hr>
    <div class="tabs-container">
        <div class="tab-item active">
            <form class="profile-settings-form profile-form" method="post" action="{{route('changePersonalInfo')}}" enctype="multipart/form-data">
                @csrf

                <div class="theme-row">
                    <div class="inp-group text-inp-group">
                        <label for="profile_email" class="inp-caption">Email Address</label>
                        <div class="inp-wrap">
                            <input type="email" name="email" placeholder="Email" id="profile_email" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="inp-group text-inp-group">
                        <label for="profile_first_name" class="inp-caption">First Name</label>
                        <div class="inp-wrap">
                            <input type="text" name="first_name" placeholder="First Name" id="profile_first_name" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="inp-group text-inp-group">
                        <label for="profile_last_name" class="inp-caption" id="profile_last_name">Last Name</label>
                        <div class="inp-wrap">
                            <input type="text" name="last_name" placeholder="Last Name" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                </div>

                <div class="theme-row">
                    <div class="inp-group">
                        <label for="profile_month" class="inp-caption">Date Birth</label>
                        <div class="multiple-inputs">
                            <div class="inp-wrap">
                                <select name="month" id="profile_month" class="nice-select theme-nice-select" required>
                                    <option value="Month" selected default disabled>Month</option>
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="december">December</option>
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <select name="date" id="profile_date" class="nice-select theme-nice-select" required>
                                    <option value="" selected default disabled>Date</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="inp-wrap">
                                <select name="year" id="profile_year" class="nice-select theme-nice-select" required>
                                    <option value="Year" selected default disabled>Year</option>
                                    @for ($i = 1900; $i < intval(date('Y')); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    <option value="2048">2048</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="inp-group">
                        <label for="profile_country" class="inp-caption">Your Country</label>
                        <div class="inp-wrap">
                            <select name="country" id="profile_country" class="nice-select theme-nice-select" required>
                                <option value="Select Country" selected default disabled>Select Country</option>
                                <option value="1024">1024</option>
                                <option value="2048">2048</option>
                            </select>
                        </div>
                    </div>

                    <div class="inp-group text-inp-group">
                        <label for="profile_city" class="inp-caption">City</label>
                        <div class="inp-wrap">
                            <input type="text" name="city" placeholder="City" id="profile_city" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>


                </div>

                <div class="theme-row">
                    <button class="theme-btn btn-blue" type="submit">Save Settings</button>
                </div>
            </form>
            <form class="profile-settings-form profile-form" method="post" action="{{route('changePassword')}}">
                @csrf
                <div class="theme-row">
                    <div class="inp-group text-inp-group">
                        <label for="profile_current_password" class="inp-caption">Change Password</label>
                        <div class="inp-wrap">
                            <input type="password" name="current_password" placeholder="Current password" id="profile_current_password" minlength="6" maxlength="64" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="inp-group text-inp-group">
                        <label for="profile_new_password" class="inp-caption"></label>
                        <div class="inp-wrap">
                            <input type="password" name="new_password" placeholder="New Password" id="profile_new_password" minlength="6" maxlength="64" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="inp-group text-inp-group">
                        <label for="profile_retype_new_password" class="inp-caption"></label>
                        <div class="inp-wrap">
                            <input type="password" name="retype_password" placeholder="Re-Type Password" id="profile_retype_new_password" minlength="6" maxlength="64" required>
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>

                    <div class="inp-group">
                        <div class="inp-wrap">
                            <button class="theme-btn btn-blue" id="profile_update_password">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@include('scriptAssets')
</body>
</html>