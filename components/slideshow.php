<style>
    .slideshow-container {
        position: relative;
        max-width: 100%;
        margin: auto;
        overflow: hidden;
    }
    .slides {
        display: none;
        overflow: hidden;
        width: 100%;
        height: 300px;
        border-radius: 29px;
    }

    .banner {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: blur(40px);
      opacity: 0.5;
       
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        margin-top:1.5rem;
        padding: 0 2rem;
        display: flex;
        align-items: start;
        justify-content: center;    
        flex-direction: column;
        color: white;
    }

    .overlay h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .overlay span {
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 0.5rem;
        max-width: 500px;
    }

    .overlay .genre {
        display: flex;
        gap: 1rem;
    }

    .overlay .genre span {
        background: rgba( 255, 255, 255, 0.1 );
        backdrop-filter: blur( 1.5px );
        -webkit-backdrop-filter: blur( 1.5px );
        border-radius: 29px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
        font-size: 0.75rem;
    }

    .overlay .game-links {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .btn1{
        padding: 0.5rem 1rem;
        background-color: white;
        border-radius: 29px;
        font-size: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn1 a{
        text-decoration: none;
        color: black;
    }
    
    .btn2{
        padding: 0.5rem 1rem;
        background-color: transparent;
        border: 1px solid white;
        border-radius: 29px;
        font-size: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn2 a{
        text-decoration: none;
        color: white;
    }
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 80%;
        right: 6%;
        width: auto;
        transition: 0.6s ease;
        user-select: none;
        padding: 0.5rem;
        background-color: #181717;
        border-radius: 29px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .next {
        right: 2%;
    }
    .prev:hover, .next:hover {
        background-color:rgb(48, 46, 46);
    }



</style>
<div class="slideshow-container">
    <div class="slides">
        <img class="banner" src="./assets/cp.jpg" style="width:100%">
        <div class="overlay">
            <div class="genre">
                <span>Action</span>
                <span>Adventure</span>
                <span>RPG</span>
            </div>
            <h1>Cyberpunk 2077</h1>
            <span>Cyberpunk 2077 is an open-world, action-adventure RPG set in the dystopian future of Night City, a megalopolis obsessed with power, glamour, and body modification.</span>
            <div class="game-links">
                <div class="btn1">
                    <img src="./assets/arr_right.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="game.php?id=41494">Know More</a>
                </div>
                <div class="btn2">
                    <img src="./assets/play.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="https://www.youtube.com/watch?v=BO8lX3hDU30" target="_blank">Watch Trailer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slides">
        <img class="banner" src="./assets/rl.jpg" style="width:100%">
        <div class="overlay">
            <div class="genre">
                <span>Sports</span>
                <span>Multiplayer</span>
                <span>Action</span>
            </div>
            <h1>Rocket League</h1>
            <span>Rocket League is a high-powered hybrid of arcade-style soccer and vehicular mayhem, featuring intense multiplayer action and competitive gameplay.</span>
            <div class="game-links">
                <div class="btn1">
                <img src="./assets/arr_right.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="game.php?id=3272">Know More</a>
                </div>
                <div class="btn2">
                <img src="./assets/play.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="https://www.youtube.com/watch?v=QVVz7EvdLRk" target="_blank">Watch Trailer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slides">
        <img class="banner" src="./assets/bmw.webp" style="width:100%">
        <div class="overlay">
            <div class="genre">
                <span>Action</span>
                <span>Adventure</span>
                <span>Fantasy</span>
            </div>
            <h1>Black Myth: Wukong</h1>
            <span>Experience the legendary journey of the Monkey King in this action-packed RPG, featuring stunning visuals and intense combat inspired by Chinese mythology.</span>
            <div class="game-links">
                <div class="btn1">
                <img src="./assets/arr_right.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="game.php?id=481913">Know More</a>
                </div>
                <div class="btn2">
                <img src="./assets/play.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="https://www.youtube.com/watch?v=O2nNljv0MOw" target="_blank">Watch Trailer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slides">
        <img class="banner" src="./assets/rdr2.webp" style="width:100%">
        <div class="overlay">
            <div class="genre">
                <span>Action</span>
                <span>Adventure</span>
                <span>Open-World</span>
            </div>
            <h1>Red Dead Redemption 2</h1>
            <span>Immerse yourself in the epic tale of outlaws in the American frontier, with breathtaking landscapes and a gripping story of loyalty and betrayal.</span>
            <div class="game-links">
                <div class="btn1">
                <img src="./assets/arr_right.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="game.php?id=28">Know More</a>
                </div>
                <div class="btn2">
                <img src="./assets/play.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="https://www.youtube.com/watch?v=eaW0tYpxyp0" target="_blank">Watch Trailer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slides">
        <img class="banner" src="./assets/marvel.webp" style="width:100%">
        <div class="overlay">
            <div class="genre">
                <span>Action</span>
                <span>Adventure</span>
                <span>Superheroes</span>
            </div>
            <h1>Marvel's Rivals</h1>
            <span>Join Earth's mightiest heroes in an action-adventure game that combines cinematic storytelling with thrilling single-player and co-op gameplay.</span>
            <div class="game-links">
                <div class="btn1">
                <img src="./assets/arr_right.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="game.php?id=993875">Know More</a>
                </div>
                <div class="btn2">
                <img src="./assets/play.svg" alt="arrow" style="width: 20px; height: 20px;">
                    <a href="https://www.youtube.com/watch?v=-b0veB7q9P4" target="_blank">Watch Trailer</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a class="prev" onclick="plusSlides(-1)"><img src="./assets/arr_right.png" alt="arrow" style="width: 20px; height: 20px;"></a>
        <a class="next" onclick="plusSlides(1)"><img src="./assets/arr_right.png" alt="arrow" style="width: 20px; height: 20px; rotate: 180deg;"></a>
    </div>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("slides");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slides[slideIndex].style.display = "block";  
    }

    function plusSlides(n) {
        let slides = document.getElementsByClassName("slides");
        slides[slideIndex].style.display = "none";  
        slideIndex = (slideIndex + n) % slides.length;
        if (slideIndex < 0) { slideIndex = slides.length - 1 }
        slides[slideIndex].style.display = "block";
    }
</script>