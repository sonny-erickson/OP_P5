
class News{
    constructor(url, idContainer){
       this.container = document.getElementById(idContainer);
        this.api(url);
    }
    api = (url) =>{
        //console.log(url);
        ajaxGet(url, (reponse) => {
            const apiResult = JSON.parse(reponse);// transforme en objet JavaScript

            for(let i = 0; i < apiResult.results.length; i++){ 
                let fragments = apiResult.results[i].background_image.split("/");//découpe chaine de carac
                const directory = fragments[fragments.length-2];
                const file = fragments[fragments.length-1];
                let image = 'https://media.rawg.io/media/crop/600/400/games/' + directory + "/" + file;
                let platforms = '';
                for(let j = 0; j < apiResult.results[i].parent_platforms.length; j++){//Déja [i] dans for ....
                    platforms +='<img src="assets/'+ apiResult.results[i].parent_platforms[j].platform.slug + '.png" alt="'+ apiResult.results[i].parent_platforms[j].platform.name +'" class="platform">';
                };
                this.container.innerHTML+=`<div class='card col-lg-3 mr-3 ml-3 mb-3 bg-dark'>
                <div class ='card-body'>
                <img src='${image}'  class='card-img-top' id='photo-top-${i}' data-directory='${directory}' data-file='${file}'  alt='${apiResult.results[i].name}'>
                <h5 class='card-title text-center mt-3 text-light' id='titre'>${apiResult.results[i].name}</h5>
                <p class='text-light'>Console: ${platforms} </p>
                <p class='text-light'id='date'>Date de sortie: ${apiResult.results[i].released}</p>
                <a href='index.php?page=details&slug=${apiResult.results[i].slug}' class='btn btn-success d-flex justify-content-center'>Plus infos</a>
                </div>
                </div>
                  `
                // En cas d'erreur et que l'image ne s'affiche pas (changement du src ou img du logo)
                document.getElementById('photo-top-'+i).addEventListener('error',e => {
                    image = 'https://media.rawg.io/media/crop/600/400/screenshots/' + directory + "/" + file;
                    document.getElementById('photo-top-'+i).src=image;
                })
            }
        });
    }
}




