<?php include 'header.php';?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card{
    border-radius: 5px;
}
 .card:hover{
    background-color: #e7eaed;
 }
 #quiz {
  position: relative;
  width: calc(100% - 100px);
}

#quiz h1 {
  color: grey;
  font-weight: 600;
  font-size: 36px;
  text-transform: uppercase;
  text-align: left;
  line-height: 44px;
}

/* #quiz button {
  float: left;
  margin: 8px 0px 0px 8px;
  padding: 4px 8px;
  background: #9ACFCC;
  color: #00403C;
  font-size: 14px;
  cursor: pointer;
  outline: none;
} */

/* #quiz button:hover {
  background: #36a39c;
  color: #FFF;
} */

#quiz button:disabled {
  opacity: 0.5;
  background: ##ffaf0091;
  color: white;
  cursor: default;
}

#question {
  padding: 20px;
  background: #FAFAFA;
  text-align: center;
  min-height: 400px;
}

#question h2 {
  margin-bottom: 16px;
  font-weight: 600;
  font-size: 20px;
}

#question input[type=radio] {
  display: none;
}

#question label {
  display: inline-block;
  margin: 8px;
  padding: 8px;
  background: #FAE3BB;
  color: #4C3000;
  width: calc(50% - 8px);
  min-width: 50px;
  cursor: pointer;
  border-radius: 10px;
}

#question label:hover {
  background: #EBBB67;
}

#question input[type=radio]:checked + label {
  background: #5768f3;
  color: #FAFAFA;
}

#quiz-results {
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: absolute;
  top: 44px;
  left: 0px;
  background: #FAFAFA;
  width: 100%;
  height: calc(100% - 44px);
}

#quiz-results-message {
  display: block;
  color: #00403C;
  font-size: 20px;
  font-weight: bold;
}

#quiz-results-score {
  display: block;
  color: #31706c;
  font-size: 20px;
}

#quiz-results-score b {
  color: #00403C;
  font-weight: 600;
  font-size: 20px;
}

#quiz-retry-button {

  float: left;
  margin: 8px 0px 0px 8px;
  padding: 4px 8px;
  background: #9ACFCC;
  color: #00403C;
  font-size: 14px;
  cursor: pointer;
  outline: none;
  
}
#timer-left{
    float: right;
    background-color: #5768f3;
    color: white;
    padding: 10px;
    border-radius: 5px;
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
                        Quiz 1: Basic Knowledge On Stock Market</h3>
                    
						<!-- Code Here -->
				</div>
			</div>
		</div>
	</div>
    <div class="row">

    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" >10 Questions</h4>
                <p class="card-description"> You are given 5 minutes to answer the questions. </p>
                <div id="timer-left">Time left = <span id="timer"></span></div>
                <div class="row">
                    <div class="col-md-12">

                        <div id="quiz">
                            <h2 id="quiz-name"></h2>
                            <button id="prev-question-button" class="btn btn-warning btn-rounded btn-fw">Previous</button>
                            <button id="next-question-button" class="btn btn-warning btn-rounded btn-fw">Next Question</button>
                            <button id="submit-button" class="btn btn-warning btn-rounded btn-fw" style="float:right;background-color:#5768f3;">Submit Answers</button>
                            
                            <div id="quiz-results">
                                <p id="quiz-results-message"></p>
                                <p id="quiz-results-score"></p>
                                <button id="quiz-retry-button" onclick="location.href='quiz-dashboard.php'">Back</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>


<?php include 'footer.php';?>

<script>

    // Array of all the questions and choices to populate the questions. This might be saved in some JSON file or a database and we would have to read the data in.
