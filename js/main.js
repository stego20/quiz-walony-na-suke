const to_left = 1;

function startTimer(left, time) 
{
    var timer = left, minutes, seconds;
    setInterval(function () 
    {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        time.textContent = minutes + ":" + seconds;
        if (--timer < 0) 
        {
            var next = document.getElementById("NextQuest");
            next.click();
        }
    }, 1000);
}
window.onload = function () 
{
    var countdown = 60 * to_left,
        time = document.getElementById('timer');
    startTimer(countdown, time);
};

function OnPage() 
{
  var controller = null;
  $( "html" )
    .mouseenter(function() 
    {
      controller = 1;
      $( "h2", this ).last().text( "Jesteś w porządku." );

    })
    .mouseleave(function() 
    {
      controller = 0;
      $( "h2", this ).last().text( "Nie ściągaj kurwo!" );
    });
}
OnPage();