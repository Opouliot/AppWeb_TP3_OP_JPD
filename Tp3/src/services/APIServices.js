let baseURL = "https://laravel-e23.herokuapp.com/api/";
let baseHeaders = {
    Accept: "application/json",
    "Content-Type": "application/json"
  };

//GET
export async function getAllActors() {
  const response = await fetch(baseURL + "actors", baseHeaders);
  return await response.json();
}


//POST
export async function postMovie(movie) {
  fetch(baseURL + "films",{
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      //Authorization: 'Bearer ' + token
    },
    body: JSON.stringify({
      title: movie.titre,
      release_year: movie.annee,
      description: movie.description,
      rating: movie.classement,
      length: movie.longueur,
      special_features: movie.types,
      language_id: movie.langue,
      actors: movie.actors
  })
  });
}

//DELETE