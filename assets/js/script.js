// MENU
let menuOpener = document.querySelector('.menu-opener');
let nav = document.querySelector('header nav');

menuOpener.addEventListener('click', () => {
    if (nav.classList.contains('opened')) {
        nav.classList.remove('opened');
        menuOpener.querySelector('.close-icon').style.display = 'none';
        menuOpener.querySelector('.hamburger-icon').style.display = 'flex';
    } else {
        nav.classList.add('opened');
        menuOpener.querySelector('.close-icon').style.display = 'flex';
        menuOpener.querySelector('.hamburger-icon').style.display = 'none';
    }
});

function popup() {
    Swal.fire({
        position: "top",
        icon: "success",
        iconColor: "#23A669",
        title: "Verifique sua caixa de entrada",
        html: `<p style="font-size: 17px; margin="0px"">o link de ativação de cadastro foi enviado para seu e-mail.</p>`,
            showConfirmButton: false,
        width: "27rem",
        showCloseButton: true,
        background: "#fafafa",
        color: "#000",
        customClass: {
            title: 'custom-title',
        }
    });

}

function xx(){
    document.getElementsById(logAlet)
}
function errorLogin() {
    Swal.fire({
        position: "top",
        icon: "error",
        iconColor: "#C23A42",
        title: "Falha no login",
        html: `<p style="font-size: 17px; margin="0px"">Seu email ou senha estão incorretos.</p>`,
            showConfirmButton: false,
        width: "27rem",
        showCloseButton: true,
        background: "#fafafa",
        color: "#000",
        customClass: {
            title: 'custom-title',
        }
    });
}

function senhasNaoCoincidem(){
    Swal.fire({
        position: "top",
        icon: "success",
        iconColor: "#23A669",
        title: "Você já possui uma conta!",
            showConfirmButton: false,
        width: "27rem",
        showCloseButton: true,
        background: "#fafafa",
        color: "#000",
        customClass: {
            title: 'custom-title',
        }
    });
}

function senhaAtualIncorreta(){
    Swal.fire({
        position: "top",
        icon: "info",
        title: "Senha incorreta",
        text: "Sua senha atual está incorreta, digite novamente.",
            showConfirmButton: false,
        width: "27rem",
        showCloseButton: true,
        background: "#fafafa",
        color: "#000",
        customClass: {
            title: 'custom-title',
        }
    });
}





