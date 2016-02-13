<?php
$user = "root";
$password = "";
$database_name = "foodvellore";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
try{
$conn = new PDO($dsn, $user, $password);
array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo "An error occured with the connection";
}
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=../index.php\">";	
}
else
{
}
?>
<?php
$name = $conn->prepare("SELECT name,username FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
$row = $name->fetch();
$name = $row['name'];
$username = $row['username'];

?>
<!DOCTYPE html>
<html ng-app="events" lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodONZ | Dashboard</title>
   <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/custom.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
    <script src="js/bower_components/angular/angular.min.js"></script>
    <script src="js/bower_components/angular-route/angular-route.min.js"></script>
    <script src="js/angular-app.js"></script>
    <script src="js/router.js"></script>
    <style type="text/css">
        body{
            text-align: center;
            overflow-x: hidden;
        }
        img{
            width:300px !important;
            height:250px !important;;
        }
        @media screen and (max-width: 900px) {
            .desktop-only{
                display:none !important;
            }
            .event_row div  div .thumbnail{
                width: 90%;
                margin-left: 5%;
            }
            .event_row div  div .btn-danger{
                margin-bottom:5%;
            }

        }
        @media screen and (min-width: 901px) {
            .mobile-only{
                display:none !important;
            }
            .body_set{ width: 1349px;
                padding-left: 200px;}
        }
@import url('http://fonts.googleapis.com/css?family=Quicksand');
#foodbar{
  background-color:#ED8C1C;
  height:45px;
  width:100%;
  top:0;left:0;right:0;
  position:fixed;
  border-bottom:#CE6C1B 5px solid;
  font-family:'Quicksand', sans-serif !important;
  color:#fff;
 -webkit-box-shadow: inset 0px -4px 13px 0px rgba rgb(237,140,28);
  -moz-box-shadow:    inset 0px -4px 13px 0px rgb(237,140,28);
  box-shadow:         inset 0px -4px 13px 0px rgb(237,140,28);
  z-index:999;
}
#foodbar a{
  color:#fff;
  text-decoration:none;
}
#foodbar ul{
  list-style-type:none;
  float:left;
  padding:0;
  margin:0;
}
#foodbar ul li{
  display:inline-block;
  padding-top:0px;
  font-size:16px;
  padding-left:8px;
  padding-right:8px;
}
#foodbar li ul{
  display:none;
  background-color:#ED8C1C;
  border:#111 1px solid;
  position:absolute;
  padding-right:25px;
  z-index:9991;
}
#foodbar li:hover ul{
  display:block;
}
#foodbar li ul li{
  display:block;
  margin-top:-6px;
  margin-left:-30px;
  padding:7px;
  font-size:16px;
}
#navwrap{
  margin-top:16px;
}
.element_avatar.tiny img{
  width:24px;
  height:24px;
}
#enjin-bar .right{
  position:fixed;
  font-size: 24px;
  font-family: 'Quicksand', sans-serif;
  top: 30px;
  z-index:99999;
}
</style>
</head>
<body class="body_set">
<div id="foodbar">
  <div id="navwrap">
    <ul>
	<li><a href="/dashboard">FoodONZ</a></li>
      <li><a href="/dashboard"><?php echo $name; ?></a></li>
      <li><a href="/settings">Settings</a></li>
      <li><a href="/foodvellore/desktop/logout">Logout</a></li>
    </ul>
  </div>
</div>
<div class="navbar navbar-default navbar-fixed-top mobile-only" role="navigation" style="overflow-x:hidden ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="navbar-collapse collapse" style="overflow-y: scroll;">
            <ul class="nav navbar-static-top">
                <li><a href="../index.html">Home</a></li>
                <li><a href="#/premium">Premium</a></li>
                <li><a href="#/robo">Robomania</a></li>
                <li><a href="#/bits">Bits and Bytes</a></li>
                <li><a href="#/applied">Applied Engineering</a></li>
                <li><a href="#/management">Management</a></li>
                <li><a href="#/informals">Informals</a></li>
                <li><a href="#/builtrix">Builtrix</a></li>
                <li><a href="#/circuitrix">Circuitrix</a></li>
                <li><a href="#/online">Online</a></li>
                <li><a href="#/bioxyn">Bioxyn</a></li>
                <li><a href="#/workshops">Workshops</a></li>
                <li><a href="#/school">School</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="navbar navbar-default navbar-fixed-top desktop-only" role="navigation" style=" width: 180px;">
    <div class="container" style="width:165px;">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-left">
                <li><a href="../index.html">Home</a></li>
                <li><a href="#/premium">Premium</a></li>
                <li><a href="#/robo">Robomania</a></li>
                <li><a href="#/bits">Bits and Bytes</a></li>
                <li><a href="#/applied">Applied Engineering</a></li>
                <li><a href="#/management">Management</a></li>
                <li><a href="#/informals">Informals</a></li>
                <li><a href="#/builtrix">Builtrix</a></li>
                <li><a href="#/circuitrix">Circuitrix</a></li>
                <li><a href="#/online">Online</a></li>
                <li><a href="#/bioxyn">Bioxyn</a></li>
                <li><a href="#/workshops">Workshops</a></li>
                <li><a href="#/school">School</a></li>
            </ul>
        </div>
    </div>
</div>

<ng-view>

</ng-view>
<!-- Fixed footer -->
<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container">
        <div class="navbar-text pull-left">
            <p> &copy;Gravitas,2015 All Rights Reserved</p>
        </div>

    </div>
</div>

<!--PREMIUM EVENTS    -->
<p class="premium" style="display: none">
    <i data-label="Event Name">
        RISA
    </i>
    <i data-label="Event Coordinator">
        Samarth Garg
    </i>
    <i data-label="Contact">
        9597443011
    </i>
    <i data-label="Event poster image url">
        img/premium/risa.jpg
    </i>
    <i data-label="Event Description">
        A day without laughter is a day wasted.
        -- Charlie Chaplin
        "Risa" which means happiness or laughter in Spanish is the title of the first ever college level comedy carnival across the country. Risa is a two day humor fest in which world famous comedians will be at your service making sure that you laugh your brains out and you actually "Role on Floor Laughing". In this addition of Risa we are featuring:
        1. East India Comedy
        One of the busiest comedy company and since its inception it stands in top 5 comedy groups of the country. They have been doing sell-out shows in North America and in India.
        2. Papa CJ
        Currently the BEST COMEDIAN of Asia he has toured sell-out shows across five continents. He is India's only entry to Fringe Festival and Melbourne International Comedy Festival.
        With these people as hosts one thing is sure that everybody present in the auditorium will go insane and will have the best and biggest dose of comedy in life.
        RISA also has India's most renowned comic strip maker "The Garbage Bin Studios" in the house. The only aim of this studio is to make you plunge in the world of astounding childhood memories and bring smiles and tears of joy to your face.
    </i>
    <i data-label="Registration fees">
        400(Day 1)
        &#8377;400(Day 2)
        &#8377;700(Both Days)
    </i>
</p>

<p class="premium" style="display: none">
    <i data-label="Event Name">
Game-a-thon
    </i>
    <i data-label="Event Coordinator">
Rahul Kant Tiwari
    </i>
    <i data-label="Contact">
9843869003
    </i>
    <i data-label="Event poster image url">
img/premium/gat.gif
    </i>
    <i data-label="Event Description">
Game-a-thon has been conducted for the last two year and is one of the most bankable events. The event will consist of 6 games i.e dota 2 ,c.s, cod, fifa, nfs and age of empires. Players will battle it out in these games to win the ultimate prize money.

Prize money will different for each game.
    </i>
    <i data-label="Registration fees">
CS :&#8377; 200
COD:&#8377; 200
FIFA:&#8377; 150
NFS:&#8377; 150
AOE:&#8377; 80
DOTA 2:&#8377; 200
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
        Gravitas Quiz Series
    </i>
    <i data-label="Event Coordinator">
        Manavi Muralidhar, Gautam Sridhar, Ritika Anil, Fahad Inbesat     </i>
    <i data-label="Contact">
        9865308606, 9787084625, 9597633837, 9655905650
    </i>
    <i data-label="Event poster image url">
        img/premium/gqs.png
    </i>
    <i data-label="Event Description"> 
    GEN Quiz: A fun quiz held every year by the Quiz Club on a variety of topics.
    SciTech Quiz: The event is a two round Quiz.We shall test the participants knowledge in technology and science which includes chemistry, physics and biology. All participants will learn a lot.
    B-Quizzed: It is a quiz-based event that will test the knowledge and awareness of the participants in the world of Business and will pit them against each other in this battle of grey cells.
A series of audio-visual questions from the field of business and will involve interesting questions related to recalling of brand names, identifying the company logos, famous business personalities and milestone financial developments. Then a Rapid Fire Round.
    LIVE QuizUp: LIVE QuizUp is one of the best selling event of last gravitas "" it is a based on the mobile game, QuizUp developed by Iceland-based Plain Vanilla Games.
This event is a real time version of the App. It roughly follows the same format with a few modifications.
QuizUp is a speed-based game.
      </i>
    <i data-label="Registration fees">
        100
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
Aerodominator 2.0
    </i>
    <i data-label="Event Coordinator">
Desai Harsh Dhananjay
    </i>
    <i data-label="Contact">
9629765909
    </i>
    <i data-label="Event poster image url">
img/premium/aerodominator.gif
    </i>
    <i data-label="Event Description">
This event is particularly based on how the team of 5 students are able to construct a plane within specified parameters.
The competition is intended to provide students with a real-life engineering exercise.
The mission is to design a light-weight, UAV style aircraft that can carry maximum payload with least empty weight.
    </i>
    <i data-label="Registration fees">
300
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
COOK OFF
    </i>
    <i data-label="Event Coordinator">
Arpit Shringi
    </i>
    <i data-label="Contact">
9159130168
    </i>
    <i data-label="Event poster image url">
img/premium/cook-off.png
    </i>
    <i data-label="Event Description">
This event is a productive but fun event, with some unique food and entertainment provided to keep things interesting. This is a great way to spend time with a lot of other smart, interesting techies while putting your skills towards something good in the world. 
As the event will start the participants will be given some brief instructions about the rule and the way to attempt the problems. This 12 hour event will be providing the participants with a specific set of questions. Based on one’s speed and ability to complete a task in the given timeframe correctly winners will be decided.    </i>
    <i data-label="Registration fees">
Free
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
VIT Auto Expo'15
    </i>
    <i data-label="Event Coordinator">
Spandan B
    </i>
    <i data-label="Contact">
7358508245
    </i>
    <i data-label="Event poster image url">
img/premium/auto-expo.jpg
    </i>
    <i data-label="Event Description">
Premium Event of gravitas displaying the most exotic super cars and bikes. It is a celebration of innovation in engineering, reflecting its growth over the years. The event will showcase bikes having a minimum of 600cc and cars having a total of thousands of horsepower put together. So don't miss the chance to get the glimpse of the world's most renowned cars and bikes of this generation.
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
Code-a-Thon
    </i>
    <i data-label="Event Coordinator">
Shubhodeep Mukherjee
    </i>
    <i data-label="Contact">
8098819952
    </i>
    <i data-label="Event poster image url">
img/premium/code-a-thon.png
    </i>
    <i data-label="Event Description">
Code-a-Thon is a 24 hour coding event designed to challenge the brightest of computer geeks on campus. We put to test not just their logical thinking through tricky problems to solve but also test their mental ability to resist fatigue and stress!

This has been an extremely successful event during GraVITas for a while now - and this is due to its ability to engage people creatively and critically through coding!
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
Merchantry
    </i>
    <i data-label="Event Coordinator">
Sambit Kundu
    </i>
    <i data-label="Contact">
8220151147
    </i>
    <i data-label="Event poster image url">
img/premium/Merchantry_reduced.gif
    </i>
    <i data-label="Event Description">
An Entrepreneurship event, each team will have to select a product from given set of products to be chosen randomly (real products). Benches of participants to sell their products. The participant can strategies to sell fewer products above the base price using their convincing skills or can sell more number of products at base price. At last their strategy must crack to make most profit.Each team will get an opportunity to advertise their product on stage by an Event ( AddZap) All team members can perform an on-stage advertisement of max 10 minutes.
    </i>
    <i data-label="Registration fees">
150
    </i>
</p>
<p class="premium" style="display: none">
    <i data-label="Event Name">
The Ultimate Engineer
    </i>
    <i data-label="Event Coordinator">
Krishna Teja Reddy
    </i>
    <i data-label="Contact">
9943444998
    </i>
    <i data-label="Event poster image url">
img/premium/ultimate-engineer.png
    </i>
    <i data-label="Event Description">
We are on the quest for an engineer who excels in all round fields of engineering and whose concepts of basic engineering sciences are clear. The different trades are the different disciplines of engineering and the ultimate engineer is expected to be the master of his/her specialization.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="premium" style="display: none">
    <i data-label="Event Name">
Futurepreneurs
    </i>
    <i data-label="Event Coordinator">
Sanyam Arora
    </i>
    <i data-label="Contact">
8110019796
    </i>
    <i data-label="Event poster image url">
img/premium/futurepreneurs.png
    </i>
    <i data-label="Event Description">
Do you have a natural inclination towards entrepreneurship ? Does the innate entrepreneur inside you feels trapped being surrounded by engineers ? Here's your chance to get your doze of entrepreneurship. Futurepreneurs'15 is a premium curtain raiser event of gravitas that puts you at the centre stage as CEO of an actual company. You are expected to overcome all the challenges and crisis that come your way  in the quest for profit and progress all for an astounding prize money of 25k.
Futurepreneurs'15 gives you a forum to interact, discuss and debate with fellow participants all united by one single passion for entrepreneurship. So come be a futurepreneur'15 !!!
    </i>
    <i data-label="Registration fees">
150
    </i>
</p>

<p class="premium" style="display: none">
    <i data-label="Event Name">
Start Up Street
    </i>
    <i data-label="Event Coordinator">
Nimish Sethi
    </i>
    <i data-label="Contact">
9092142128
    </i>
    <i data-label="Event poster image url">
img/premium/Startup-Street.gif
    </i>
    <i data-label="Event Description">
