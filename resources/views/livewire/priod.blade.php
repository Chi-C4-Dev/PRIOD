<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRIOD</title>
    <link rel="icon" href="{{asset('build/assets/imgs/LOGO PRIOD.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('build/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css')}}">
    <!-- para retirar depois-->
    <link rel="icon" href="https://priod.up.railway.app/build/assets/imgs/LOGO%20PRIOD.png" type="image/png">
<link rel="stylesheet" href="https://priod.up.railway.app/build/assets/css/styles.css">
<link rel="stylesheet" href="https://priod.up.railway.app/build/assets/css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://priod.up.railway.app/build/assets/css/animate.css">
<link rel="stylesheet" href="https://priod.up.railway.app/build/assets/css/bootstrap.min.css">


   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
       <!-- CSS do AOS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">

    
    @livewireStyles 
</head>
<body>
 
    <!-- Componente de Cabeçalho -->
    <livewire:header />

    <div class="principal-main">
        @yield('content')
    </div>

    <!-- Componente de Rodapé -->
    <livewire:footer />

    @livewireScripts

    @php
        $images = [
            asset('build/assets/imgs/imageSlide2.jpeg '),
            asset('build/assets/imgs/imageSlide3.jpeg '),
            asset('build/assets/imgs/imageSlide1.jpeg '),
            asset('build/assets/imgs/imageSlide4.jpeg '),
            asset('build/assets/imgs/imageSlide5.jpeg '),
            asset('build/assets/imgs/imageSlide6.jpeg '),
            asset('build/assets/imgs/imageSlide7.jpeg ') 
        ]
    @endphp
    <script>
        // Lista de URLs das imagens
        const imagens = @json($images);

        // Referência à seção
        const section = document.querySelector('.hero');
        let currentImageIndex = 0;

        // Função para trocar imagem
        function trocarImagem() {
            section.style.backgroundImage = `url(${imagens[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % imagens.length;
        }

        // Chama a função de troca de imagem a cada 5 segundos
        setInterval(trocarImagem, 5000);
    </script>

  <!-- Script do AOS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Inicializa o AOS
    AOS.init({
      duration: 800, // Define uma duração padrão (em milissegundos)
      once: false // Define se a animação ocorre uma vez (true) ou toda vez que entra na viewport (false)
    });
</script>



<script>
    //script do admin'panel
    document.addEventListener('DOMContentLoaded', function() {
        const courseForm = document.getElementById('courseForm');
        const serviceForm = document.getElementById('serviceForm');
        const coursesList = document.getElementById('coursesList');
        const servicesList = document.getElementById('servicesList');

        let courses = [];
        let services = [];

        courseForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(courseForm);
            const newCourse = Object.fromEntries(formData.entries());
            newCourse.content = newCourse.content.split('\n').filter(item => item.trim() !== '');
            courses.push(newCourse);
            updateCoursesList();
            courseForm.reset();
        });

        serviceForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(serviceForm);
            const newService = Object.fromEntries(formData.entries());
            services.push(newService);
            updateServicesList();
            serviceForm.reset();
        });

        function updateCoursesList() {
            coursesList.innerHTML = '';
            courses.forEach((course, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerHTML = `
                    <h3 class="mb-2">${course.name}</h3>
                    <p><strong>Duração:</strong> ${course.duration}</p>
                    <p><strong>Preço:</strong> ${course.price}</p>
                    <p><strong>Modalidade:</strong> ${course.modality}</p>
                    <p><strong>Descrição:</strong> ${course.description}</p>
                    <div>
                        <strong>Conteúdo Programático:</strong>
                        <ul>
                            ${course.content.map(item => `<li>${item}</li>`).join('')}
                        </ul>
                    </div>
                `;
                coursesList.appendChild(li);
            });
        }

        function updateServicesList() {
            servicesList.innerHTML = '';
            services.forEach((service, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.innerHTML = `
                    <h3 class="mb-2">${service.name}</h3>
                    <p><strong>Categoria:</strong> ${service.category}</p>
                    <p><strong>Descrição:</strong> ${service.description}</p>
                `;
                servicesList.appendChild(li);
            });
        }
    });
</script>

<script>
   

    document.addEventListener('DOMContentLoaded', function() {
        const servicesContainer = document.getElementById('servicesContainer');
        services.forEach(service => {
            servicesContainer.innerHTML += createServiceCard(service);
        });
    });
</script>

    
    <script src={{ asset('build/assets/js/jquery.min.js') }}></script>
    <script src={{ asset('build/assets/js/jquery-migrate-3.0.1.min.js')}}></script>
    <script src={{ asset('build/assets/js/jquery.stellar.min.js ')}}></script>
    <script src={{ asset('build/assets/js/owl.carousel.min.js')}}></script>
    <script src={{ asset('build/assets/js/jquery.magnific-popup.min.js')}}></script>
    <script src={{ asset('build/assets/js/aos.js')}}></script>
    <script src={{ asset('build/assets/js/scrollax.min.js')}}></script>
    <script src={{ asset('build/assets/js/main.js')}}></script>
    <script src={{ asset('build/assets/js/bootstrap.min.js')}}></script>
    <script src={{ asset('build/assets/js/bootstrap.bundle.js')}}></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        

 // Remove a mensagem após 5 segundos
 setTimeout(() => {
	const flashMessage = document.getElementById('flash-message');
	if (flashMessage) {
		flashMessage.style.display = 'none';
	}
}, 10000); // 5000ms = 5 segundos
    </script>
</body>
</html>
