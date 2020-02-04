@extends('layouts.main')

@section('main')
<div id="cec-section" class="py-5 my-5">
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-8 mx-auto">
                <h1 class="text-center fw-semi mb-3 font-24">သမ္မဂအလုပ်အမှုဆောင်အဖွဲ့</h1>
                <img class="img-fluid" src="{{ asset('image/suflag.jpg') }}" alt="UIT SU Flag">
            </div>
        </div>
    </div>
    <div class="bg-theme-primary my-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-4 mx-auto text-white">
                    <h1 class="text-center fw-semi mb-3 font-24">About</h1>
                    <p class="text-center font-22 fw-normal">University of Information Technology Students' Union was founded in March 1, 2018.<br>The union is made up the following (18) Chief Executive Counsillors.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="cecs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/supresident.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Ko Aung Khant Thaw</a>
                            <p class="lead text-warning fw-semi">ဥက္ကဌ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/suvicepresident.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Ma Myat Noe Eain</a>
                            <p class="lead text-warning fw-semi">ဒု-ဥက္ကဌ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/susecretary.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Ko Kaung Htet Aung</a>
                            <p class="lead text-warning fw-semi">အတွင်းရေးမှူး</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/supyankyaryay.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Su Yanant Hlaing</a>
                            <p class="lead text-warning fw-semi">ပြန်ကြားရေးတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/supyinpasatsanyay.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Min Khant Ko</a>
                            <p class="lead text-warning fw-semi">ပြင်ပဆက်ဆံရေးတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/susarpay.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Phone Pyae Kyawk</a>
                            <p class="lead text-warning fw-semi">စာပေတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/suanupyinnyar.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Khant Myat Min</a>
                            <p class="lead text-warning fw-semi">အနုပညာတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/susports.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Zwe Oak Soe</a>
                            <p class="lead text-warning fw-semi">အားကစားတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/suedu.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Htet Arkar</a>
                            <p class="lead text-warning fw-semi">ပညာရေးတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/sutech.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Phone Myat Khine</a>
                            <p class="lead text-warning fw-semi">နည်းပညာတာဝန်ခံ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/sufirst1.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Nyi Wai Yan Tun</a>
                            <p class="lead text-warning fw-semi">ပထမနှစ်တာဝန်ခံ - ၁</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card border-1 border-light shadow-0">
                        <img class="card-img-top" src="{{ asset('image/cec/sufirst2.jpg') }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <a class="lead custom-a fw-semi d-block mb-2" href="#">Aye Chan Moe</a>
                            <p class="lead text-warning fw-semi">ပထမနှစ်တာဝန်ခံ - ၂</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
