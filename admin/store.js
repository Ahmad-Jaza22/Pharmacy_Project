
var removeCartItemButtons = document.getElementsByClassName('la-trash')
for(var i = 0 ; i<removeCartItemButtons;i++){
    var button= removeCartItemButtons[i]
    button.addEventListener('click',function (event) {
        var buttonClicked = event.target
        buttonClicked.parentElement.parentElement.parentElement.remove()

    })

}
























