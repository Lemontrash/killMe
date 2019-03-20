<html>
    <head>
        <title>Main Page</title>
        @include('headAssets')
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main-page.css') }}" rel="stylesheet">

    </head>
    <body>
        <header id="main_header">
            <div class="container">
                <div class="theme-row">
                    <div class="logo-col">
                        <div class="img-wrap">
                            <span>LOGO</span>
                        </div>
                    </div>
                    <div class="menu-col">
                        <div class="menu-wrap">
                            <ul class="menu">
                                {{--<li class="menu-item active"><a href="#">Home</a></li>--}}
                                {{--<li class="menu-item"><a href="{{route('faq')}}">About Us</a></li>--}}
                                {{--<li class="menu-item"><a href="{{route('home')}}">Our Product</a></li>--}}
                                {{--<li class="menu-item"><a href="{{route('home')}}">Home</a></li>--}}
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li class="menu-item"><a href="{{route('profileSettings')}}" class="theme-btn btn-pink">Profile</a></li>
                                @else
                                    <li class="menu-item"><a href="{{route('login')}}" class="theme-btn btn-pink">Log in</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="first-backround-screen">
            <div class="container">

                <div class="theme-row">
                    <div class="cubes-col">
                        <div class="img-wrap">
                            <img src="/img/main-page-cubes.png" alt="">
                        </div>
                        <div class="text">
                            <small>GuruChange – Cryptocurrency Exchange.</small>
                            <p>Easily, Safely and Cheaply.</p>
                        </div>
                    </div>
                    <div class="video-col">
                        <img src="/img/main-page-macbook.png" alt="">
                        <div class="text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="72px" height="72px" class="play-btn" fill="#fff">
                                <path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 10 8.5351562 L 10 15.464844 L 16 12 L 10 8.5351562 z" font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible"/>
                            </svg>
                            <p class="heading">OUR VIDEO</p>
                            <small>watch our amazing video</small>
                        </div>
                    </div>
                </div>
                <div class="theme-row advantages-row">
                    <div class="col1-4 item">
                        <div class="ico-wrap"><img src="/img/ico-screen.png" alt=""></div>
                        <p class="title">Easy To Use</p>
                        <p class="desc">On your phone, tablet, on your PC or via the web. It’s easy to use and understand.</p>
                    </div>
                    <div class="col1-4 item">
                        <div class="ico-wrap"><img src="/img/ico-cloud-coin.png" alt=""></div>
                        <p class="title">Easy To Fund & Withdraw</p>
                        <p class="desc">We support multiple deposit and withdrawal options including all leading credit and debit cards.</p>
                    </div>
                    <div class="col1-4 item">
                        <div class="ico-wrap"><img src="/img/ico-lock.png" alt=""></div>
                        <p class="title">Secure. Always.</p>
                        <p class="desc">We use the highest-grade encryption and other security measures to ensure your wallet and crypto are safe and secure.</p>
                    </div>
                    <div class="col1-4 item">
                        <div class="ico-wrap"><img src="/img/ico-comment.png" alt=""></div>
                        <p class="title">We’re Here For You</p>
                        <p class="desc">We pride ourselves on providing the best in customer service. Our team of customer support agents are available via telephone, email and chat.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="screenshot-screen" id="screenshot_screen1">
            <div class="container">
                <div class="theme-row">
                    <div class="text-col">
                        <p class="heading">One Account. Multiple Wallets.</p>
                        <p class="desc">We support multiple wallet types, all under the same account. This makes maintaining and managing your Crypto portfolio easier and simpler.</p>
                        <a href="{{route('register')}}" class="theme-btn btn-blue">REGISTER NOW</a>
                    </div>
                    <div class="screenshot-col">
                        <img src="/img/main-page-screenshot.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="screenshot-screen" id="screenshot_screen2">
            <div class="container">
                <div class="theme-row">
                    <div class="text-col ml-auto">
                        <p class="heading">Super simple to use.</p>
                        <p class="desc">We support multiple wallet types, all under the same account. This makes maintaining and managing your Crypto portfolio easier and simpler.</p>
                        <a href="{{route('register')}}" class="theme-btn btn-blue">REGISTER NOW</a>
                    </div>
                    <div class="screenshot-col">
                        <img src="/img/main-page-screenshot2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="screenshot-screen" id="screenshot_screen3">
            <div class="container">
                <div class="theme-row">
                    <div class="text-col">
                        <p class="heading">Easy signup.</p>
                        <p class="desc">Manage your Crypto wherever you are. Whenever you need. Take control of your cryptocurrency porfolio with iCrypt’s user friendly exchange. Buy Sell, manage, transfer on the go wherever you are, whenever you need.</p>
                        <a href="{{route('register')}}" class="theme-btn btn-blue">REGISTER NOW</a>
                    </div>
                    <div class="screenshot-col">
                        <img src="/img/main-page-screenshot3.png" alt="">
                    </div>
                </div>
                <div class="theme-row we-love-crypto text-center ml-auto mr-auto">
                    <p class="heading">We love Crypto too.</p>
                    <p class="desc">We are a group of Crypto and technology enthusiasts. We have taken our love of Cryptocurrencies and married it with super simple and easy to use technology, providing you with the easiest way to manage, hold and buy and sell cryptocurrencies in India.</p>
                    <a href="{{route('register')}}" class="theme-btn btn-blue">REGISTER NOW</a>
                </div>
            </div>
        </div>
        <div class="money-bg-screen">
            <section class="risks text-section container">
                <p class="heading">Risk Warning</p>
                <p>The buying, selling and/or owing of cryptocurrencies involves a significant amount of risk. Prices can fluctuate on any given day. Because of such price fluctuations, you may gain or lose value of your assets at any given moment. Any digital currency may be subject to large swings in value and may even become absolutely worthless. There is always an inherent risk that losses will occur as a result of buying, selling or trading anything on the market.</p>
                <p>iCrypt.io is a company owned and operated by “Applebrie LTD” (registration number 14593050), a limited liability company registered in Estonia with its registered office at Peterburi Tee 47, Tallinn, Estonia, 11415 (hereinafter the “ICrypt”) licensed by the FSA to provide cryptocurrency exchange and virtual wallet services.</p>
                <p>The content on this website does not constitute financial or investment advice. Any information herein is of a general nature and does not take into consideration your personal circumstances, investment experience or current financial situation.</p>
            </section>
            <section class="restrictions text-section container">
                <p class="heading">Restrictions</p>
                <p>The minimum age for opening and holding an account with iCrypt.io is 18 years old. iCrypt.io also does not provide any services to citizens and residents of the United States, Syria, Sudan, Iran, North Korea and other countries and jurisdictions, where these services can not be provided by legislation.</p>
            </section>
            <footer id="main_footer" class="container">
                <div class="theme-row links-row">
                    <div class="footer-col">
                        <span class="list-caption">Legal Documents</span>
                        <ul class="links">
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">Risk disclaimer</a></li>
                            <li><a href="#">Refund and cancellation policy</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">AML, KYC and CFTC Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <span class="list-caption">Contact us at</span>
                        <ul class="links">
                            <li><a href="mailto:info@icrypt.io">info@icrypt.io</a></li>
                            <li><a href="tel:info@icrypt.io">+44 20 39 546 333</a></li>
                            <li>Peterburi Tee 47, Tallinn, Estonia, 11415</li>
                            <li>Copyright 2018 Applebrie Limited</li>
                            <li>All rights reserved</li>
                        </ul>
                    </div>
                </div>
                <div class="copyright text-center">All rights reserved to <b><a href="#">Coelix studio 2019</a></b></div>
            </footer>
        </div>
    </body>
</html>
