class Games{
    constructor(){
        this.api();
       

    }
    api=()=>{
        ajaxGet('https://api.rawg.io/api/games?dates=2019-01-01,2019-12-31&ordering=-added', (reponse) => {
            const bla = JSON.parse(reponse);// transforme en objet JavaScript
            console.log(bla);
           for(let i = 0; i < bla.results.length; i++){    
                document.getElementById('games').innerHTML+=`<div class='card col-lg-3 offset-lg-1 mb-3' id='top' >
                <div class ='card-body'>
                <img src='${bla.results[i].background_image}' class='card-img-top' style='max-heigth:263px;' alt='${bla.results[i].name}'>
                <h5 class='card-title text-center mt-3' id='titre'>${bla.results[i].name}</h5>
                <p id='support'>Console:  ${bla.results[i].platforms[0].platform.name}</p>
                <p id='date'>Date de sortie: ${bla.results[i].released}</p>
                <a href='#' class='btn btn-success d-flex justify-content-center'>Plus infos</a>
                </div>
                </div>
                  `
          }   
        });
    }
    
}
let news = new Games('news');


