<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Contact Us</h3>
                    <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a>+01 1234567890<br>+01 1234567889</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>english-tests@gmail.com<br> eng-tests@gmail.com</li>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> London 145
                            <br> United Kingdom
                        </li>
                    </ul>
                        <div class="col-12">
                            <ul class="social_icon">
                                <li> <a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="https://rs.linkedin.com/"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li> <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h3>Menus</h3>
                    <ul class="link_icon">
                        @foreach($menu as $m)
                            <li class="nav-item">
                                <a href="{{route($m->route)}}"></i> {{$m->name}} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Contact us</h3>
                    <form class="main_form">
                        <div class="row">
                            @if(!session()->has("user"))
                                <div class="col-md-12 ">
                                    <input class="news" placeholder="Your Email" type="email" name="messageEmail" id="messageEmail">
                                </div>
                            @endif
                            <div class="col-md-12 ">
                                <textarea class="news" placeholder="Message..." name="message" id="message"></textarea>
                            </div>
                            <input type="hidden" name="userId" id="userId" value="{{ session()->has("user") ?  session()->get("user")-> id : ""}}">
                            <div class="col-md-12">
                                <button id="sendMessage" class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
