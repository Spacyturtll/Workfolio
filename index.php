<?php
$email = "mathiasmj18@gmail.com";
$phone = "06 60 43 45 75";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_email = $_POST['from_email'];
    $from_name = $_POST['from_name'];
    $to_email = $_POST['to_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mathiasmj18@gmail.com';
        $mail->Password = 'qedz radj fexk gobj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($from_email, $from_name);
        $mail->addAddress($to_email);

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
    <script>
        function toggleMenu() {
            document.getElementById("dropdown-menu").classList.toggle("hidden");
        }


        function showPopup() {
            document.getElementById("contact-popup").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("contact-popup").style.display = "none";
        }

        function toggleMenu() {
            document.getElementById("dropdown-menu").classList.toggle("hidden");
        }
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'bounce-slow': 'bounce 2s infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                    }
                }
            }
        }
    </script>
</head>

<body style="background-color: #FEFEE2;">
    <div class="ml-[15%]">
        <nav class="fixed top-0 right-0 shadow-md p-4 z-50" style="background-color: #fefee2;">
            <div class="relative inline-block text-left">
                <button onclick="toggleMenu()" class="text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" style="background-color: #3F7D58;">
                    Menu
                </button>
                <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 shadow-lg rounded-md hidden" style="background-color: #ffffff;">
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Accueil</a>
                    <a href="./cv.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">CV</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100" onclick="showPopup()">Contact</a>
                </div>
            </div>
            <div class="ml-[15%]">
                <div id="contact-popup" class="popup">
                    <div class="popup-content max-w-md w-full bg-white p-6 rounded-lg shadow-xl relative">
                        <span class="close-popup absolute top-2 right-2 text-gray-600 cursor-pointer" onclick="closePopup()">&#10006;</span>
                        <form method="post" action="">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="from_email">Votre Email (expéditeur)</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="from_email" placeholder="Votre Email (expéditeur)" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="from_name">Votre Nom</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="from_name" placeholder="Votre Nom" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="to_email">Email du Destinataire</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="to_email" placeholder="Email du Destinataire" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">Sujet</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="subject" placeholder="Sujet" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Votre Message</label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="message" placeholder="Votre Message" required></textarea>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </nav>

        <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-8 h-64" style="background-color: #3F7D58;"></div>
        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 w-8 h-64" style="background-color: #3F7D58;"></div>

        <div class="w-full max-w-5xl rounded-lg overflow-hidden relative mt-16" style="background-color: #fefee2;">
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color:#3F7D58;"></div>
                <div class="col-span-3 h-24 flex items-center justify-center" style="background-color: #fefee2;">
                    <h1 class="text-6xl font-bold" style="color:#3F7D58;">DESIGN</h1>
                </div>
                <div class="h-24" style="background-color:#3F7D58;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
            <div class="text-center py-4">
                <p class="text-lg" style="color: #3F7D58;">Design Portfolio</p>
                <p class="text-sm" style="color: #3F7D58;"><?php echo $email; ?></p>
                <p class="text-sm" style="color: #3F7D58;"><?php echo $phone; ?></p>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color:#3F7D58;"></div>
                <div class="col-span-3 h-24 flex items-center justify-center" style="background-color: #fefee2;">
                    <h2 class="text-6xl font-bold" style="color:#3F7D58;">PORTFOLIO</h2>
                </div>
                <div class="h-24" style="background-color:#3F7D58;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>

        <div class="w-full max-w-5xl rounded-lg overflow-hidden relative mt-16" style="background-color: #fefee2;">
            <div class="grid grid-cols-2 gap-0 text-green-800 text-3xl font-bold">
                <div class="p-6 border-b-4 border-green-700 transition duration-300 transform hover:scale-110 hover:text-blue-500"><a href="#aboutMe">About me</a></div>
                <div class="p-6 border-b-4 border-green-700 text-gray-800 transition duration-300 transform hover:scale-110 hover:text-blue-500"><a href="#project1">Project 1</a></div>
                <div class="p-6 border-b-4 border-green-700 text-gray-800 transition duration-300 transform hover:scale-110 hover:text-blue-500"><a href="#project2"></a>Project 2</div>
                <div class="p-6 border-b-4 border-green-700 text-gray-800 transition duration-300 transform hover:scale-110 hover:text-blue-500"><a href="#project3"></a>Project 3</div>
                <div class="p-6 border-b-4 border-green-700 text-gray-800 transition duration-300 transform hover:scale-110 hover:text-blue-500">Experience</div>
                <div class="p-6 border-b-4 border-green-700 text-gray-800 transition duration-300 transform hover:scale-110 hover:text-blue-500">Contact</div>
            </div>
        </div>
        <div class="group">
            <div class="grid grid-cols-2 text-green-800 text-sm p-4">
                <div class="group-hover:before:content-['👋'] group-hover:before:mr-2 ">Mathias joquet</div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="w-full flex justify-start">
        <h1 class="text-3xl font-bold text-green-800 pl-8">About Me</h1>
    </div>
    <br>
    <br>
    <section class="w-screen left-2 w-[633px] h-[884px] flex">
        <img src="./assets/IMG_3220.jpeg" alt="photo de Mathias Joquet" class="pl-1 rounded-md">
        <div class="flex items-center px-4 py-2 rounded-lg"></div>
        <div>
            <h1 id="aboutMe" class="w-full text-black font-bold text-xl pt-30 pl-10 pb-17 justify-center transition-opacity duration-300 group-hover:opacity-0">
                <div class="pr-10">
                    <p class="text-lg text-gray-800 transition duration-300 transform hover:scale-110 hover:text-yellow-500 text-white leading-relaxed text-center max-w-2xl mx-auto p-6 rounded-xl shadow-md transform -translate-x-10" style="background-color: #3F7D58">
                        Passionné d’informatique depuis toujours, <br> j’ai débuté mon parcours en réalisant plusieurs stages en entreprise, me permettant d’acquérir une première expérience concrète dans le développement. <br>Fort de cette immersion dans le monde professionnel, j’ai choisi de poursuivre mes études à Epitech pour approfondir mes connaissances et affiner mes compétences <br>Animé par la volonté d’innover et de progresser, je suis actuellement à la recherche d’une alternance afin de mettre en pratique mon savoir-faire, continuer à apprendre <br>aux côtés de professionnels et contribuer activement à des projets concrets.
                    </p>
                    <br>
                    <p class="text-lg text-white leading-relaxed text-gray-800 transition duration-300 transform hover:scale-110 hover:text-yellow-500 text-center max-w-2xl mx-auto p-6 rounded-xl shadow-md transform -translate-x-10" style="background-color: #3F7D58">Au fil de mes études en développement, j’ai acquis de solides compétences en programmation, en conception d’applications et en gestion de projets web. Grâce à ma formation à Epitech,
                        <br>j’ai développé une expertise en algorithmie, en développement full-stack et en utilisation des frameworks <br> Mon parcours m’a également permis d’explorer différentes méthodologies de travail, notamment l’apprentissage par projet et le travail en équipe.
                        En complément de ma formation, j’ai effectué un stage d’un mois chez <a href="https://www.simplon.co/"><strong>Simplon</strong></a>, où j’ai pu mettre en pratique mes connaissances dans un environnement professionnel et collaboratif. <br> J’ai également relevé le défi de la piscine de <a href="https://42.fr/"><strong>l’école 42</strong></a>, une immersion intensive qui m’a permis d’affiner ma capacité à résoudre <br>des problèmes complexes et à m’adapter rapidement à de nouveaux langages et concepts.
                        <br>
                    </p>
                </div>
            </h1>
        </div>
    </section>
    <br>
    <br>
    <br>

    <section class="text-green-900 font-sans p-10" style="background-color: #fefee2;">
        <div class="max-w-7xl mx-auto border-8 border-green-900 p-12 relative">
            <h1 id="project1" class="text-9xl font-bold border-b-8 border-green-700 pb-4 text-center transition duration-300 transform hover:scale-110 hover:text-yellow-500 text-white leading-relaxed text-center max-w-2xl mx-auto p-6 rounded-xl shadow-md transform -translate-x-10 bg-green-700"><a href="https://github.com/spacyturtlee/myutils" target="_blank">ToDo list</a></h1>
            <div class="grid grid-cols-2 gap-12 mt-12 relative">
                <div class="pr-12 text-2xl">
                    <div class="border-b-8 border-green-900 pb-6">
                        <h2 class="text-lg font-bold uppercase">School</h2>
                        <p class="text-4xl font-bold">School project</p>
                    </div>
                    <div class="border-t-8 border-green-900 mt-6 pt-6">
                        <h2 class="text-lg font-bold uppercase">Role</h2>
                        <p class="text-2xl">Une To-Do List (ou liste de tâches) est un outil permettant d'organiser, prioriser et suivre l'accomplissement de diverses tâches. Elle peut être utilisée aussi bien pour des projets professionnels que pour des tâches personnelles du quotidien.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 top-0 h-full w-6 bg-green-900 transform -translate-x-1/2"></div>
                <div class="pl-12 text-2xl">
                    <div class="border-b-8 border-green-900 pb-6">
                        <h2 class="text-lg font-bold uppercase">Skills / Tools</h2>
                        <ul class="list-disc pl-10">
                            <li>PHP</li>
                            <li>Trello</li>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>JavaScript</li>
                        </ul>
                    </div>
                    <div class="border-t-8 border-green-900 mt-6 pt-6">
                        <h2 class="text-lg font-bold uppercase">Timeline</h2>
                        <p class="text-2xl">Ce projet a été réalisé en une après-midi lors d'un contrôle noté.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-green-900 font-sans p-10" style="background-color: #fefee2;">
        <div class="max-w-7xl mx-auto border-8 border-green-900 p-12 relative">
            <h1 id="project2" class="text-9xl font-bold border-b-8 border-green-700 pb-4 text-center transition duration-300 transform hover:scale-110 hover:text-yellow-500 text-white leading-relaxed text-center max-w-2xl mx-auto p-6 rounded-xl shadow-md transform -translate-x-10 bg-green-700"><a href="https://github.com/spacyturtlee/power4" target="_blank">Power 4</a></h1>
            <div class="grid grid-cols-2 gap-12 mt-12 relative">
                <div class="pr-12 text-2xl">
                    <div class="border-b-8 border-green-900 pb-6">
                        <h2 class="text-lg font-bold uppercase">School</h2>
                        <p class="text-4xl font-bold">School project</p>
                    </div>
                    <div class="border-t-8 border-green-900 mt-6 pt-6">
                        <h2 class="text-lg font-bold uppercase">Role</h2>
                        <p class="text-2xl">Le Puissance 4 est un jeu de stratégie où deux joueurs s'affrontent. Chacun leur tour, ils placent un jeton dans une colonne d'une grille de 6 rangées sur 7 colonnes. L'objectif est d'aligner quatre jetons consécutifs, horizontalement, verticalement ou en diagonale, avant l'adversaire. Le jeu se termine lorsqu'un joueur parvient à cet alignement ou que la grille est remplie sans vainqueur, entraînant une égalité.</p>
                    </div>
                </div>
                <div class="absolute left-1/2 top-0 h-full w-6 bg-green-900 transform -translate-x-1/2"></div>
                <div class="pl-12 text-2xl">
                    <div class="border-b-8 border-green-900 pb-6">
                        <h2 class="text-lg font-bold uppercase">Skills / Tools</h2>
                        <ul class="list-disc pl-10">
                            <li>Node.js</li>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>Github</li>
                        </ul>
                    </div>
                    <div class="border-t-8 border-green-900 mt-6 pt-6">
                        <h2 class="text-lg font-bold uppercase">Timeline</h2>
                        <p class="text-2xl">Ce projet a été réalisé en 1 semaine lors d'un projet individuelle.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-green-900 font-sans p-10" style="background-color: #fefee2;">
        <div class="max-w-7xl mx-auto border-8 border-green-900 p-12 relative">
            <h1 id="project3" class=" text-2xl text-9xl font-bold border-b-8 border-green-700 pb-4 text-center transition duration-300 transform hover:scale-110 hover:text-yellow-500 text-white leading-relaxed text-center max-w-2xl mx-auto p-6 rounded-xl shadow-md transform -translate-x-10 bg-green-700"><a href="https://github.com/spacyturtlee/power4" target="_blank">Mycinema</a></h1>
            <div class="grid grid-cols-2 gap-12 mt-12 relative">
                <div class="pr-12 text-2xl">
                    <div class="border-b-8 border-green-900 pb-6">
                        <h2 class="text-lg font-bold uppercase">School</h2>
                        <p class="text-4xl font-bold">School project</p>
                    </div>
                    <div class="border-t-8 border-green-900 mt-6 pt-6">
                        <h2 class="text-lg font-bold uppercase">Role</h2>
                        <p class="text-2xl">Le but est de reproduire le site d'un gerant de cinema (ex: pathé gaumont) qui a sa propre base de donnée sql, on peux rechercher un film par son nom, genre ou encore par le réalisateur</p>
                    </div>
                </div>
                <div class="absolute left-1/2 top-0 h-full w-6 bg-green-900 transform -translate-x-1/2"></div>
                <div class="pl-12 text-2xl">
                    <div class="border-b-8 border-green-900 pb-6">
                        <h2 class="text-lg font-bold uppercase">Skills / Tools</h2>
                        <ul class="list-disc pl-10">
                            <li> database sql</li>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>Github</li>
                        </ul>
                    </div>
                    <div class="border-t-8 border-green-900 mt-6 pt-6">
                        <h2 class="text-lg font-bold uppercase">Timeline</h2>
                        <p class="text-2xl">Ce projet a été réalisé en 2 semaine lors d'un projet individuelle.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="bg-gren-700 font-sans p-8 max-w-4xl mx-auto text-green-900">
        <div class="space-y-8 ">

            <h1 class="text-3xl font-bold uppercase text-green-900 animate-fade-in hover:animate-pulse-slow transition-all duration-500">EXPERIENCE</h1>


            <table class="w-full border-collapse">
                <tbody>

                    <tr class="border-t-2 border-b-2 border-gray-300 animate-slide-up hover:bg-yellow hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1 text-green-900">
                        <td class="py-4 w-1/4 align-top font-medium text-green-600 group relative">
                            <span class="group-hover:before:content-['→'] group-hover:before:absolute group-hover:before:-left-5 group-hover:before:animate-bounce-slow text-green-900">2022</span>
                        </td>
                        <td class="py-4 w-2/4 align-top">
                            <div class="font-medium text-green-600 hover:text-green-700 transition-all duration-300 hover:pl-2 hover:border-l-4 hover:border-green-400 text-green-900">Lycée Magnan</div>
                            <div class="text-green-500 hover:text-green-600 transition-all duration-300 text-green-900">Baccalauréat Informatique</div>
                        </td>
                        <td class="py-4 w-1/4 align-top font-medium text-green-700 group relative text-green-900">
                            <span class="group-hover:after:content-['!'] group-hover:after:text-yellow-500 group-hover:after:animate-pulse-slow text-green-900">Education</span>
                        </td>
                        <td class="py-4 w-2/4 align-top text-green-600 hover:text-green-700 transition-all duration-300 hover:font-semibold text-green-900">Lycéé général Magnan, Bac obtenu en 2023</td>
                    </tr>


                    <tr class="border-t-2 border-b-2 border-gray-300 animate-slide-up animation-delay-100 hover:bg-green-50 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1 text-green-900">
                        <td class="py-4 w-1/4 align-top font-medium text-green-600 group relative">
                            <span class="group-hover:before:content-['→'] group-hover:before:absolute group-hover:before:-left-5 group-hover:before:animate-bounce-slow text-green-900">2023 - 2024</span>
                        </td>
                        <td class="py-4 w-2/4 align-top">
                            <div class="font-medium text-green-600 hover:text-green-700 transition-all duration-300 hover:pl-2 hover:border-l-4 hover:border-green-400 text-green-900">Ecole 42</div>
                            <div class="text-green-500 hover:text-green-600 transition-all duration-300 text-green-900">Piscine 42, initiation aux language C/C++, Back end</div>
                        </td>
                        <td class="py-4 w-1/4 align-top font-medium text-green-600 group relative">
                            <span class="group-hover:after:content-['★'] group-hover:after:absolute group-hover:after:-right-5 group-hover:after:text-yellow-400 group-hover:after:animate-spin group-hover:after:duration-1000 text-green-900">Stage multiple</span>
                        </td>
                        <td class="py-4 w-2/4 align-top">
                            <ul class="list-disc list-inside space-y-1 text-green-600">
                                <li class="hover:bg-gradient-to-r hover:from-green-100 hover:to-transparent hover:pl-2 hover:rounded-r hover:font-medium transition-all duration-300 text-green-900"><a href="https://www.nrj.fr/actus/l-ecole-42-elue-meilleure-code-factory-31267520">Award</a></li>
                                <li class="hover:bg-gradient-to-r hover:from-green-100 hover:to-transparent hover:pl-2 hover:rounded-r hover:font-medium transition-all duration-300 text-green-900"><a href="https://www.eventbrite.fr/d/france--saint-denis/ecole-42/" target="blank">Conference Talk</a></li>
                                <li class="hover:bg-gradient-to-r hover:from-green-100 hover:to-transparent hover:pl-2 hover:rounded-r hover:font-medium transition-all duration-300 text-green-900"><a href="https://www.instagram.com/simplonco/?hl=fr">Publication</a></li>
                            </ul>
                        </td>
                    </tr>


                    <tr class="border-t-2 border-b-2 border-gray-300 animate-slide-up animation-delay-200 hover:bg-green-50 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                        <td class="py-4 w-1/4 align-top font-medium text-green-600 group relative">
                            <span class="group-hover:before:content-['→'] group-hover:before:absolute group-hover:before:-left-5 group-hover:before:animate-bounce-slow text-green-900">2024 - 2026</span>
                        </td>
                        <td class="py-4 w-2/4 align-top">
                            <div class="font-medium text-green-600 hover:text-green-700 transition-all duration-300 hover:pl-2 hover:border-l-4 hover:border-green-400 text-green-900">Epitech</div>
                            <div class="text-green-500 hover:text-green-600 transition-all duration-300 text-green-900">La formation d'Epitech est axée sur l'apprentissage par la pratique et la gestion de projets, visant à développer l'autonomie, la capacité à résoudre des problèmes et l'adaptabilité des étudiants aux évolutions du monde de la tech..</div>
                        </td>
                        <td class="py-4 w-1/4 align-top font-medium text-green-600 group relative">
                            <span class="group-hover:after:content-['↗'] group-hover:after:ml-1 group-hover:after:inline-block group-hover:after:animate-pulse-slow text-green-900">Links</span>
                        </td>
                        <td class="py-4 w-2/4 align-top">
                            <ul class="list-disc list-inside space-y-1 text-green-600 text-green-900">
                                <li class="hover:text-green-700 hover:underline hover:decoration-wavy hover:decoration-green-400 transition-all duration-300 flex items-center text-green-900">
                                    <span class="hover:before:content-['🌐'] hover:before:mr-1"><a href="https://www.epitech.eu/ecole-informatique/?utm_source=google&utm_medium=cpc&utm_campaign=21932387689&utm_content=&utm_term=&gad_source=1&gclid=Cj0KCQjwy46_BhDOARIsAIvmcwNnW9U1jfqugt-9ejui6Z9kYPUblPlWF4s101LLV--8C-3sLhqm7zoaAs1rEALw_wcB" target="_blank">Website</a></span>
                                </li>
                                <li class="hover:text-green-700 hover:underline hover:decoration-wavy hover:decoration-green-400 transition-all duration-300 flex items-center text-green-900">
                                    <span class="hover:before:content-['👥'] hover:before:mr-1"><a href="https://www.instagram.com/epitech.officiel/" target="_blank">Social</a></span>
                                </li>
                                <li class="hover:text-green-700 hover:underline hover:decoration-wavy hover:decoration-green-400 transition-all duration-300 flex items-center text-green-900">
                                    <span class="hover:before:content-['📄'] hover:before:mr-1"><a href="https://github.com/spacyturtlee" target="_blank">Published Work</a></span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>


            <div class="border-t-4  my-6 animate-fade-in animation-delay-300 hover:border-green-400 hover:scale-x-105 origin-left transition-all duration-500 text-green-900"></div>


            <div class="flex justify-between items-end animate-slide-up animation-delay-400 text-green-900">
                <div class="group ">
                    <div class="font-bold text-xl text-green-600 hover:text-green-700 transition-all duration-300 hover:pl-2 hover:border-l-4 hover:border-green-400 text-green-900">
                        <span class="group-hover:before:content-['👋'] group-hover:before:mr-2 text-green-900">Mathias JOQUET</span>
                    </div>
                    <div class="text-green-600 hover:text-green-700 transition-all duration-300 flex items-center text-green-900">
                        <span class="hover:before:content-['✉️'] hover:before:mr-1">mathiasmj18@email.com</span>
                    </div>
                </div>
                <div class="text-right group">
                    <div class="uppercase font-medium text-green-600 hover:text-green-700 transition-all duration-300 hover:tracking-wider hover:font-bold text-green-900">
                        <span class="group-hover:before:content-['🎨'] group-hover:before:mr-1 text-green-900">Design Portfolio</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-5xl rounded-lg overflow-hidden relative mt-16" style="background-color: #fefee2;">
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color:#3F7D58;"></div>
                <div class="col-span-3 h-24 flex items-center justify-center" style="background-color: #fefee2;">
                    <h1 class="text-6xl font-bold" style="color:#3F7D58;">THANKS</h1>
                </div>
                <div class="h-24" style="background-color:#3F7D58;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
            <div class="text-center py-4">
                <p class="text-lg" style="color: #3F7D58;">Design Portfolio</p>
                <p class="text-sm" style="color: #3F7D58;"><?php echo $email; ?></p>
                <p class="text-sm" style="color: #3F7D58;"><?php echo $phone; ?></p>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color:#3F7D58;"></div>
                <div class="col-span-3 h-24 flex items-center justify-center" style="background-color: #fefee2;">
                    <h2 class="text-6xl font-bold" style="color:#3F7D58;">YOU</h2>
                </div>
                <div class="h-24" style="background-color:#3F7D58;"></div>
            </div>
            <div class="grid grid-cols-5 gap-0">
                <div class="h-24" style="background-color: #fefee2;"></div>
                <div class="col-span-3 h-24" style="background-color: #3F7D58;"></div>
                <div class="h-24" style="background-color: #fefee2;"></div>
            </div>
        </div>

        <style>
            .animation-delay-100 {
                animation-delay: 0.1s;
            }

            .animation-delay-200 {
                animation-delay: 0.2s;
            }

            .animation-delay-300 {
                animation-delay: 0.3s;
            }

            .animation-delay-400 {
                animation-delay: 0.4s;
            }

            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .animate-spin {
                animation: spin 1s linear infinite;
            }
        </style>
</body>

</html>