During the GRAVITAS phenomenon, we are planning to have this event for 36 hours on a stretch during which ideas will flow in and out . ideas will be rejected and ideas will be selected for future investment by the angel investors and companies.
    </i>
    <i data-label="Registration fees">
250
    </i>
</p>

<p class="premium" style="display: none">
    <i data-label="Event Name">
India Emerge Youth Summit 2015
    </i>
    <i data-label="Event Coordinator">
Shah Harsh Vipulkumar
    </i>
    <i data-label="Contact">
9943118986
    </i>
    <i data-label="Event poster image url">
img/premium/ieys.png
    </i>
    <i data-label="Event Description">
India Emerge Youth Summit (IEYS) 2015 is a summit that is going to be conducted for the 4th time in VIT. It is a forum where speakers from various fields of interest come on one platform and deliver key note addresses that are witnessed by the delegates of the summit.The theme of this year summit will be 'Rebuilding Tomorrow'. A summit where a revolution through our views, opinions and words shall aim to realize, reflect and rebuild.
    </i>
    <i data-label="Registration fees">
450
    </i>
</p>



<p class="premium" style="display: none">
    <i data-label="Event Name">
VIT CONCLAVE'15
    </i>
    <i data-label="Event Coordinator">
Sourav Kumar Singh
    </i>
    <i data-label="Contact">
9843980653
    </i>
    <i data-label="Event poster image url">
img/premium/conclave.png
    </i>
    <i data-label="Event Description">
CONCLAVE comprises two sessions per day culminating with a panel discussion. The panel will consist of speakers and faculty members who will have an interactive session with the students. Speakers shall discuss the current advancement in their respective fields. They shall widen the perspective of students and explain how they can design their own lives and how important it is, to take the right choices, keeping in mind the person’s own interests. The speakers will provide the students an insight into future career options and clarify their doubts and misconceptions.
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>


<!--    Robomania      -->
<p class="robomania" style="display: none">
    <i data-label="Event Name">
Robomaze
    </i>
    <i data-label="Event Coordinator">
Sukrit Gupta
    </i>
    <i data-label="Contact">
8220152650
    </i>
    <i data-label="Event poster image url">
img/robomania/robomaze.jpg
    </i>
    <i data-label="Event Description">
Robomaze is a fun event where brains and metal team up with strategy for a menacing battle. The participants have to build a gesture controlled robot
ROUND 1:
Time for one combat:5 minutes
The two gesture controlled robots of each group shall fight in a circular arena filled with sand,gravel and water puddles until one is back-stabbed by the other.
ROUND 2:
Time for one combat:10 minutes
The combat arena will be a perplexing beehive maze with obstacles .Gold coins shall also be kept on the passage,which the bots will take up.If none of the bots get back-stabbed over a long period of time,the number of gold coins claimed by each shall be counted and the winner ascertained.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
Lanka Reloaded 2.0
    </i>
    <i data-label="Event Coordinator">
Pranav Lad
    </i>
    <i data-label="Contact">
9943124084
    </i>
    <i data-label="Event poster image url">
img/robomania/lanka.gif
    </i>
    <i data-label="Event Description">
To build a manual off road robotic platform which can navigate a rough terrain and avoid natural & man made obstacles in the shortest amount of time without dropping the ball picked up.

Design a robot that can pick a ball and compete on an arena which has different types of terrain all over and the ball must be placed at certain height. The event mainly focuses on testing the mobility and picking mechanism of the robots. This event also tests your stability control and handling.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
RoboWars'15
    </i>
    <i data-label="Event Coordinator">
Shashwat Singh
    </i>
    <i data-label="Contact">
9943848407
    </i>
    <i data-label="Event poster image url">
img/robomania/robowars.jpg
    </i>
    <i data-label="Event Description">
It is a game of style, control, damage and aggression with the robots pitting each other in a deadly combat. These warriors will duel for honour and fraternity in arena of destruction with their actuating spikes, flipping tusks, angel grinders, hurling maces, pincers and loads more.

Design such destructive,defensive wired/wireless fighting robot and fight in the arena.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
Cric-o-bot 5.0
    </i>
    <i data-label="Event Coordinator">
Haarsh Chandra
    </i>
    <i data-label="Contact">
9787114690
    </i>
    <i data-label="Event poster image url">
img/robomania/cricobot.gif
    </i>
    <i data-label="Event Description">
This is the robotic form of the game cricket. In each round 2 participating team each consisting of 5 members, will play against each other. For batting team, only 1 bot is allowed in the arena. Participants are welcomed with their own bots (which has to alignour specification). In case of a failure of the above case, the team has to play with what we are providing. In case a batsman misses a ball he/she has to switch with his/her team mate. For bowling team, 2 fielding bots will be provided by us, which will be handled by 2 mates at a time. For bowling, the remaining mate will have to push the ball from the area marked in the arena.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
RoboGP
    </i>
    <i data-label="Event Coordinator">
Anujay Tiwari
    </i>
    <i data-label="Contact">
7639022286
    </i>
    <i data-label="Event poster image url">
img/robomania/roboGP.png
    </i>
    <i data-label="Event Description">
ROBOGP is a robotics event which basically involves racing of bot along
with testing its speed and control. It gives one the ultimate racing experience
which leaves them thrilled, with mind boggling obstacles and a race track which
perplexes that amaze them.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
AquaBot
    </i>
    <i data-label="Event Coordinator">
Siddhant Sorann
    </i>
    <i data-label="Contact">
8527810602
    </i>
    <i data-label="Event poster image url">
img/robomania/aquabot.png
    </i>
    <i data-label="Event Description">
A water based event where specifically designed robots will be exposed and compete in the dynamic aquatic environment.
The winner of this draining finale 50ft race would be awarded the title of the “THE VIT AQUABOT”.</i>
    <i data-label="Registration fees">
150
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
Dimensions
    </i>
    <i data-label="Event Coordinator">
Ashay Shah
    </i>
    <i data-label="Contact">
9944270073
    </i>
    <i data-label="Event poster image url">
img/robomania/dimensions.png
    </i>
    <i data-label="Event Description">
Dimensions is a robotic event which will test the presence of mind, creativity and the logical thinking of the opponent. The game consists of three players in each team and two teams will compete with one another in the event. The arena is of the dimensions 10x10 ft. sq. and each team will have an area 10X5 ft sq. to build their area. The areas will have first region, second region and third region marked. There are two phases in the game, Creation and Destruction.
First four minutes are given for construction, the first phase of the game. Each team is given a layout of how their city should look like. As soon as the timer starts, they have to start building the design with the help of objects scattered randomly in their area with their robot. After four minutes, the robots are halted, and points are given according to the number of objects correctly placed and the level of completion in building.
Destruction is the second phase, which has the duration of three minutes. Here the bots are placed in the opponent’s area, which they will then destroy. When the timer starts, the bots have to displace the objects that consist of the opponent’s city. After three minutes, the robots are again halted. Points are given according the displacement of the objects. The further an object it moved, the more points it has scored.

Buckle up for hands on experience with the bots and prizes worth 9k.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
Magneto
    </i>
    <i data-label="Event Coordinator">
Pritish Tripathy Debasis
    </i>
    <i data-label="Contact">
9952491117
    </i>
    <i data-label="Event poster image url">
img/robomania/magneto.png
    </i>
    <i data-label="Event Description">
Teams must build a wireless controlled bot; controlled solely by wrist movement.
The bot should navigate the track in minimum possible time by clearing all obstacles and checkpoints.
    </i>
    <i data-label="Registration fees">
100(with Bot),&#8377;150(without Bot)
    </i>
</p>
<p class="robomania" style="display: none">
    <i data-label="Event Name">
RobosTackle
    </i>
    <i data-label="Event Coordinator">
Harsha Teja
    </i>
    <i data-label="Contact">
9677354695
    </i>
    <i data-label="Event poster image url">
img/robomania/robostacle.jpg
    </i>
    <i data-label="Event Description">

    </i>
    <i data-label="Registration fees">
150
    </i>
</p>
<!--    Bits and Bytes       -->

<p class="bits" style="display: none">
    <i data-label="Event Name">
Code Scrooge
    </i>
    <i data-label="Event Coordinator">
Rishabh Saxena
    </i>
    <i data-label="Contact">
9629778720
    </i>
    <i data-label="Event poster image url">
img/bits/Code-Scrooge.gif
    </i>
    <i data-label="Event Description">
A coding event focusing on the various concepts of programming,real-world problems and the ability to solve the problems in a fast and efficient manner.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
Bug Tracker
    </i>
    <i data-label="Event Coordinator">
Abhidha Pandit
    </i>
    <i data-label="Contact">
9751644416
    </i>
    <i data-label="Event poster image url">
img/bits/bugtracker.gif
    </i>
    <i data-label="Event Description">
The main idea of the event is to related to bugs. Your mission is to find the bugs and make the code produce the desired output.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<p class="bits" style="display: none">
    <i data-label="Event Name">
C Tycoon 3.0
    </i>
    <i data-label="Event Coordinator">
Shubham Taneja

    </i>
    <i data-label="Contact">
9629780600
    </i>
    <i data-label="Event poster image url">
img/error/event.png
    </i>
    <i data-label="Event Description">

C Tycoon is a unique event that tests the participants not only on their programming skills but also their business and management virtues. Each team ( of maximum 2 members ) will be given a set of problems for which they will have to code a solution in conventional C. In order to code the program the team will have to buy various components of a C program for which they will be provided with virtual money in the start of each round. The team can earn extra money by means of bonus questions and solving in the shortest time. The teams with the best codes will advance to the next round where they can trade the entities not required by them anymore at their own price. The team that saves the maximum money will be declared the winner.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
Code-O-Poly
    </i>
    <i data-label="Event Coordinator">
Sakshi Gupta
    </i>
    <i data-label="Contact">
9943638485
    </i>
    <i data-label="Event poster image url">
img/bits/code-o-poly.gif
    </i>
    <i data-label="Event Description">
CODE-O-POLY is based on monopoly wherein coding elements are sold , as and when the teams arrive on it,basically we play monopoly with coding elements as the properties. The properties to be bought here are library functions,data types, arrays,input output console,templates,inheritance ,overloaded functions etc .
Now using only the bought properties one can program the code given with certain restrictions like :JAIL will restrict the number of lines in the program.CHANCE gives you the option of changing the program you have received.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
Code Relay
    </i>
    <i data-label="Event Coordinator">
Pranshu Poddar
    </i>
    <i data-label="Contact">
8110019792
    </i>
    <i data-label="Event poster image url">
img/bits/Code-relay.gif
    </i>
    <i data-label="Event Description">
Code-Relay is a purely coding based event where participants may use any platform for coding and may use any language that they feel comfortable with. Each participant is given the 1st question and asked to write a code to simulate the output ,on finishing the code the participant is given the next question which uses the output from the previous question which acts as a compulsory hint for the next question , without which, solving the next question's code is impossible.

The difficulty level of the questions increases gradually , and the hints from the outputs become tougher to crack.

In order to proceed one must be accurate and fast at solving the problem and simulating the output.    </i>
    <i data-label="Registration fees">
100
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
Crack Jack 4.0
    </i>
    <i data-label="Event Coordinator">
Ananya Goel
    </i>
    <i data-label="Contact">
9944142844
    </i>
    <i data-label="Event poster image url">
img/bits/crackjack.gif
    </i>
    <i data-label="Event Description">
• All the participants will be given different programs testing their knowledge in C(basics).They will have to write
• The team executing the programs the fastest will proceed to the second round.
• Selected teams will have to dispaly a portion of the code which they compiled in the first round.
• The other 19 teams will have to tell what the program is about.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
FTP Maze 2.0
    </i>
    <i data-label="Event Coordinator">
Harsh Saxena
    </i>
    <i data-label="Contact">
8608596621
    </i>
    <i data-label="Event poster image url">
img/bits/ftp.png
    </i>
    <i data-label="Event Description">
FTP Maze involves the participants in an engaging series of questions. The right answer takes the participant to the next question, the wrong answer takes them to an incorrect section, that is unrelated to the main theme of the other questions.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
Game of Codes
    </i>
    <i data-label="Event Coordinator">
Varun Gajendragadkar
    </i>
    <i data-label="Contact">
8680896270
    </i>
    <i data-label="Event poster image url">
img/bits/game-of-codes.png
    </i>
    <i data-label="Event Description">
This is an event where we have politics in game of thrones coupled with competitive programming. The beauty of this event is that people from non CS background can also participate as the houses are going to need negotiators to get help from others.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="bits" style="display: none">
    <i data-label="Event Name">
Jumble Coding 2.0

    </i>
    <i data-label="Event Coordinator">
Shubham Sagar

    </i>
    <i data-label="Contact">
8110020049

    </i>
    <i data-label="Event poster image url">
img/bits/jumblecoding.gif
    </i>
    <i data-label="Event Description">
A programming contest where participants are given simple problems to solve, the challenge coming from jumbled keyboards (this is done via a user interface, so the keyboards are unaltered in any way).

Here, the participant has to not only solve the given problem in time, but crack the jumbled keys first.


    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="bits" style="display: none">
    <i data-label="Event Name">
Polyglot
    </i>
    <i data-label="Event Coordinator">
Anchit Dhar
    </i>
    <i data-label="Contact">
9994409300


    </i>
    <i data-label="Event poster image url">
img/bits/polyglot.gif
    </i>
    <i data-label="Event Description">
To check the fluency of a programmer in multiple programming languages (as made obvious by the name).


    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="bits" style="display: none">
    <i data-label="Event Name">
Sudo-code
    </i>
    <i data-label="Event Coordinator">
Christine David
    </i>
    <i data-label="Contact">
9790615414
    </i>
    <i data-label="Event poster image url">
img/bits/sudo-code.jpg
    </i>
    <i data-label="Event Description">
Round 1:The preliminary round will be a paper based quiz on C/C++ which will test the basics of coding of the participants. The top 20 teams will qualify for the next round.
Round 2:In the second round participants will be given a code with errors which they will have to debug and get the output of the program. The first 5teams to finish this correctly within the specified time limit will qualify for the next round.
Round 3: This round involves the teams solving 9 output questions. The output to these questions will need to be put into a position in a Sudoku. The position where the number is to be put is the corresponding question number. The teams then have to solve the Sudoku in a specified time limit. The first three teams to complete this will be the winners.



    </i>
    <i data-label="Registration fees">
