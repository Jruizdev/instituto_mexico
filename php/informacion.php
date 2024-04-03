<?php
function mostrarInformacion () {
    if(!isset($_GET['de'])) return;
    $detalles = new InformacionInstituto ();

    switch($_GET['de']) {

        // Mostrar información de la sección seleccionada
        case 'fachada': echo $detalles->informacionFachada(); break;
        case 'salones': echo $detalles->informacionSalones(); break;
        case 'gimnasio': echo $detalles->informacionGimnasio(); break;
        case 'biblioteca': echo $detalles->informacionBiblioteca(); break;
        case 'laboratorio': echo $detalles->informacionLaboratorio(); break;
        case 'canchas': echo $detalles->informacionCanchas(); break;
    }
}

class InformacionInstituto {
    
    function informacionFachada () {
        return '
        <h2 class="text-center m-4">Fachada del Instituto</h2>
        <hr class="hr" />
        <div class="row my-5">
            <div class="col-12 col-md-6"><img class="img-fluid" src="../img/fachada.jpg"></div>
            <div class="col-12 col-md-6 mt-4 my-md-0">
                <p>La fachada del Instituto México se presenta como una entrada a un mundo de oportunidades y crecimiento personal para padres de familia y estudiantes en busca de una educación excepcional. Desde el primer vistazo, su arquitectura imponente y acogedora transmite un mensaje de excelencia y compromiso con el desarrollo integral de cada individuo.</p>
            </div>
        </div>
        ';
    }
    function informacionSalones () {
        return '
        <h2 class="text-center m-4">Salones</h2>
        <hr class="hr" />
        <div class="row my-5">
            <div class="col-12 col-md-6"><img class="img-fluid" src="../img/salones.jpeg"></div>
            <div class="col-12 col-md-6 mt-4 my-md-0">
                <p>Los salones del Instituto México son espacios diseñados para inspirar el aprendizaje y fomentar el desarrollo académico y personal de nuestros estudiantes. Cada aula está cuidadosamente equipada con tecnología de vanguardia y recursos didácticos que facilitan la interacción y el intercambio de ideas.</p>
            </div>
        </div>
        ';
    }
    function informacionGimnasio () {
        return '
        <h2 class="text-center m-4">Gimnasio</h2>
        <hr class="hr" />
        <div class="row my-5">
            <div class="col-12 col-md-6"><img class="img-fluid" src="../img/gimnasio.jpeg"></div>
            <div class="col-12 col-md-6 mt-4 my-md-0">
                <p>El gimnasio del Instituto México es mucho más que un espacio para el ejercicio físico; es el corazón palpitante de nuestra comunidad estudiantil. Con instalaciones de primera clase y equipos de última tecnología, nuestro gimnasio ofrece un ambiente dinámico y motivador para el desarrollo integral de nuestros estudiantes.</p>
            </div>
        </div>
        ';
    }
    
    function informacionBiblioteca () {
        return '
        <h2 class="text-center m-4">Biblioteca</h2>
        <hr class="hr" />
        <div class="row my-5">
            <div class="col-12 col-md-6"><img class="img-fluid" src="../img/biblioteca.jpg"></div>
            <div class="col-12 col-md-6 mt-4 my-md-0">
                <p>La biblioteca del Instituto México es mucho más que un simple depósito de libros; es un santuario del conocimiento y la exploración intelectual. Con un ambiente tranquilo y acogedor, nuestra biblioteca ofrece a los estudiantes un espacio dedicado para el estudio, la investigación y la expansión de sus horizontes intelectuales.</p>
            </div>
        </div>
        ';
    }

    function informacionLaboratorio () {
        return '
        <h2 class="text-center m-4">Laboratorios</h2>
        <hr class="hr" />
        <div class="row my-5">
            <div class="col-12 col-md-6"><img class="img-fluid" src="../img/laboratorio.jpg"></div>
            <div class="col-12 col-md-6 mt-4 my-md-0">
                <p>Los laboratorios del Instituto México son espacios dedicados a la experimentación, la investigación y el descubrimiento científico. Equipados con tecnología de vanguardia y herramientas especializadas, nuestros laboratorios ofrecen a los estudiantes la oportunidad de explorar el fascinante mundo de la ciencia de manera práctica y dinámica.</p>
            </div>
        </div>
        ';
    }

    function informacionCanchas () {
        return '
        <h2 class="text-center m-4">Canchas</h2>
        <hr class="hr" />
        <div class="row my-5">
            <div class="col-12 col-md-6"><img class="img-fluid" src="../img/canchas.jpeg"></div>
            <div class="col-12 col-md-6 mt-4 my-md-0">
                <p>Las canchas deportivas del Instituto México son el escenario donde se cultivan valores de trabajo en equipo, disciplina y salud física. Dotadas con instalaciones de primera calidad, nuestras canchas ofrecen un entorno vibrante y seguro para la práctica de una amplia variedad de deportes.</p>
            </div>
        </div>
        ';
    }
}

?>