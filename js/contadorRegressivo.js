function startTimer(duration, display){

    var timer = duration, horas, minutes1, seconds;
    var minutes = 60

    let intervalo = setInterval(function(){

        horas = parseInt(timer /3600, 10)
        minutes1 = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
    
        
        if(minutes1 > 60){
            if(seconds == 0){
                minutes = minutes - 1
            }
            if(minutes == 0){
                minutes =  60
            }
        }else{
            minutes = minutes1
        }
        
        horas = horas < 10 ? "0" + horas : horas;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = horas + ":" + minutes + ":" + seconds;

        if(--timer < 0){
            alert("Infelizmente seu tempo acabou, finalize sua prova!");
            timer = duration;
            clearInterval(intervalo);
        }


    }, 1000);
}

window.onload = function(){
    var duration = 60 * 120; //conversão para segundos
    var display = document.querySelector("#timer"); //Elemento para exibir o timer

    startTimer(duration, display); //inicia a função
}

function stop(){

}