100
    </i>
</p>



<p class="bits" style="display: none">
    <i data-label="Event Name">
Reverse Coding
    </i>
    <i data-label="Event Coordinator">
Jayant Rohra
    </i>
    <i data-label="Contact">
9619776494
    </i>
    <i data-label="Event poster image url">
img/bits/reverse-coding.png
    </i>
    <i data-label="Event Description">
The entire idea of this event excels in its simplicity. Participants in teams of 2 are given an executable computer program to run, test, try with varying inputs of their own discretion and synthesize what the underlying code is. Following this, they are required to code the said program using any of the permitted languages (C, C++, Java, Python). The first person to successfully code the entire program within the given constraints wins.
    </i>
    <i data-label="Registration fees">
25
    </i>
</p>

<p class="bits" style="display: none">
    <i data-label="Event Name">
Virtual Getaway
    </i>
    <i data-label="Event Coordinator">
Stalin Sabu Thomas
    </i>
    <i data-label="Contact">
9994752227
    </i>
    <i data-label="Event poster image url">
img/bits/Virtual-Getaway.gif
    </i>
    <i data-label="Event Description">John Tracker (aka FrostBite27), one of the best hackers in the world. That's who you are.

Bank accounts, ATMs, phones, you name it. Nothing is too much of a challenge for you.

But now you want to leave all that behind. You have seen enough for one life. Only a hacker knows what it is like to constantly be on the run.

But where will you find refuge? How will you find refuge?

By hacking your way out.

There are people after you, your skills and your life. Technology comes at a price, and now you are unjustly indebted to the ruthless Mob. If things could have been better, they didn't; they only got worse. 'Someone' from the Mob leaked your details; and from 'just-some-guy', you have evolved into the Most Wanted criminal of the country.

Redemption and a free life does not come easy. To free yourself, you must hack into the International Security Agency's servers, the world's most secure server, and delete all records of your existence, and emerge as a new identity.

It is time to free yourself, time for that one last hack.

You are John Tracker. You must Get Away, Virtually.

Play as John Tracker in this epic game developed by IETE and the Q9 Studios.

Virtual Getaway - Everything is Connected /.\ Connection is Power.
</i>
    <i data-label="Registration fees">
80
    </i>
</p>


<!--    Applied      -->

<p class="applied" style="display: none">
    <i data-label="Event Name">
Chem-E-Clock

    </i>
    <i data-label="Event Coordinator">
Anshul Bhandari

    </i>
    <i data-label="Contact">
8220152190

    </i>
    <i data-label="Event poster image url">
img/applied/chem-e-clock.png
    </i>
    <i data-label="Event Description">
Make a chemical/mechanical device to measure time after a pre-set time t1, trigger a trap door to open and start an exothermic reaction. Capture the energy of this reaction into a fixed amount of water V and calibrate the reaction to bring the maximum temperature rise in the pre-defined time t2.
To find innovative ways to measure time and control a reaction without using electricity.
You have to try your hand at making a challenging model which incorporates multiple mechanisms into it like measuring time and triggering trap.

    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Chem-E-Car

    </i>
    <i data-label="Event Coordinator">
Harshil Gadhia

    </i>
    <i data-label="Contact">
8110020494

    </i>
    <i data-label="Event poster image url">
img/applied/chem-e-car.png
    </i>
    <i data-label="Event Description">
The event will consist of two rounds where the participants will be asked to build a car which runs using any exothermic chemical reactions. The winners will be decide based on the maximum distance traveled by the cars.

    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Apollo Infinite

    </i>
    <i data-label="Event Coordinator">
Kunj Jain

    </i>
    <i data-label="Contact">
9167936555

    </i>
    <i data-label="Event poster image url">
img/applied/Apollo Infinite.png
    </i>
    <i data-label="Event Description">
1)In this event we will need teams of 3-One technician, One pilot and One adviser.
2)They are put inside the mission to the moon ( any other place in space as this can be discussed better while brain storming )
3)Each decision they make will lead to a new crisis they face so its their decisions which put them in a tougher or easier spot
4)Final goal being reaching the moon and back.

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Aquanaut

    </i>
    <i data-label="Event Coordinator">
Aashay Vaibhav Singh

    </i>
    <i data-label="Contact">
8888084884

    </i>
    <i data-label="Event poster image url">
img/applied/aquanaut.png
    </i>
    <i data-label="Event Description">
Ever dreamt of building your own rocket prototype and flying it. Here’s your chance. In this event, participants have to build a Water rocket which is pressurised by compressed air. Water acts as the fuel. Be a Newton and test the Third law for yourselves. Event Format and Judging Criteria Event format: The event has two rounds. A water rocket has to be powered by pressurized water. The rocket has to be launched so that it has the minimum deviation from the line of projection and minimum deviation from the center line. Two trails will be given to each team (in each round) and the better of the two will be considered.

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Bucket Chute

    </i>
    <i data-label="Event Coordinator">
Apurva Singh

    </i>
    <i data-label="Contact">
9994452252

    </i>
    <i data-label="Event poster image url">
img/applied/bucket-chute.png
    </i>
    <i data-label="Event Description">
"In this event the main goal of the participant is to make a highly stable parachute like structure which can provide maximum stability and handle load of a small bucket.
• This is a team based event
• In this player wins if his parachute is more capable"

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
CADPRO

    </i>
    <i data-label="Event Coordinator">
Sai Thanuja

    </i>
    <i data-label="Contact">
9092415181

    </i>
    <i data-label="Event poster image url">
img/applied/cadpro.jpg 
    </i>
    <i data-label="Event Description">
Introduction BE A PRO Design Challenge will test your designing skills in 3D design software and here, you have to prove your expertise in a challenging scenario where you race against time. EVENT DESCRIPTION It will be an on-spot designing round. Participants will be given a problem statement at the time of event and they have to submit their design in the specified time limit. Models can be prepared in any CAD software (CATIA/ProE/AutoCad/Solidworks/Solidedge) and the final file must be prepared in IGES or STEP format. Each participant has to bring their own laptop , preinstalled with CAD software .

    </i>
    <i data-label="Registration fees">
100
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Chain Reaction

    </i>
    <i data-label="Event Coordinator">
Rima Chatterjee

    </i>
    <i data-label="Contact">
9952606106

    </i>
    <i data-label="Event poster image url">
img/applied/chain-reaction.jpg 
    </i>
    <i data-label="Event Description">

Participants will be given a set of questions,each with four options(multiple choice question).All the four options will lead to a different set of succeeding questions forming a pathway. The questions will be based on chemical reactions, periodic table and basic laboratory experiments. Top 20 teams solving the pathway maze of questions in minimum time will be promoted to the second round.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Chem-o-Matics 5.0

    </i>
    <i data-label="Event Coordinator">
Kendra Gandhi

    </i>
    <i data-label="Contact">
9944211151

    </i>
    <i data-label="Event poster image url">
img/applied/chemomatics.gif
    </i>
    <i data-label="Event Description">
"An event testing one’s knowledge in chemistry. It tests the basic knowledge in chemistry and skills at practical level. Also, it evaluates the participants’ ability to decode clues at a fast rate.
Participants have to run, find, decode the clues to win."

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Kraft Racing

    </i>
    <i data-label="Event Coordinator">
Rudra Thaker

    </i>
    <i data-label="Contact">
9585650008

    </i>
    <i data-label="Event poster image url">
img/applied/kraftracing.png
    </i>
    <i data-label="Event Description">
The event revolves around Hovercraft. Participants will have to make a howercraft in the given period of time and then race it on the track containing obstacles.

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Gear Up

    </i>
    <i data-label="Event Coordinator">
Rohit Jaiswal

    </i>
    <i data-label="Contact">
9585771119

    </i>
    <i data-label="Event poster image url">
img/applied/gearup.png
    </i>
    <i data-label="Event Description">
In this event the participants have to design a race car which will be remote controlled. The car has to be remote operated and has to complete 3 laps around the circuit constructed .The participants are required to design a car using wireless remote controlling provided they are not readily purchased from the market . The car , which the judges believe are not authentic will be eliminated on the spot .The teams will be allowed a warm up lap to tune the handling and other aspects .

    </i>
    <i data-label="Registration fees">
35
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Hydranoid Accent 2.0

    </i>
    <i data-label="Event Coordinator">
Siddharth D’Souza

    </i>
    <i data-label="Contact">
9655860308

    </i>
    <i data-label="Event poster image url">
img/applied/HYDRANOID15.png
    </i>
    <i data-label="Event Description">
Teams have to make a rope climbing machine using only hydraulic mechanisms, should be able to push the ball from an adjacent platform. In this action it will have to compete with another machine in a knockout tournament.

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Interstellar

    </i>
    <i data-label="Event Coordinator">
Shivani Gupta

    </i>
    <i data-label="Contact">
9943638476

    </i>
    <i data-label="Event poster image url">
img/applied/INTERSTELLAR.png
    </i>
    <i data-label="Event Description">
"Find the clues left out in space, follow them up and find the planet which supports life like earth and save millions.
They will keep following the clues, like constellations, anomalies in space or planets. As the teams find the clues and follow them they will later reach the planet where life can exist and the first team who finds the planet wins."

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Caterpuller and Catapultball

    </i>
    <i data-label="Event Coordinator">
Aman Sinha

    </i>
    <i data-label="Contact">
9626201113


    </i>
    <i data-label="Event poster image url">
img/applied/catapult.jpg
    </i>
    <i data-label="Event Description">
Participants have to pass the ball through the ring using the given material. Angle of the tube can be set by the participants. The concept behind this event is projectile motion.

We will be providing the participants with a canon which will be used to shoot the ball.One of the participant will hold the canon and the other participant will stretch the elastic material in order to pass the ball through the ring"

    </i>
    <i data-label="Registration fees">
75
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Mech-a-niser

    </i>
    <i data-label="Event Coordinator">
Karthik

    </i>
    <i data-label="Contact">
8678902580

    </i>
    <i data-label="Event poster image url">
img/applied/mechaniser.jpg
    </i>
    <i data-label="Event Description">
The participant is given various sets of random materials from day to day life and he is required to pool in his imagination and come up with an innovative design (contraptions) or mechanisms. It need not be a working model but needs to show the functionality of the created design i.e. if the participant creates a car it needs to move.

    </i>
    <i data-label="Registration fees">
100
    </i>
</p>



<p class="applied" style="display: none">
    <i data-label="Event Name">
Reverse Engineering

    </i>
    <i data-label="Event Coordinator">
Taniya Chopra

    </i>
    <i data-label="Contact">
8220576485

    </i>
    <i data-label="Event poster image url">
img/applied/REVERSE-ENGINEERING.png
    </i>
    <i data-label="Event Description">
"This event is all about disassembling and reassembling any given product by a team of two in a limited time.
The one who is able to complete the procedure in the given time frame wins."

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>



<p class="applied" style="display: none">
    <i data-label="Event Name">
Roller Coaster 4.0


    </i>
    <i data-label="Event Coordinator">
G.Sai Manvith Reddy


    </i>
    <i data-label="Contact">
7639799093


    </i>
    <i data-label="Event poster image url">
img/applied/roller-coaster.jpg
    </i>
    <i data-label="Event Description">
The participants have to devise a roller coaster with their personal and customized design with desired twists and turns. The participants have to devise a roller coaster to make use of the potential energy during the fall and kinetic energy during the rise.
Contraptions will be conducted in two stages.
1. The first stage is comprises of Abstract submission.
2. Teams selected on the basis of abstracts will be invited for the final round to be held during GRAVITAS.

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>





<p class="applied" style="display: none">
    <i data-label="Event Name">
The self made engineer


    </i>
    <i data-label="Event Coordinator">
Abhilekh Tripathy


    </i>
    <i data-label="Contact">
9952878502


    </i>
    <i data-label="Event poster image url">
img/applied/self-made-engineer.jpg
    </i>
    <i data-label="Event Description">
The first round includes a paper presentation round in which they will be given a set of things that have been untouched for at least a decade or even a century. For example- umbrella, wallet, television set. Now, with every “UNTOUCHED ” thing they will be provided with the problems in the design and consumer complains
So, now the participants have to provide an abstract of their ideas online. The good abstracts will be shortlisted and after some suggested changes , they will have to come down to vit to present their product design and presentation in front of the panel . the panel will include experts from the industry dealing in the production of the given PRODUCT .


    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="applied" style="display: none">
    <i data-label="Event Name">
Swing-O-Golf


    </i>
    <i data-label="Event Coordinator">
Akarshita Chopra


    </i>
    <i data-label="Contact">
9952603488

    </i>
    <i data-label="Event poster image url">
img/applied/swing-o-golf.jpg 
    </i>
    <i data-label="Event Description">
"The event will be based upon the participants’ knowledge regarding a pendulums oscillatory movement and on the concepts relating to collision, mass and tension. It’s basically a mini-golf which will be played using a pendulum of variable length.
"


    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Maze hustle


    </i>
    <i data-label="Event Coordinator">
Ajinkya Rege


    </i>
    <i data-label="Contact">
9626194440


    </i>
    <i data-label="Event poster image url">
img/applied/maze-hustle.png
    </i>
    <i data-label="Event Description">
The participants will be given with 1.5 cardboard sheets per team and 1 thermocol sheet. Using these cardboards they have to make a horizontal maze on the thermocol sheet.. They have to use cardboard to make troughs and crests within the pathways of the maze to increase the time of the ball inside the maze.. They have to take care that the ball does not run out of energy midway through the maze or that it does not get stuck. For smooth traveling of the ball the corners of the maze will have to be smooth and gradual. The participants have to take note of the law of Conservation Of Energy when they make crests within the pathways..


    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Contraptions


    </i>
    <i data-label="Event Coordinator">
Shashank Acharya


    </i>
    <i data-label="Contact">
9655908583


    </i>
    <i data-label="Event poster image url">
img/applied/contraption.png
    </i>
    <i data-label="Event Description">
Contraptions is a event based on conversion of energy from one form to another while accomplishing targets given as modules to them, by using a contraption set up.


    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<p class="applied" style="display: none">
    <i data-label="Event Name">
Master of Morse Decoding


    </i>
    <i data-label="Event Coordinator">
Sahil Mathur


    </i>
    <i data-label="Contact">
