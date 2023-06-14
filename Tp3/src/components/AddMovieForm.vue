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
                        <option selected>Choisir...</option>
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
                <multiselect
                    v-model="value"
                    placeholder="Choose actors"
                    :filter-results="false"
                    :min-chars="1"
                    :resolve-on-load="false"
                    :delay="0"
                    :searchable="true"
                />
            </div>
            <button type="submit" class="btn btn-primary">Add Movie</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'AddMovieForm',
    props: {
        id: String
    },
    data() {
        return {
            value: [],
            options: ['List of actors']
        }
    }
}
</script>

<style scoped>

</style>