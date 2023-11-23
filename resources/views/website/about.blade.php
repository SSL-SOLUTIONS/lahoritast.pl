@extends('layouts.website')
@section('content')


<section class="about_section layout_padding">
  <div class="container">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="{{asset('website/images/about-img.png')}}" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Lahori Taste
            </h2>
          </div>
          <p>
            "Discover the flavorful delights of 'Taste of Lahore,' where culinary traditions come to life. Our menu is a celebration of Lahore's rich gastronomic heritage, offering an exquisite array of mouthwatering dishes that will transport you to the heart of this culinary paradise. From aromatic biryanis to succulent kebabs and sweet delights, every bite is a tribute to the authentic taste of Lahore. Indulge in the true essence of Lahori cuisine, where every dish tells a story of tradition, culture, and unparalleled taste. Come savor the Taste of Lahore experience like never before!"
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

@endsection