9843967602

    </i>
    <i data-label="Event poster image url">
img/applied/master-of-morse.jpg
    </i>
    <i data-label="Event Description">
Every team will be provided with a problem statement and materials to work with. The team should utilise the materials to conjure mechanisms at every level of the event. As the teams surpass each level, the problem statements increase in complexity and the mechanisms conjured should match the complexity and intricacy of the problem statement.


    </i>
    <i data-label="Registration fees">
50
    </i>
</p>



<!--    Management     -->

<p class="management" style="display: none">
    <i data-label="Event Name">
Bull Street Strategist
    </i>
    <i data-label="Event Coordinator">
Abhilekh Tripathy
    </i>
    <i data-label="Contact">
9952878502
    </i>
    <i data-label="Event poster image url">
img/manage/bull-street.gif
    </i>
    <i data-label="Event Description">
As the name suggests, in the end you need to hit the bull’s eye to win the handsome amount . whenever the term stocks and share marketing pops out, the persons who know the field will suddenly feel an adrenaline rush in their bodies.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="management" style="display: none">
    <i data-label="Event Name">
Magnas
    </i>
    <i data-label="Event Coordinator">
Varun Gajendragadkar
    </i>
    <i data-label="Contact">
8680896270
    </i>
    <i data-label="Event poster image url">
img/manage/Magnas.gif
    </i>
    <i data-label="Event Description">
Round 1: Business quiz
Round 2: Team divided into 3 parts: Management- Group Discussion
Administration- Case Study
Marketing- Convincing a sponsor to give sponsorship
Round 3: Teams will be representing well known companies and will be launching a new product away from their domain. (For eg, Philips should not make any electrical device)
    </i>
    <i data-label="Registration fees">
35
    </i>
</p>
<p class="management" style="display: none">
    <i data-label="Event Name">
Management Guru 3.0
    </i>
    <i data-label="Event Coordinator">
Mokshita Vashisht
    </i>
    <i data-label="Contact">
9843954570
    </i>
    <i data-label="Event poster image url">
img/manage/management-guru.jpg
    </i>
    <i data-label="Event Description">
ROUND 1 : Chalk and Cheese
Participants would be made to sell extremely different products simultaneously.

ROUND 2 : AdMad
The qualifying contestants would be required to create an advertisement about a virtual product.

ROUND 3 : Impress ME.
The teams would be required to impress the judges with convincing PowerPoint presentations regarding challenging situations.

ROUND 4 : Stressed Out !
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="management" style="display: none">
    <i data-label="Event Name">
OP-ERA
    </i>
    <i data-label="Event Coordinator">
Abhilekh Tripathy
    </i>
    <i data-label="Contact">
9952878502
    </i>
    <i data-label="Event poster image url">
img/manage/opera.gif
    </i>
    <i data-label="Event Description">
It will include all the operations that play an important part in building up a start up.the first round will start with the participants being given a product / company( whose product may be anything related to that company). they will be made the ceo of that particular start up. the strategies and everything should be new in the 2nd round .neither of the teams should have used the same strategies. if they are going with the same brand name , then they have to justify their decision for the same.
    </i>
    <i data-label="Registration fees">
75
    </i>
</p>
<p class="management" style="display: none">
    <i data-label="Event Name">
The last second
    </i>
    <i data-label="Event Coordinator">
Kunwar Agarwal
    </i>
    <i data-label="Contact">
9943777381
    </i>
    <i data-label="Event poster image url">
img/manage/last-second.gif
    </i>
    <i data-label="Event Description">
An entrepreneur needs to work with people of different domain and interests in order to be successful. In this event people come in team of two . Each team consisting of a smart and an active memberThe active member of the team has to get into this arena, which contains various tasks and obstacles on the way. While the smart one has to sit and answer questions. The essence of the game is that while the two members are playing totally different games, in order to win they have to finish the games with time difference of not more than 60 seconds.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="management" style="display: none">
    <i data-label="Event Name">
House of Brands
    </i>
    <i data-label="Event Coordinator">
Nitika Gill
    </i>
    <i data-label="Contact">
9998021507
    </i>
    <i data-label="Event poster image url">
img/manage/hob-logo.gif
    </i>
    <i data-label="Event Description">
In this event the participants represents various companies. They have to 
 about their companies and the best products of their company in the market. The participants representing the respective companies has to make it a point to make their company win.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="management" style="display: none">
    <i data-label="Event Name">
Vyapaar Mantra
    </i>
    <i data-label="Event Coordinator">
Chitransh Pratyush
    </i>
    <i data-label="Contact">
9943931118
    </i>
    <i data-label="Event poster image url">
img/manage/vyaapar-mantra.jpg
    </i>
    <i data-label="Event Description">
Rushing through the roads of experience and strategy, stroke the bulls eye with your own unique BIZ PLAN???... Share and show your common vision and reach to the heights of your capabilities.
Two sets of Plan should be prepared for the second/final round (if qualified).
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<!--    Informals    -->

<p class="informal" style="display: none">
    <i data-label="Event Name">
BattleField
    </i>
    <i data-label="Event Coordinator">
Shubham Kumar
    </i>
    <i data-label="Contact">
9655905498
    </i>
    <i data-label="Event poster image url">
img/informals/BattleField.png
    </i>
    <i data-label="Event Description">
This is the typical capture the flag game where teams compete each other.
1st round will be played in a big room or in a ground (with obstacles blocks etc.) where 4 teams will compete. The 4 teams will keep their flags in 4 different places far from each other such that it is partially hidden but can be seen when close. When the flag is kept it should be in such a way that a player can run and grab it. They will be given time to put the flags in position. After the time is complete the teams will come together in their circles. If a person from a team finds one they should run towards their circle and place the flag and where the whistle will be blown thrice meaning a flag is taken and whichever the team is they have 1 minute to go and get it back.    </i>
    <i data-label="Registration fees">
200
    </i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Battlefield Scientifica</i>
    <i data-label="Event Coordinator">Arpita Dhir</i>
    <i data-label="Contact">9597729298</i>
    <i data-label="Event poster image url">
img/informals/battlefield-sci.jpg    </i>
    <i data-label="Event Description">This event is based on the game of Dungeons and Dragons with a technical spin. Each participant will be assigned a particular scientist, selection of which will be random. Each scientist will have a special "power" which will related to the field of the scientist. Using these powers and technical knowledge, each participant will be required to navigate through a path. Each path will comprise of 10 different situations. Each participant will be allowed to select their own path and hence will face 10 different situations. They must overcome the obstacles they face in each situation by using their technical knowledge and powers. The first 3 participants to finish the task will win.</i>
    <i data-label="Registration fees">100</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Beyblade</i>
    <i data-label="Event Coordinator">Nehul Agarwal</i>
    <i data-label="Contact">9994720280</i>
    <i data-label="Event poster image url">
img/informals/beyblade.gif
    </i>
    <i data-label="Event Description">Basically there will be a beyblade fight.We might be in college but its time to cherish our childhood days.Extremely fun filled event and will give a break to the students from hardcore technical action.We will form a beyblade court in which at a time 5 participants will fight.
    </i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Desi Safari</i>
    <i data-label="Event Coordinator">Udita Upadhyay</i>
    <i data-label="Contact">7094580100</i>
    <i data-label="Event poster image url">
img/informals/desi-safari.jpg
    </i>
    <i data-label="Event Description">Its a funny race leading you to the feel of journey into the wild and a massive collection of the games you had heard of but never tried .
Now its time for you to come onto this funny race which could earn you the feel of your childhood.
It contains hitting,searching,jumping,sacking,eating,running and the surprise you have been waiting for.</i>
    <i data-label="Registration fees">100</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Don't tell me why? 5.0</i>
    <i data-label="Event Coordinator">B Bhavya</i>
    <i data-label="Contact">8939891156</i>
    <i data-label="Event poster image url">
img/informals/dtmy.gif
    </i>
    <i data-label="Event Description">This is an online event which challenges the participant to write a spoof science paper. The participant will be asked a “Tell me why” question to which the participant’s answer should be anything but the true explanation.
The participants can envelope their outlandish answers with innovation, creativity and a tinge of humor in a strict adherence to the universal format of a Scientific Paper. The participant is allowed to test their hypothesis with nonsensical experiments and validate their results with wacky graphs and figures and report their bizarre explanation.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Dynasty</i>
    <i data-label="Event Coordinator">Shreya Sreekumar</i>
    <i data-label="Contact">9943248886</i>
    <i data-label="Event poster image url">
img/informals/Dynasty.gif
    </i>
    <i data-label="Event Description">The event has different forms of chess and is an improved version of the event ‘MONARCHY’.
During the course of the game the players can give the pieces they have captured to their teammate and they can place it on the chess board under certain rules. A win in the form of checkmate on any board results in victory for the team.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Faking News</i>
    <i data-label="Event Coordinator">Varun Gajendragadkar</i>
    <i data-label="Contact">8680896270</i>
    <i data-label="Event poster image url">
img/informals/faking-news.png
    </i>
    <i data-label="Event Description">This event will consist of two rounds. The first round being a written round. In the first round, we'll be giving the participants a headline to which they have to write an article which should be as satirical as possible. In round one, the participants will be judged on their grammar, punctuation and their writing skills; especially humor. The top 16 people will be chosen and pairs of 2 will be made at random. Every team then will be given a "Breaking news" on spot. One of the persons will be an interviewer and the other will be the interviewee. The interview must be about that news and again must be as satirical and humorous as possible. After a certain amount of time, their roles will be reversed.In round 2 they will be judged on their creativity, spontaneity and humor. The best team will be declared as the winner.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Forensics</i>
    <i data-label="Event Coordinator">M Harshavardhan Reddy</i>
    <i data-label="Contact">9629765799</i>
    <i data-label="Event poster image url">
img/informals/forensics.jpg
    </i>
    <i data-label="Event Description">One of all who committed a murder?
Get ready to comb through fingerprints and work through piles of forensic evidence to find out who killed whom. If you are fascinated by murder and mystery, here's your chance. Fulfill your childhood dream and nab the cold-blooded killer, only at Forensics.
</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Junkyard Genius 3.0</i>
    <i data-label="Event Coordinator">Abhidha</i>
    <i data-label="Contact">9751644416</i>
    <i data-label="Event poster image url">
img/informals/jnkg.gif
    </i>
    <i data-label="Event Description">The participants  are supposed to do come up with a useful and creative product from the things(junk) given to them. They are free to make anything. For example, a chandelier/ wall hangings, boats, any stands/ holder, or any other show piece. </i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">One Hundred Forty</i>
    <i data-label="Event Coordinator">Shreyansh Mittal</i>
    <i data-label="Contact">9843896109</i>
    <i data-label="Event poster image url">
img/informals/140.gif
    </i>
    <i data-label="Event Description">We would keep a brief interactive workshop on concise writing by the ttt crew. Concise writing is related to summarizing large literary works into a very tiny 3 liners, of maximum 140 Characters. Terribly Tiny Tales is a Mumbai Based company specializing in just that. Post the workshop we will be having a competition called The Meme Tales. It would consist of the following rounds.</i>
    <i data-label="Registration fees">100</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">R.O.A.R.</i>
    <i data-label="Event Coordinator">Harsh Vardhan Jain</i>
    <i data-label="Contact">8110020451</i>
    <i data-label="Event poster image url">
img/informals/roar.gif
    </i>
    <i data-label="Event Description">We are collaborating with PETA India to create awareness regarding animal cruelty and to raise our voices against it. ROAR comprises of a Walking Campaign along with a Documentary screening and in addition to this will also be showcasing a newly developed technology by PETA itself.</i>
    <i data-label="Registration fees">- (Free)</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">SNOOK ball</i>
    <i data-label="Event Coordinator">Abhisheik Pratap</i>
    <i data-label="Contact">9524475599</i>
    <i data-label="Event poster image url">
img/informals/snookball.png
    </i>
    <i data-label="Event Description">The event is football snooker and is same as snooker but the difference is that it will be played by footballs in place of balls of snooker and in place of pool stick it will be played by foot. all the rules of snooker will be applied here in football snooker. ports will be made by digging hole in ground.
there will be 16 footballs one white football 7strips(painted like checks also numbered from 9 to 15) and 8solids(painted plain with different colours and numbered from 1to8) .
finally when both the solid and strips will be ported final game will be of black solid painted ball.player will have to identify first in whichever port he /she is going to port.if he ports in wrong port then he/she will lost the game. there will be total 6 ports in the rectangular arena.four on corners and 2 on the middle of breadth of arena.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Suits</i>
    <i data-label="Event Coordinator">Sharvari Deshpandey</i>
    <i data-label="Contact">8012357390</i>
    <i data-label="Event poster image url">
img/informals/suits.png
    </i>
    <i data-label="Event Description">
1)This event depicts the scene of courtroom
2)There will be two teams (each comprising of 2 participants) , one team being the victim's lawyers and the other being the defense lawyers.
3)We will provide them a case and judge them.
4)The teams that win the first argument/case will be selected for second case Which will take place on 2nd day of Gravitas.
5)The next case will be tougher than first and the two teams winning the second round will proceed to third round taking place on 3rd day of gravitas.
6)Winners of the last case will be the winners of SUITS!</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Switches</i>
    <i data-label="Event Coordinator">Disha Sarkar</i>
    <i data-label="Contact">9884142385</i>
    <i data-label="Event poster image url">
img/informals/switches.jpg
    </i>
    <i data-label="Event Description">This event is on the lines of the popular game ‘Block and Tackle’. Here, the participant will be given a topic on which he has to come up with both opposition and proposition points. When the judge says ‘Block’, the participant must speak in support of the topic and when he says ‘Tackle’, the participant must speak against the topic. The judge will shift randomly from ‘block’ to ‘tackle’ and vice versa. The participant must maintain his flow of speech.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Takeshi's Castle - The Square Maze</i>
    <i data-label="Event Coordinator">Kranthi Kumar Katam</i>
    <i data-label="Contact">9865313052</i>
    <i data-label="Event poster image url">
