// const to_left_tets = 5;
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
//             alert("Time Left!");
//             window.location = 'final.php';
//             break;
//         }
//     }, 1000);
// }
// window.onload = function () 
// {
//     var countdown = 60 * to_left_tets,
//         time = document.querySelector('#time');
//     startTimer(countdown, time);
// };