var all_questions = [
{
  question_string: "What is the stock market?",
  choices: {
    correct: "A place where parts of businesses are bought and sold.",
    wrong: ["A type of farmers market where people buy and sell food.", "A special type of grocery store that sells stocks.", "A type of bank that gives out loans to new businesses."]
  }
},
{
  question_string: "The name for a part of a business that is bought and sold on the stock market is:",
  choices: {
    correct: "Share",
    wrong: ["Part", "Marker", "Stocker"]
  }
}, 
{
  question_string: "Why would a company need to issue stock? ",
  choices: {
    correct: "To raise money.",
    wrong: ["To increase its' customer base.", "To stop the government from regulating it.", "To show customers that it's successful."]
  }
}, 
{
  question_string: 'The stock market is a physical place.',
  choices: {
    correct: "Yes and No, there are physical places where stocks are sold, but they are also sold virtually.",
    wrong: ["Yes, it's located in most major cities around the world.", "No, trading is all done online."]
  }
},
{
  question_string: "You can buy stock in any company in the world.",
  choices: {
    correct: "False, a company is only listed on the stock exchange if it wants to be.",
    wrong: ["True, all companies are required to offer stock."]
  }
}, 
{
  question_string: "The DOW Jones Industrial Average is an index of 30 American companies.  Why is the DOW Jones Industrial Average important?",
  choices: {
    correct: "It provides a snapshot of how the stock market and the US economy is doing.",
    wrong: ["It tells Americans how much debt the country is in.", "It helps economists predict when a stock market crash will happen.", "It tells Americans how many jobs are out there."]
  }
}, 
{
  question_string: "As long as you are 18 years old and have some money, you can invest it in the stock market.",
  choices: {
    correct: "True",
    wrong: ["False"]
  }
}, 
{
  question_string: "Apple is releasing a new iPhone that is predicted to change the cell phone world.  Millions of people have pre-ordered it.  What do you think will happen to their stock?",
  choices: {
    correct: "It is likely to go up.",
    wrong: ["It is likely to go down."]
  }
}, 
{
  question_string: "Over the course of the day, the head of Apple's company is imprisoned for not paying his taxes.  What do you think will happen to Apple's stock?",
  choices: {
    correct: "It will go down.",
    wrong: ["It will go up."]
  }
}, 
{
  question_string: "Pepsi, Google, Coach, and Nike.  What do these companies have in common?",
  choices: {
    correct: "You can buy stock in them in our stock market.",
    wrong: ["They are examples of failing companies that you wouldn't want to invest in.", "They are all companies that have declined to be on the stock market, you can't buy stock in them.", "They are all companies with such expensive stock that you won't be able to afford to invest in them in our stock market game."]
  }
}, 

];

// An object for a Quiz, which will contain Question objects.
var Quiz = function(quiz_name) {
  // Private fields for an instance of a Quiz object.
  this.quiz_name = quiz_name;
  
  // This one will contain an array of Question objects in the order that the questions will be presented.
  this.questions = [];
}

// A function that you can enact on an instance of a quiz object. This function is called add_question() and takes in a Question object which it will add to the questions field.
Quiz.prototype.add_question = function(question) {
  // Randomly choose where to add question
  var index_to_add_question = Math.floor(Math.random() * this.questions.length);
  this.questions.splice(index_to_add_question, 0, question);
}

// A function that you can enact on an instance of a quiz object. This function is called render() and takes in a variable called the container, which is the <div> that I will render the quiz in.
Quiz.prototype.render = function(container) {
  // For when we're out of scope
  var self = this;
  
  // Hide the quiz results modal
  $('#quiz-results').hide();
  
  // Write the name of the quiz
  $('#quiz-name').text(this.quiz_name);
  
  // Create a container for questions
  var question_container = $('<div>').attr('id', 'question').insertAfter('#quiz-name');
  
  // Helper function for changing the question and updating the buttons
  function change_question() {
    self.questions[current_question_index].render(question_container);
    $('#prev-question-button').prop('disabled', current_question_index === 0);
    $('#next-question-button').prop('disabled', current_question_index === self.questions.length - 1);
   
    
    // Determine if all questions have been answered
    var all_questions_answered = true;
    for (var i = 0; i < self.questions.length; i++) {
      if (self.questions[i].user_choice_index === null) {
        all_questions_answered = false;
        break;
      }
    }
    $('#submit-button').prop('disabled', !all_questions_answered);
  }
  
  // Render the first question
  var current_question_index = 0;
  change_question();
  
  // Add listener for the previous question button
  $('#prev-question-button').click(function() {
    if (current_question_index > 0) {
      current_question_index--;
      change_question();
    }
  });
  
  // Add listener for the next question button
  $('#next-question-button').click(function() {
    if (current_question_index < self.questions.length - 1) {
      current_question_index++;
      change_question();
    }
  });
 
  // Add listener for the submit answers button
  $('#submit-button').click(function() {
    // Determine how many questions the user got right
    var score = 0;
    for (var i = 0; i < self.questions.length; i++) {
      if (self.questions[i].user_choice_index === self.questions[i].correct_choice_index) {
        score++;
      }
    
    }
    
   
    
    // Display the score with the appropriate message
    var percentage = score / self.questions.length;
    console.log(percentage);
    var message;
    if (percentage === 1) {
      message = 'Great job! You earned RM250 as reward!';

      $('.wallet-gold').html('');
      $('.wallet-gold').fadeOut(1500);
      
        $.ajax({
          type: "post",
          url: 'updatewallet.php',
          data: {
            gold : 250,
            id : 1,
          },            
          dataType: "json",
          success: function(data){
            $('.wallet-gold').fadeIn(1500);
            $('.wallet-gold').html("RM " + data.reward);

            console.log("ok");
          },
          error: function() {
              console.log("error");
          }
        });

    } else if (percentage >= .75) {
      message = 'You did alright.'
    } else if (percentage >= .5) {
      message = 'Better luck next time.'
    } else {
      message = 'Maybe you should try a little harder.'
    }
    $('#quiz-results-message').text(message);
    $('#quiz-results-score').html('You got <b>' + score + '/' + self.questions.length + '</b> questions correct.');
    $('#quiz-results').slideDown();
    $('#submit-button').slideUp();
    $('#next-question-button').slideUp();
    $('#prev-question-button').slideUp();
    // $('#quiz-retry-button').sideDown()
    $("#timer-left").remove();

  });
  
  // Add a listener on the questions container to listen for user select changes. This is for determining whether we can submit answers or not.
  question_container.bind('user-select-change', function() {
    var all_questions_answered = true;
    for (var i = 0; i < self.questions.length; i++) {
      if (self.questions[i].user_choice_index === null) {
        all_questions_answered = false;
        break;
      }
    }
    $('#submit-button').prop('disabled', !all_questions_answered);
  });
}