img/informals/takeshiscastle.gif
    </i>
    <i data-label="Event Description">For the first time in VIT we bring you to the world's famous game show of all time. This event 'The Square Maze' is one of the most fun event ever made in Takeshi's Castle. In this event contestants make their way through a blind curtained maze made of square rooms in which contestants will enter in one of the rooms in the square tent which consists of various square rooms. The contestants should make their way to the exit of the maze by passing through the square rooms and there is only one possible exit among the many dummy ones. The contestants should avoid the encounter Ghosts who will be roaming inside the Maze. If they are caught by one of these Ghosts then you will be chased in the maze until you find your way out. If the contestants make their way out through the right their exit they will be awarded based on their performance and time constraint.

If the contestants on a particular day of the fest are the fastest in finding their way out of the maze without being caught by the ghosts they will be given the daily challenge prize on the end of day.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Trekker Ingredients</i>
    <i data-label="Event Coordinator">Hussain Khan</i>
    <i data-label="Contact">9600282715</i>
    <i data-label="Event poster image url">
img/informals/trekkeringredients.gif
    </i>
    <i data-label="Event Description">Event comprises of physical tasks which are randomly picked by contestants from a bowl of options. Tasks include: (a) To jump the furthest when competing against a trekking member. (b To race against a trekking member of the individuals random picking (c) To reach an object placed high up by jumping or being boosted by an allotted team member. (d) When placed in a team of two, to be able to win a tug of war match.
When each task is successfully done, the cumulative time taken is used to judge each contestant. </i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Vision Mania</i>
    <i data-label="Event Coordinator">Nimesh Khandelwal</i>
    <i data-label="Contact">9952376655</i>
    <i data-label="Event poster image url">
img/informals/vision-mania.png
    </i>
    <i data-label="Event Description"></i>
    <i data-label="Registration fees">100</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">PAC-WAY</i>
    <i data-label="Event Coordinator">Akhil Goel</i>
    <i data-label="Contact">9994440042</i>
    <i data-label="Event poster image url">
img/informals/pacway.gif
    </i>
    <i data-label="Event Description">Here we want to play this epic game on a larger game, with a slight modification, using SEGWAY.
In this event, a maze with the help of tyres will be created. It has two entry points through which participants will be entering the maze on their segways. There will be 10 inflated helium balloons tied to a string and a stone, in the path of the participant in the maze. A pointed material will be attached on the rear of the segway. Participants will have to burst the balloons and reach the centre of the maze where one GOLDEN EGG is kept. the game ends as the golden egg is taken.</i>
    <i data-label="Registration fees">150</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">The Amazing Race</i>
    <i data-label="Event Coordinator">Kinnri Sinha</i>
    <i data-label="Contact">9952126466</i>
    <i data-label="Event poster image url">
img/informals/amazing_race.png
    </i>
    <i data-label="Event Description">Bringing the famous American Reality Game Show to VIT, this event is a thrilling Race around the campus but with a technical touch to it. Different technical tasks are given to the teams for different rounds. The teams that are farthest behind get eliminated as the race progresses and then the first team to arrive at the Final destination wins the race. The race comprises of 5 challenges spanning over 2 days.</i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Dark Race</i>
    <i data-label="Event Coordinator">Abhinav Chanana</i>
    <i data-label="Contact">9629768972</i>
    <i data-label="Event poster image url">
img/informals/dark-race.jpg
    </i>
    <i data-label="Event Description">After the immense success and phenomenal response received in graVITas'14 ,we plan to conduct the DARK RACE again- a race event starting after sunset to flag off graVITas'15. The race is an excellent way to start the fest as it fills the participants as well as the viewers with a lot of enthusiasm and energy.Our aim for conducting this event would be to promote the motto of graVITas this year DESIGN! CREATE!! PATENT!!! or more distinctively EMPOWER:Design your future.
Event Layout- It will be a 4 km race whose full length track would be inside VIT itself. Neon glow sticks would be provided to the participants. The race would promote the tag line of graVITas'15.
This event will serve as an effective tool to promote our motto throughout the campus.</i>
    <i data-label="Registration fees">- (Free)</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Caption Me!</i>
    <i data-label="Event Coordinator">Animesh Kumar Sahu</i>
    <i data-label="Contact">9943634944</i>
    <i data-label="Event poster image url">
img/informals/caption.png
    </i>
    <i data-label="Event Description"></i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Beg Borrow Steal</i>
    <i data-label="Event Coordinator">Shlok Tekriwal</i>
    <i data-label="Contact">8754779767</i>
    <i data-label="Event poster image url">
img/informals/beg-borrow-steal.png
    </i>
    <i data-label="Event Description">It is a fun, outdoor, informal event.The rules of the game are simple, you will be give a bucket list of things which you have to acquire. You either beg, borrow or steal and in round two you have to perform embarrassing tasks in public. This event gives you the oppurtunity to become the ultimate JUGAADU or a BESHARAM all  for an amazing price money of 5000. So come be a part of the hysteria.  </i>
    <i data-label="Registration fees">50</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Laser Tag</i>
    <i data-label="Event Coordinator">Faizan Khan</i>
    <i data-label="Contact">9943742111</i>
    <i data-label="Event poster image url">
img/informals/lasertag.png
    </i>
    <i data-label="Event Description">LASER Tag is a live game that simulates an actual battlefield. It is similar to the classic Counter Strike wherein you strategize with your team on how to defeat your opponent. Laser Tag is a team activity that involves the use of hand –held infrared-emitting targeting device. So this means no pain, as targeting or shooting is done via light or simply put, laser .
The game is played with 5 people in each team. Each team’s mission is to shoot all players on the other team. Laser Tag team missions help the team strategize on LIVE, ACTUAL battlefield arena.
</i>
    <i data-label="Registration fees">100</i>
</p>
<p class="informal" style="display: none">
    <i data-label="Event Name">Human Foosball</i>
    <i data-label="Event Coordinator">hari</i>
    <i data-label="Contact">8344422660</i>
    <i data-label="Event poster image url">
img/informals/human-fooseball.png
    </i>
    <i data-label="Event Description">A life size version of the classic game of Foosball. Teams compete on the arena where the aim is to score maximum number of goals keeping the rules in mind. </i>
    <i data-label="Registration fees">100</i>
</p>

<!--    Builtrix    -->

<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Hassle Free City
    </i>
    <i data-label="Event Coordinator">
Harpreet Singh Sandhu
    </i>
    <i data-label="Contact">
9944940188
    </i>
    <i data-label="Event poster image url">
img/builtrix/hassle-free-city.jpg
    </i>
    <i data-label="Event Description">
You might have watched Hollywood movie Resident Evil, thoughts might came to your mind that how one can make a beehive structure under a city and that even 1000Õs of meters under the ground. These structures are not possible today but can be made in future. Today we have drainage system which is a very big network that keeps a city clean and hassle free. It take a huge effort to dig 100 meters of ground and lay down pipes and sewers with maintaining the flow of drain. In order to make this effort understandable to all, You can design your own city and make itÕs drainage without hassle.
    </i>
    <i data-label="Registration fees">
40
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Bitzer
    </i>
    <i data-label="Event Coordinator">
Kunal Thakur
    </i>
    <i data-label="Contact">
9465424039
    </i>
    <i data-label="Event poster image url">
img/builtrix/BITZER.gif
    </i>
    <i data-label="Event Description">
BitzerÕ turns on its head in that where most other events seek to simplify a complex problem, this requires you to enthrall the judges and the audience with your ability to convolute the most simplest of actions with an infinite array of steps!!

Put your basic engineering skills to test with so many twists and turns.And then all you need is planning, innovation, efficiency in steps and use of material to stay in the reckoning.

    </i>
    <i data-label="Registration fees">
35
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Brick Up
    </i>
    <i data-label="Event Coordinator">
Niladri Chaki
    </i>
    <i data-label="Contact">
9994281700
    </i>
    <i data-label="Event poster image url">
img/builtrix/brick-up.png
    </i>
    <i data-label="Event Description">
Introduction Interlocking blocks are like 2 adjoining pieces of a jigsaw puzzle. Each block has a projection at one end and a depression at the other. The projection of one block fits in to the depression of the next so that they always align perfectly. The blocks have vertical holes in them which have a double purpose. . Interlocking blocks may not solve all construction problems, but they do resolve many issues associated with traditional materials. Participants have to design the bricks using the plaster of Paris sheet that will be given to them at event.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Krazy Bridge
    </i>
    <i data-label="Event Coordinator">
Sapan Sheth
    </i>
    <i data-label="Contact">
9944578383
    </i>
    <i data-label="Event poster image url">
img/builtrix/krazy-bridge.png
    </i>
    <i data-label="Event Description">
A bridge is a structure built to span and provide a passage over a physical obstacle. This event will test your skills to approach the problem in an innovative manner. With just scrap, you are expected to build a bridge that can bear maximum load and undergoes minimum deflection. You have the freedom on the type of bridge you construct.

The bridge will be tested on the basis of its strength and the load it can bear.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
City Tycoon - Dream Big City
    </i>
    <i data-label="Event Coordinator">
Ashutosh Singh Rathore
    </i>
    <i data-label="Contact">
9944625725
    </i>
    <i data-label="Event poster image url">
img/builtrix/CITY-TYCOON.gif
    </i>
    <i data-label="Event Description">
The event is about making a layout of a city which would include all the major amenities required in a city . It not will test the planning abilities of the students but will also give them an idea of utilizing a given piece of land in the best possible way .
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Clash of Clans
    </i>
    <i data-label="Event Coordinator">
Dharmil Baldev
    </i>
    <i data-label="Contact">
9843979111
    </i>
    <i data-label="Event poster image url">
img/builtrix/clash-of-clans.jpg
    </i>
    <i data-label="Event Description">
A totally strategy based event which can be helpful to develop skills of making real life strategies and business strategies. In this event, first the two teams will buy some required material with the help of their virtual money in an auction . In the auction , leader of all teams will come for an auction where they will purchase their required materials. After that with the help of that material the team will build their own clan. The teams can also put some defence for their clan. after that with the help of bazooka and catapult the opponent team will destroy the the clan.

    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Connectify
    </i>
    <i data-label="Event Coordinator">
Simran singh
    </i>
    <i data-label="Contact">
9952105411
    </i>
    <i data-label="Event poster image url">
img/builtrix/connectify.jpg
    </i>
    <i data-label="Event Description">

ItÕs an event with 3 members in a TEAM. There will be a source and collector tank of water separated by a distance of 1.5 metre, which is termed as point A and point B respectively. Point A is 2 ft above ground and point B touches ground. Teams will be provided with a specific no. of T,L,X shaped pipe joints and small PVC pipes.They have to connect point A to B with the help of these materials. After completion, 1 litre of water will be poured. Water should be collected in the collecting tank.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Crane-o-logy
    </i>
    <i data-label="Event Coordinator">
Bharat Maniam
    </i>
    <i data-label="Contact">
9944671133
    </i>
    <i data-label="Event poster image url">
img/builtrix/craneology.jpg
    </i>
    <i data-label="Event Description">
Participants are required to make a tower crane from the given materials such as toothpicks, ice cream sticks and adhesives and attach a self-made pulley to lift weights.
¥ The pulley which will be constructed separately has to be attached at the end of the lever Ðarm and must have a load bearing container at the end.
¥ Varying loads will be provided which are to be lifted without pulling the rope manually.
¥ Over-lap criteria - Not more than 2 sticks must have a complete side-side overlap
    </i>
    <i data-label="Registration fees">
75
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Zenith
    </i>
    <i data-label="Event Coordinator">
Manish
    </i>
    <i data-label="Contact">
8098720999
    </i>
    <i data-label="Event poster image url">
img/builtrix/Zenith.gif
    </i>
    <i data-label="Event Description">
ÔZenithÕ,  The participants will be given an arc on which they have to construct a bridge using maximum 30 bricks with gravel, sand and small stones for the support. There will also be a time barrier of 30 minutes. After the time is over, the strength of the bridge will be tested using weights. The bridge bearing the maximum weight wins the event.
Making brick arch bridge on support arch - 20 minutes
Removing the support arch - 5 minutes
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Equilibre
    </i>
    <i data-label="Event Coordinator">
Divyanshu Maheshwari
    </i>
    <i data-label="Contact">
9585359691
    </i>
    <i data-label="Event poster image url">
img/builtrix/equilibre.gif
    </i>
    <i data-label="Event Description">
The participant has to make a structure which can be filled with black mud, stones. The participants will be given 90 minutes to make a structure. The base area of the structure will be common for all and will be made of plywood.
The participants have to build a structure using given material( cardboard and plastic boxes) in given amount of time and balance it on a given piece of wood. Concept of center of Gravity will be tested.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Cranamonia
    </i>
    <i data-label="Event Coordinator">
Rishiraj Chauhan
    </i>
    <i data-label="Contact">
9655914704
    </i>
    <i data-label="Event poster image url">
img/error/event.png
    </i>
    <i data-label="Event Description">
Teams must build a mechanical crane (locomotion permitted in arena) exclusively using hydraulic control mechanism. It has to retrieve the antidote lying on the top of each building by pushing it off, without touching the buildings where the crane remains stationary.
Gameplay:
Only hydraulic mechanisms should be used for controlling the machine.
Every syringe must have a volume of 50mL or less.
Locomotion can be decide by participants themselves.
Only two persons will be allowed to control the crane during the run.
    </i>
    <i data-label="Registration fees">
35
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Jenga Reloaded
    </i>
    <i data-label="Event Coordinator">
Y Sai Teja Reddy
    </i>
    <i data-label="Contact">
9944120733
    </i>
    <i data-label="Event poster image url">
img/builtrix/jenga.gif
    </i>
    <i data-label="Event Description">
Participants take turns to remove a block from a tower and balance it on top, creating a taller and increasingly unstable structure as the game progresses.Using 54 blocks, an 18 story tower is made, with 3 blocks per story. Each story being perpendicular to the stores above and below it.
Material requirement:
80 perfectly smooth wooden blocks,3 feet high stool,6 feet high standing aluminium or steel ladder, 8 Construction Helmets,16 Thermocol Sheets,16 Cardboard Sheets
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Maglev 4.0
    </i>
    <i data-label="Event Coordinator">
Shubham Singh
    </i>
    <i data-label="Contact">
9994815655
    </i>
    <i data-label="Event poster image url">
img/builtrix/maglev.png
    </i>
    <i data-label="Event Description">
Participants have to construct a maglev train based on the concept-magnetic levitation with track able to completely traverse the track of a given shape and dimensions.The participants have to make two parallel tracks of given dimensions and they have to join them from both the ends e.g. circular (as shown), rectangular, parabolic, etc.
Start from point A traverse the track in R1 direction, stop at S, continue the journey in same direction, reach A, stop there, then travel in opposite direction(R2) to the point S and reach to point A(in R2 direction).
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Minify
    </i>
    <i data-label="Event Coordinator">
Ravi Raushan
    </i>
    <i data-label="Contact">
9655843292
    </i>
    <i data-label="Event poster image url">
img/builtrix/minify.gif
    </i>
    <i data-label="Event Description">
Participants of this event should make the best use of the given resources to make a miniature or a working prototype(working model e.g- buildings,tall towers,etc. which has high stability.)
Ice-cream sticks, pipes,Fevicol,Cardboard,Clay
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Popstick-o-fest
    </i>
    <i data-label="Event Coordinator">
Abhilekh Tripathy
    </i>
    <i data-label="Contact">
9952878502
    </i>
    <i data-label="Event poster image url">
img/builtrix/popsric-o-fest.jpg
    </i>
    <i data-label="Event Description">

In this event , the participants will be provided with popsicle sticks, spool of thread, syringes etc. The participants can make many different varieties of structures using popsicle sticks, drilling machine, skewers, tooth pick, cardboard, small wooden planks or they can make a working model using syringes (hydraulics) along with the wooden planks and popsicle sticks.
    </i>
    <i data-label="Registration fees">
75
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
The Discoverer
    </i>
    <i data-label="Event Coordinator">
Shivam Arora
    </i>
    <i data-label="Contact">
9994758880
    </i>
    <i data-label="Event poster image url">
img/builtrix/thediscoveror.gif
    </i>
    <i data-label="Event Description">
The participants have to unveil the monuments/sports/destinations/personalities/brands allocated to them. Teams will be given a compass at start point, with the directions to the first checkpoint-one leading to one type of clues stating certain facts and figures about the OBJECTIVE, while the other one containing the alphabets from the name of the OBJECTIVE. After reaching the first checkpoint, they will find two things- first, the respective clue, depending on their choice, along with the two directions of next checkpoint, leading to same types of priorly mentioned clues Ð either the facts or the alphabets associated to the OBJECTIVE.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
The Trafikking
    </i>
    <i data-label="Event Coordinator">
Aditya Shingvi
    </i>
    <i data-label="Contact">
9791114594
    </i>
    <i data-label="Event poster image url">
img/error/event.png
    </i>
    <i data-label="Event Description">
The participants are to devise a path from an accident spot to the hospital for an ambulance and hence making a green corridor.
one end of the map will be the accident spot while the other will be the hospital.
The teams have to plot the path in 15 minutes(subject to change)
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Tiltatorre
    </i>
    <i data-label="Event Coordinator">
Nishtha Rout
    </i>
    <i data-label="Contact">
9943105552
    </i>
    <i data-label="Event poster image url">
img/builtrix/tiltatorre.gif
    </i>
    <i data-label="Event Description">
Use ice cream sticks to create your own iconic inclined structure which satisfies the given conditions.
https://www.youtube.com/watch?v=b6L1sygZJ1U
Popsicle sticks,Fevicol,Cardboard,Cello tape
Each team will be given 150 ice cream sticks and limited amount of adhesive.
The base of tower should remain within the boundary of arena which is 30cm*30cm.
The top most surface should be such that weight can be placed on it.
    </i>
    <i data-label="Registration fees">
35
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Build 2 Destroy
    </i>
    <i data-label="Event Coordinator">
Shantanu Kumar
    </i>
    <i data-label="Contact">
9943638015
    </i>
    <i data-label="Event poster image url">
img/error/event.png
    </i>
    <i data-label="Event Description">
Two teams will be provided with empty tin can , thermacol sheets , pepsi bottles etc . There task is to make the tallest building possible in given time limit of 2 min using all the materials provided.
Twist in this round will be ,participants are not allowed to use orange tin cans or bottles(if they use they will get negative points).
Round 2 - team A will take there shot at team B building and vice versa.
Each team will get 3 chance to destroy opponents building completely by tennis ball .
In last round time yo make buildings will be reduced and team will get BAZOOKA to destroy opponent building.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Via Ropes
    </i>
    <i data-label="Event Coordinator">
Rahul Pratik
    </i>
    <i data-label="Contact">
9994783277
    </i>
    <i data-label="Event poster image url">
img/builtrix/viaropes.gif
    </i>
    <i data-label="Event Description">
It is a team event of 2-3 persons. They have to construct a ropeway using the given materials as per the specifications. The teams will be given 3 hours to construct the structure. At the end of 3 hours, different set of loads will be put on the ropeway. The loads will be made up of sand packed in paper starting from 100 gms. The stability of the structures will be tested. The winning team will be decided on the basis of the distance travelled by the load on the structure.

    </i>
    <i data-label="Registration fees">
75
    </i>
</p>
<p class="builtrix" style="display: none">
    <i data-label="Event Name">
Suspendo
    </i>
    <i data-label="Event Coordinator">
Kunal Thakur
    </i>
    <i data-label="Contact">
7639808869
    </i>
    <i data-label="Event poster image url">
img/builtrix/suspendo.gif
    </i>
    <i data-label="Event Description">
The competition will be conducted in two stages.
A general quiz based on civil engineering and structural engineering.
1. The span of the bridge i.e. clear distance between the two supporting towers must be 400mm.
2. The overhang of 75mm should be there on both the sides of the supporting towers.
3. The material will be provided on the spot and will mainly consist of popsicle sticks, thread or wire, fevicol etc.
4. A minimum clearance of 100mm must be there for a ship to pass beneath the bridge.
5. Load will be placed on the bridge deck on mid span and load taken by the bridge till a deflection of 3mm will be recorded.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>


<!--    circuitrix   -->

<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
LabVIEW Genius
    </i>
    <i data-label="Event Coordinator">
Siddharth K Borah
    </i>
    <i data-label="Contact">
9524433987
    </i>
    <i data-label="Event poster image url">
img/circuitrix/labview.gif
    </i>
    <i data-label="Event Description">
LabVIEW is a graphical programming platform that helps engineers scale from design to test and from small to large systems. It offers unprecedented integration with existing legacy software, IP, and hardware while capitalizing on the latest computing technologies. LabVIEW provides tools to solve todayÕs problemsÑand the capacity for future innovationÑfaster and more effectively.The workshop will be followed by a competition in which the students will be given a task or a project. The students will be judged on the basis of the project/task completion.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Impedance
    </i>
    <i data-label="Event Coordinator">
Ankita Chaudhury
    </i>
    <i data-label="Contact">
9843825556
    </i>
    <i data-label="Event poster image url">
img/circuitrix/impedance.png
    </i>
    <i data-label="Event Description">
A versatile,one of a kind event in which the students/participants will get a platform to check out their technical skills and smartness .the participants will have to perform various technical tasks under unfavourable conditions.this will be an individual event.the best one gets the title of tech-x-roadies.
1) Technical group discussion
2) Personal interview round
Immunity task:code assembly:
Elimination task:fastest typer
Money task(individual task)
Bacpack racing(quiz)(team of 2)
Wildcard entry:tec-iddle-
Semifinal round:brain freezer ahead
Final round:technical treasure hunt.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Scrapper
    </i>
    <i data-label="Event Coordinator">
