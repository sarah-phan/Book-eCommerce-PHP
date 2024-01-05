<div class="review_and_rating mt--40">
    <div class="course-content">
        <h5 class="review_rating_title">REVIEW</h5>
        <div class="row row--30">
            <div class="col-lg-4">
                <div class="average_rating_box">
                    <div class="average_rating_number">5.0</div>
                    <div class="average_rating_star">
                        <x-show-all-star :rating_number=4 :size_number=16 />
                    </div>
                    <span>(25 Review)</span>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="review-wrapper">
                    <div class="rating_progress_bar">
                        <div class="single_rating"> 5
                            <x-fill-star />
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <span class="number_of_single_rating">23</span>
                    </div>
                    <div class="rating_progress_bar">
                        <div class="single_rating"> 4 <x-fill-star />
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="number_of_single_rating">3</span>
                    </div>
                    <div class="rating_progress_bar">
                        <div class="single_rating"> 3 <x-fill-star />
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="number_of_single_rating">2</span>
                    </div>
                    <div class="rating_progress_bar">
                        <div class="single_rating"> 2 <x-fill-star />
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="number_of_single_rating">3</span>
                    </div>
                    <div class="rating_progress_bar">
                        <div class="single_rating"> 1 <x-fill-star />
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="0" aria-valuemin="80" aria-valuemax="100"></div>
                        </div>
                        <span class="number_of_single_rating">2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment-wrapper pt--40">
            <!--  Comment Box start--->
            <div class="edu-comment">
                <div class="thumbnail">
                    <img src="images/student-1.png" alt="Comment Images" />
                </div>
                <div class="comment_content">
                    <div class="comment_header">
                        <p class="comment_user_name">CSS Tutorials</p>
                        <div>
                            <x-show-all-star :rating_number=5 />
                        </div>
                    </div>
                    <span class="rating_create_date">2023-12-01 15:56</span>
                    <p class="comment_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <!-- Comment Box end--->
            <!--  Comment Box start--->
            <div class="edu-comment">
                <div class="thumbnail"> <img src="images/student-1.png" alt="Comment Images"> </div>
                <div class="comment_content">
                    <div class="comment_header">
                        <p class="comment_user_name">HTML CSS Tutorials</p>
                        <div>
                            <x-show-all-star :rating_number=5 />
                        </div>
                    </div>
                    <span class="rating_create_date">
                        2023-12-01 15:56
                    </span>
                    <p class="comment_text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
                </div>
            </div>
            <!--  Comment Box end--->
        </div>
    </div>
</div>