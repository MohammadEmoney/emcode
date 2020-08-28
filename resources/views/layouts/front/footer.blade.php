<footer class="footer-area section-padding">
    <div class="container">
        <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
            <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
                I am a fullstack web developer and a member of <a href="https://codesider.ir">Codesider Team</a>, work as Php backend developer. I design websites like blog, e-commerce, business and so on. You can checkout my other works in <a href="#">here</a>.
            </p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="single-footer-widget">
                <h6>Newsletter</h6>
                <p>Stay update with our latest</p>

                <form action="{{ route('subscribe') }}" method="post" class="form-inline">
                    @csrf
                    <div class="d-flex flex-row">

                        <input class="form-control" type="email" name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" style="padding: 19px" required>

                        <button type="submit" class="btn btn-primary rounded-0"><i class="ti-bell"></i></button>

                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-2" style="width: 92%">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
            <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">Site Links</h6>
            <ul class="instafeed d-flex flex-wrap">
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('categories') }}">Categories</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('school') }}">school</a></li>
                <li><a href="{{ route('resume') }}">resume</a></li>
                {{-- @foreach($instagram as $insta)
                    <li><a href="{{ $insta->link }}"><img src="{{ $insta->images->thumbnail->url }}" alt="instagram"></a></li>
                @endforeach --}}
            </ul>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>
            <div class="footer-social d-flex align-items-center">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                <i class="fab fa-dribbble"></i>
                </a>
                <a href="#">
                <i class="fab fa-behance"></i>
                </a>
            </div>
            </div>
        </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://instagram.com/breaking.code_404" target="_blank">Mohammad Imani</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</footer>
