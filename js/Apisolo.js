class Solo{
    constructor(){
       // const container = document.getElementById(idContainer);
        this.api();
       

    }
    api = () =>{
        ajaxGet('https://api.rawg.io/api/games/pokemon-red', (reponse) => {
            const bla = JSON.parse(reponse);// transforme en objet JavaScript
            console.log(bla);

             
                document.getElementById("solo").innerHTML=`
                <div mb-3'>
                    <div>
                        <h5 class='text-center text-light mt-3' id='titre'>${bla.name}</h5>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="${bla.background_image}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="${bla.background_image_additional}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class='row mt-3' id='resume'>
                            <div class='text-light m-auto col-lg-6'> 
                                <p> ${bla.description}</p>
                                <button type="button" class="btn btn-success btn-lg mt-3">Ajout à votre liste</button> 
                            </div>
                            <div class='text-light text-center col-lg-5 mt-3'> 
                                <p class='text-light' id='support'><u>Console:</u> ${bla.platforms[0].platform.name}</p>
                                <p class='text-light' id='date'><u>Date de sortie:</u> ${bla.released}</p>
                                <p class='text-light' id='date'><u>Devellopeur:</u> ${bla.developers[0].name}</p>
                                <p class='text-light' id='date'><u>Distributeur:</u> ${bla.publishers[0].name}</p>
                                <p class='text-light' id='date'><u>Genres:</u> ${bla.genres[0].name}</p>
                                <p class='text-light' id='date'><u>Note:</u> ${bla.rating}/5</p>





                               
                            </div>
                        </div>
                        
                        <video src="${bla.clip.clip}" class='mt-4' controls>
                        Votre navigateur ne gère pas l'élément <code>video</code>.
                        </video>
                       
                        
                    </div>
                </div>
                  `
           
        });
    }
    
}
let jeu = new Solo();


