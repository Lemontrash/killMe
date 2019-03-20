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
        <div class="page-title">Files History</div>
        <hr>
        <div class="tab-switchers">
          <div class="item active">All</div>
          <div class="item">Processed</div>
          <div class="item">Pending</div>
        </div>
        <div class="tabs-container">
          <div class="tab-item active">
            <table class="table alternate-rows-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date Issued</th>
                  <th>Phone</th>
                  <th class="text-center">Download PDF</th>
                  <th class="text-center">Approved</th>
                  <th class="text-center">Amount</th>
                </tr>
              </thead>
              <tbody>
              @foreach($files as $file)
                  <tr>
                      <th>{{\App\User::where('id', $file->user_id)->first()->firstName.' '.\App\User::where('id', $file->user_id)->first()->lastName}}</th>
                      <th>{{$file->created_at}}</th>
                      <th>{{\App\User::where('id', $file->user_id)->first()->mobile}}</th>
                      @if($file->approved == 'yes')
                          <th class="text-center">
                              <a href="/getPdfFromProfile/{{$file->id}}" class="theme-btn btn-blue" target="_blank">Download</a>
                          </th>
                          @elseif($file->approved == '-')
                          <th class="text-center">
                              Please Wait
                          </th>
                          @else
                          <th class="text-center">
                              Your file was not approved :(
                          </th>
                      @endif
                      <th class="text-center">{{$file->approved}}</th>
                      <th class="text-center">{{$file->amount}}€</th>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
            <div class="tab-item ">
                <table class="table alternate-rows-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Issued</th>
                        <th>Phone</th>
                        <th class="text-center">Download PDF</th>
                        <th class="text-center">Approved</th>
                        <th class="text-center">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filesProcessed as $file)
                        <tr>
                            <th>{{\App\User::where('id', $file->user_id)->first()->firstName.' '.\App\User::where('id', $file->user_id)->first()->lastName}}</th>
                            <th>{{$file->created_at}}</th>
                            <th>{{\App\User::where('id', $file->user_id)->first()->mobile}}</th>
                            @if($file->approved == 'yes')
                                <th class="text-center">
                                    <a href="/getPdfFromProfile/{{$file->id}}" class="theme-btn btn-blue">Download</a>
                                </th>
                            @elseif($file->approved == '-')
                                <th class="text-center">
                                    Please Wait
                                </th>
                            @else
                                <th class="text-center">
                                    Your file was not approved :(
                                </th>
                            @endif
                            <th class="text-center">{{$file->approved}}</th>
                            <th class="text-center">{{$file->amount}}€</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-item ">
                <table class="table alternate-rows-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Issued</th>
                        <th>Phone</th>
                        <th class="text-center">Download PDF</th>
                        <th class="text-center">Approved</th>
                        <th class="text-center">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filesPending as $file)
                        <tr>
                            <th>{{\App\User::where('id', $file->user_id)->first()->firstName.' '.\App\User::where('id', $file->user_id)->first()->lastName}}</th>
                            <th>{{$file->created_at}}</th>
                            <th>{{\App\User::where('id', $file->user_id)->first()->mobile}}</th>
                            @if($file->approved == 'yes')
                                <th class="text-center">
                                    <a href="/getPdfFromProfile/{{$file->id}}" class="theme-btn btn-blue">Download</a>
                                </th>
                            @elseif($file->approved == '-')
                                <th class="text-center">
                                    Please Wait
                                </th>
                            @else
                                <th class="text-center">
                                    Your file was not approved :(
                                </th>
                            @endif
                            <th class="text-center">{{$file->approved}}</th>
                            <th class="text-center">{{$file->amount}}€</th>
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
