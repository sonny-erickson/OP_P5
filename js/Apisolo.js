class Solo{
    constructor(slug){
       // const container = document.getElementById(idContainer);
        this.api(slug);

    }
    api = (slug) =>{
        //console.log(slug);
        ajaxGet('https://api.rawg.io/api/games/'+ slug, (reponse) => {
            const apiResult = JSON.parse(reponse);// transforme en objet JavaScript
            console.log(apiResult);
            let video = apiResult.clip.clips[320];
            console.log(video);
            
            let platforms = '';
            for(let i = 0; i < apiResult.platforms.length; i++){
                if(i<apiResult.platforms.length-1){
                    platforms += apiResult.platforms[i].platform.name +', ';
                }else{
                    platforms += apiResult.platforms[i].platform.name;
                }
            };
            let genres = '';
            for(let i = 0; i < apiResult.genres.length; i++){
                if(i<apiResult.genres.length-1){
                    genres += apiResult.genres[i].name +', ';
                }else{
                    genres += apiResult.genres[i].name;
                }
            };
            // Boucle pour envoyer en GET slug name & platform
            let platformsButton = '';
            for(let i = 0; i < apiResult.platforms.length; i++){
                platformsButton +=`<a href="index.php?page=addGame&game=${apiResult.slug}&platform=${ apiResult.platforms[i].platform.slug}" class='btn btn-info btn-lg mr-2 my-4'>${ apiResult.platforms[i].platform.name}</a>`
            };

            document.getElementById("solo").innerHTML=`
            <div class='mb-3'>
                <h2 class='text-center text-light my-4' id='titre'>${apiResult.name}</h2>
                <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="${apiResult.background_image}" class="d-block w-100" alt="${apiResult.name}">
                        </div>
                        <div class="carousel-item">
                            <img src="${apiResult.background_image_additional}" class="d-block w-100" alt="...">
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
                        <p> ${apiResult.description}</p> 
                    </div>
                    <div class='col-lg-5 mt-4' id='video' >
                        ${video!==null?"<video src='"+ video +"' class='mt-4' controls></video>":'Pas de vidéo!'}
                    </div>                           
                </div>
                <?php           
                <div class='text-light text-center mt-3'>
                    <div class='border border-success rounded'>
                    <h3 class='text-light text-center'>Pour ajouter le jeu à votre liste, cliquez sur la console correspondante:</h3>
                    <div> ${platformsButton}</div>
                    </div>
                    <p class='text-light mt-3' id='platforms'><u>Console: </u>${platforms}</p>
                    <p class='text-light' ><u>Date de sortie:</u> ${apiResult.released}</p>
                    <p class='text-light' ><u>Développeur:</u> ${apiResult.developers[0].name}</p>
                    <p class='text-light' ><u>Distributeur:</u> ${apiResult.publishers[0].name}</p>
                    <p class='text-light' ><u>Genres:</u> ${genres}</p>
                    <p class='text-light' ><u>Note:</u> ${apiResult.rating}/5</p>
                </div>  
            </div>
                ` 
        });
    } 
}


