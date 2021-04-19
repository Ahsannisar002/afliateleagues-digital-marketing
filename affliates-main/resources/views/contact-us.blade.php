@extends('layouts.guest')
@section('meta')
	<title>Affiliates leagues | contact</title>
@endsection
@section('style')
	<link rel="stylesheet" href="{{ asset('assets/css/contact-us.css')}}"/>
@endsection

@section('content')
	<!-- Main Section Contact Us -->
	<div class="jumbotron pl-0 pr-0" style="background-color: transparent;">
		<article class="p-contact-us">
			<section class="hero">
				<div class="bg"></div>
				<div class="container" id="my_container">
					<div class="row">
						<div class="col-sm-12 col-md-8" id="my_mb-0">
							<h1 class="strong">Contact us</h1>
						</div>
						<div class="col-sm-12 col-md-4"></div>
					</div>
					<div class="row text-center">
						<div class="col-sm-12 col-md-5">
							<div class="card">
								<div class="span-row">
                    <span>
                      <img src="{{ asset('assets/img/contact-us/icon-1.png')}}" alt=""/>
                    </span>
								</div>
								<h3 class="center">Office Address</h3>
								<p class="center">
									Office 1002 Al Shaffer Plaza internet City Dubai
								</p>
								<a href="#" class="btn btn-lg">Contact Us</a>
							</div>
						</div>
						<div class="col-sm-12 col-md-5">
							<div class="card">
								<div class="span-row">
                    <span>
                      <img src="{{ asset('assets/img/contact-us/icon-2.png')}}" alt=""/>
                    </span>
								</div>
								<h3 class="center">Email</h3>
								<p class="center">support@affliatesleagues.com</p>
								<a href="#" class="btn btn-lg">Email Us</a>
							</div>
						</div>
						<div class="col-sm-12 col-md-2"></div>
					</div>
				</div>
			</section>
			<section>
				<div class="conatct-form-area">
					<h3>Get in Touch</h3>
					<div class="container">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="publisher-banner-form">
									<div class="row">
										<div class="col-md-6 col-sm-12 form-group">
											<input
													type="text"
													placeholder="Full Name"
													class="input-field form-control"
											/>
										</div>
										
										<div class="col-md-6 col-sm-12 form-group">
											<input
													type="email"
													placeholder="Email"
													class="input-field form-control"
											/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-12 form-group">
											<input
													type="text"
													placeholder="Phone"
													class="input-field form-control"
											/>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="select-option-area form-group">
												<select class="form-control">
													<option selected="selected" disabled="disabled"
													>Select Purpose
													</option
													>
													<option>Services</option>
													<option>Project Analysis</option>
													<option>Report a bug</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-6">
											<div class="check-box-area">
												<input type="checkbox"/>
												Web Development
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="check-box-area">
												<input type="checkbox"/>
												Social Media Marketing
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="check-box-area">
												<input type="checkbox"/>
												Search Engine Optimization
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="check-box-area">
												<input type="checkbox"/>
												PPC Management
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="check-box-area">
												<input type="checkbox"/>
												Analytics
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="check-box-area">
												<input type="checkbox"/> UI /UX
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col col-md-12 col-sm-12 form-group">
                        <textarea
								placeholder="Message"
								class="input-textarea form-control"
								style="height: 8rem;"
						></textarea>
										</div>
									</div>
									<div class="row">
										<div
												class="reCaptcha col-xl-12 text-center col col-md-12 col-sm-12"
										>
											<div value="" class="m-auto">
												<div style="width: 304px; height: 78px;">
													<div>
														<iframe
																src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeUCq4UAAAAAM-wFMpIQR94RUgB86YrVaUTJeDu&amp;co=aHR0cHM6Ly93d3cucHJwYWwuY29tOjQ0Mw..&amp;hl=en&amp;v=-wV2EAWEOTlEtZh4vNQtn3H1&amp;size=normal&amp;cb=hr02g0jlcp2q"
																width="304"
																height="78"
																role="presentation"
																name="a-r1q87utc81ix"
																frameborder="0"
																scrolling="no"
																sandbox="allow-forms
                                allow-popups
                                allow-same-origin
                                allow-scripts
                                allow-top-navigation
                                allow-modals
                                allow-popups-to-escape-sandbox"
														></iframe>
													</div>
													<textarea
															id="g-recaptcha-response"
															name="g-recaptcha-response"
															class="g-recaptcha-response"
															style="
                                width: 250px;
                                height: 40px;
                                border: 1px solid rgb(193, 193, 193);
                                margin: 10px 25px;
                                padding: 0px;
                                resize: none;
                                display: none;
                              "
													></textarea>
												</div>
												<iframe style="display: none;"></iframe>
											</div>
										</div>
										<div class="subn text-center col col-md-12 col-sm-12">
											<input
													type="submit"
													value="Submit"
													class="submit-btn"
											/>
										</div>
									</div>
									<div class="row"></div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
				</div>
			</section>
		</article>
	</div>
@endsection
