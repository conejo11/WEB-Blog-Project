$('.form').find('input, textarea').on('keyup blur focus', function (e) {

  var $this = $(this),
      label = $this.prev('label');

      if (e.type === 'keyup') {
            if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight');
            } else {
            label.removeClass('highlight');
            }
    } else if (e.type === 'focus') {

      if( $this.val() === '' ) {
            label.removeClass('highlight');
            }
      else if( $this.val() !== '' ) {
            label.addClass('highlight');
            }
    }

});

$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});

$("#senhaSignup").on("change keyup paste", function(){
    let label = document.getElementById('labelSenhaSignUp')
    let val = $(this).val();
    if (val.length == 0 && !$(this).foi){
        label.innerHTML = '<font style="font-color: rgba(255, 255, 255, 0.5)/">Senha</font><span class="req">*</span>'
        return;
    }
    $(this).foi = true;
    if (val.length < 5){
        label.innerHTML = '<font color="#FF0000">A senha precisa de no minimo 5 caracteres!</font>'
    } else {
        label.innerHTML = '<font color="#00FF00">A senha esta aceitavel!</font>'
        if (val.length > 9){
            label.innerHTML = '<font color="#00FF00">A senha esta muito boa!!</font>'
        }
    }
    label.style.fontSize = 14
})

$("#usuarioSignup").on("change keyup paste keypress", function(){
    let label = document.getElementById('labelUsuarioSignUp')
    let val = $(this).val();
    if (val.length == 0 && !$(this).foi){
        label.innerHTML = '<font style="font-color: rgba(255, 255, 255, 0.5)/">Usuário</font><span class="req">*</span>'
        return;
    }
    $(this).foi = true;
    if (val.length < 3){
        label.innerHTML = '<font color="#FF0000">O usuário precisa de no minimo 3 caracteres!</font>'
    } else {
        label.innerHTML = '<font color="#00FF00">O usuário esta OK!</font>'
    }
    label.style.fontSize = 14
})

$("#nomecompletoSignup").on("change keyup paste keypress", function(){
    let label = document.getElementById('labelNomeCompletoSignUp')
    let val = $(this).val();
    if (val.length == 0 && !$(this).foi){
        label.innerHTML = '<font style="font-color: rgba(255, 255, 255, 0.5)/">Nome Completo</font><span class="req">*</span>'
        return;
    }
    $(this).foi = true;

    label.innerHTML = '<font color="#00FF00">O nome esta OK!</font>'
})

function empty(str){
    return (!str || 0 === str.length);
}

function checkSignUp(){
    let nomeCompleto = document.getElementById('nomecompletoSignup').value;
    let usuario = document.getElementById('usuarioSignup').value;
    let pw = document.getElementById('senhaSignup').value;


    return isNomeCompletoValid(nomeCompleto) && isUsuarioValid(usuario) &&  isSenhaValid(pw)
}

function checkLogin(){

}

function isSenhaValid(pw){

    let label = document.getElementById('labelSenhaSignUp')
    if (empty(pw)){
        return true;
    }
    if (pw.length < 5){
        let s = label.style.fontSize
        let size = Number(s.substring(0, s.length - 2));
        if (size < 14) size = 14;
        label.innerHTML = '<font color="#FF0000">A senha precisa de no minimo 5 caracteres!</font>'
        label.style.fontSize = size + 1
        return false;
    }
    return 3;
}

function isUsuarioValid(nome){
    let label = document.getElementById('labelUsuarioSignUp')
    if (empty(nome)){
        return true;
    }
    if (nome.length < 3){
        let s = label.style.fontSize
        let size = Number(s.substring(0, s.length - 2));
        if (size < 14) size = 14;
        label.innerHTML = '<font color="#FF0000">O usuário precisa de no minimo 3 caracteres!</font>'
        label.style.fontSize = size + 1
        return false;
    }
    return 3;
}

function isNomeCompletoValid(nome){
    let label = document.getElementById('labelNomeCompletoSignUp')
    if (empty(nome)){
        return true;
    }
    return 3;
}
