function startTimer(duration, display, bar) {
    var timer = duration, minutes, seconds;
    var inter = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        var totalSeconds = 5 * 60
        , remainingSeconds = minutes * 60 + seconds

        bar.style.width = (remainingSeconds*100/totalSeconds) + "%";

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            document.getElementById("seis").style.display = "none";
            clearInterval(inter);
            timer = duration;
        }

        if(document.getElementById("progressBar").style.width == 60+"%") {
            document.getElementById("low").style.display = "flex";
        }
        if(document.getElementById("progressBar").style.width == 0+"%") {
           document.getElementById("five").style.display = "none";
           document.getElementById("last").style.display = "flex";
           document.getElementById("seis").style.display = "none";
        }
        if(document.getElementById("progressBar").style.width == 0+"%") {
            document.getElementById("progress").style.display = "none";
            document.getElementById("time").style.display = "none";
        }

    }, 1000);




}

window.onload = function () {
    var minutes = 60 * 5,
    display = document.querySelector('#time');
    bar = document.querySelector('#progressBar');
    startTimer(minutes, display, bar);


};
