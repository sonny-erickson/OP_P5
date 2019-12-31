class News{
    constructor(url, idContainer){
       // const container = document.getElementById(idContainer);
        this.api(url);
        this.container = document.getElementById(idContainer);
    }
    api = (url) =>{
        console.log(url);
        ajaxGet(url, (reponse) => {
            const bla = JSON.parse(reponse);// transforme en objet JavaScript
            
            


           for(let i = 0; i < bla.results.length; i++){ 
                let fragments = bla.results[i].background_image.split("/");//découpe chaine de carac
               // console.log(fragments);
                const directory = fragments[fragments.length-2];
                const file = fragments[fragments.length-1];
                const image = 'https://media.rawg.io/media/crop/600/400/games/' + directory + "/" + file;
                //console.log(image);
                this.container.innerHTML+=`<div class='card col-lg-3 mr-3 ml-3 mb-3 bg-dark'>
                <div class ='card-body'>
                <img src='${image}' class='card-img-top' id='photo-top-${i}' data-try='0' data-directory='${directory}' data-file='${file}'  alt='${bla.results[i].name}'>
                <h5 class='card-title text-center mt-3 text-light' id='titre'>${bla.results[i].name}</h5>
                <p class='text-light'>Console:  </p>
                <p class='text-light'id='date'>Date de sortie: ${bla.results[i].released}</p>
                

                <a href='index.php?page=details&slug=${bla.results[i].slug}' class='btn btn-success d-flex justify-content-center'>Plus infos</a>
                </div>
                </div>
                  `
                // En cas d'erreur et que l'image ne s'affiche pas (changement du src ou img du logo)
                document.getElementById('photo-top-'+i).addEventListener('error',e => {
                    //alert('blabla');
                    const directory = e.target.getAttribute('data-directory');
                    const file = e.target.getAttribute('data-file');
                    let tries = Number(e.target.getAttribute('data-try'))+1;
                    e.target.setAttribute('data-try',tries);
                    console.log(tries);
                    if(tries==1){
                        e.target.src = 'https://media.rawg.io/media/crop/600/400/screenshots/' + directory + "/" + file;
                    }else{
                        e.target.src = 'assets/logo.png';
                    }
                })
            }
            
        });
    }
}
let nouveautes = new News('https://api.rawg.io/api/games?dates=2020-01-01,2020-10-10&ordering=-added','news');
let best = new News('https://api.rawg.io/api/games?dates=2019-01-01,2019-12-31&ordering=-added','top');



