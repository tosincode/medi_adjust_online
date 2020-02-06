
@extends('layout')


@section('rating_content')
<style type="text/css"></style>
<div class="col-md-3">
											<div id="review-form">
												<form name="" id="ratingform" class="review-form" method="post">
													<input class="input" name="reviewname" type="text" placeholder="Your Name">
													<input class="input" type="text" placeholder="Title" name="title">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review" name="comment"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></lanbel>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
															
														</div>
													</div>
												</form>
											</div>
										</div>

			@endsection