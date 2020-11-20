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
                    <h3 style="display: inline-flex;">
                    
                        <a href="quiz-dashboard.php" style="text-decoration:none;">
                            <i class="mdi mdi-arrow-left icon-md text-info d-flex align-self-start mr-3"></i>
                        </a>
                        Beginner Level Quizzes
                    </h3>
                    
						<!-- Code Here -->
				</div>
			</div>
		</div>
	</div>
    <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of quizzes for beginner level</h4>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> </p> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Name </th>
                          <th> Level </th>
                          <th> Reward </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            1
                          </td>
                          <td> Stock Markets Analysis & Opinion </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM200.00 </td>
                          <td> <label class="badge badge-warning"><a href="quiz-question.php">Take Quiz </a></label></td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            2
                          </td>
                          <td> Stock Market Quiz Challenge 1</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM600.00 </td>
                          <td> <label class="badge badge-warning"><a href="quiz-question.php">Take Quiz </a></label></td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            3
                          </td>
                          <td> Technical Analysis Strategies for Beginners </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM750.00 </td>
                          <td> <label class="badge badge-warning"><a href="quiz-question.php">Take Quiz </a></label></td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            4
                          </td>
                          <td> Fundamental Analysis for Beginners </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM300.00 </td>
                          <td> <label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            5
                          </td>
                          <td> Basic Knowledge On Stock Market </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM250.00 </td>
                          <td> <label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            6
                          </td>
                          <td> Investing, Stocks, Bonds, and Mutual Funds </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM450.00 </td>
                          <td> <label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            7
                          </td>
                          <td> Intro to the Stock Market</td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td> RM150.00 </td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


    </div>
</div>

<?php include 'footer.php';?>