Parth
    </i>
    <i data-label="Contact">
9626304111
    </i>
    <i data-label="Event poster image url">
img/circuitrix/scrapper.png
    </i>
    <i data-label="Event Description">
Take the e-waste and work your magicÉ! Compete using the electronic components collected from the e-waste and create your wonder. ItÕs a three level event and a time based. As the level goes up we make it more difficult as the components in junkyard decreases, thus less number of choices
(in case of level 1 and level 2 ).
In third level teams can make whatever they want to from the junkyard.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Electricity
    </i>
    <i data-label="Event Coordinator">
Aishwarya Chakka
    </i>
    <i data-label="Contact">
9843837772
    </i>
    <i data-label="Event poster image url">
img/circuitrix/electricity.jpg
    </i>
    <i data-label="Event Description">
ROUND 1
40 questions will be asked and based on the results of the test, 10 teams will be selected for the 2nd round.
ROUND 2
In the 2nd round each team will be provided with a city map. The different monuments , landmarks ,buildings will represent the different electrical components that will go into making the circuit .The items will not be mentioned directly but in the form of codes which will require them to first decode the code to determine the item and then connect them correctly on the circuit board.


    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Greatest Heist
    </i>
    <i data-label="Event Coordinator">
Alkesh Bharati
    </i>
    <i data-label="Contact">
7639809447
    </i>
    <i data-label="Event poster image url">
img/circuitrix/greatest-heist.png
    </i>
    <i data-label="Event Description">
"The event is a game where the participants have to detect sensors and disconnect their connections if they are able to. The event would require good coordination between the team members.
The sensors that will be included are motion sensor, Laser line, pressure sensor etc
Teams will be given small tools/objects to help them evade the sensors. "
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Circuitronix
    </i>
    <i data-label="Event Coordinator">
Shailaja Saraswat
    </i>
    <i data-label="Contact">
8015286187
    </i>
    <i data-label="Event poster image url">
img/error/event.png
    </i>
    <i data-label="Event Description">
This is an electronics and electrical based event.
Bugger round and quizes will be conducted out of which 5 teams will be selected for the final round.
A practical knowledge of students is judged through this round where electrical components will be provided and teams are expected to make the best in limited time.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Nuclear P Component Design
    </i>
    <i data-label="Event Coordinator">
Arjun Paul
    </i>
    <i data-label="Contact">
9994328286
    </i>
    <i data-label="Event poster image url">
img/circuitrix/component-design.png
    </i>
    <i data-label="Event Description">
"Its an interesting quiz event based on nuclear and plasma science,
The objective is to test the knowledge skills of the students in these areas. We will have 3 rounds basically. 1st is the quiz type, 2nd round is that audio round and 3rd round is the treasure hunt round."
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="circuitrix" style="display: none">
    <i data-label="Event Name">
Electropedia 3.0
    </i>
    <i data-label="Event Coordinator">
Archana Balan
    </i>
    <i data-label="Contact">
9629766530
    </i>
    <i data-label="Event poster image url">
img/circuitrix/Electropedia.gif
    </i>
    <i data-label="Event Description">
Electropedia will be a full day quiz event, comprising of 3 rounds.
Round 1:- Pen & Paper round; +30 points for right answer, -10 for wrong; 12 teams selected for the next round
Round 2:- Buzzer round; Questions displayed via projector (includes visual questions); +30 points for right answer, -10 for wrong; 6 teams selected for next round
Round 3:- Connecting round (visual questions involving series of pictures); Electronic dice for field (area of interest);
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<!--   online    -->

<p class="online" style="display: none">
    <i data-label="Event Name">
graVITas Premier League 2.0
    </i>
    <i data-label="Event Coordinator">
Ayush Agarwal
    </i>
    <i data-label="Contact">
9051467819
    </i>
    <i data-label="Event poster image url">
img/online/gravitaspremierleague.gif
    </i>
    <i data-label="Event Description">
In this event, participants are provided with the opportunity to create and manage their own cricket
teams. Matches are simulated on our website every day.
Round 1: After team formation is complete, seven matches per team with random opponents shall commence.
Round 2: The top 25 % teams from round 1 shall be promoted to round 2.
Round 3: The top 8 (eight) teams from round 2 shall be called to participate in an actual cricket
player auction. Following the auction, an actual 8 team league shall commence, after which the top 3 teams shall be declared graVITas premier league champions.
    </i>
    <i data-label="Registration fees">
- (Free)
    </i>
</p>
<p class="online" style="display: none">
    <i data-label="Event Name">
graVITas Guess Challenge
    </i>
    <i data-label="Event Coordinator">
Rahul Pratik
    </i>
    <i data-label="Contact">
9994783277
    </i>
    <i data-label="Event poster image url">
img/online/gravitasguesschallenge.gif
    </i>
    <i data-label="Event Description">
GRAVITAS GUESS CHALLENGE is seriously an interesting, mind boggling puzzle game. A poster will be there on the GRAVITAS page. You're shown 4-5 figures in the poster, and you have to guess the object that links them all. After that you have to text us that linked object to the WhatsApp number mentioned in that poster with the picture of your college ID card.  Participant who will guess more appropriately will be declared as winners.
    </i>
    <i data-label="Registration fees">
- (Free)
    </i>
</p>
<p class="online" style="display: none">
    <i data-label="Event Name">
The 'GOOGLE' design
    </i>
    <i data-label="Event Coordinator">
Eshan Singh
    </i>
    <i data-label="Contact">
9943413334
    </i>
    <i data-label="Event poster image url">
img/online/thegoogledesign.gif
    </i>
    <i data-label="Event Description">
This is a design and creativity event which mainly focuses on how creatively a person can design the Google doodle based on a given theme.The participants will have to design a Google doodle of their own based on the theme given to them on the spot.
The participants will be given 1 hour to completely design their Google doodle on adobe photoshop and give a beautiful touch to it.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="online" style="display: none">
    <i data-label="Event Name">
String Theory 2.0
    </i>
    <i data-label="Event Coordinator">
Sukrit Gupta
    </i>
    <i data-label="Contact">
8220152650
    </i>
    <i data-label="Event poster image url">
img/online/string-theory.jpg 
    </i>
    <i data-label="Event Description">
An online science fiction writing contest. Within the span of a thousand words, you have got the opportunity to craft a prose about life, the universe and everything. The only other limits are set by your imagination-and how many light years and eons it could encompass in its tentative grasp.
Mail your story to our email address.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="online" style="display: none">
    <i data-label="Event Name">
Meme Wars
    </i>
    <i data-label="Event Coordinator">
Shantanu Atreja
    </i>
    <i data-label="Contact">
9943326667
    </i>
    <i data-label="Event poster image url">
img/online/memewars.gif
    </i>
    <i data-label="Event Description">
It is an online event in which a participant has to submit a meme made by him/her on our fb page "VIT SPARTANS". The judge will select the top 3 meme's and prize will be distributed accordingly. The meme can be on any topic.
    </i>
    <i data-label="Registration fees">
