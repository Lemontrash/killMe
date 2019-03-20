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
                <tr>
                  <td>John Snow</td>
                  <td>02 / 02 /2019</td>
                  <td>+380557744876</td>
                  <td>Johnsnow14@gmail.com</td>
                  <td>
                    <button class="theme-btn btn-gray">Yes</button><button class="theme-btn btn-red">Yes</button>
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
                          <small>File Status</small>
                          <button class="theme-btn btn-green">Approved</button>
                          <a href="#" class="view-files">View File</a>

                        </div>
                        <div class="col">
                          <b class="text-white">Selfie Picture</b>
                          <small>File Status</small>
                          <button class="theme-btn btn-gray">Not Approved</button>
                          <a href="#" class="view-files">View File</a>

                        </div>
                        <div class="col">
                          <b class="text-white">Bank Transfer</b>
                          <small>File Status</small>
                          <button class="theme-btn btn-gray">Not Approved</button>
                          <a href="#" class="view-files">View File</a>

                        </div>
                        <div class="col">
                          <b class="text-white">DOD</b>
                          <small>File Status</small>
                          <button class="theme-btn btn-gray">Not Approved</button>
                          <a href="#" class="view-files">View File</a>

                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @include('scriptAssets')
    </body>
</html>