function decreaseNumber() {
  var numberInput = document.getElementById("myNumber");
  var currentValue = parseInt(numberInput.value);
  numberInput.value = currentValue - 1;
    if(numberInput.value<=0){
        numberInput.value = 1;
    };
}
function increaseNumber() {
  var numberInput = document.getElementById("myNumber");
  var currentValue = parseInt(numberInput.value);
  numberInput.value = currentValue + 1;
}