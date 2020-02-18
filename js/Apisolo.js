class Solo{
    constructor(slug){
        this.api(slug);

    }
    api = (slug) =>{
        ajaxGet('https://api.rawg.io/api/games/'+ slug, (reponse) => {
            const apiResult = JSON.parse(reponse);// transforme en objet JavaScript
            let video = apiResult.clip;
            let platforms = '';
            let imageBackAdd= apiResult.background_image_additional;
            let imageBackAddOther = 'assets/playfoot.jpg';
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
                const platformName = apiResult.platforms[i].platform.slug;
                // Simple vérif si window.bla et défini et qu'il inclus platformName (jeu dans BDD) alors le bouton est grisé sinon platformButton = ''
                platformsButton +=`<a href="index.php?page=addGame&game=${apiResult.slug}&platform=${platformName}" class='btn btn-info btn-sm mr-2 my-4 ${window.ownedPlatformsForUser !== undefined && window.ownedPlatformsForUser.includes(platformName) ? 'disabled' : ''}'>${apiResult.platforms[i].platform.name}</a>`         
            };
            //Mise place du HTML de chq page sans les boutons d'ajout ...
            document.getElementById("solo").innerHTML=`
            <div class='mb-3'>
                <h2 class='text-center text-light my-4' id='titre'>${apiResult.name}</h2>
                <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="${apiResult.background_image}" class="imgSolo d-block m-auto" alt="${apiResult.name}">
                        </div>
                        <div class="carousel-item">
                            <img src="${imageBackAdd!==null?imageBackAdd:imageBackAddOther}" class="imgSolo d-block m-auto" alt="...">
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
                        ${video!==null?"<video src='"+ video.clips[320] +"' class='mt-4' controls></video>":'No vidéo!'}
                    </div>                           
                </div>
                <?php           
                <div class='text-light text-center mt-3'>
                    <p class='text-light text-center mt-3' id='platforms'><u>Console: </u>${platforms}</p>
                    <p class='text-light text-center' ><u>Date de sortie:</u> ${apiResult.released}</p>
                    <p class='text-light text-center' ><u>Développeur:</u> ${apiResult.developers[0].name}</p>
                    <p class='text-light text-center' ><u>Genres:</u> ${genres}</p>
                    <p class='text-light text-center' ><u>Note:</u> ${apiResult.rating}/5</p>
                </div>  
            </div>
                ` 
                try{

                
            // Encars bouton qui s'affichera si on est co (view/jeuSolo)
            document.getElementById("AddGameSolo").innerHTML=`
                <div class='border border-success rounded mb-3'>
                    <h3 class='text-light text-center'>Pour ajouter le jeu à votre liste, cliquez sur la console correspondante:</h3>
                    <div class='d-flex justify-content-center flex-wrap' id='platformsButton'> ${platformsButton}</div>
                </div>
            `
        } catch(e){
        }

        });
    }     
}


