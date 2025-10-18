@extends('web.includes.master')

@section('content')
	<main class="main">

	    <!-- Contact Section -->
	    <section id="contact" class="contact section">

	      <!-- Section Title -->
	      <div class="container section-title" data-aos="fade-up">
	        <h2>Reach Out</h2>
	        <p>
	        	Got a Story, Destination, or Idea? Let’s Talk.
	        	<br>
				Whether you’re a fellow traveler, filmmaker, guide, or someone with a story to share—I’d love to hear from you. Reach out for collaborations, questions, feedback, or just to say hello.
				<br>
				<strong>Send me a message using the form below.</strong><br>
				Follow me on Instagram and YouTube for daily adventures and new releases.
				Let’s connect—because every great journey starts with a conversation


	        </p>
	      </div><!-- End Section Title -->

	      <div class="container" data-aos="fade-up" data-aos-delay="100">

	        <div class="row gy-4">

	          <div class="col-lg-5">

	            <div class="info-wrap">

	              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
	                <i class="bi bi-phone flex-shrink-0"></i>
	                <div>
	                  <h3>Follow Me</h3>
	                  <p class="contact-follow">
					      <a href="https://www.youtube.com/@rahaal_01" target="_blank"><span class="bi bi-youtube"></span></a>
					      <a href="https://www.instagram.com/rahaal_01" target="_blank"><span class="bi bi-instagram"></span></a>
					      <a href="https://www.facebook.com/rahaal01" target="_blank"><span class="bi bi-facebook"></span></a>
					      <a href="https://www.tiktok.com/@rahaal_01" target="_blank"><span class="bi bi-tiktok"></span></a>
	                  </p>
	                </div>
	              </div><!-- End Info Item -->

	              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
	                <i class="bi bi-geo-alt flex-shrink-0"></i>
	                <div>
	                  <h3>Address</h3>
	                  <p>Dubai, United Arab Emirates</p>
	                </div>
	              </div><!-- End Info Item -->

	              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
	                <i class="bi bi-envelope flex-shrink-0"></i>
	                <div>
	                  <h3>Email Us</h3>
	                  <p><a href="mailto:contact@rahaal-theexplorer.com">contact@rahaal-theexplorer.com</a></p>
	                </div>
	              </div><!-- End Info Item -->

	              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230994.3295013514!2d55.13752390526723!3d25.227276936084976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai!5e0!3m2!1sen!2sae!4v1746011972390!5m2!1sen!2sae" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	            </div>
	          </div>

	          <div class="col-lg-7">
	            <form action="{{route('enquiry.submit')}}" class="php-email-form-new" id="enquiry-form">
		          @csrf
		          <div class="row gy-4">

		            <div class="col-md-6">
		              <label for="name-field" class="pb-2">Your Name</label>
		              <input type="text" name="name" class="form-control" required="">
		            </div>

		            <div class="col-md-6">
		              <label for="email-field" class="pb-2">Your Email</label>
		              <input type="email" class="form-control aside-email" name="email" required="">
		            </div>

		            <div class="col-md-12">
		              <label for="subject-field" class="pb-2">Subject</label>
		              <input type="text" class="form-control" name="subject" required="">
		            </div>

		            <div class="col-md-12">
		              <label for="message-field" class="pb-2">Message</label>
		              <textarea class="form-control" name="description" rows="10" required=""></textarea>
		            </div>

		            <div class="col-md-12 text-center">
		              <div class="loading"><img src="{{URL::to('/public/loader-gif.gif')}}" width="80px" class="newsletter-loader"></div>

		              <button type="submit">Send Message</button>
		            </div>

		          </div>
		        </form>
	          </div><!-- End Contact Form -->

	        </div>

	      </div>

	    </section><!-- /Contact Section -->
	    <br><br><br><br>
	  </main>
@endsection