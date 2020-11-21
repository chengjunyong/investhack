<?php include 'header.php';?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card{
    border-radius: 5px;
}
 .card:hover{
    background-color: #e7eaed;
 }
</style>
<div class="content-wrapper">
	<div class="row">
		<div class="col-md-12 grid-margin">
			<div class="card">
				<div class="card-body">
                    <h3 style="display: inline-flex;">Quiz Challenge<i class="mdi mdi-trophy icon-md text-info d-flex align-self-start mr-3"></i></h3>
                    
						<!-- Code Here -->
				</div>
			</div>
		</div>
	</div>
    <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Basic Knowledge On Stock Market</h4>
                <p class="card-description">10 Questions </p>
                <ul class="list-ticked">
                    <li>Earn RM250 after completion</li>
                    <li>5 minutes</li>
                    <li>Beginner Level</li>
                </ul>
                <button class="btn btn-warning btn-rounded btn-fw" onclick="location.href='quiz-question.php'">Take Quiz</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Technical Analysis Quiz 2 </h4>
                <p class="card-description">15 Questions </p>
                <ul class="list-ticked">
                    <li>Earn RM500 after completion</li>
                    <li>10 minutes</li>
                    <li>Intermediate Level</li>
                </ul>
                <button class="btn btn-warning btn-rounded btn-fw" onclick="location.href='quiz-question.php'">Take Quiz</button>

                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Stock Market Expert Quiz 1</h4>
                <p class="card-description">20 Questions </p>
                <ul class="list-ticked">
                    <li>Earn RM1000 after completion</li>
                    <li>15 minutes</li>
                    <li>Expert Level</li>
                </ul>
                <button class="btn btn-warning btn-rounded btn-fw" onclick="location.href='quiz-question.php'">Take Quiz</button>

                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 >Beginner Level</h3>
                    <div class="media"> 
                        <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                            <a href="quiz-table.php">Browse Quiz</a>
                        </i>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 >Intermediate Level</h3>
                    <div class="media">
                        <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                            <a href="quiz-table.php">Browse Quiz</a>
                        </i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h3 >Expert Level</h3>
                <div class="media">
                    <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                        <a href="quiz-table.php">Browse Quiz</a>
                    </i>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-12" style="font-weight: 400;font-size: 25px;">Education Centre</div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <img src="assets/images/stock_education_img/img1.jpg" alt="" width="500px;" height="300px;">

                    <h4 class="card-title" style="font-weight: 600;font-size: 20px;">
                        <a href="https://www.investopedia.com/fundamental-analysis-4689757" target="_blank">Fundamental Analysis</a>
                    </h4>
                    <p class="card-description"> Fundamental analysis attempts to measure a security's intrinsic value by examining related economic and financial factors including the balance sheet, strategic initiatives, microeconomic indicators, and consumer behavior. </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="border-bottom: 2px solid grey; margin-bottom: 20px;">Beginner</h4>
                                    <p class="card-description" style="font-weight: 600;font-size: 20px;"> New to stock market?</p>
                                    <p> We'll get you up to speed with the basics.</p>
                                    <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                                        <a href="https://www.bursamarketplace.com/mkt/learn/beginner" target="_blank">Find out more</a>
                                    </i>
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/images/stock_education_img/img2.jpg" alt="" width="250px;" height="180px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 style="border-bottom: 2px solid grey; margin-bottom: 20px;">Intermediate</h4>
                                        <p class="card-description" style="font-weight: 600;font-size: 20px;"> Take me further</p>
                                        <p> Explore the options and intricacies of investing.</p>
                                        <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                                            <a href="https://www.bursamarketplace.com/mkt/learn/intermediate" target="_blank">Find out more</a>
                                        </i>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="assets/images/stock_education_img/img3.jpg" alt="" width="250px;" height="180px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/images/stock_education_img/img4.jpg" alt="" width="250px;" height="180px;">

                                </div>
                                <div class="col-md-6">
                                    <h4 style="border-bottom: 2px solid grey; margin-bottom: 20px;">Advanced</h4>
                                    <p class="card-description" style="font-weight: 600;font-size: 20px;"> Into the deep end</p>
                                    <p> Dive even deeper to the details and complexities of investing.</p>
                                    <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                                        <a href="https://www.bursamarketplace.com/mkt/learn/advanced" target="_blank">Find out more</a>
                                    </i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assets/images/stock_education_img/img5.jpg" alt="" width="250px;" height="180px;">

                                    </div>
                                    <div class="col-md-6">
                                        <h4 style="border-bottom: 2px solid grey; margin-bottom: 20px;">Glossary</h4>
                                        <p class="card-description" style="font-weight: 600;font-size: 20px;"> Confused with the terms? </p>
                                        <p> Browse our jargon dictionary to fill that information gap.</p>
                                        <i class="mdi mdi-arrow-right icon-md text-info d-flex align-self-start mr-3" style="font-size: 0.875rem;">
                                            <a href="https://www.bursamarketplace.com/mkt/learn/glossary" target="_blank">Find out more</a>
                                        </i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <img src="assets/images/stock_education_img/img6.jpg" alt="" width="500px;" height="300px;">

                    <h4 class="card-title" style="font-weight: 600;font-size: 20px;">
                        <a href="https://www.investopedia.com/technical-analysis-4689657" target="_blank">Technical Analysis</a>
                    </h4>
                    <p class="card-description"> Technical analysis is the study of the price movement and patterns of a security. By scrutinizing a security's past price action, primarily through charts and indicators, traders can forecast future price direction.</p>
                </div>
            </div>
        </div>


    </div>
</div>

<?php include 'footer.php';?>