- (Free)
    </i>
</p>
<p class="online" style="display: none">
    <i data-label="Event Name">
Wolf of wall street
    </i>
    <i data-label="Event Coordinator">
Syed M
    </i>
    <i data-label="Contact">
8220165098
    </i>
    <i data-label="Event poster image url">
img/online/wolf-of-wallstreet.gif
    </i>
    <i data-label="Event Description">
The Wolf of Wall Street is an online virtual stock market game with real time stock exchange from Indian (NSE,BSE) and American (NASDAQ,NYSE) stock market.Every participant will be given 2 million dollars virtual money to spend on shares. Everyone has the brainpower to follow the stock market. If you made it through fifth-grade math, you can do it !!The Shares and their market prices are real time and will be synchronized with the real market prices using a server.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<!--    bioxyn    -->

<p class="bioxyn" style="display: none">
    <i data-label="Event Name">
Biowizard 4.0
    </i>
    <i data-label="Event Coordinator">
Gutta Panith Kumar
    </i>
    <i data-label="Contact">
8220154399
    </i>
    <i data-label="Event poster image url">
img/error/event.png
    </i>
    <i data-label="Event Description">
Round 1: A MCQ test containing around 30 questions related bio streams will be asked to the participants
Round 2: Pictionary.
Round 3Teams will have the opportunity to answer a question which will be shown in front of them. They need to press a buzzer in order to get the chance first. There will be negative marking and bonus marking scheme also involved. This segment also include dumb charades round where partner of each team will have to draw the picture on the blackboard related to the given term in a chit.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="bioxyn" style="display: none">
    <i data-label="Event Name">
DNA (Disease and Adventure)
    </i>
    <i data-label="Event Coordinator">
Hridya Rao
    </i>
    <i data-label="Contact">
9943825248
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
DNA- Is an event that brings together science and adventure. .This event is aimed at revising some basic and pristine theories of science. All this is aimed at while fun and frolic is taken care of. There will be quizzes, treasure hunts and rapid fires which will stimulate the remotest of nerves in your brain.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="bioxyn" style="display: none">
    <i data-label="Event Name">
Grey House Theory
    </i>
    <i data-label="Event Coordinator">
Sai Sivankar
    </i>
    <i data-label="Contact">
9443131362
    </i>
    <i data-label="Event poster image url">
img/bioxyn/greyhousetheory.gif  
    </i>
    <i data-label="Event Description">
The event Gray House theory is essentially an event that is made to test the ailment detection skills of people who are interested in the field of medicine. It involves watching dispersed clips of popular TV shows, GRAY'S ANATOMY and HOUSE, pointing to a certain disease. the participants will need to understand from the shown symptoms, the areas the disease affects and ultimately the name of the disease.
    </i>
    <i data-label="Registration fees">
25
    </i>
</p>
<p class="bioxyn" style="display: none">
    <i data-label="Event Name">
True Detective
    </i>
    <i data-label="Event Coordinator">
Gargi Vyas
    </i>
    <i data-label="Contact">
9952134934
    </i>
    <i data-label="Event poster image url">
img/bioxyn/TD.png
    </i>
    <i data-label="Event Description">
This is a thriller event which involves biosciences. It involves a mystery plot which the participant has to solve and the clues will be based on forensics and narcotics.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="bioxyn" style="display: none">
    <i data-label="Event Name">
Bio Warfare
    </i>
    <i data-label="Event Coordinator">
Kanduri  Spoorthy
    </i>
    <i data-label="Contact">
9944907599
    </i>
    <i data-label="Event poster image url">
img/bioxyn/bio-warfare.jpg 
    </i>
    <i data-label="Event Description">
This event consists of three rounds :

1. A map with clues in the form of puzzles,equations and wordgames related to biology in order to reach the destination.

2.Find the colouring stain and gather 5 objects of that colour from people at random.

3.Confront the terrorists and their demands in a session of heated debates using the knowledge in their field and give a solution to prevent the biowar.
    </i>
    <i data-label="Registration fees">
- (Free)
    </i>
</p>
<!--    workshops    -->


<p class="workshops" style="display: none">
    <i data-label="Event Name">
Auto Desk 3D Modelling
    </i>
    <i data-label="Event Coordinator">
Sonali Singh
    </i>
    <i data-label="Contact">
7639796514
    </i>
    <i data-label="Event poster image url">
img/workshops/autodesk.png
    </i>
    <i data-label="Event Description">The main aim of the workshop is to develop skills in the field of 3D Modelling.This workshop covers best 3D Modelling tools developed by Autodesk widely known as MAYA,3DS-Max and Mudbox.These set of tools are widely used in game design and various movie effects.This workshop would consist a complete training of these tools and giving a wide exposure in this field.The workshop would be for 2 days and certificates would be provided.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
3-D Printing
    </i>
    <i data-label="Event Coordinator">
Kishan Koradiya
    </i>
    <i data-label="Contact">
9943635263
    </i>
    <i data-label="Event poster image url">
img/workshops/3d.jpg  
    </i>
    <i data-label="Event Description">
3-D Printing has been dubbed as the technology of the future. In a normal printer, what happens? You get sheets of printed paper with stuff written or drawn on it. Imagine if you could actually print the stuff itself! Yes that`s exactly what a 3-D printer does. It prints out real world 3-D objects like shoes, models, even guitars! Nowadays, it is being used in a variety of fields, like biotechnology, to print artificial hearts and ears, layer by layer, using tissue as a base. Recently the world`s first 3-D printed medicine was manufactured! Mechanical and civil engineers use it to print models and prototypes of their machine and building components with a high degree of accuracy. In this workshop you will learn everything about 3-D printing, right from the design to the manufacturing part. You will explore the applications and the new frontiers that this technology has reached. You will be given industry grade software for free, using which you will be taught to model your 3-D objects. We have 3 international companies, who will be conducting this workshop. The speakers are experts in their fields. We even have more than 2 3-D printers set up during the workshop so you can see the process happening live in front of your eyes! Also we are getting a state of the art 3-D scanner which scans any object and converts it into a CAD model which you can print! At the end of the workshop we will give the participants mementos in the form of their very own 3-D printed objects which they can take back home, along with surprise vouchers! So hurry and register now!    </i>
    <i data-label="Registration fees">
600
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Aero Modeling Workshop
    </i>
    <i data-label="Event Coordinator">
Abhishek Diwangan
    </i>
    <i data-label="Contact">
9629786225
    </i>
    <i data-label="Event poster image url">
img/workshops/aero-modeling-workshop.png
    </i>
    <i data-label="Event Description">
Workshop for students to design and fabricate an RC Aircraft over the span of 2 days where they will be taught the basics of flight and aircraft design and control. Different Systems in an Aircraft,Stability & Control of an Aircraft,Instrumentation in an RC Aircraft,Interactive Design Session,Fabrication Session,Testing Session - all aircrafts designed by the participants are flown by an expert flyer of Team AerotriX.
    </i>
    <i data-label="Registration fees">
1500
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Antenna Design
    </i>
    <i data-label="Event Coordinator">
Nallamothu Sreera
    </i>
    <i data-label="Contact">
8508204662
    </i>
    <i data-label="Event poster image url">
img/workshops/Antenna-Design.gif
    </i>
    <i data-label="Event Description">
The first session of workshop provides a forum for the exchange of information on the state of the art research in the areas of antennas and RF design for wireless communication. This shall be addressed by a national level renowned scientist from DRDO.
The second session provides a rostrum for all students to learn to design an antenna using ANSOFT software, he/she shall be aided with the complete access of the software and then students compete with each other using their antenna models. Special rewards shall be provided for innovative and novel antenna designs and they shall be patent searched.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Automotive Workshop
    </i>
    <i data-label="Event Coordinator">
Sahil Shroff
    </i>
    <i data-label="Contact">
9789714095
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
A workshop on :engines/motors/turbines
Chassis
Transmission
Steering system
Suspension system braking system
Live demonstration of engine & queries session
Latest technologies
    </i>
    <i data-label="Registration fees">
600
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Big Data Analysis
    </i>
    <i data-label="Event Coordinator">
Jayant Rohra
    </i>
    <i data-label="Contact">
9619776494
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
The objective of this workshop is to understand the challenges in architectures to store, and access the Big data, perform analytics on Big data for data intensive applications.
Big data is high volume, high velocity and high variety information assets that demand cost effective, innovative forms of information processing for enhanced insight and decision making. Big data is the process of examining large amount of data of variety of types to uncover hidden patterns, unknown correlations and other useful information.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Bionic ProE
    </i>
    <i data-label="Event Coordinator">
Akshat Agarwal
    </i>
    <i data-label="Contact">
9629341042
    </i>
    <i data-label="Event poster image url">
img/workshops/bionicproe.gif
    </i>
    <i data-label="Event Description">
Bionic ProE is a workshop spanning over two days consisting of a talk by an expert about bionic man and a workshop on Pro - E. Bionic man includes the concept of addition of prosthetic and other improvements to the human body allowing it to cross physical barriers that a common man can not come close to. Pro E is a software that helps in designing of 3-D objects assembling them and their simulation. Students will get a hands on experience working with the software, which will be taught to them by an expert in the same.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>


<p class="workshops" style="display: none">
    <i data-label="Event Name">
CAD modelling workshop
    </i>
    <i data-label="Event Coordinator">
Rishi Mehadia
    </i>
    <i data-label="Contact">
9629768627
    </i>
    <i data-label="Event poster image url">
img/workshops/cad-modelling.jpg 
    </i>
    <i data-label="Event Description">
1)Catia(For Design):
2)Simulia(For analysis and simulation)
3)Enovia (For collaborative innovation
4) Delmia (For digital manufacturing and production)
5) 3Dvia(For authoring, publishing, and hosting tools for professional and consumer markets)
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Cloud Computing
    </i>
    <i data-label="Event Coordinator">
Rishab Goyal
    </i>
    <i data-label="Contact">
9952611002
    </i>
    <i data-label="Event poster image url">
img/workshops/cloud_computing.png
    </i>
    <i data-label="Event Description">
Numerous IT vendors are promising to offer computation, storage, and application hosting services and to provide coverage in several continents, SLA backed performance and uptime promises for their services. While these "clouds" are the natural evolution of traditional data centers, they are distinguished by exposing resources (computation, data, and applications) as standards-based Web services and following a "utility" pricing model where customers are charged based on their utilization of computational resources, storage, and transfer of data. They offer subscription-based access to infrastructure, platforms, and applications that are popularly referred to as IaaS, PaaS and SaaS .
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Comic Designing Workshop
    </i>
    <i data-label="Event Coordinator">
Ayushi Srivastava
    </i>
    <i data-label="Contact">
9626714111
    </i>
    <i data-label="Event poster image url">
img/workshops/comic-design.png
    </i>
    <i data-label="Event Description">
Batman, Superman, Spider-Man and so many others have been a part of our lives since we can remember. Now learn to immerse yourself in those cherished memories and make your own comics. B.G Gujjarappa a renowned artist of Indian Institute of Cartoonist, Bangalore will be teaching you the art of comic design in this pre Gravitas. Make sure to grab this opportunity!!
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Forensic & the Science of Deduction Workshop
    </i>
    <i data-label="Event Coordinator">
Akya Bhatnagar
    </i>
    <i data-label="Contact">
9629780998
    </i>
    <i data-label="Event poster image url">
img/workshops/forensics.png
    </i>
    <i data-label="Event Description">
The workshop will comprise an Introduction to Forensics, Presentation with different fields of forensics, the science of Fingerprints, Development Methods and Techniques, Lab Activity developing Fingerprints, blood spatter analysis with practicals. Anthropology is a fast growing field of forensics that has found its applications in different areas of crime investigation, case studies, archaeology etc. Psychology is an applied discipline that mainly concentrates on studying the mental functions and behaviour of a human being.
    </i>
    <i data-label="Registration fees">
400
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Idea Pitching
    </i>
    <i data-label="Event Coordinator">
Shounak Kanti Ghosh
    </i>
    <i data-label="Contact">
9787079142
    </i>
    <i data-label="Event poster image url">
img/workshops/idea-pitching.png
    </i>
    <i data-label="Event Description">
The workshop aims to provide an introduction to the soft skills required when you are trying to present an innovative concept and marketing an idea or product. It will aid people in understanding the process of ideation, as well as bettering their confidence and public speaking skills. The workshop will start with the basics of ideation and a good presentation and how to deliver effective speeches to accompany presentations. It will help the participants ideate and understand how to market innovative concepts confidently.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Invent-o-pi
    </i>
    <i data-label="Event Coordinator">
Anshika Ahuja
    </i>
    <i data-label="Contact">
9629780944
    </i>
    <i data-label="Event poster image url">
img/workshops/inventopi.gif
    </i>
    <i data-label="Event Description">
