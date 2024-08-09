<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .slider-container {
  position: relative;
  width: 200px;  /* largura do slider */
  height: 300px; /* altura do slider */
  overflow: hidden;
}

.slider {
  display: flex;
  flex-direction: column; /* direção dos slides para cima/baixo */
  transition: transform 0.5s ease-in-out;
}

.slide {
  min-height: 100%; /* cada slide ocupará toda a altura do container */
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #f0f0f0;
  border: 1px solid #ddd;
}

button {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(255, 255, 255, 0.8);
  border: none;
  padding: 10px;
  cursor: pointer;
}

.prev {
  top: 10px;
}

.next {
  bottom: 10px;
}

    </style>
</head>

<body>
    <button onclick="popup()">teste</button>


    <!-- editar senha -->
    <div class="card-user">
        <div class="title-card-user">
            <img src="../icons/key.svg" alt="">
            <h2>Senha</h2>
        </div>

       
    </div>


    <div class="slider-container">
  <div class="slider">
    <div class="slide">Slide 1</div>
    <div class="slide">Slide 2</div>
    <div class="slide">Slide 3</div>
    <div class="slide">Slide 4</div>
  </div>
  <button class="prev">↑</button>
  <button class="next">↓</button>
</div>


</body>

</html>
<script type='text/javascript'>
    function popup() {
        Swal.fire({
            position: "top",
            icon: "success",
            title: "Verifique sua caixa de entrada",
            text: " o link de ativação de cadastro foi enviado para seu e-mail.",
            showConfirmButton: false,
            width: "30rem",
            showCloseButton: true,
            background: "#fafafa",
        });

    }

    let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

document.querySelector('.next').addEventListener('click', () => {
  if (currentSlide < totalSlides - 1) {
    currentSlide++;
    updateSlider();
  }
});

document.querySelector('.prev').addEventListener('click', () => {
  if (currentSlide > 0) {
    currentSlide--;
    updateSlider();
  }
});

function updateSlider() {
  const slider = document.querySelector('.slider');
  slider.style.transform = `translateY(-${currentSlide * 100}%)`;
}

</script>