@extends('layouts.main')

@section('main')
<div id="intro-section">
    <div class="container h-100">
        <div class="d-flex h-100">
            <div class="row align-self-center">
                <div class="container" style="max-width: 562px; z-index: 1;">
                    <h1>University of Information Technology Students' Union</h1>
                    <p>We offer the most complete course pakage in the country, for the research, design and development of Education.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- missions sliders -->
<div id="mission-section" class="mb-5">
    <div class="container h-100">
        <div class="d-flex h-100 justify-content-center">
            <div class="row align-self-center justify-content-center w-100">
                <h1>Our Missions</h1>
                <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="d-block"><q>ကျောင်းသား၊ ကျောင်းသူ တစ်ဦးချင်းဆီ၏ အခွင့်အရေးနှင့် ရပိုင်ခွင့်များကို ကာကွယ်စောင့်ရှောက်ရန်။</q></p>
                        </div>
                        <div class="carousel-item">
                            <p class="d-block"><q>ပြည်တွင်း၊ ပြည်ပ ကျောင်းသားအဖွဲ့အစည်းများနှင့် ဆက်သွယ်ဆောင်ရွက်နိုင်ရန်။</q></p>
                        </div>
                        <div class="carousel-item">
                            <p class="d-block"><q>အထက်ပါ ရည်ရွယ်ချက်များအား အကောင်အထည်ဖော်ဆောင်ရာတွင် တက္ကသိုလ်ရှိ ကျောင်းသား၊ ကျောင်းသူများ အားလုံးနှင့်အတူ စုပေါင်းလုပ်ဆောင်သွားရန်။</q></p>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- events -->
<div id="event-section">
    <div class="container">
        <div class="section-title">
            <div>
                <h1>Upcoming Events</h1>
                <div class="float-right">
                    <a href="#" class="custom-btn">View More</a>
                </div>
            </div>
            <p>Recent and upcoming educational events listed here</p>
        </div>
        <div class="event">
            <div class="event-time">
                <time datetime="2019-9-27" class="time text-uppercase">
                    <stong class="date">27</stong>
                    <stong class="month text-muted">September</stong><br>
                    <strong class="day text-muted">Friday</strong>
                </time>
            </div>
        </div>
    </div>
</div>
@endsection