// An object for a Question, which contains the question, the correct choice, and wrong choices. This block is the constructor.
var Question = function(question_string, correct_choice, wrong_choices) {
  // Private fields for an instance of a Question object.
  this.question_string = question_string;
  this.choices = [];
  this.user_choice_index = null; // Index of the user's choice selection
  
  // Random assign the correct choice an index
  this.correct_choice_index = Math.floor(Math.random(0, wrong_choices.length + 1));
  
  // Fill in this.choices with the choices
  var number_of_choices = wrong_choices.length + 1;
  for (var i = 0; i < number_of_choices; i++) {
    if (i === this.correct_choice_index) {
      this.choices[i] = correct_choice;
    } else {
      // Randomly pick a wrong choice to put in this index
      var wrong_choice_index = Math.floor(Math.random(0, wrong_choices.length));
      this.choices[i] = wrong_choices[wrong_choice_index];
      
      // Remove the wrong choice from the wrong choice array so that we don't pick it again
      wrong_choices.splice(wrong_choice_index, 1);
    }
  }
}

// A function that you can enact on an instance of a question object. This function is called render() and takes in a variable called the container, which is the <div> that I will render the question in. This question will "return" with the score when the question has been answered.
Question.prototype.render = function(container) {
  // For when we're out of scope
  var self = this;
  
  // Fill out the question label
  var question_string_h2;
  if (container.children('h2').length === 0) {
    question_string_h2 = $('<h2>').appendTo(container);
  } else {
    question_string_h2 = container.children('h2').first();
  }
  question_string_h2.text(this.question_string);
  
  // Clear any radio buttons and create new ones
  if (container.children('input[type=radio]').length > 0) {
    container.children('input[type=radio]').each(function() {
      var radio_button_id = $(this).attr('id');
      $(this).remove();
      container.children('label[for=' + radio_button_id + ']').remove();
    });
  }
  for (var i = 0; i < this.choices.length; i++) {
    // Create the radio button
    var choice_radio_button = $('<input>')
      .attr('id', 'choices-' + i)
      .attr('type', 'radio')
      .attr('name', 'choices')
      .attr('value', 'choices-' + i)
      .attr('checked', i === this.user_choice_index)
      .appendTo(container);
    
    // Create the label
    var choice_label = $('<label>')
      .text(this.choices[i])
      .attr('for', 'choices-' + i)
      .appendTo(container);
  }
  
  // Add a listener for the radio button to change which one the user has clicked on
  $('input[name=choices]').change(function(index) {
    var selected_radio_button_value = $('input[name=choices]:checked').val();
    
    // Change the user choice index
    self.user_choice_index = parseInt(selected_radio_button_value.substr(selected_radio_button_value.length - 1, 1));
    
    // Trigger a user-select-change
    container.trigger('user-select-change');
  });
}

// "Main method" which will create all the objects and render the Quiz.
$(document).ready(function() {
  // Create an instance of the Quiz object
  var quiz = new Quiz('Quiz 1: Basic Knowledge On Stock Market');
  
  // Create Question objects from all_questions and add them to the Quiz object
  for (var i = 0; i < all_questions.length; i++) {
    // Create a new Question object
    var question = new Question(all_questions[i].question_string, all_questions[i].choices.correct, all_questions[i].choices.wrong);
    
    // Add the question to the instance of the Quiz object that we created previously
    quiz.add_question(question);
  }
  
  // Render the quiz
  var quiz_container = $('#quiz');
  quiz.render(quiz_container);
});







document.getElementById('timer').innerHTML = 005 + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
      alert('Time up! Please try again!');
      window.location.href = "quiz-dashboard.php";

    }
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
//   console.log(m)
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
</script>