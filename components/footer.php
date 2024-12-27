<style>
   footer{
    margin: 2rem 0;
    background-color: #160F0F;
    border-radius: 1rem;
    padding: 1rem 2rem;
    text-align: start;
    display: flex;
    flex-direction: column;
    align-items: start;
    gap:0.5rem;
}

.mail{
    margin: 0.5rem 0;
    border: 1px solid white;
    border-radius: 29px;
    padding: 1rem 3rem;
    font-size: 17px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.05s ease-in-out;
}
.mail:hover{
    background-color: white;
    color: #160F0F;
}
.link{
    text-decoration: none;
    color: #615858;


}
.link:hover{
    text-decoration: underline;
}
.headline{
    max-width: 250px;
    font-size: 2.4rem;
}

.credits{
    margin-top: 1.4rem;
}
.credits p{
    color:#615858;
}

@media (max-width: 480px) {
    .headline{
        font-size: 1.8rem;
    }

    .description{
        font-size: 0.9rem;
        max-width: 200px;
    }
    .mail{
        font-size: 0.9rem;  
        padding: 1rem 2rem;
    }

    .credits{
        margin-top: 0.5rem;
    }
    .credits p{
        font-size: 0.9rem;
    }

    
}
</style>
<footer>
    <h1 class="headline">Make Gaming Great Again</h1>
    <p class="description">Enjoyed the project? Please let me know at:</p>
    <a class="mail" href="mailto:contact@todoki.club">contact@todoki.club</a>
    <div class="credits">
        <p>© 2023 Todoki. All rights reserved.</p>
        <p>Made with ❤️ by <a class="link" href="https://github.com/RayX81194">&lt;Ray&gt;</a></p>
    </div>
    
</footer>