<?php

namespace App\Http\Controllers;

use App\Review;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function particularReview($id){
        $review = Review::find($id);
        return view('particularreview', ['reviews' => $review]);
    }

    public function allReviews (){
        $review = Review::all();
        return view('reviews', ['reviews' => $review]);
    }

    public function cardetails($id){
        $review = Review::find($id);
        $cars = $review->cars;
        return $cars;
    }
}
