
class Search{
    constructor(){
       // const container = document.getElementById(idContainer);
        this.search() 
        this.list = document.getElementById('list');
       
    }
    search=()=>{
        document.getElementById('search').addEventListener('input', (e) => {
            var url='https://api.rawg.io/api/games?search='+ encodeURI(search.value);
            //console.log(url);
            ajaxGet(url, (reponse) => {
                var games=JSON.parse(reponse).results;
                //console.log(search.value.length);
                //todo vider la liste
            if(search.value.length===0){
                games = [];
                list.innerHTML='';
                };
                console.log(games);
                if(search.value.length>0){
                    for(let i =0; i<games.length; i++){
                    //todo alimenter la liste 
                        list.innerHTML+=`
                            <div class="card border rounded" id="listGroup">
                                <a class="pl-2 text-dark shadow-sm" id="aListGroup" href='index.php?page=details&slug=${games[i].slug}' class="list-group-item">${games[i].name}</a>
                            </div>
                            `
                            console.log(games[i].slug);
                
                    }
                }       
            });
        });
    }
}
