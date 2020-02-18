
class Search{
    constructor(){
        this.search() 
        this.list = document.getElementById('list');
    }
    search=()=>{
        document.getElementById('search').addEventListener('input', (e) => {
            var url='https://api.rawg.io/api/games?search='+ encodeURI(search.value);//échappe tous les caractères sauf les plus courant
            ajaxGet(url, (reponse) => {
                var games=JSON.parse(reponse).results;
                // Remettre la recherche à zéro
                if(search.value.length===0){
                games = [];
                list.innerHTML='';
                };
                if(search.value.length>0){
                    list.innerHTML='';
                    for(let i =0; i<games.length; i++){
                        list.innerHTML+=`
                            <div class="card border rounded" id="listGroup">
                                <a class="pl-2 text-dark shadow-sm" id="aListGroup" href='index.php?page=details&slug=${games[i].slug}' class="list-group-item">${games[i].name}</a>
                            </div>
                            `
                    }
                }       
            });
        });
    }
}
