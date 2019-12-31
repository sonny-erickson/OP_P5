class Solo{
    constructor(slug){
       // const container = document.getElementById(idContainer);
        this.api(slug);

    }
    api = (slug) =>{
        console.log(slug);
        ajaxGet('https://api.rawg.io/api/games/'+ slug, (reponse) => {
            const bla = JSON.parse(reponse);// transforme en objet JavaScript
            console.log(bla);
            let video = bla.clip.clips[320];
            let platforms = '';
            for(let i = 0; i < bla.platforms.length; i++){
                if(i<bla.platforms.length-1){
                    platforms += bla.platforms[i].platform.name +', ';
                }else{
                    platforms += bla.platforms[i].platform.name;
                }
            };
            let genres = '';
            for(let i = 0; i < bla.genres.length; i++){
                if(i<bla.genres.length-1){
                    genres += bla.genres[i].name +', ';
                }else{
                    genres += bla.genres[i].name;
                }
            };

           
            document.getElementById("solo").innerHTML=`
            <div mb-3'>
                <h2 class='text-center text-light my-4' id='titre'>${bla.name}</h2>
                <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="${bla.background_image}" class="d-block w-100" alt="${bla.name}">
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
                <div class='row my-5' id='resume'>
                    <div class='text-light m-auto col-lg-6'> 
                        <p> ${bla.description}</p> 
                    </div>
                    <div class='col-lg-5 mt-4' id='video' >
                        ${video!==null?"<video src='"+ video +"' class='mt-4' controls></video>":'Pas de vidéo!'}
                    </div>                           
                </div>
                <div class='text-light text-center mt-3'>
                    <button type="button" class="btn btn-success btn-lg btn-block my-4">Ajouter à votre liste</button>
                    <p class='text-light' id='platforms'><u>Console: </u>${platforms}</p>
                    <p class='text-light' ><u>Date de sortie:</u> ${bla.released}</p>
                    <p class='text-light' ><u>Développeur:</u> ${bla.developers[0].name}</p>
                    <p class='text-light' ><u>Distributeur:</u> ${bla.publishers[0].name}</p>
                    <p class='text-light' ><u>Genres:</u> ${genres}</p>
                    <p class='text-light' ><u>Note:</u> ${bla.rating}/5</p>
                </div>  
            </div>
                ` 
        });
    } 
}


