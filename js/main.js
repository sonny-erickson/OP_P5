
let zep = new Search();
let nouveautes = new News('https://api.rawg.io/api/games?dates=2020-01-01,2020-10-10&ordering=-added','news');
let best = new News('https://api.rawg.io/api/games?dates=2019-01-01,2019-12-31&ordering=-added','top');