During this two day workshop the participants learn about Embedded Linux Programming and Peripheral Interfacing for a Raspberry Pi platform.
They will also perform various basic hands on experiments on the GPIO pins (general purpose I/O. You will learn about interfacing sensor as well as controlling a Robot over the Internet.
    </i>
    <i data-label="Registration fees">
1100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Robotix Workshop
    </i>
    <i data-label="Event Coordinator">
Mohammad Saad Rashid
    </i>
    <i data-label="Contact">
9629772236
    </i>
    <i data-label="Event poster image url">
img/workshops/robotix.png
    </i>
    <i data-label="Event Description">
This time we plan to broaden the horizons and teach 8 different bots. They will learn the basics of Arduino and its programming which is used to control these Bots. As a result, students will also gain knowledge on how to further modify/ improve their bots or make projects of their own. A manual will be provided to participants, which contain the information data and logic required to make these Bots. A kit will be provided to each participating team which will enable them to make different bots
    </i>
    <i data-label="Registration fees">
1000
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Mozilla Firefox OS App Days 3.0
    </i>
    <i data-label="Event Coordinator">
Gaurav Agerwala
    </i>
    <i data-label="Contact">
9092690808
    </i>
    <i data-label="Event poster image url">
img/workshops/mozilla.png
    </i>
    <i data-label="Event Description">
A 36 hour workshop cum hackathon on the Firefox OS and cutting edge web technologies by professional developers from Mozilla.Aspects covered: HTML5, CSS3, JavaScript, App development using HTML5, Web development in general.
    </i>
    <i data-label="Registration fees">
300
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Phone Gap 2.0
    </i>
    <i data-label="Event Coordinator">
Hardeep Singh Arora
    </i>
    <i data-label="Contact">
9629343076
    </i>
    <i data-label="Event poster image url">
img/workshops/PHONE-GAP.gif
    </i>
    <i data-label="Event Description">
Easily create apps using the web technologies you know and love: HTML, CSS, and JavaScript PhoneGap is a free and open source framework that allows you to create mobile apps using standardized web APIs for the platforms you care about.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Python and Google App Engine for the Beginner Developer
    </i>
    <i data-label="Event Coordinator">
Shreyansh Srivastava
    </i>
    <i data-label="Contact">
8110020215
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
The event is a workshop designed to teach students the programming language Python in a very interactive approach to programming in a manner of software creation and real-world application problem solving unlike regular approaches to teaching computing technologies. GAE is Google’s very own cloud computing platform which allows for developers to make scalable, sophisticated yet simplistic far reaching software using the wonders of cloud computing.
    </i>
    <i data-label="Registration fees">
300
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Sensored
    </i>
    <i data-label="Event Coordinator">
Deepak Raghuwanshi
    </i>
    <i data-label="Contact">
9629782443
    </i>
    <i data-label="Event poster image url">
img/workshops/sensored.jpg 
    </i>
    <i data-label="Event Description">
Sensored is a 2-day workshop on various sensors. The participants will be provided associated theoretical concepts followed by hands-on experience with the sensors.IR sensor,Temperature & Humidity sensor,Accelerometer,Piezoelectric,Touch screen,Ultrasonic,Fire sensor.
    </i>
    <i data-label="Registration fees">
600
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
SFX Workshop
    </i>
    <i data-label="Event Coordinator">
Ritvik Iyer
    </i>
    <i data-label="Contact">
8608596496
    </i>
    <i data-label="Event poster image url">
img/workshops/sfx.png
    </i>
    <i data-label="Event Description">
This workshop emphasis on developing audio editting techniques and methods.Learn the widely used software known as FL Studio which is widely used in dj mixing and adding various sound effects in the song.This is a one day workshop will give a complete training of the software. If you are a music lover this is the skill which would blow your minds.Make sure to grab this opportunity!!
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Star Party
    </i>
    <i data-label="Event Coordinator">
Roshan Murali
    </i>
    <i data-label="Contact">
9043512516
    </i>
    <i data-label="Event poster image url">
img/workshops/Star Party.png
    </i>
    <i data-label="Event Description">
In this workshop we will be having a few introductory theory sessions about introduction to the night sky and about the equipment used in observational astronomy. This will also various techniques used in observational astronomy.We will have guest speakers coming as well who will bring their telescopes and share their experience.All of this will be followed by an observational session in the night at SJT rooftop where we will set up telescopes and have various zones. Participants would be taught how professional astronomers track and identify new asteroids in the solar system.
    </i>
    <i data-label="Registration fees">
150
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Stockgyaan
    </i>
    <i data-label="Event Coordinator">
Shubhankar Menon
    </i>
    <i data-label="Contact">
9677351134
    </i>
    <i data-label="Event poster image url">
img/workshops/stock_gyaan.png
    </i>
    <i data-label="Event Description">
Stock Gyaan is a 3 hour workshop in which participants will be taught about the various Market Indicators that help one predict the possible price movements and momentum of the stocks, thus maximizing one’s knowledge and profitability and a live demonstration of how to buy and sell shares of a company online. This workshop is specifically for all those who are interested in stock market and its analysis, a career in investment and finance, and who wants to have an extra earning source.
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Studio To Stage
    </i>
    <i data-label="Event Coordinator">
Sahil Singh
    </i>
    <i data-label="Contact">
8652704575
    </i>
    <i data-label="Event poster image url">
img/workshops/studiotostage.gif
    </i>
    <i data-label="Event Description">
A game development workshop based on unreal engine 4. Basics on 3d modeling will be covered and it will be implemented using unreal engine 4.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
The iOS Fusion
    </i>
    <i data-label="Event Coordinator">
Rishav Shaw
    </i>
    <i data-label="Contact">
8220574670
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
"Day 1- Objective-c, guest lecture ,story boarding.
Day 2- Json , introduction to swift programming."
    </i>
    <i data-label="Registration fees">
300
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
The Ultimate Designer
    </i>
    <i data-label="Event Coordinator">
Shivam Datta
    </i>
    <i data-label="Contact">
9159870071
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
"Design Patent Create
A workshop ideal for evolving minds with graphic design. Adobe has always been a great platform for graphic design. A very useful workshop covering most adobe products for the first time –DESIGN.
Adobe Creative Suite CS6 – Master Workshop
Photoshop CS6
Create powerful images with the professional standard."
    </i>
    <i data-label="Registration fees">
250
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Under The Hood
    </i>
    <i data-label="Event Coordinator">
Pronay Peddiraju
    </i>
    <i data-label="Contact">
8110019709
    </i>
    <i data-label="Event poster image url">
img/workshops/underthehood.gif
    </i>
    <i data-label="Event Description">
This is a workshop where students will be taught how to assemble their own computers. The students will get to know how to purchase necessary parts, understand how they work together and eventually learn the skills involved in building a Personal Computer.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Artificial Intelligence
    </i>
    <i data-label="Event Coordinator">Abhivishrut Singh
    </i>
    <i data-label="Contact">
9610312142
    </i>
    <i data-label="Event poster image url">
img/workshops/artificial.png
    </i>
    <i data-label="Event Description">
The participants will learn the basics of modern AI as well as some of the representative applications of AI. Along the way, participants will also be taught about the numerous applications and huge possibilities in the field of AI, which continues to expand human capability beyond everyone’s imagination.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Augmented Reality
    </i>
    <i data-label="Event Coordinator">
Ruchir Arora
    </i>
    <i data-label="Contact">
9944494899
    </i>
    <i data-label="Event poster image url">
img/workshops/augmented_reality.png
    </i>
    <i data-label="Event Description">
The discovery of Google glasses is one such live example why augmented reality is one of the present cutting edge technology. Enhancing one’s current perception of reality, AR technology allows the possibility of superimposing a computer-generated image of the real world, thus providing a composite view for a digitally manipulable, enhanced and interactive view of the user's real world. Along with acting as a tool of amplifying digital information it is a connecting link between reality and virtuality of our environment. It is related to a more general concept called mediated reality, in which a view of reality is modified (possibly even diminished rather than augmented) by a computer. Augmentation is conventionally in real-time and in semantic context with environmental elements, such as sports scores on TV during a match. With the help of advanced AR technology (e.g. adding computer vision and object recognition) the information about the surrounding real world of the user becomes interactive and digitally manipulable.
    </i>
    <i data-label="Registration fees">
500
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Cryptorama
    </i>
    <i data-label="Event Coordinator">
Pranshu Poddar
    </i>
    <i data-label="Contact">
8110019792
    </i>
    <i data-label="Event poster image url">
img/workshops/Cryptography.gif
    </i>
    <i data-label="Event Description">
This workshop will be held during Gravitas, where we will explain the working of cryptography in real life situations and teaching them about the applications of cryptography.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
IOT
    </i>
    <i data-label="Event Coordinator">
Arrush Hegde
    </i>
    <i data-label="Contact">
8973655852
    </i>
    <i data-label="Event poster image url">
img/workshops/iot.gif
    </i>
    <i data-label="Event Description">IOT stands for "Internet Of Things", which means to control the things around you through Internet. In this workshop students will be taught about basics of microcontrollers, python, creating servers, html and using all these skills students will be taught how to make a Internet controlled robot. The workshop is hands on and kit will be provided during the workshop. Be part of this workshop and control your gadgets and many other stuff through Internet from anywhere and anytime.
    </i>
    <i data-label="Registration fees">
500
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
Intro to Web Development
    </i>
    <i data-label="Event Coordinator">
Abhishek Balaji
    </i>
    <i data-label="Contact">
8870956314
    </i>
    <i data-label="Event poster image url">
img/workshops/introtowebdev.gif
    </i>
    <i data-label="Event Description">
The workshop will aim to create a basic fully functional website step by step in the process of teaching the participants the intricacies of creating a website.We would be using HTML/CSS for frontend integrated with PHP/MySQL on the backend.We would be talking about various text editors,servers and everything that comes in between.There is no prerequisite as we would be starting right from the basics.
    </i>
    <i data-label="Registration fees">
200
    </i>
</p>

<p class="workshops" style="display: none">
    <i data-label="Event Name">
Gesture controlled Robotics Workshop
    </i>
    <i data-label="Event Coordinator">
Shivam Datta
    </i>
    <i data-label="Contact">
9159870071
    </i>
    <i data-label="Event poster image url">
img/workshops/gesture-controlled-robotic.gif
    </i>
    <i data-label="Event Description">
The 2 day workshop is split into 4 modules
Understanding Semi Autonomous Robots and Accelerometer Sensor
Design and Construction of the Robot
Programming the Robot
Demonstration of the Robot
    </i>
    <i data-label="Registration fees">
1000
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
SAP 2000
    </i>
    <i data-label="Event Coordinator">
Shlok Shah
    </i>
    <i data-label="Contact">
9994201113
    </i>
    <i data-label="Event poster image url">
img/workshops/sap2000.gif
    </i>
    <i data-label="Event Description">
This 2 day workshop is the basic requirement of any civil engineer is fulfilled as it teaches the civil based software SAP2000 to build and design any type of structural syste
    </i>
    <i data-label="Registration fees">
400
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
CellTech(Do-It-Yourself)
    </i>
    <i data-label="Event Coordinator">
Pratik Agarwal
    </i>
    <i data-label="Contact">
9566554853
    </i>
    <i data-label="Event poster image url">
img/workshops/Do-it-yourself.gif
    </i>
    <i data-label="Event Description">The students will be demonstrated the various ways by which they can improve the performance of their cell phones, which includes 1) increasing your battery life 2)getting your screen changed by you if it cracks 3) Rooting your phone 4) Repairing your phone speaker and many more. The teams will be provided with the repairing tool kit which they could use in real life as well and get any problem regarding the cell phone solved.
    </i>
    <i data-label="Registration fees">
400
    </i>
</p>
<p class="workshops" style="display: none">
    <i data-label="Event Name">
All in one photography
    </i>
    <i data-label="Event Coordinator">
Sameer Sethi
    </i>
    <i data-label="Contact">
8220154087
    </i>
    <i data-label="Event poster image url">
img/error/event.png  
    </i>
    <i data-label="Event Description">
All in one photography workshop being organized by the VIT Photography Club will help participants to indulge in the world of photography from basics to advanced techniques. Participants need not have prior knowledge about photography.
    </i>
    <i data-label="Registration fees">
100
    </i>
</p>
<!--School  -->
<p class="school" style="display: none">
    <i data-label="Event Name">
Engineers The Tooners
    </i>
    <i data-label="Event Coordinator">
Ankita Singh
    </i>
    <i data-label="Contact">
9629774398
    </i>
    <i data-label="Event poster image url">
img/school/tooners.png
    </i>
    <i data-label="Event Description">
Ever wondered how scientific ideas could be expressed by medium of cartoons and caricature? This event is all about coalescing innovation and entertainment and mixing it with intelligence and presenting your ideas in a different manner.
    </i>
    <i data-label="Registration fees">
50
    </i>
</p>
<p class="school" style="display: none">
    <i data-label="Event Name">
Fact or Fiction
    </i>
    <i data-label="Event Coordinator">
 Disha Chander
    </i>
    <i data-label="Contact">
 9994714844
    </i>
    <i data-label="Event poster image url">
 img/school/FactorFiction.gif
    </i>
    <i data-label="Event Description">
The Event is a Quiz Event. The Quiz would be based upon the general knowledge on cartoons and animated characters. The quiz would be in 3 rounds.
Round 1) Basic Knowledge round ( small verbal quiz round )
Round 2) Audio Visual Round , showing images and clip (A little tricky)
Round 3) The teams have to inact different cartoons on the question screen to win points.(Difficult)
    </i>
    <i data-label="Registration fees">
 50
    </i>
</p>
<p class="school" style="display: none">
    <i data-label="Event Name">
 Minute To Win IT
    </i>
    <i data-label="Event Coordinator">
 Aesha Upadhyay
    </i>
    <i data-label="Contact">
 9998185733
    </i>
    <i data-label="Event poster image url">
 img/school/minute-to-win-it.gif
    </i>
    <i data-label="Event Description">
 There will be a bowl of chits with the challenges written on them.
 The team member will pick the chit and will have to perform the respective challenge under the given conditions under 60 sec.Event comprises of a team members working together to complete challenges within 1 minute each.There will be certain short challenges which the team will have to face .
 One lifeline would be given to the team in case they are not able to complete the challenge or have voilated any rules.
    </i>
    <i data-label="Registration fees">
 50
    </i>
</p>
<p class="school" style="display: none">
    <i data-label="Event Name">
 Quiz Relay
    </i>
    <i data-label="Event Coordinator">
 Tanmay Choudhary
    </i>
    <i data-label="Contact">
 9479397938
    </i>
    <i data-label="Event poster image url">
 img/error/event.png
    </i>
    <i data-label="Event Description">
 All the questions will be having four option and the genre of the questions will be chosen by the
 participant.
 The next question (or its genre) will be determined by the option chosen by the participant.
 So the participant has to chose wisely, in the sense, that if the he/she is very confident about a
 particular genre, he/she can chose the wrong option (lose one point) and can answer the next question
 successfully, thus making two points.
    </i>
    <i data-label="Registration fees">
 50
    </i>
</p>
<p class="school" style="display: none">
    <i data-label="Event Name">
 All About VIT
    </i>
    <i data-label="Event Coordinator">
 Kanishk Sanghi
    </i>
    <i data-label="Contact">
 9943017776
    </i>
    <i data-label="Event poster image url">
 img/error/event.png
    </i>
    <i data-label="Event Description">
 It is based on what you know about VIT.
 First round will be a quiz round where we ask you questions related to VIT. Each team will have 2 participants. We'll take the to 25 teams for second round.
 They'll get cash prize of 3000,2000,1000 respectively.</i>
    <i data-label="Registration fees">
 50
    </i>
</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>