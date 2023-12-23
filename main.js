// $('.message a').click(function(){
//     $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
//     // $('form').display = 'none';

//  });
var play = ["login-form","register-form"];
function Show(i){
    if (i==0){
        (document.getElementsByClassName(play[1])[0]).style.display = 'none';
        (document.getElementsByClassName(play[0])[0]).style.display = 'block';
    }else {
        (document.getElementsByClassName(play[0])[0]).style.display = 'none';
        (document.getElementsByClassName(play[1])[0]).style.display = 'block';
    }
}
