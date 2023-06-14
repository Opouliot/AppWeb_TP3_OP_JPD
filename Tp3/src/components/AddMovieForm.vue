<template>
    <div>
        <form>
            <div class="form-row col-12">
                <div class="form-group">
                    <label for="movieTitle">Movie Title</label>
                    <input type="text" class="form-control" id="movieTitle" placeholder="Movie Title">
                </div>
                <div class="form-group">
                    <label for="releaseYear">Release Year</label>
                    <input type="number" class="form-control" id="releaseYear" placeholder="Release Year">
                </div>
                <div class="form-group">
                    <label for="movieLength">Movie Length</label>
                    <input type="number" class="form-control" id="movieLength" placeholder="Movie Length">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="selectRating">Rating</label>
                    <select id="selectRating" class="form-control">
                        <option selected>Choose...</option>
                        <option value="PG">PG</option>
                        <option value="PG-13">PG-13</option>
                        <option value="R">R</option>
                        <option value="NC-17">NC-17</option>
                     </select>
                </div>
            </div>
            <div class="form-group">
                <label for="movieDescription">Description</label>
                <textarea name="description" id="movieDescription" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <multiselect @keyup="getFilterName"
                v-model="value"
                mode="tags"
                placeholder="Select Actors"
                :close-on-select="false"
                :filter-results="false"
                :min-chars="1"
                :resolve-on-load="false"
                :delay="0"
                :searchable="true"
                :options="displayActors"
                />
            </div>

            <button type="submit" class="btn btn-primary" @click="getMovieDetail">Add Movie</button>
        </form>
    </div>
</template>

<script>
    import {getAllActors} from "@/services/APIServices.js";
    import {postMovie} from "@/services/APIServices.js";

    export default {
        data() {
            return {
                value: [],
                options: [],
                filterName: "",
                actorList: [],
                movie: {
                    titre: "",
                    annee: "",
                    description: "",
                    classement: "",
                    longueur: Number,
                    types: null,
                    langue : 1,
                    image: null,
                    acteurs: []
                }
            }
        },
        methods: {
            async displayActors() {

                let filteredResult = [];

                filteredResult = this.filtorActorByLastName(filteredResult);
                filteredResult = this.filtorActorByFirstName(filteredResult);

                return filteredResult.map((actor) => {
                    return {value: actor.id, label: actor.first_name + " " + actor.last_name};
                });
                },

            getFilterName(e){
                this.filterName = e.target.value;
            },
            filtorActorByFirstName(filteredArray){
                let regex = new RegExp(this.filterName, "i");
                this.actorList.forEach((actor) => {
                    if(regex.test(actor.first_name)){
                        filteredArray.push(actor);
                    }
                });
                return filteredArray;
            },
            filtorActorByLastName(filteredArray){
                let regex = new RegExp(this.filterName, "i");
                this.actorList.forEach((actor) => {
                    if(regex.test(actor.last_name)){
                        filteredArray.push(actor);
                    }
                });
                return filteredArray;
            },
            getMovieDetail(e){
                this.movie.titre = document.getElementById("movieTitle").value;
                this.movie.annee = document.getElementById("releaseYear").value;
                this.movie.description = document.getElementById("movieDescription").value;
                this.movie.classement = document.getElementById("selectRating").value;
                this.movie.longueur = parseInt(document.getElementById("movieLength").value);
                this.movie.acteurs = this.value;
                console.log(this.movie);
                e.preventDefault();
                postMovie(this.movie);
            }
        },
        created () {
            getAllActors().then(response => this.actorList = response);
        },
        
    }
</script>

<style src="@vueform/multiselect/themes/default.css"></style>