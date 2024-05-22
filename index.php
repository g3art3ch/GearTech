<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main/main.css">
    <link rel="stylesheet" href="assets/css/main/header.css">
    <link rel="stylesheet" href="assets/css/main/banner.css">
    <link rel="stylesheet" href="assets/css/main/filter.css">
    <link rel="stylesheet" href="assets/css/main/brands.css">
    <link rel="stylesheet" href="assets/css/main/about-us.css">
    <link rel="stylesheet" href="assets/css/main/contact.css">
    <link rel="stylesheet" href="assets/css/main/footer.css">
    <link rel="stylesheet" href="assets/css/var.css">
    <title>GearTech</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="area">
                <div class="logo">
                    <a href="index.php">
                        <img src="./assets/images/logo.svg" alt="" />
                    </a>
                </div>
                <div class="menu-opener">
                    <div class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="close-icon">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="assets/pages/catalog.php">Catálogo</a></li>
                    <li><a href="">Manutenções</a></li>
                    <li class="dropdown">
                        <div class="user-enter">
                            <a href="assets/pages/login.php">
                                <img src="assets/icons/user.svg" alt="">
                                <a href="assets/pages/login.php" class="red">Entre em sua conta</a>
                                <img src="assets/icons/dowm-arrow.svg" alt="" class="arrow-dowm">
                            </a>
                        </div>
                        <ul class="dropdown-menu">
                            <div class="options-dropdowm">
                                <li><a href="#" onclick="exibirAlerta()">Minha conta</a></li>
                                <li><a href="#" onclick="exibirAlerta()">Sair</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="banner">
        <div class="container">
            <div class="area-banner">
                <div class="left-side">
                    <h2>Somos o melhor lugar para você <span>encontrar seu carro ideal</span></h2>
                    <p>Descubra o carro ideal para você! Com opções sob medida para seu estilo de vida!</p>
                </div>
                <div class="right-side">
                    <img src="assets/images/onix.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="filter">
        <div class="title-filter">
            <h2>Comece sua busca agora</h2>
        </div>



        <div class="container">
            <div class="card-filter">
                <form action="assets/pages/recommendation_process.php"  method="post"class="box-filter">
                    <div class="group-1">
                        <div class="itens-filter">
                            <div class="headline">
                                <img src="assets/icons/car.svg" alt="">
                                <div class="title-headline">Seu estilo de carro</div>
                            </div>
                            <select name="estilo" id="">
                                <option value="">Selecione seu estilo de carro</option>
                                <option value="Hatch">Hatch</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Suv">SUV</option>
                            </select>
                        </div>
                        <div class="itens-filter">
                            <div class="headline">
                                <img src="assets/icons/money.svg" alt="">
                                <div class="title-headline">Orçamento disponível</div>
                            </div>
                            <input type="range" id="preco" name="orcamento" min="0" max="999999" step="1" value="40000">
                            <input type="number" id="preco_valor" name="orcamento" readonly>
                        </div>
                        <div class="itens-filter">
                            <div class="headline">
                                <img src="assets/icons/fuel.svg" alt="">
                                <div class="title-headline">Tipo de combustível</div>
                            </div>
                            <select name="combustivel" id="">
                                <option value="">Selecione o tipo de combustível</option>
                                <option value="Gasolina">Gasolina</option>
                                <option value="Flex">Flex (Álcool e gasolina)</option>
                                <option value="Elétrico">Elétrico</option>
                            </select>
                        </div>

                    </div>

                    <div class="group-2">
                        <div class="itens-filter">
                            <div class="headline">
                                <img src="assets/icons/people.svg" alt="">
                                <div class="title-headline">Capacidade de passageiros</div>
                            </div>
                            <input type="number" name="capacidade" id="" placeholder="Selecione a quantidade de passageiros">
                        </div>
                        <div class="itens-filter">
                            <div class="headline">
                                <img src="assets/icons/volante.svg" alt="" width="20px">
                                <div class="title-headline">Uso do veículo</div>
                            </div>
                            <select name="tipoUso" id="">
                                <option value="">Selecione o uso do veículo</option>
                                <option value="diario">Diário</option>
                                <option value="passeio">Passeios</option>
                            </select>
                        </div>
                        <div class="itens-filter">
                            <button type="submit" name="submit">Procure agora</button>
                        </div>
                    </div>
                </form>
            </div>
    </section>

    <section class="about-us">
        <div class="container">
            <div class="title-about-us">
                <h2>Entenda o porquê a GearTech <br> foi feita para você</h2>
            </div>
            <div class="box-about-us">
                <div class="about-us-group">
                    <div class="box-about-us-image">
                        <img src="assets/icons/globe.svg" alt="">
                    </div>
                    <div class="title-about-us-group">
                        <h2>As melhores <br>marcas</h2>
                    </div>
                    <div class="desc-about-us-group">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam et amet, nostrum cumque
                            accusamus,
                            labore ipsum fuga suscipit, ipsam totam modi consequuntur tempore. Nihil consequatur eum
                            exercitationem placeat quibusdam maiores!</p>
                    </div>
                </div>
                <div class="about-us-group">
                    <div class="box-about-us-image">
                        <img src="assets/icons/hand.svg" alt="">
                    </div>
                    <div class="title-about-us-group">
                        <h2>Atenda a sua <br> necessidade</h2>
                    </div>
                    <div class="desc-about-us-group">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam et amet, nostrum cumque
                            accusamus,
                            labore ipsum fuga suscipit, ipsam totam modi consequuntur tempore. Nihil consequatur eum
                            exercitationem placeat quibusdam maiores!</p>
                    </div>
                </div>
                <div class="about-us-group">
                    <div class="box-about-us-image">
                        <img src="assets/icons/phone.svg" alt="">
                    </div>
                    <div class="title-about-us-group">
                        <h2>Prático, intuivo e <br> muito fácil</h2>
                    </div>
                    <div class="desc-about-us-group">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam et amet, nostrum cumque
                            accusamus,
                            labore ipsum fuga suscipit, ipsam totam modi consequuntur tempore. Nihil consequatur eum
                            exercitationem placeat quibusdam maiores!</p>
                    </div>
                </div>
                <div class="about-us-group">
                    <div class="box-about-us-image">
                        <img src="assets/icons/brain.svg" alt="">
                    </div>
                    <div class="title-about-us-group">
                        <h2>Facilita sua <br> decisão</h2>
                    </div>
                    <div class="desc-about-us-group">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam et amet, nostrum cumque
                            accusamus,
                            labore ipsum fuga suscipit, ipsam totam modi consequuntur tempore. Nihil consequatur eum
                            exercitationem placeat quibusdam maiores!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="brands">
        <div class="container">
            <div class="flex-logo">
                <div class="logotipos">
                    <img src="assets/images/honda.svg" alt="">
                    <img src="assets/images/volkswagen.svg" alt="">
                    <img src="assets/images/renault.svg" alt="">
                    <img src="assets/images/fiat-logo.svg" alt="">   
                    <img src="assets/images/hyundai-logo.svg" alt="">
                    <img src="assets/images/chevrolet-logo.svg" alt="">
                    <img src="assets/images/ford.svg" alt="">
                    <img src="assets/images/bmw-logo.svg" alt="">
                </div>
            </div>

        </div>
    </section>

    <section class="contact">
        <div class="title-contact">
            <h2>Ficou com alguma dúvida?<br>Entre em contato conosco</h2>
        </div>

        <div class="container">
            <div class="area-contact">
                <div class="desc-contact-mobile">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ipsum, nemo in minima necessitatibus magnam nostrum, ipsam quod</p>
                </div>

                <div class="left-side-contact">
                    <div class="card-form-contact">
                        <form action="">
                            <label for="">Nome completo</label>
                            <input type="text">
                            <label for="">Email</label>
                            <input type="email" name="" id="">
                            <label for="">Assunto</label>
                            <input type="text">
                            <label for="">Mensagem</label>
                            <textarea name="" id="" cols="20" rows="10"></textarea>
                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                </div>

                <div class="right-side-contact">
                    <div class="desc-contact">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>

                    <div class="card-channels">
                        <h2>Nosos canais</h2>
                        <div class="box-icons-channels">
                            <img src="assets/icons/email.svg" alt="">
                            <img src="assets/icons/instagram.svg" alt="">
                        </div>
                        <p>Email: suporte.geartech@gmail.com</p>
                        <p>Instagram: @geartech</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="box-footer">
                <div class="left-side-footer">
                    <div class="links">
                        <a href="">Termos de uso</a>
                        <a href="">Catálogo</a>
                        <a href="">Manutenções</a>
                    </div>
                    <div class="social-icons-footer">
                        <a href=""><img src="assets/icons/instagram-footer.svg" alt=""></a>
                        <a href=""><img src="assets/icons/email-footer.svg" alt=""></a>
                    </div>
                    <div class="mail-footer">
                        Email: suporte.geartech@gmail.com
                    </div>
                </div>
                <div class="right-side-footer">
                    <h2>Sobre nós</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
            <div class="copy">
                <a href="">© GearTech - Todos os direitos reservados</a>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
    <script>
function exibirAlerta() {
    window.alert("Você precisa estar logado");
}

    const precoInput = document.getElementById('preco');
    const precoValorInput = document.getElementById('preco_valor');

    precoValorInput.value = precoInput.value;

    precoInput.addEventListener('input', function() {
        precoValorInput.value = precoInput.value;
    });

    precoValorInput.addEventListener('change', function() {
        precoInput.value = precoValorInput.value;
    });

    </script>
</body>

</html>