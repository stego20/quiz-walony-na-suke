
var button = document.getElementsByTagName('Next')[0];
button.onclick = function() {
    alert("jestem");
}


// const to_left_quest = 5;
// function startTimer(left, time) 
// {
//     var timer = left, minutes, seconds;
//     setInterval(function () 
//     {
//         minutes = parseInt(timer / 60, 10);
//         seconds = parseInt(timer % 60, 10);
//         minutes = minutes < 10 ? "0" + minutes : minutes;
//         seconds = seconds < 10 ? "0" + seconds : seconds;
//         time.textContent = minutes + ":" + seconds;
//         if (--timer <= 0) 
//         {
//             //Smth that skip question and go next
//             break;
//         }
//     }, 1000);
// }
// window.onload = function () 
// {
//     var countdown = 60 * to_left_quest,
//         time = document.querySelector('#time');
//     startTimer(countdown, time);
// };