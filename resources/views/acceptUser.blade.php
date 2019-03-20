<html>
<head>
    <title>Profile</title>
    @include('headAssets')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/accept-user.css') }}" rel="stylesheet">

</head>

<body>

@include('profileParts/sidebar')

<div class="profile-content">
    <div class="page-title">New users</div>
    <hr>
    <div class="tab-switchers">
        <div class="item active">All</div>
        <div class="item">Processed</div>
        <div class="item">Pending</div>
    </div>
    <div class="tabs-container">
        <div class="tab-item active">
            <table class="table company-users-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Request Date</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Accepted</th>
                    <th>Open</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstName.' '.$user->lastName}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->email}}</td>
                        {{--<td>{{$user->email}}</td>--}}
                        <td>
                            <form action="/accept/{{$user->id}}" method="post">
                                @csrf
                                <input type="hidden" name="user" value="">
                                <button class="theme-btn btn-gray" name="accept" value="no">No</button>
                                <button class="theme-btn btn-red"  name="accept" value="yes">Yes</button>
                            </form>
                            <!-- <i class="fas fa-check-circle"></i> -->
                        </td>
                        <td>
                            <button class="theme-btn btn-blue show-user-files-row">Open</button>
                        </td>
                    </tr>
                    <tr class="user-files-row">
                        <td class="user-files" colspan="6">
                            <div class="user-files-inner" style="display: none;">
                                <div class="theme-row">
                                    <b class="text-white">Files</b>
                                    <hr>
                                </div>
                                <div class="theme-row">
                                    <div class="col">
                                        <b class="text-white">ID picture</b>
                                        <small>Files Status</small>
                                        <button class="theme-btn btn-green">Approved</button>
                                        <a href="/downloadId/{{$user->id}}" class="view-files">View Files</a>

                                    </div>
                                    <div class="col">
                                        <b class="text-white">Selfie Picture</b>
                                        <small>Files Status</small>
                                        <button class="theme-btn btn-gray">Not Approved</button>
                                        <a href="/downloadSelfie/{{$user->id}}" class="view-files">View Files</a>

                                    </div>
                                    <div class="col">
                                        <b class="text-white">Bank Transfer</b>
                                        <small>Files Status</small>
                                        <button class="theme-btn btn-gray">Not Approved</button>
                                        <a href="/downloadBank/{{$user->id}}" class="view-files">View Files</a>

                                    </div>
                                    <div class="col">
                                        <b class="text-white">DOD</b>
                                        <small>Files Status</small>
                                        <button class="theme-btn btn-gray">Not Approved</button>
                                        <a href="/downloadDod/{{$user->id}}" class="view-files">View Files</a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('scriptAssets')
</body>
</html>