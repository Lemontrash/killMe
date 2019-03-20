<html>
    <head>
        <title>Profile</title>
        @include('headAssets')
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <link href="{{ asset('css/faq.css') }}" rel="stylesheet">

    </head>
   
    <body>
      

      @include('profileParts/sidebar')

      <div class="profile-content">
        <div class="page-title"><b>FAQ</b> - Support Panel</div>
        <hr>
        <div class="tab-switchers faq-tab-switchers">
          <div class="item active">General</div>
          <div class="item">Exchange</div>
          <div class="item">Digital Currency</div>
          <div class="item">Merchant Services</div>
          <div class="item">Custom API</div>
        </div>
        <div class="tabs-container">
          <div class="tab-item active">

            <div class="faq-question-wrap">
              <div class="faq-question">At lobortis inceptos semest velit hendrerit ligula, consectetur siggitis dui congue eu  accumsan magna</div>
              <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis nulla purus, id posuere augue hendrerit sit amet. Aliquam et lectus bibendum, euismod velit vitae, consequat nibh. 
              </div>
            </div>
            <div class="faq-question-wrap">
              <div class="faq-question">At lobortis inceptos semest velit hendrerit ligula, consectetur siggitis dui congue eu  accumsan magna</div>
              <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis nulla purus, id posuere augue hendrerit sit amet. Aliquam et lectus bibendum, euismod velit vitae, consequat nibh. 
              </div>
            </div>
            <div class="faq-question-wrap">
              <div class="faq-question">At lobortis inceptos semest velit hendrerit ligula, consectetur siggitis dui congue eu  accumsan magna</div>
              <div class="faq-answer">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis nulla purus, id posuere augue hendrerit sit amet. Aliquam et lectus bibendum, euismod velit vitae, consequat nibh. 
              </div>
            </div>

          </div>
          <div class="tab-item"></div>
          <div class="tab-item"></div>
          <div class="tab-item"></div>
          <div class="tab-item"></div>
        </div>
      </div>

      @include('scriptAssets')
    </body>
</html>