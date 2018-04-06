var start = new Date().getTime(); 

appearAfterDelay();

document.getElementById("object").onclick = function() {

    document.getElementById("object").style.display = "none";

    var end = new Date().getTime();

    var timeTaken = (end - start) / 1000;                
    document.getElementById("timeTaken").innerHTML = timeTaken + "s";

    appearAfterDelay();

}

function makeShapeAppear(){

     var height = Math.floor(Math.random() * 100) + 10;
    var width = height;

    var verticalPos = Math.floor(Math.random() * (500-height)) + 0;

    var horizontalPos = Math.floor(Math.random() *  (1000 - width)) + 0;

    document.getElementById("object").style.height=height;
    document.getElementById("object").style.width=width;
    document.getElementById("object").style.backgroundColor = getRandomColor();
    document.getElementById("object").style.position="relative";
    document.getElementById("object").style.top=verticalPos;
    document.getElementById("object").style.left=horizontalPos;



    var shapeNumber = Math.floor(Math.random() * 2) + 1  

    if (shapeNumber == 1){

        document.getElementById("object").style.borderRadius = "50%";

    }

    document.getElementById("object").style.display = "block";
    start = new Date().getTime();

}

function appearAfterDelay(){

   setTimeout(makeShapeAppear, Math.floor(Math.random() * 3000));


}


function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}



