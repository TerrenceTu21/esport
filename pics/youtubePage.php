<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twc esport</title>
    <link href="../pics/youtubeWebLogo2.png" rel="icon"/>
<style>
    .youtubeImg1{
        margin-right: 80%;
    }
    .youtubeImg2{
        border-radius: 50%;
        margin-left: 20px;
    }
    .youtubeDiv1, .youtubeDiv2 {
       border: 1px solid white;
       padding: 5px;
       text-align: justify;
       float:left;
       font-style: italic;
       font-family: "Georgia", Times, serif;
  }
  .youtubeDiv1{
        margin-left: 25%;
        margin-top: 5px;
    }
    .youtubeDiv2 h1{
        margin-left: 5%;
        margin-top: 20px;
        letter-spacing: 3px;
        font-family: "Georgia", Times, serif;
        width: 400px;
        height: 30px;
        font-size: 25px;
    }
    .youtubeDiv2 p{
        margin-left: 5%;
        letter-spacing: 3px;
        font-family: "Georgia", Times, serif;
        font-size: 15px;
    }
    .youtubeInner1, .youtubeInner2 {
       border: 1px solid white;
       padding: 5px;
       text-align: justify;
       float:left;
       font-style: italic;
       letter-spacing: 0px;
       margin-right: 30px;
       margin-top: 0px;
       font-family: "Georgia", Times, serif;
  }
  .youtubeInner2 button{
    color: black;
    background: lightgrey;
    border-color: lightgrey;
    font-size: 15px;
    margin-right: 10px;
    margin-top: 25px;
    padding: 10px 23px;
  }
  .youtube {
    margin-top: 130px;
    margin-left: 500px;
    font-size: 25px;
  }
  .lolYoutube{
    margin-left: 370px;
  }
</style>
</head>
<body>
<img class="youtubeImg1" src="../pics/youtubeWeb.logo.png" alt="logo" width="150" height="140">
<div class="youtubeDiv1">
<img class="youtubeImg2" src="../pics/logo.png" alt="logo" width="120" height="110">
</div>
<div class="youtubeDiv2">
    <div class="youtubeInner1">
        <h1>Malaysia TWC Esport</h1>
        <p id="myDIV">8910 subscribers</p>
    </div>
    <div class="youtubeInner2">
        <p id="demo" onclick="myFunction()"><button style="background-color:#DC143C; color:white; border-color: red;">SUBSCRIBE</button></p>
    </div>
</div>
<p class="youtube">Latest Videos</p>
<div class="youtubeDiv2">
        <a href="https://www.youtube.com/watch?v=kd_q5BvOk9c"><img class="lolYoutube" src ="../pics/LeagueofLegends1.webp" alt="picture" width="200" height="120">
        <a href="https://youtu.be/O8KkJvpz2xc"><img src ="../pics/counterstrikeglobaloffensive1.jpg" alt="picture" width="200" height="120"></a>
        <a href="https://youtu.be/-cSFPIwMEq4"><img src ="../pics/dota2-1.jpg" alt="picture" width="200" height="120"></a>
        <a href="https://youtu.be/z2HE_the-A0"><img src ="../pics/pubg1.webp" alt="picture" width="200" height="120"></a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.innerHTML === "8911 Followers") {
    x.innerHTML = "8910 Followers";
    document.getElementById("demo").innerHTML = "<button>SUBSCRIBE</button>";
  } else {
    x.innerHTML = "8911 Followers";
    document.getElementById("demo").innerHTML = "<button>SUBSCRIBED</button>";
  }
}
</script>
</body>
</html>